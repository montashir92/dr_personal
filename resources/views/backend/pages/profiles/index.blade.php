@extends('backend.layouts.admin_master')

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="">Dr. Personal</a>
    <span class="breadcrumb-item active">Profiles</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top round_image" src="{{ asset('backend/images/users/'.Auth::user()->image)}}" width="100%" height="100%" alt="Card image cap">
                <ul class="list-group list-group-flush">
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    
                </ul>
            </div>
        </div>
        <div class="col-sm-8 mt-1">
                    <div class="card py-3">
                        <h3 class="text-center"><span class="text-danger">Hi...!</span> <strong class="text-warning">{{ Auth::user()->name }}</strong> Update your Profile</h3>
                        <div class="card-body">
                            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}" aria-describedby="">
                                    @error('name') <span style="color: red">{{$message}}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" aria-describedby="">
                                    @error('email') <span style="color: red">{{$message}}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Phone</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" value="{{ Auth::user()->mobile }}" aria-describedby="">
                                    @error('mobile') <span style="color: red">{{$message}}</span> @enderror
                                </div>
                                
                                <div class="form-group col-sm-6">
                                    <label for="image">Upload Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    @error('image') <span style="color: red">{{$message}}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"> Update change</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

    </div><!-- row -->
</div><!-- sl-pagebody -->
@endsection
