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
            <li class="breadcrumb-item"><a href="{{ route('admin.my_account.index') }}">My Account</a></li>
            <li class="breadcrumb-item active">Change Password</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection

@section('content')

<ul class="nav nav-tabs nav-tabs-highlight">
    <li class="nav-item"><a href="#change-pass" class="nav-link active" data-toggle="tab">Change Password</a></li>
</ul>
<br>
<div class="tab-content">
    <div class="tab-pane fade show active" id="change-pass">
        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-uppercase">Current Password</label>
                <input type="password" class="form-control" name="current_password" required
                    autocomplete="current-password" />
            </div>
            <div class="form-group">
                <label class="text-uppercase">Password</label>
                <input type="password" name="password" required autocomplete="new-password"
                    class="form-control" />
            </div>
            <div class="form-group">
                <label class="text-uppercase">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary text-uppercase" type="submit">
                    Update Password
                </button>
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