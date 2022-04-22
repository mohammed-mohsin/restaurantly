@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Users Table</h4>


            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> User Type </th>
                            <th>Action</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                {{-- <td> {{ $user->phone }} </td> --}}
                                <td>
                                    @if ($user->user_type == 0)
                                        <button class="btn btn-outline-primary disabled">User </button>
                                    @endif
                                    @if ($user->user_type == 1)
                                        <button class="btn btn-outline-primary disabled">Admin </button>
                                    @endif
                                </td>
                                {{-- @if ($reservation->status == 'cancelled')

                                <td>  <button class="btn btn-outline-danger disabled">{{$reservation->status}} </button>  </td>
                                @endif --}}



                                {{-- <td>
                                    <a href="{{route('confirmedReservation', $reservation->id)}}" type="button" class="btn btn-outline-success btn-icon-text">Confirm <i
                                            class="mdi mdi-check"></i></a>
                                    <a href="{{route('cancelReservation', $reservation->id)}}" type="button" class="btn btn-outline-danger btn-icon-text">Cancel <i
                                            class="mdi mdi-cross"></i></a>
                                    <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
                                        @csrf
                                                @method('DELETE')
                                        <button type="submit"  class="btn btn-outline-danger btn-icon-text">Remove <i
                                                class="mdi mdi-delete"></i></button>

                                    </form>
                                </td> --}}
                                <td>
                                    {{-- @if ($user->user_type == 0)
                                        <a href="{{ route('users.update', $user->id) }}" 
                                            class="btn btn-outline-info ">Make Admin <i
                                                class="mdi mdi-cross"></i></a>
                                    @endif --}}
                                   


                                    {{-- <form action="{{ route('users.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-outline-info ">Make Admin <i
                                                class="mdi mdi-delete"></i></button>

                                    </form> --}}
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-icon-text">Delete User <i
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


    {{-- <div class="card">
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
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@endsection
