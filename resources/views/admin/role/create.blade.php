@extends('layouts.app',['title'=>'Roles'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-unlock"></i> Tambah Role</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Roles</a></li>
            <li class="breadcrumb-item active">Tambah Role</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<form action="{{ route('admin.role.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>NAMA ROLE</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Role"
            class="form-control @error('title') is-invalid @enderror">

        @error('name')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">PERMISSIONS</label>
        <br>
        @foreach ($permissions as $permission)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="check-{{ $permission->id }}">
            <label class="form-check-label" for="check-{{ $permission->id }}">
                {{ $permission->name }}
            </label>
        </div>
        @endforeach
    </div>

    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
        SIMPAN</button>
    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

</form>
                        
@stop