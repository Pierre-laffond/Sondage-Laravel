
@extends('layouts/layout')

@section('home')


    <div class="signup-content">
        <div class="signup-form">
            <h2 class="form-title">Sign in</h2>
            <form method="POST" action="login" class="register-form" id="register-form">
                @csrf

                <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required/>
                </div>
                <div class="form-group">
                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required/>
                </div>


                <div class="form-group form-button">
                    <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                </div>
            </form>
        </div>
        <div class="signup-image">

            <a href="signin" class="signup-image-link">I am not yet a  member</a>
        </div>
    </div>

@endsection





