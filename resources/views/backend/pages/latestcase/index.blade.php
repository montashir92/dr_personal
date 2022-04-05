@extends('backend.layouts.admin_master')

@section('setting')
active show-sub
@endsection()

@section('view-lastest')
active
@endsection()

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dr. Personal</a>
    <span class="breadcrumb-item active">Latest Case</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    <i class="fa fa-list"></i> Latest Case List
                    <a href="{{ route('admin.lastestcase.create') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add Latest Case</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30"></p>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Case Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lastests as $item)
                            <tr class="{{ $item->id }}">
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ asset($item->image) }}" width="30" height="30" alt=""></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->casecat->name }}</td>
                                <td>
                                    <a href="{{ route('admin.lastestcase.edit',$item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.lastestcase.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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