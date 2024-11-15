<!--SAMAH-->
@extends('admin.layouts.app')
@section('title', 'Employees')
<!--begin::Content-->
@section('subheader')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <a href="{{ route('admin.home') }}">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                </a>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <a href="{{ route('admin.employee.index') }}"><span class="text-muted font-weight-bold mr-4">Employees</span></a>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">{{ $employee->id ? 'Edit' : 'Add' }} Employee</span>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">{{ $employee->id ? 'Edit' : 'Add' }} Employee</h3>
                </div>
                <!--begin::Form-->
                <form class="form"
                    action="{{ $employee->id ? route('admin.employee.update', $employee->id) : route('admin.employee.store') }}"
                    id="weight-class-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ $employee->id ? method_field('PUT') : '' }}
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>Name<span class="text-danger">*</span> :</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" name="name"
                                    value="{{ old('name', $employee->name) }}" required>
                                @if ($errors->has('name'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('name') }}</div>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>Email<span class="text-danger">*</span> :</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email"
                                    value="{{ old('email', $employee->email) }}" required>
                                @if ($errors->has('email'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('email') }}</div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Company<span class="text-danger">*</span> :</label>
                                <select class="form-control" id="company_id" name="company_id" required>
                                    <option value="">Select Company</option>
                                    @foreach($companies as $key => $value)
                                    <option value="{{ $key }}" {{$key == old('company_id', $employee->company_id) ?'selected':' '}} >{{ $value }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('company_id'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('company_id') }}</div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Mobile Number<span class="text-danger">*</span> :</label>
                                <input type="text" class="form-control" placeholder="Mobile Number" id="mobile_number" name="mobile_number"
                                    value="{{ old('mobile_number', $employee->mobile_number) }}" required>
                                @if ($errors->has('mobile_number'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('mobile_number') }}</div>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>Profile Image(375 x 407)<span class="text-danger">*</span> : &nbsp; &nbsp; &nbsp; &nbsp;</label>
                               <div class="image-input image-input-outline" style="width: 300px;"
                                  id="kt_image_1">
                                  <div class="image-input-wrapper"
                                     style="background-image: url({{!empty($image)? $image->getUrl():asset('assets/media/logos/no-image.png')}}); width: 304px;height: 200px; background-size: 100% 100%">
                                  </div>
                                  <label
                                     class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                     data-action="change" data-toggle="tooltip" title=""
                                     data-original-title="Change image">
                                     <i class="fa fa-pen icon-sm text-muted"></i>
                                     <input type="file" name="image" accept=".png, .jpg, .jpeg, .webp" />
                                     <input type="hidden" name="profile_avatar_remove" />
                                  </label>
                                  <span
                                     class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                     data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                     <i class="ki ki-bold-close icon-xs text-muted"></i>
                                  </span>
                               </div>
                               <span class="form-text text-muted">Allowed file types: png, jpg, jpeg, .webp (375 x 407)</span>
                               <input type="hidden" name="old_image"
                                  value=" {{!empty($image)?$image->id:''}}">
                                    @if ($errors->has('image'))
                                        <div class="fv-plugins-message-container">
                                            <div class="fv-help-block">{{ $errors->first('image') }}</div>
                                        </div>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Join Date<span class="text-danger">*</span> :</label>
                                <input type="date" class="form-control" id="" name="join_date" 
                                    value="{{ old('join_date', $employee->join_date) }}" required>
                                @if ($errors->has('join_date'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('join_date') }}</div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <a href="{{ route('admin.employee.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
    <!--end::Content-->
@endsection

@push('styles')

@endpush

@push('scripts')

    <script>
        $(function() {
            new KTImageInput('kt_image_1');
        });
    </script>

    <script>
        $(function() {
            // minimum setup
            $('#kt_datepicker_1_modal').datepicker({
                rtl: KTUtil.isRTL(),
                todayHighlight: true,
                orientation: "bottom left",
                templates: arrows,
                format: 'yyyy-mm-dd'
            });
        });
    </script>

@endpush
