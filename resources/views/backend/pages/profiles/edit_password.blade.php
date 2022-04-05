@extends('backend.layouts.admin_master')
@section('admin_content')


<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="">Dr. Personal</a>
    <span class="breadcrumb-item active">Change Password</span>
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
                    <form action="{{ route('user.update.password') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Old Password</label>
                            <input type="password" name="old_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="old password">
                            @error('old_password')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" name="new_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="new password">
                            @error('new_password')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Re-Type Passowrd">
                            @error('password_confirmation')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
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
