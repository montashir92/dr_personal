@extends('backend.layouts.admin_master')

@section('policy')
active
@endsection()

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dr. Personal</a>
    <span class="breadcrumb-item active">Our Policy</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    <i class="fa fa-list"></i> Policy List
                    <a href="{{ route('admin.policy.create') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add Policy</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30"></p>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ourpolicy as $item)
                            <tr class="{{ $item->id }}">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->icon }}</td>
                                <td>
                                    <a href="{{ route('admin.policy.edit',$item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.policy.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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