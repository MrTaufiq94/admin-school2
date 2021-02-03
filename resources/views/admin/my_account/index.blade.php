@extends('layouts.app',['title'=>'My Account'])

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            {{-- <h4><i class="fas fa-plus-circle"></i> My Account</h4> --}}
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
            <li class="breadcrumb-item active">My Account</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<ul class="nav nav-tabs nav-tabs-highlight">
    {{-- <li class="nav-item"><a href="#change-pass" class="nav-link active" data-toggle="tab">Change Password</a></li> --}}
    {{-- @if(Qs::userIsPTA()) --}}
        <li class="nav-item"><a href="#edit-profile" class="nav-link active" data-toggle="tab">Manage Profile</a></li>
    {{-- @endif --}}
</ul>
<br>
<div class="tab-content">
    <div class="tab-pane fade show active" id="edit-profile">
        <form name="form_update_profile" enctype="multipart/form-data" method="POST" action="">
            @csrf 
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Full Name: </label>
                        <input disabled="disabled" id="name" name="name" class="form-control" type="text" value="{{$user->name}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email Address: </label>
                        <input id="email" value="{{$user->email}}" name="email"  type="email" class="form-control" disabled="disabled">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>IC Number: <span class="text-danger">*</span></label>
                        <input id="ic_no" value="" name="ic_no"  type="text" class="form-control @error('ic_no') is-invalid @enderror" required>
                        @error('ic_no')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date of Birth:</label>
                        <input autocomplete="off" name="dob" value="{{$user->dob}}" type="text" class="form-control date-pick" placeholder="Select Date...">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gender">Gender: <span class="text-danger">*</span></label>
                        <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                            <option value=""></option>
                            <option {{ ($user->gender == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                            <option {{ ($user->gender == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Phone: </label>
                        <input id="phone" value="{{$user->phone}}" name="phone"  type="text" class="form-control @error('phone') is-invalid @enderror" >
                        @error('phone')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Telephone: </label>
                        <input id="phone2" value="{{$user->phone2}}" name="phone2"  type="text" class="form-control @error('phone') is-invalid @enderror" >
                        @error('phone2')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Address: <span class="text-danger">*</span></label>
                        <input value="{{$user->address}}" class="form-control" placeholder="Address" name="address" type="text" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                        <select data-placeholder="Choose..."  name="nal_id" id="nal_id" class="select-search form-control">
                            <option value=""></option>
                            {{-- @foreach($nationals as $nal)
                                <option {{ (old('nal_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                {{--State--}}
                <div class="col-md-4">
                    <label for="state_id">State: <span class="text-danger">*</span></label>
                    <select onchange="getLGA(this.value)"  data-placeholder="Choose.." class="select-search form-control" name="state_id" id="state_id">
                        <option value=""></option>
                        {{-- @foreach($states as $st)
                            <option {{ (old('state_id') == $st->id ? 'selected' : '') }} value="{{ $st->id }}">{{ $st->name }}</option>
                        @endforeach --}}
                    </select>
                </div>
                {{--LGA--}}
                <div class="col-md-4">
                    <label for="lga_id">Region: <span class="text-danger">*</span></label>
                    <select  data-placeholder="Select State First" class="select-search form-control" name="lga_id" id="lga_id">
                        <option value=""></option>
                    </select>
                </div>
                {{--BLOOD GROUP--}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bg_id">Blood Group: </label>
                        <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">
                            <option value=""></option>
                            {{-- @foreach($blood_groups as $bg)
                                <option {{ (old('bg_id') == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-danger">Submit form <i class="icon-paperplane ml-2"></i></button>
                <a href="{{url('admin/my_account/edit_password')}}">
                    <button type="button" class="btn btn-warning">Change Password <i class="fa fa-key"></i></button>
                </a>
            </div>
        </form>
    </div>
</div>
    
<script type="text/javascript">
    function update_password(){
        var current_password = $("input[name=current_password]").val();
        var password = $("input[name=password]").val();
        var password_confirmation = $("input[name=password_confirmation]").val();
        
        $.ajax({
           url:"{{ route('user-password.update') }}",
           method: 'PUT',
            dataType: 'json',
           data:{
            //    'id':id,
               //"_token": token,
               'current_password':current_password,
               'password':password,
               'password_confirmation':password_confirmation,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            statusCode: {
                200: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Successfully Update',
                    });
                },
            },
            success:function(response){
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                    });
                }

                $("input[name=current_password]").val(null);
                $("input[name=password]").val(null);
                $("input[name=password_confirmation]").val(null);

                console.log(response);
            },error:function(response){
                if(response.responseJSON.errors.current_password){
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: response.responseJSON.errors.current_password,
                    });
                }else if(response.responseJSON.errors.password){
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: response.responseJSON.errors.password,
                    });
                }else if(response.responseJSON.errors.password_confirmation){
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: response.responseJSON.errors.password_confirmation,
                    });
                }
            }

        });

       
            
    };
    function update_profile(id){
        var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var dob = $("input[name=emp_date]").val();
        var gender = $("select[name=gender]").val();
        var phone = $("input[name=phone]").val();
        var phone2 = $("input[name=phone2]").val();
        var address = $("input[name=address]").val();
        
        
        $.ajax({
           url:"{{ route('admin.my_account.update_profile') }}",
           type:'POST',
           //cache: false,
           data:{
               'id':id,
               //"_token": token,
               'name':name,
               'email':email,
               'dob':dob,
               'gender':gender,
               'phone':phone,
               'phone2':phone2,
               'address':address,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response){
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                    });
                }
                console.log(response);
            },error:function(response){
                Swal.fire({
                    icon: 'error',
                    title: 'Opps!',
                    text: response.responseJSON.message,
                });
            }


        });

       
            
    };
</script>

@stop