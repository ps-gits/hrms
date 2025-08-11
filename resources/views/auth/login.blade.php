@php
  $customizerHidden = 'customizer-hide';
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login')

@section('vendor-style')
  @vite([
    'resources/assets/vendor/libs/@form-validation/form-validation.scss'
  ])
@endsection

@section('page-style')
  @vite([
    'resources/assets/vendor/scss/pages/page-auth.scss'
  ])
@endsection

@section('vendor-script')
  @vite([
    'resources/assets/vendor/libs/@form-validation/popular.js',
    'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
    'resources/assets/vendor/libs/@form-validation/auto-focus.js'
  ])
  <script>

    function customerLogin() {
      document.getElementById('email').value = 'democustomer@opencorehr.com';
      document.getElementById('password').value = '123456';
      document.getElementById('formAuthentication').submit();
    }
    function hrLogin(){
      document.getElementById('email').value = 'hr@opencorehr.com';
      document.getElementById('password').value = '123456';
      document.getElementById('formAuthentication').submit();
    }
  </script>
@endsection

@section('page-script')
  @vite([
    'resources/assets/js/pages-auth.js'
  ])
@endsection

@section('content')
  <div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="{{url('/')}}" class="auth-cover-brand d-flex align-items-center gap-2">
      <span class="app-brand-logo demo">
        <img
          src="{{ $settings->company_logo ? asset('images/'.$settings->company_logo) : asset('assets/img/logo.png')}}"
          alt="Logo" width="27">
      </span>
      <span
        class="app-brand-text demo text-heading fw-semibold">{{isset($settings->company_name) ? $settings->company_name : config('variables.templateFullName')}}</span>
    </a>
    <!-- /Logo -->
    <div class="authentication-inner row m-0">
      <!-- /Left Text -->
      <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
        <div class="w-100 d-flex justify-content-center">
          <img src="{{asset('assets/img/illustrations/boy-with-rocket-'.$configData['style'].'.png')}}"
               class="img-fluid" alt="Login image" width="700"
               data-app-dark-img="illustrations/boy-with-rocket-dark.png"
               data-app-light-img="illustrations/boy-with-rocket-light.png">
        </div>
      </div>
      <!-- /Left Text -->

      <!-- Login -->
      <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto mt-12 pt-5">
          <h4 class="mb-1">@lang('Welcome to') {{config('variables.templateFullName')}}! 👋</h4>
          <p class="mb-6">@lang('Login Short Description')</p>

          <form id="formAuthentication" class="mb-6" action="{{route('auth.loginPost')}}" method="POST">
            @csrf
            <div class="mb-6">
              <label for="email" class="form-label">@lang('Email')</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="@lang('Enter your email')"
                     autofocus>
            </div>
            <div class="mb-6 form-password-toggle">
              <label class="form-label" for="password">@lang('Password')</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                       placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                       aria-describedby="password"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-8">
              <div class="d-flex justify-content-between mt-8">
                <div class="form-check mb-0 ms-2">
                  <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe">
                  <label class="form-check-label" for="rememberMe">
                    @lang('Remember Me')
                  </label>
                </div>
                <a href="{{route('password.request')}}">
                  <span>@lang('Forgot Your Password?')</span>
                </a>
              </div>
            </div>
            <div class="mb-6">
              <button class="btn btn-primary d-grid w-100" type="submit">@lang('Login')</button>
            </div>
          </form>

          @if(env('APP_DEMO'))
            <div class="divider my-6">
              <div class="divider-text">@lang('Demo Login')</div>
            </div>
            <div class="row justify-content-center text-white text-center">
              <div class="col">
                <a class="btn btn-primary" onclick="customerLogin()"> @lang('Admin Login')</a>
              </div>
              <div class="col">
                <a class="btn btn-primary" onclick="hrLogin()"> @lang('HR Login')</a>
              </div>
            </div>
          @endif
          @if(env('APP_DEMO'))
            <div class="card shadow-sm mb-4 border-warning mt-4"> {{-- Added subtle shadow and warning border --}}
              <div class="card-header bg-label-warning py-2"> {{-- Use warning label background --}}
                <h5 class="card-title mb-0 text-warning d-flex align-items-center">
                  <i class="bx bx-info-circle me-2"></i> Demo Login Credentials
                </h5>
              </div>
              <div class="card-body p-3">
                <p class="small text-muted mb-3">Use the credentials below to explore different roles:</p>
                <ul class="list-group list-group-flush">

                  {{-- Admin Credentials --}}
                  <li class="list-group-item px-0 pt-0 pb-3">
                    <div class="d-flex align-items-center mb-1">
                      <i class="bx bx-user-shield bx-sm me-2 text-primary"></i>
                      <span class="fw-bold text-primary">@lang('Admin Role')</span>
                    </div>
                    <div class="ps-4 ms-1"> {{-- Indent details --}}
                      <div class="d-flex mb-1">
                        <span class="fw-medium me-2" style="width: 90px;">@lang('Email'):</span>
                        <code class="font-monospace">democustomer@opencorehr.com</code>
                        {{-- TODO: Add copy button here if needed --}}
                      </div>
                      <div class="d-flex">
                        <span class="fw-medium me-2" style="width: 90px;">@lang('Password'):</span>
                        <code class="font-monospace">123456</code>
                        {{-- TODO: Add copy button here if needed --}}
                      </div>
                    </div>
                  </li>

                  {{-- HR Credentials --}}
                  <li class="list-group-item px-0 pt-3 pb-0">
                    <div class="d-flex align-items-center mb-1">
                      <i class="bx bx-user-pin bx-sm me-2 text-info"></i>
                      <span class="fw-bold text-info">@lang('HR Role')</span>
                    </div>
                    <div class="ps-4 ms-1"> {{-- Indent details --}}
                      <div class="d-flex mb-1">
                        <span class="fw-medium me-2" style="width: 90px;">@lang('Email'):</span>
                        <code class="font-monospace">hr@opencorehr.com</code>
                        {{-- TODO: Add copy button here if needed --}}
                      </div>
                      <div class="d-flex">
                        <span class="fw-medium me-2" style="width: 90px;">@lang('Password'):</span>
                        <code class="font-monospace">123456</code>
                        {{-- TODO: Add copy button here if needed --}}
                      </div>
                    </div>
                  </li>

                </ul>
              </div>
            </div>
          @endif
        </div>
      </div>
      <!-- /Login -->
    </div>
  </div>
@endsection
