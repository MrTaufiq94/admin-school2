@extends('layouts.app',['title'=>'Berita'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-book-open"></i>Edit Berita</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Berita</a></li>
            <li class="breadcrumb-item active">Edit Berita</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<form action="{{ route('admin.post.update', $post->id) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>GAMBAR</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
    </div>

    <div class="form-group">
        <label>JUDUL BERITA</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}"
            placeholder="Masukkan Judul Berita"
            class="form-control @error('title') is-invalid @enderror">


        @error('title')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>KATEGORI</label>
        <select class="form-control select-category @error('category_id') is-invalid @enderror"
            name="category_id">
            <option value="">-- PILIH KATEGORI --</option>
            @foreach ($categories as $category)
                @if($post->category_id == $category->id)
                    <option value="{{ $category->id  }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id  }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>KONTEN</label>
        <textarea class="form-control content @error('content') is-invalid @enderror" name="content"
            placeholder="Masukkan Konten / Isi Berita"
            rows="10">{!! old('content', $post->content) !!}</textarea>
        @error('content')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">TAGS</label>
        <select class="form-control" name="tags[]"
            multiple="multiple">
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}" {{ in_array($tag->id, $post->tags()->pluck('id')->toArray()) ? 'selected' : '' }}> {{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
        UPDATE</button>
    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

</form>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
        selector: "textarea.content",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
    };

    tinymce.init(editor_config);
</script>
                     
@stop