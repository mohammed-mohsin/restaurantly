@extends('layouts.app')

@section('Title', 'Create | Item')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create New item</h4>
                            <!-- <p class="card-category">Complete your profile</p> -->
                        </div>
                        <div class="card-body">

                            <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>
                                            <input type="text" name="price" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1"
                                                class="bmd-label-floating">Category</label>
                                            <select name="category" class="form-control" id="exampleFormControlSelect1">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <!-- <input type="text" name="name" class="form-control"> -->
                                            <textarea type="text" name="description" class="form-control" id=""></textarea>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    
                                        <label class="bmd-label-floating"> Image</label>
                                     
                                        <input name="image" type="file"
                                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    </div>

                                    <div class="col-md-6">
                                        <img class="w-50 h-50 img-responsive " id="blah" src="https://via.placeholder.com/500
                                         C/O https://placeholder.com/" alt="your image" />
                                    </div>


                                </div>

                                <!-- </div> -->
                                <a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary pull-right">Create</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
