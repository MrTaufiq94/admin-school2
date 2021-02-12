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
            <li class="breadcrumb-item active">Add</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<ul class="nav nav-tabs nav-tabs-highlight">
    <li class="nav-item"><a href="#add-class" class="nav-link active" data-toggle="tab">Add Class</a></li>
    {{-- <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Class</a></li> --}}
</ul>
<br>
<div class="tab-content">

    <div class="tab-pane fade show active" id="add-class">

        <div class="row">
            <div class="col-md-6">
                <form  method="post" action="{{ route('admin.classes.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name of Class">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Class Type</label>
                        <div class="col-lg-9">
                            <select required data-placeholder="Select Class Type" class="form-control select" name="class_type_id" id="class_type_id">
                                @foreach($class_types as $ct)
                                    <option {{ old('class_type_id') == $ct->id ? 'selected' : '' }} value="{{ $ct->id }}">{{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="text-right">
                        <button  type="submit" class="btn btn-primary">Submit form <i class="ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@stop