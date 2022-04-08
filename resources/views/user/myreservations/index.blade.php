@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">My Reservation Table</h4>


            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> People </th>
                            <th> Message </th>
                            <th> Status </th>
                            <th>Action</th>
                          
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($myReservations as $key => $myReservation)
                            <tr>
                                <td>{{ $key + 1 }} </td>
                                <td> {{ $myReservation->name }} </td>
                                <td> {{ $myReservation->email }} </td>
                                <td> {{ $myReservation->phone }} </td>
                                <td> {{ $myReservation->date }} </td>
                                <td> {{ $myReservation->time }} </td>
                                <td> {{ $myReservation->people }} </td>
                                <td> {{ $myReservation->message }} </td>
                                <td>
                                    @if ($myReservation->status == 'confirmed')
                                        <button class="btn btn-outline-success disabled">{{ $myReservation->status }} </button>
                                    @endif
                                    @if ($myReservation->status == 'pending')
                                        <button class="btn btn-outline-warning disabled">{{ $myReservation->status }} </button>
                                    @endif
                                    @if ($myReservation->status == 'cancelled')
                                        <button class="btn btn-outline-danger disabled">{{ $myReservation->status }} </button>
                                    @endif
                                </td>

                               <td>
                                <a href="{{ route('forcedDeleteReservation', $myReservation->id) }}" type="submit"
                                    class="btn btn-outline-danger btn-icon-text">Delete <i
                                        class="mdi mdi-delete"></i></a>
                               </td>
                                
                                
                                
                             

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    
@endsection
