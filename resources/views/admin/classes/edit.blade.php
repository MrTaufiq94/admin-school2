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

        <div class="row">
            <div class="col-md-6">
                <form class="ajax-update" data-reload="#page-header" method="post" action="{{ route('admin.classes.update', $c->id) }}">
                    @csrf @method('PUT')
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input name="name" value="{{ $c->name }}" required type="text" class="form-control" placeholder="Name of Class">
                        </div>
                    </div>

                  {{--
                  <div class="form-group row">
                        <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Teacher</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Select Teacher" class="form-control select-search" name="teacher_id" id="teacher_id">
                                <option value=""></option>
                                @foreach($teachers as $t)
                                    <option {{ $c->teacher_id == $t->id ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  --}}

                    <div class="form-group row">
                        <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Class Type</label>
                        <div class="col-lg-9">
                            <input class="form-control" disabled="disabled" value="{{ $c->class_type->name }}" title="Class Type" type="text">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@stop