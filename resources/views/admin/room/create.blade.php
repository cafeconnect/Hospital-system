@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h2>Room</h2>
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
            <form action="{{ route('room.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Room Number</label>
                    <input type="text" class="form-control" name="room" placeholder="Enter Room Number">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
</div>
    
@endsection
