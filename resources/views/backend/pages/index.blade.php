@extends('backend.layouts.admin_master')
@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dr. Personal</a>
    <span class="breadcrumb-item active">Dashboard</span>
</nav>

<div class="sl-pagebody">

    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="title-name">
                <h1>Welcome To <span> {{ Auth::user()->name }}</span></h1>
            </div>
        </div><!-- col-3 -->
        
    </div><!-- row -->

   

    </div><!-- sl-pagebody -->
@endsection