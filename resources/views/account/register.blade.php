@extends('template/template')

@section('title', 'Register')

@section('container')
    <div class="container-fluid d-flex justify-container-center pt-5">
        <div class="container " style="width: 800px">
            <form action="{{ route('register')}}" method="post">
                @csrf
                <h1 class="h1 text-center mb-5">Register</h1>

                <!-- Name Input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Name</label>
                    <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Enter Your Name Here..." value="{{ old('name') }}"/>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email address</label>
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Enter Your Email Address Here..." value="{{ old('email') }}"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Password</label>
                    <input type="password" name="password" id="form2Example2" class="form-control"  placeholder="Your Password must be at least 8 characters."/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Confirm Password</label>
                    <input type="password" name="confirm_password" id="form2Example2" class="form-control"  placeholder="Re-type your password"/>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Register</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Already a member? <a href="/login">Login</a></p>
                </div>
            </form>
        </div>
    </div>


@endsection
