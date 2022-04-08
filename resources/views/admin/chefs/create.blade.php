@extends('layouts.app')

@section('Title', 'Create | Chefs')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create New Chefs</h4>
                            <!-- <p class="card-category">Complete your profile</p> -->
                        </div>
                        <div class="card-body">

                            <form action="{{ route('chefs.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <label class="bmd-label-floating">Designation</label>
                                            <input type="text" name="designation" class="form-control">
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
                                        <img class="img-responsive rounded-circle " height="128px" width="128px" id="blah" src="https://via.placeholder.com/500
                                         C/O https://placeholder.com/" alt="your image" />
                                    </div>


                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Twitter Link</label>
                                            <!-- <input type="text" name="name" class="form-control"> -->
                                            <textarea type="text" name="social_link_twitter" class="form-control" id=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Facebook Link</label>
                                            <!-- <input type="text" name="name" class="form-control"> -->
                                            <textarea type="text" name="social_link_facebook" class="form-control" id=""></textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Instagram Link</label>
                                            <!-- <input type="text" name="name" class="form-control"> -->
                                            <textarea type="text" name="social_link_instagram" class="form-control" id=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">LinkedIn Link</label>
                                            <!-- <input type="text" name="name" class="form-control"> -->
                                            <textarea type="text" name="social_link_linkedin" class="form-control" id=""></textarea>
                                        </div>
                                    </div>


                                </div>


                                <!-- </div> -->
                                <a href="{{ route('chefs.index') }}" class="btn btn-danger">Back</a>
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
