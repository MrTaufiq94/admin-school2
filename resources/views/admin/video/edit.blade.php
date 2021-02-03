@extends('layouts.app',['title'=>'Video'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-video"></i> Edit Video</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Video</a></li>
            <li class="breadcrumb-item active">Edit Video</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<form action="{{ route('admin.video.update', $video->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>TAJUK VIDEO</label>
        <input type="text" name="title" value="{{ old('title', $video->title) }}" placeholder="Masukkan Judul Video" class="form-control @error('title') is-invalid @enderror">

        @error('title')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>EMBED YOUTUBE</label>
        <input type="text" name="embed" value="{{ old('embed', $video->embed) }}" placeholder="Masukkan Embed YouTube" class="form-control @error('embed') is-invalid @enderror">

        @error('embed')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

</form>
                     
@stop