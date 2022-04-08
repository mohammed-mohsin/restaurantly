@extends('layouts.app')

@section('Title', 'Chefs')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">     
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Chefs Table</h4>
                          
                            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                        </div>
                        <div class="card-body">
                            <a href="{{ route('chefs.create') }}" class="btn btn-primary">Create</a>
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered">
                                    <thead class=" text-primary">
                                       
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Designation
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Twitter Link
                                        </th>
                                        <th>
                                            Facebook Link
                                        </th>
                                        <th>
                                            Instagram Link
                                        </th>
                                        <th>
                                            LinkedIn Link
                                        </th>
                                       
                                        <th>
                                            Action
                                        </th>
                                    </thead>
                                    <tbody >
                                        @foreach ($chefs as $key => $chef)
                                            <tr>
                                               
                                                <td class="text-white">
                                                    {{ $chef->name }}
                                                </td>
                                                <td class="text-white">
                                                    {{ $chef->designation }}
                                                </td>

                                                <td>
                                                    <img src="{{ asset('uploads/chefs/' . $chef->image) }}" width="300px"
                                                        height="300px" alt="{{ $chef->name }}">
                                                </td>
                                                <td class="text-white">
                                                    {{ $chef->social_link_twitter }}
                                                </td>
                                                <td class="text-white">
                                                    {{ $chef->social_link_facebook }}
                                                </td>
                                                <td class="text-white">
                                                    {{ $chef->social_link_instagram }}
                                                </td>
                                                <td class="text-white">
                                                    {{ $chef->social_link_linkedin }}
                                                </td>
                                               
                                                <td>
                                                    <a href="{{ route('chefs.edit', $chef->id) }}" class="btn btn-info"><i
                                                            class="material-icons">edit</i></a>

                                                    <!-- <a href="{{ route('chefs.destroy', $chef->id) }}" class="btn btn-danger"><i class="material-icons">delete</i></a> -->

                                                    <form action="{{ route('chefs.destroy', $chef->id) }}" method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="material-icons">delete</i></button>
                                                    </form>
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
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
@endpush
