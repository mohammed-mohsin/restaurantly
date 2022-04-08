@extends('layouts.app')

@section('Title', 'Category')
{{-- @push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush --}}

@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Category Table</h4>
                     
                        <a href="{{route('category.create')}}" class="btn btn-primary">Create</a>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>
                                    Serial
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Slug
                                </th>

                                <th>
                                    Action
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $category->name }}
                                    </td>
                                    <td>
                                        {{ $category->slug }}
                                    </td>

                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-info"><i class="material-icons">edit</i></a>

                                     

                                        <form action="{{ route('category.destroy', $category->id) }}"
                                            class="d-inline" method="POST">

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
{{-- @push('js')

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
@endpush --}}
