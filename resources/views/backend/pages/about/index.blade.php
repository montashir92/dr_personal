@extends('backend.layouts.admin_master')

@section('about')
active
@endsection()

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dr. Personal</a>
    <span class="breadcrumb-item active">About</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    <i class="fa fa-list"></i> About List
                    @if($about_count > 1)
                    <a href="{{ route('admin.about.create') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add About</a>
                    @endif
                    
                </h6>
                <p class="mg-b-20 mg-sm-b-30"></p>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abouts as $about)
                            <tr class="{{ $about->id }}">
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ asset($about->image) }}" width="30" height="30" alt=""></td>
                                <td>{{ $about->title }}</td>
                                <td>
                                    <a href="{{ route('admin.about.edit',$about->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.about.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$about->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>

    </div><!-- row -->
</div><!-- sl-pagebody -->
@endsection