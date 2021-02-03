@extends('layouts.app',['title'=>'Permissions'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-key"></i> Permissions</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            <li class="breadcrumb-item active">Permission</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
    <form action="{{ route('admin.permission.index') }}" method="GET">
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="q"
                        placeholder="cari berdasarkan nama permissions">
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
                <th scope="col">NAMA PERMISSION</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($permissions as $no => $permission)
                <tr>
                    <th scope="row" style="text-align: center">{{ ++$no + ($permissions->currentPage()-1) * $permissions->perPage() }}</th>
                    <td>{{ $permission->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center">
            {{ $permissions->links("vendor.pagination.bootstrap-4") }}
        </div>
    </div>

@endsection