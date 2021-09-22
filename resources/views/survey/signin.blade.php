
@extends('layouts/layout')

@section('home')


    <div class="signup-content">
        <div class="signup-form">
            <h2 class="form-title">Sign up</h2>
            <form method="POST" action="signin" class="register-form" id="register-form">
                @csrf
                <div class="form-group">
                    <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Your First Name" required/>
                </div>
                <div class="form-group">
                    <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="last_name" id="lname" class="form-control" placeholder="Your last  Name" required/>
                </div>
                <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required/>
                </div>
                <div class="form-group">
                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                    <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <label for="bdate"><i class="zmdi zmdi-calendar-check"></i></label>
                    <input type="date" name="birthdate" id="bdate" class="form-control" placeholder="Birthdate" required/>
                </div>
                <div class="form-group">
                    <label for="pnumber"><i class="zmdi zmdi-code-smartphone"></i></label>
                    <input type="text" name="phone_number" id="pnumber" class="form-control" placeholder="Your phone number" required/>
                </div>
                <div class="form-group">


                   <select name="partie_id" class='form-control'>
                       <option selected disabled>Partie</option>
                       @foreach ($parties as $partie)
                          <option value="{{$partie->id}}">{{$partie->name}}</option>
                       @endforeach
                   </select>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="agree" id="agree-term" class="agree-term" required />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                </div>
                <div class="form-group form-button">
                    <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                </div>
            </form>
        </div>
        <div class="signup-image">
            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
            <a href="#" class="signup-image-link">I am already member</a>
        </div>
    </div>

@endsection





