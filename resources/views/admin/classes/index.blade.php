@extends('layouts.app',['title'=>'Classes'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            {{-- <h4><i class="fas fa-book-open"></i> Berita</h4> --}}
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            <li class="breadcrumb-item active">Classes</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<ul class="nav nav-tabs nav-tabs-highlight">
    <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Manage Classes</a></li>
    {{-- <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Class</a></li> --}}
</ul>
<br>
<div class="tab-content">

    <div class="tab-pane fade show active" id="all-classes">
        <a href="{{ route('admin.classes.create') }}"  class="btn btn-primary mr-1 btn-sm"><i class="fa fa-plus-circle"></i> Add</a>
        <br>
        <br>
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Class Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($my_classes as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->class_type->name }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{ route('admin.classes.edit', $c->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            &nbsp;
                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $c->id }}">
                                <i class="fa fa-trash"> Delete</i>
                            </button>  
                            
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
                        url: "{{ route("admin.classes.destroy", $c->id) }}",
                        data:     {
                            "id": id,
                            "_token": token,
                            "_method": 'delete'
                        },
                        type: "POST",
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