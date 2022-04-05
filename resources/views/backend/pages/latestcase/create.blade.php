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
                    <i class="fa fa-plus"></i> Add New Latest Case
                    <a href="{{ route('admin.lastestcases') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-list"></i> All Latest Case</a>
                </h6>

                    <div class="row row-sm mg-t-20">
                        <div class="col-xl-12">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                <form action="{{ route('admin.lastestcase.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                <div class="row">
                                    <label class="col-sm-3 form-control-label">Name <span class="tx-danger">*</span></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="name" class="form-control" placeholder="Case Name">
                                        @error('name') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div><!-- row -->
                                
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Description: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <textarea class="form-control" name="description" rows="2" id="summernote" placeholder="Case Description">
                                            
                                        </textarea>
                                        @error('description') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Case Category: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                        <select name="casecat_id" class="form-control select2-show-search" data-placeholder="Select Case Category">
                                            <option label="Select Case Category"></option>
                                            @foreach($casecats as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('casecat_id') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                </div>
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label">Upload Image: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                        <input type="file" name="image" class="form-control" onchange="mainThambUrl(this)">
                                        @error('image') <span style="color: red">{{$message}}</span> @enderror
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <img src="" id="mainThmb">
                                    </div>
                                </div>
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-3 form-control-label"></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <button type="submit" class="btn btn-info mg-r-5">Save change</button>
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