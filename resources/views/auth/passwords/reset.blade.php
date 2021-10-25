@extends('layouts.auth')

@section('page-title', __('Reset Password'))

@section('content')

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-lg-30 pt-15">
                <!--begin::Aside header-->
                <a href="#" class="text-center mb-10">
                    <img src="{{ url('auth_assets/media/logos/logo-letter-1.png') }}"  class="max-h-70px" alt="{{ setting('app_name') }}">
                </a>
                <!--end::Aside header-->
                <!--begin::Aside title-->
                <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #FF9900;">Intranet System</h3>
                <!--end::Aside title-->
            </div>
            <!--end::Aside Top-->
            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{ url('auth_assets/media/svg/patterns/rhone-2.svg') }})"></div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center">
                <!--begin::Reset Password-->
                <div class="login-form login-signin">
                    
                    <!--begin::Form-->
                    <form class="form" novalidate="novalidate" id="kt_login_reset_form" action="{{ route('password.update') }}" method="POST">
                        <input type="hidden" name="token" value="{{ $token }}">
                        {{ csrf_field() }}

                        <!--begin::Title-->
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">@lang('Reset Your Password')</h3>
                            <span class="text-muted font-weight-bold font-size-h4">@lang('Please provide your email and pick a new password below.')
                        </div>
                        <!--end::Title-->

                        {{-- Error Message --}}
                        @include('partials.auth-messages')

                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">@lang('Your E-Mail')</label>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" id="email" type="email" name="email" autocomplete="off" placeholder="@lang('Your E-Mail')" />
                        </div>
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark pt-5">@lang('New Password')</label>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" id="password" type="password" name="password" placeholder="@lang('New Password')" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">@lang('Confirm New Password')</label>
                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" id="password_confirmation" type="password" placeholder="@lang('Confirm New Password')" name="password_confirmation" autocomplete="off" />
                        </div>
                        <!--end::Form group-->
                        
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_reset_form_submit" class="btn btn-outline-success btn-block font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">@lang('Log In')</button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Reset Password-->
                
            </div>
            <!--end::Content body-->
            <!--begin::Content footer-->
            <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                    <span class="mr-1">© 2020 </span>
                    <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Dala Institute</a>
                </div>
            </div>
            <!--end::Content footer-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
@stop

@section('scripts')
    <script src="{{ url('auth_assets/js/pages/custom/login/reset-password.js') }}"></script>
@stop