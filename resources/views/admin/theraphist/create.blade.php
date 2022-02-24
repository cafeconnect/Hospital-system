@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h2>Register</h2>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>             
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}} 
                </div>            
            @endif
            <form action="{{ route('theraphist.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{old('name')}}">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm password">
                    <span class="text-danger">@error('cpassword'){{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
</div>
    
@endsection
