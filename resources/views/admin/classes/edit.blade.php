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
            <li class="breadcrumb-item"><a href="{{ route('admin.classes.index') }}">Classes</a></li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<ul class="nav nav-tabs nav-tabs-highlight">
    <li class="nav-item"><a href="#edit-class" class="nav-link active" data-toggle="tab">Edit Class</a></li>
    {{-- <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Class</a></li> --}}
</ul>
<br>
<div class="tab-content">

    <div class="tab-pane fade show active" id="edit-class">
        {{$c}}
    </div>

</div>

@stop