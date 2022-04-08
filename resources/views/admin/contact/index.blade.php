@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reservation Table</h4>


            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Subject </th>
                            <th> Message </th>
                            
                          
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($contacts as $key => $contact)
                            <tr>
                                <td>{{ $key + 1 }} </td>
                                <td> {{ $contact->name }} </td>
                                <td> {{ $contact->email }} </td>
                                <td> {{ $contact->subject }} </td>
                                <td> {{ $contact->message }} </td>

                            
                                
                                
                                
                             

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    
@endsection
