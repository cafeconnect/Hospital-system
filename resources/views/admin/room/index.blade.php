@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
         
            <div class="white-box">
             <a href="{{ route('room.create')}}"><button type="button" class="btn btn-dark">Create Room</button></a>
         
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Room Number</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($room as $r)
                            <tr>
                                <td>1</td>
                                <td>{{$r->room_no}}</td>
                                <td>
                                    <a href="#"  class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Del</a>
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
