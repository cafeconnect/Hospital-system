@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h2>Client</h2>
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
            <form action="{{ route('client.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter full name">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
</div>
    
@endsection
