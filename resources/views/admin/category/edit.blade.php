@extends('layouts.app',['title'=>'Kategori'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-folder"></i>Edit Kategori</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Kategori</a></li>
            <li class="breadcrumb-item active">Edit Kategori</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<form action="{{ route('admin.category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>NAMA KATEGORI</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" placeholder="Masukkan Nama Kategori" class="form-control @error('name') is-invalid @enderror">

        @error('name')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

</form>
                     
@stop