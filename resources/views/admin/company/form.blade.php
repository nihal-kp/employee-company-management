<!--SAMAH-->
@extends('admin.layouts.app')
@section('title', 'Companies')
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
                <a href="{{ route('admin.company.index') }}"><span class="text-muted font-weight-bold mr-4">Companies</span></a>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">{{ $company->id ? 'Edit' : 'Add' }} Company</span>
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
                    <h3 class="card-title">{{ $company->id ? 'Edit' : 'Add' }} Company</h3>
                </div>
                <!--begin::Form-->
                <form class="form"
                    action="{{ $company->id ? route('admin.company.update', $company->id) : route('admin.company.store') }}"
                    id="weight-class-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ $company->id ? method_field('PUT') : '' }}
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>Name<span class="text-danger">*</span> :</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" name="name"
                                    value="{{ old('name', $company->name) }}" required>
                                @if ($errors->has('name'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('name') }}</div>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>Description<span class="text-danger">*</span> :</label>
                                <textarea class="form-control" placeholder="Description" id="description"
                                    name="description" required>{{ old('description', $company->description) }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('description') }}</div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Contact Number<span class="text-danger">*</span> :</label>
                                <input type="text" class="form-control" placeholder="Contact Number" id="contact_number" name="contact_number"
                                    value="{{ old('contact_number', $company->contact_number) }}" required>
                                @if ($errors->has('contact_number'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('contact_number') }}</div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Annual Turnover<span class="text-danger">*</span> :</label>
                                <input type="number" class="form-control" placeholder="Annual Turnover" id="annual_turnover" name="annual_turnover"
                                    value="{{ old('annual_turnover', $company->annual_turnover) }}" step="0.01" required>
                                @if ($errors->has('annual_turnover'))
                                    <div class="fv-plugins-message-container">
                                        <div class="fv-help-block">{{ $errors->first('annual_turnover') }}</div>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>Logo Image(375 x 407)<span class="text-danger">*</span> : &nbsp; &nbsp; &nbsp; &nbsp;</label>
                               <div class="image-input image-input-outline" style="width: 300px;"
                                  id="kt_image_1">
                                  <div class="image-input-wrapper"
                                     style="background-image: url({{!empty($logo)? $logo->getUrl():asset('assets/media/logos/no-image.png')}}); width: 304px;height: 200px; background-size: 100% 100%">
                                  </div>
                                  <label
                                     class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                     data-action="change" data-toggle="tooltip" title=""
                                     data-original-title="Change image">
                                     <i class="fa fa-pen icon-sm text-muted"></i>
                                     <input type="file" name="logo" accept=".png, .jpg, .jpeg, .webp" />
                                     <input type="hidden" name="profile_avatar_remove" />
                                  </label>
                                  <span
                                     class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                     data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                     <i class="ki ki-bold-close icon-xs text-muted"></i>
                                  </span>
                               </div>
                               <span class="form-text text-muted">Allowed file types: png, jpg, jpeg, .webp (375 x 407)</span>
                               <input type="hidden" name="old_logo"
                                  value=" {{!empty($logo)?$logo->id:''}}">
                                    @if ($errors->has('logo'))
                                        <div class="fv-plugins-message-container">
                                            <div class="fv-help-block">{{ $errors->first('logo') }}</div>
                                        </div>
                                    @endif
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <a href="{{ route('admin.company.index') }}" class="btn btn-secondary">Cancel</a>
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
                templates: arrows
            });
        });
    </script>

@endpush
