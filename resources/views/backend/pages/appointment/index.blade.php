@extends('backend.layouts.admin_master')

@section('appoint')
active
@endsection()

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dr. Personal</a>
    <span class="breadcrumb-item active">Appointments</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    <i class="fa fa-list"></i> Appointment List
                </h6>
                <p class="mg-b-20 mg-sm-b-30"></p>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Appoint Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appoint)
                            <tr class="{{ $appoint->id }}">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $appoint->name }}</td>
                                <td>{{ $appoint->phone }}</td>
                                <td>{{ $appoint->message }}</td>
                                <td>{{ date('F j, Y',strtotime($appoint->date)) }}</td>
                                <td>
                                    <a href="{{ route('admin.appoint.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$appoint->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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