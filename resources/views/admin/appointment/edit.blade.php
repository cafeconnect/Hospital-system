@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h3>Update Appointment</h3>
            <div class="white-box">
                <div class="form-responsive">
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
                  <form action="" method="POST">
                     @csrf
                       <div class="form-group">
                        Appointment: 
                        <br />
                          <textarea name="name" id="" cols="30" rows="10">Write here...</textarea>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Theraphist</label>
                            <input type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Client</label>
                            
                        </div>
                        <div class="form-group">
                            <label for="">Room</label>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
                </div>
            </div>
        
        </div>
    </div>
    
</div>
 
@endsection
