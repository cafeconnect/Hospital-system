@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h3>Create Appointment</h3>
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
                  <form action="{{ route('appointment.store')}}" method="POST">
                     @csrf
                       <div class="form-group">
                        Appointment: 
                        <br />
                          <textarea name="name" id="" cols="30" rows="10">Write here...</textarea>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Theraphist</label>
                            <select name="user_id" id="">
                               @foreach ($user as $u)
                                 <option value="">Select</option>
                                 <option value="{{$u->id}}">{{$u->name}}</option>  
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Client</label>
                            <select name="client_id" id="">
                               @foreach($client as $c)
                                 <option value="">Select</option>
                                 <option value="{{$c->id}}">{{$c->name}}</option>  
                               @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Room</label>
                            <select name="room_id" id="">
                               @foreach ($room as $r)
                                 <option value="">Select</option>
                                 <option value="{{$r->id}}">{{$r->room_no}}</option>  
                               @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
                </div>
            </div>
        
        </div>
    </div>
    
</div>
 
@endsection
