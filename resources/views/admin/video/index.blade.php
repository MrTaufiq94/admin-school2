@extends('layouts.app',['title'=>'Video'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-video"></i> Video</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            <li class="breadcrumb-item active">Video</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
<form action="{{ route('admin.video.index') }}" method="GET">
    <div class="form-group">
        <div class="input-group mb-3">
            @can('videos.create')
                <div class="input-group-prepend">
                    <a href="{{ route('admin.video.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                </div>
            @endcan
            <input type="text" class="form-control" name="q"
                   placeholder="cari berdasarkan judul video">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                </button>
            </div>
        </div>
    </div>
</form>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" style="text-align: center;width: 6%">NO.</th>
            <th scope="col">TAJUK VIDEO</th>
            <th scope="col">VIDEO</th>
            <th scope="col" style="width: 15%;text-align: center">TINDAKAN</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($videos as $no => $video)
            <tr>
                <th scope="row" style="text-align: center">{{ ++$no + ($videos->currentPage()-1) * $videos->perPage() }}</th>
                <td>{{ $video->title }}</td>
                <td class="text-center">
                    <iframe width="300" height="150" src="{{ $video->embed }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </td>
                <td class="text-center">
                    @can('videos.edit')
                        <a href="{{ route('admin.video.edit', $video->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                    @endcan
                    
                    @can('videos.delete')
                        <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $video->id }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="text-align: center">
        {{$videos->links("vendor.pagination.bootstrap-4")}}
    </div>
</div>
                
<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            Swal.fire({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya',
                reverseButtons:true
            }).then((result) => {
                if (result.value==true) {

                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("admin.video.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
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
                                    text: 'DATA GAGAL DIHAPUS!',
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