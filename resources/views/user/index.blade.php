 @extends('layouts.theraphist')
    @section('content')
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="table-responsive">
                        <table class="table table-border data-table">
                            <thead>
                                <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Appointment</th>
                                <th class="border-top-0">Theraphist</th>
                                <th class="border-top-0">Client</th>
                                <th class="border-top-0">Room</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Date</th>
                                </tr>
                            </thead>
                             <tbody>
                            @foreach ($appointment as $a)
                                @if (Auth::user()->name == $a->user->name)
                                <tr>
                                    <td>1</td>
                                    <td>{{$a->name}}</td>
                                    <td>{{ $a->user->name}}</td>
                                    <td>{{ $a->client->name}}</td>
                                    <td>{{ $a->room->room_no}}</td>
                                    <td>
                                        <a href="" class="update" data-name="status" data-type="text" data-pk="{{ $a->id }}" data-title="Enter Firstname">{{ $a->status }}</a>
                                    </td>
                                    <td>{{ $a->date}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';
    
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
    
        $('.update').editable({
            url: "{{ route('update') }}",
            type: 'text',
            name: 'status',
            pk: 1,
            title: 'Enter Field'
        });
    </script>

@endsection
