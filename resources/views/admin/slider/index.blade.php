@extends('layouts.app',['title'=>'Sliders'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-laptop"></i> Slider</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            <li class="breadcrumb-item active">Slider</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

@can('sliders.create')
<div class="card">
    <div class="card-header">
        <h5>Upload Slider</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>GAMBAR</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">

                @error('image')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-upload"></i> UPLOAD</button>
            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

        </form>

    </div>
</div>
@endcan 

<div class="card">
    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                    <th scope="col">GAMBAR</th>
                    <th scope="col" style="width: 15%;text-align: center">TINDAKAN</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sliders as $no => $slider)
                    <tr>
                        <th scope="row" style="text-align: center">{{ ++$no + ($sliders->currentPage()-1) * $sliders->perPage() }}</th>
                        <td class="text-center"><img src="{{ Storage::url('public/sliders/'.$slider->image) }}" style="width: 300px"></td>
                        <td class="text-center">
                            @can('sliders.delete')
                                <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $slider->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="text-align: center">
                {{$sliders->links("vendor.pagination.bootstrap-4")}}
            </div>
        </div>
    </div>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            Swal.fire({
                title: "APAKAH ANDA PASTI ?",
                text: "INGIN MENGHAPUSKAN DATA INI!",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya',
                reverseButtons:true
            }).then((result) => {
                if (result.value==true) {
                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("admin.slider.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    title: 'BERJAYA!',
                                    text: 'DATA BERJAYA DIHAPUSKAN!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                Swal.fire({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUSKAN!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>

@stop