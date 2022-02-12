@extends('layouts.loginmaster')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 text-center my-5 login">
                <!-- Login -->
                <div class="billing-details">
                    <div class="section-title">
                        <h2 class="title">Login</h2>
                    </div>
                    <form method="POST" action="{{url('login')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input class="input" type="text" name="username" placeholder="Username">
                            @error('username')
                                <div class="m-2">
                                    <small class="text-left text-danger">{{$message}}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="input" type="password" name="password" placeholder="Password">
                            @error('username')
                                <div class="m-2">
                                    <small class="text-left text-danger">{{$message}}</small>
                                </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="primary-btn order-submit">Login</button>
                        </div>
                        <br>
                        <span>Don't have an account yet? <a href="{{url('register')}}">Sign up now!</a></span>
                    </form>
                </div>
                <!-- /Login -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection