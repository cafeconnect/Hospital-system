@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ url('filter-appointment')}}" method="POST">
                @csrf
                <input type="text" placeholder="Filter..." class="form-control mb-2">   
            </form>
         <div class="white-box">
             <a href="{{ route('appointment.create')}}"><button type="button" class="btn btn-dark">Create Appointment</button></a>
         
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Appointment</th>
                                <th class="border-top-0">Theraphist</th>
                                <th class="border-top-0">Client</th>
                                <th class="border-top-0">Room</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointment as $a)
                            <tr>
                                <td>1</td>
                                <td>{{$a->name}}</td>
                                <td>{{ $a->user->name}}</td>
                                <td>{{ $a->client->name}}</td>
                                <td>{{ $a->room->room_no}}</td>
                                <td>@if ($a->status == Null)
                                       <div class="alert alert-info">Pending...</div>
                                   @else
                                        <div class="alert alert-success">{{$a->status}}</div>
                                   @endif
                                </td>
                                <td>{{ $a->date}}</td>
                                <td>
                                    <a href="/edit-appointment/{{$a->id}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>
                                    <a href="{{ url('delete-appointment/'.$a->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Del</a>  
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>
    
</div>
 
@endsection
