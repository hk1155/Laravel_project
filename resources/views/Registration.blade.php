@extends('layout.Master')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registration</div>

                <div class="card-body">
                    <form method="POST" id="registerform" action="adduser">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="txtname" name="txtname" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="txtemail" value="{{ old('email') }}" required autocomplete="email">
                                <small style="color: red;"> @if (session('emailmsg')){{Session::get('emailmsg')}}@endif</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" id="txtpassword" name="txtpassword" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" id="txtcpassword" name="txtcpassword" required autocomplete="new-password">
                                <small style="color: red;"> @if (session('passmsg')){{Session::get('passmsg')}}@endif</small>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registration
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#registerform").validate({
        rules: {
            txtname: {
                required: true,
                minlength: 3
            },
            txtemail: {
                required: true,
                email: true
            },
            txtpassword: {
                required: true,
                minlength: 4,
                maxlength: 15
            },
            txtcpassword: {
                required: true,
                equalTo: "#txtpassword"
            },
            exampleCheck2: {
                required: true
            },
        },
        messages: {

            txtname: {
                required: "Please enter Name",
                minlength: "Your Username must consist at least 4 characters"
            },
            txtemail: {
                required: "Please enter email",
                email: "Please enter valid email address"
            },
            txtpassword: {
                required: "Please enter password",
                minlength: "Password must be within 4 - 15 characters",
                maxlength: "Password must be within 4 - 15 characters"
            },
            txtcpassword: {
                required: "Please enter confirm password",
                equalTo: "Confirm password must be same as password"
            },
            exampleCheck2: {
                required: "You can't login without accept the Terms and Privacy Policy"
            },
        },
        submitHandler: function() {
            return true;
        }
    });
</script>

@endsection