@extends('layouts.app')

@section('Title', 'Create | Category')

@section('content')



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    {{-- <p class="card-description"> Basic form layout </p> --}}
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" value="{{ $category->name }}" name="name" class="form-control text-white"
                                id="exampleInputUsername1" placeholder="Username">
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button href="{{ route('category.index') }}" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
