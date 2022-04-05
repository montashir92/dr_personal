@extends('backend.layouts.admin_master')

@section('setting')
active show-sub
@endsection()

@section('view-setting')
active
@endsection()

@section('admin_content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dr. Personal</a>
    <span class="breadcrumb-item active">Setting</span>
</nav>

<div class="sl-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">
                    <i class="fa fa-edit"></i> Update Setting
                </h6>

                    <div class="row row-sm mg-t-20">
                        <div class="col-xl-12">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                <form action="{{ route('admin.setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                <div class="row">
                                    <label class="col-sm-2 form-control-label">Email</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="email" name="email" value="{{ $setting->email }}" class="form-control" placeholder="Enter Email Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Address:</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="address" value="{{ $setting->address }}" class="form-control" placeholder="Enter Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Medical Address:</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="medical_address" value="{{ $setting->medical_address }}" class="form-control" placeholder="Enter Medical Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Opening Hours:</label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <textarea class="form-control" name="opening_hour" rows="4" id="summernote3" placeholder="Enter Opening Hours">
                                        {{ $setting->opening_hour }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Phone</label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="phone" value="{{ $setting->phone }}" class="form-control" placeholder="Enter Phone Number">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Logo title</label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="logo_title" value="{{ $setting->logo_title }}" class="form-control" placeholder="Enter Logo Title">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Facebook</label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control" placeholder="Enter Facebook Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Twitter</label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="twitter" value="{{ $setting->twitter }}" class="form-control" placeholder="Enter Twitter Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Instagram</label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="instagram" value="{{ $setting->instagram }}" class="form-control" placeholder="Enter Instagram Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">LinkedIn</label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="linkedin" value="{{ $setting->linkedin }}" class="form-control" placeholder="Enter LinkedIn Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Youtube</label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="youtube" value="{{ $setting->youtube }}" class="form-control" placeholder="Enter Youtube Address">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Map</label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="text" name="map" value="{{ $setting->map }}" class="form-control" placeholder="Enter Map Address">
                                    </div>
                                </div>
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label">Logo Image: </label>
                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                        <input type="file" name="logo" class="form-control" onchange="mainThambUrl(this)">
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <img src="{{ asset('backend/images/logo/'.$setting->logo) }}" width="80" id="mainThmb">
                                    </div>
                                </div>
                                
                                <div class="row mg-t-20">
                                    <label class="col-sm-2 form-control-label"></label>
                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                        <button type="submit" class="btn btn-info mg-r-5">Update change</button>
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