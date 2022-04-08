@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Give Review</h4>

                    <form class="forms-sample" action="{{ route('testimonials.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                id="exampleInputUsername1" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Designation</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="designation"
                                placeholder="Designation">
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">Message</label>
                            <textarea name="message" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Review</h4>


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->designation }}</td>
                                        <td>{{ $review->message }}</td>
                                        <td>
                                            <form action="{{ route('testimonials.destroy', $review->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="material-icons"></i>Delete</button>
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
@endsection
