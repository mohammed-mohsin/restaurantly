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
                        @foreach ($reservations as $key => $reservation)
                            <tr>
                                <td>{{ $key + 1 }} </td>
                                <td> {{ $reservation->name }} </td>
                                <td> {{ $reservation->email }} </td>
                                <td> {{ $reservation->phone }} </td>
                                <td> {{ $reservation->date }} </td>
                                <td> {{ $reservation->time }} </td>
                                <td> {{ $reservation->people }} </td>
                                <td> {{ $reservation->message }} </td>


                                <td>
                                    @if ($reservation->status == 'confirmed')
                                        <button class="btn btn-outline-success disabled">{{ $reservation->status }} </button>
                                    @endif
                                    @if ($reservation->status == 'pending')
                                        <button class="btn btn-outline-warning disabled">{{ $reservation->status }} </button>
                                    @endif
                                    @if ($reservation->status == 'cancelled')
                                        <button class="btn btn-outline-danger disabled">{{ $reservation->status }} </button>
                                    @endif
                                </td>



                                <td>
                                    <a href="{{ route('confirmedReservation', $reservation->id) }}" type="button"
                                        class="btn btn-outline-success btn-icon-text">Confirm <i
                                            class="mdi mdi-check"></i></a>
                                    <a href="{{ route('cancelReservation', $reservation->id) }}" type="button"
                                        class="btn btn-outline-danger btn-icon-text">Cancel <i
                                            class="mdi mdi-cross"></i></a>
                                    <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-icon-text">Remove <i
                                                class="mdi mdi-delete"></i></button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reservation Rejected Table</h4>


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
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($rejectedReservations as $key => $rejectedReservation)
                            <tr>
                                <td>{{ $key + 1 }} </td>
                                <td> {{ $rejectedReservation->name }} </td>
                                <td> {{ $rejectedReservation->email }} </td>
                                <td> {{ $rejectedReservation->phone }} </td>
                                <td> {{ $rejectedReservation->date }} </td>
                                <td> {{ $rejectedReservation->time }} </td>
                                <td> {{ $rejectedReservation->people }} </td>
                                <td> {{ $rejectedReservation->message }} </td>
                                <td>
                                    <a href="{{ route('restoreReservation', $rejectedReservation->id) }}" type="button"
                                        class="btn btn-outline-success btn-icon-text">Restore <i
                                            class="mdi mdi-check"></i></a>


                                    {{-- <form action="{{route('forcedDeleteReservation',$rejectedReservation->id)}}" method="GET">
                                        @csrf
                                                
                                        
                                    </form> --}}
                                    <a href="{{ route('forcedDeleteReservation', $rejectedReservation->id) }}" type="submit"
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
