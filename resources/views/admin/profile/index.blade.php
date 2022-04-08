@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Profile</h4>
                            <p class="card-category">Complete your profile</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-5">
                                    <div class="card-avatar mb-2 ">
                                        <a href="#pablo">
                                            <img id="blah" class="img rounded-circle" height="64px" width="64px"
                                                src="{{ Auth::user()->profile_photo_url }}">
                                        </a>
                                    </div>
                                    <label class="bmd-label-floating"> New Profile Image</label>
                                    <input name="image" type="file"
                                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                                        value="{{ Auth::user()->profile_photo }}">



                                    {{-- <div class="col-md-6">
                                        <img class="w-50 h-50 img-responsive " id="blah"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="your image" />
                                    </div> --}}

                                </div>
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Confirm Password Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                </div> --}}

                                <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img rounded-circle" height="128px" width="128px"
                                    src="{{ Auth::user()->profile_photo_url }}">
                            </a>
                        </div>
                        <div class="card-body">
                            {{-- <h6 class="card-category text-gray">CEO / Co-Founder</h6> --}}
                            <h4 class="">Name: {{ Auth::user()->name }}</h4>
                            <h4 class="">Email: {{ Auth::user()->email }}</h4>
                            {{-- <p class="card-description">
                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
              </p> --}}
                            {{-- <a href="#pablo" class="btn btn-primary btn-round">Follow</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
