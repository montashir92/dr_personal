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
                    <i class="fa fa-edit"></i> Update Policy
                    <a href="{{ route('admin.policy') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-list"></i> All Policy</a>
                </h6>

                    <div class="row row-sm mg-t-20">
                        <div class="col-xl-12">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                <form action="{{ route('admin.policy.update', $ourpolicy->id) }}" method="post">
                                    @csrf
                                    
                                <div class="row">
                                    <label class="col-sm-3 form-control-label">Title <span class="tx-danger">*</span></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="title" value="{{ $ourpolicy->title }}" class="form-control" placeholder="Policy Title">
                                        @error('title') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div><!-- row -->
                                
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Description: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <textarea class="form-control" name="description" rows="2" id="summernote" placeholder="Description">
                                        {{ $ourpolicy->description }}
                                        </textarea>
                                        @error('description') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Icon <span class="tx-danger">*</span></label>
                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="icon" value="{{ $ourpolicy->icon }}" class="form-control" placeholder="Policy Icon">
                                        @error('icon') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div><!-- row -->
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label"></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <button type="submit" class="btn btn-info mg-r-5">Update change</button>
                                        <button class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                               </form>
                            </div><!-- card -->
                        </div><!-- col-6 -->
                    </div><!-- row -->
            </div><!-- card -->
        </div>

    </div><!-- row -->
</div><!-- sl-pagebody -->


@endsection