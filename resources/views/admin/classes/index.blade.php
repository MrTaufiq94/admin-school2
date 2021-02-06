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
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            <li class="breadcrumb-item active">Classes</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<ul class="nav nav-tabs nav-tabs-highlight">
    <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Manage Classes</a></li>
    {{-- <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Class</a></li> --}}
</ul>
<br>
<div class="tab-content">

    <div class="tab-pane fade show active" id="all-classes">
        <table id="dataTable" class="table table-hover table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Class Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($my_classes as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->class_type->name }}</td>
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left">
                                    {{-- @if(Qs::userIsTeamSA()) --}}
                                    {{--Edit--}}
                                    {{-- {{ route('classes.edit', $c->id) }} --}}
                                    <a href="" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                    {{-- @endif --}}
                                        {{-- @if(Qs::userIsSuperAdmin()) --}}
                                    {{--Delete--}}
                                    {{-- {{ route('classes.destroy', $c->id) }} --}}
                                    <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                    <form method="post" id="item-delete-{{ $c->id }}" action="" class="hidden">@csrf @method('delete')</form>
                                        {{-- @endif --}}

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@stop