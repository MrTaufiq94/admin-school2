@extends('layouts.app',['title'=>'Dashboard'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><i class="fas fa-tachometer-alt"></i> Dashboard</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        {{-- <h5 class="mb-2">Info Box</h5> --}}
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fa fa-book-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">BERITA</span>
                        <span class="info-box-number">{{ App\Models\Post::count() ?? '0' }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fa fa-bell"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">AGENDA</span>
                        <span class="info-box-number">{{ App\Models\Event::count() ?? '0' }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fa fa-tags"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">TAGS</span>
                        <span class="info-box-number">{{ App\Models\Tag::count() ?? '0' }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">PENGGUNA</span>
                        <span class="info-box-number">{{ App\Models\User::count() ?? '0' }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </div>
</section>   






{{-- <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fa fa-book-open text-white fa-2x"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>BERITA</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Post::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fa fa-bell text-white fa-2x"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>AGENDA</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Event::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fa fa-tags text-white fa-2x"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>TAGS</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\Tag::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fa fa-users text-white fa-2x"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>USERS</h4>
                  </div>
                  <div class="card-body">
                    {{ App\Models\User::count() ?? '0' }}
                  </div>
                </div>
              </div>
            </div>                  
          </div>

    </section>
</div> --}}
@endsection