@extends('layouts.app',['title'=>'Users'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            {{-- <h4><i class="fas fa-users"></i> Add Users</h4> --}}
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Add Users</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>NAMA PENGGUNA</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama User"
            class="form-control @error('name') is-invalid @enderror">

        @error('name')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>EMAIL</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email"
            class="form-control @error('email') is-invalid @enderror">

        @error('email')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password"
                    class="form-control @error('password') is-invalid @enderror">

                @error('password')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password"
                    class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="font-weight-bold">ROLE</label>
        <br>
        @foreach ($roles as $role)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}" id="check-{{ $role->id }}">
            <label class="form-check-label" for="check-{{ $role->id }}">
                {{ $role->name }}
            </label>
        </div>
        @endforeach
    </div>

    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
        SIMPAN</button>
    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

</form>

                        
@stop