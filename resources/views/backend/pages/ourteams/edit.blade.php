@extends('backend.layouts.admin_master')

@section('ourteam')
active
@endsection()

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dr. Personal</a>
    <span class="breadcrumb-item active">Our Team</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    <i class="fa fa-edit"></i> Update Our Team
                    <a href="{{ route('admin.ourteams') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-list"></i> All Our Team</a>
                </h6>

                    <div class="row row-sm mg-t-20">
                        <div class="col-xl-12">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                <form action="{{ route('admin.ourteam.update', $ourteam->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" name="old_image" value="{{ $ourteam->image }}">

                                <div class="row">
                                    <label class="col-sm-3 form-control-label">Name <span class="tx-danger">*</span></label>
                                    <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="name" value="{{ $ourteam->name }}" class="form-control" placeholder="Team Member Name">
                                        @error('name') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Designation <span class="tx-danger">*</span></label>
                                    <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="designation" value="{{ $ourteam->designation }}" class="form-control" placeholder="Team Member Designation">
                                        @error('designation') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Facebook</label>
                                    <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="facebook" value="{{ $ourteam->facebook }}" class="form-control" placeholder="Facebook Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Twitter</label>
                                    <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="twitter" value="{{ $ourteam->twitter }}" class="form-control" placeholder="Twitter Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Instagram</label>
                                    <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="instagrm" value="{{ $ourteam->instagrm }}" class="form-control" placeholder="Instagram Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Youtube</label>
                                    <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="youtube" value="{{ $ourteam->youtube }}" class="form-control" placeholder="Youtube Address">
                                    </div>
                                </div>
                                
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Upload Image: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                        <input type="file" name="image" class="form-control" onchange="mainThambUrl(this)">
                                        @error('image') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <img src="{{ asset($ourteam->image) }}" width="80" height="80" id="mainThmb">
                                    </div>
                                </div>
                                
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

  
<script>
    function mainThambUrl(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(50)
                  .height(50);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>
@endsection