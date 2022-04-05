@extends('backend.layouts.admin_master')

@section('category')
active
@endsection()

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dr. Personal</a>
    <span class="breadcrumb-item active">Categories</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    <i class="fa fa-list"></i> Category List
                    <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add Category</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30"></p>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="{{ $category->id }}">
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ asset($category->image) }}" width="30" height="30" alt=""></td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if($category->status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-warning">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    @if($category->status == 1)
                                        <a href="{{ route('admin.category.inactive', $category->id) }}" title="Inactive" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></a>
                                    @else
                                        <a href="{{ route('admin.category.active', $category->id) }}" title="Active" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-up"></i></a>
                                    @endif
                                    <a href="{{ route('admin.category.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$category->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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