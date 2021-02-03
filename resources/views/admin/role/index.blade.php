@extends('layouts.app',['title'=>'Roles'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-unlock"></i> Roles</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            <li class="breadcrumb-item active">Roles</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

    <form action="{{ route('admin.role.index') }}" method="GET">
        <div class="form-group">
            <div class="input-group mb-3">
                @can('roles.create')
                    <div class="input-group-prepend">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                    </div>
                @endcan
                <input type="text" class="form-control" name="q"
                        placeholder="cari berdasarkan nama role">
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
                <th scope="col" style="width: 15%">NAMA ROLE</th>
                <th scope="col">PERMISSIONS</th>
                <th scope="col" style="width: 15%;text-align: center">TINDAKAN</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $no => $role)
                <tr>
                    <th scope="row" style="text-align: center">{{ ++$no + ($roles->currentPage()-1) * $roles->perPage() }}</th>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach($role->getPermissionNames() as $permission)
                            <button class="btn btn-sm btn-success mb-1 mt-1 mr-1">{{ $permission }}</button>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @can('roles.edit')
                            <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                        @endcan
                        
                        @can('roles.delete')
                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $role->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center">
            {{$roles->links("vendor.pagination.bootstrap-4")}}
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
                        url: "{{ route("admin.role.index") }}/"+id,
                        data:{
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