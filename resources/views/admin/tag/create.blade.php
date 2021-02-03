@extends('layouts.app',['title'=>'Tags'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-tags"></i> Tambah Tag</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Tags</a></li>
            <li class="breadcrumb-item active">Tambah Tag</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<form action="{{ route('admin.tag.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>NAMA TAG</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Tag" class="form-control @error('name') is-invalid @enderror">

        @error('name')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

</form>
                        
@stop