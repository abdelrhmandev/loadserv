@extends('backend.base.guest')
@section('title', __('passwords.resetlabel'))
@section('style')
<style>
    body {
        background-image: url('{{ asset('assets/backend/media/auth/bg10.jpeg') }}');
    }

    [data-theme="dark"] body {
        background-image: url('{{ asset('assets/backend/media/auth/bg10-dark.jpeg') }}');
    }
</style>
@stop
@section('content')
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-lg-row-fluid">
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <a href="{{ config('project.app.url') }}" target="_new">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px" src="{{ asset(app('settings')['site_logo']) }}" title="{{ app('settings')['site_title'] }}" alt="{{ app('settings')['site_title'] }}"/>
                </a>
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px"
                    src="{{ asset('assets/backend/media/auth/agency-dark.png') }}" alt="" />
                <h1 class="text-white 800 fs-2qx fw-bold text-center mt-7">{{ app('settings')['site_title'] }}</h1>
                <div class="text-white 600 fs-base text-center fw-semibold">
                    {{ app('settings')['site_description'] }}
                    <br />
                    <a href="{{ config('project.app.url') }}" class="opacity-75-hover text-primary me-1">
                        {{ config('project.app.url') }}
                        </a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                <div class="w-md-400px">

                    <div class="text-center mb-10">
                        <h1 class="text-dark fw-bolder mb-3"> <span class="svg-icon svg-icon-success svg-icon-5hx">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"/>
                                <path d="M12.0006 11.1542C13.1434 11.1542 14.0777 10.22 14.0777 9.0771C14.0777 7.93424 13.1434 7 12.0006 7C10.8577 7 9.92348 7.93424 9.92348 9.0771C9.92348 10.22 10.8577 11.1542 12.0006 11.1542Z" fill="currentColor"/>
                                <path d="M15.5652 13.814C15.5108 13.6779 15.4382 13.551 15.3566 13.4331C14.9393 12.8163 14.2954 12.4081 13.5697 12.3083C13.479 12.2993 13.3793 12.3174 13.3067 12.3718C12.9257 12.653 12.4722 12.7981 12.0006 12.7981C11.5289 12.7981 11.0754 12.653 10.6944 12.3718C10.6219 12.3174 10.5221 12.2902 10.4314 12.3083C9.70578 12.4081 9.05272 12.8163 8.64456 13.4331C8.56293 13.551 8.49036 13.687 8.43595 13.814C8.40875 13.8684 8.41781 13.9319 8.44502 13.9864C8.51759 14.1133 8.60828 14.2403 8.68991 14.3492C8.81689 14.5215 8.95295 14.6757 9.10715 14.8208C9.23413 14.9478 9.37925 15.0657 9.52439 15.1836C10.2409 15.7188 11.1026 15.9999 11.9915 15.9999C12.8804 15.9999 13.7421 15.7188 14.4586 15.1836C14.6038 15.0748 14.7489 14.9478 14.8759 14.8208C15.021 14.6757 15.1661 14.5215 15.2931 14.3492C15.3838 14.2312 15.4655 14.1133 15.538 13.9864C15.5833 13.9319 15.5924 13.8684 15.5652 13.814Z" fill="currentColor"/>
                                </svg>
                        </span>{{ __('passwords.resetlabel') }}</h1>
                    </div>


                    <form id="resetpasswordform" method="POST" action="{{ route('admin.auth.password.update') }} " class="form w-100"
                        data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                        data-form-agree-label="{{ __('site.agree') }}">
                        @csrf
						<input type="hidden" name="token" value="{{ $token }}">

                        @if (Session::has('error'))
                            <div class="w-md-400px">
                                <div
                                    class="alert alert-dismissible bg-danger me-3 text-white d-flex flex-column flex-sm-row p-5 mb-10">
                                    <span class="svg-icon svg-icon-1 svg-icon-success text-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                fill="currentColor"></rect>
                                            <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                transform="rotate(-45 7 15.3137)" fill="currentColor"></rect>
                                            <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                                transform="rotate(45 8.41422 7)" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <div class="me-3">&nbsp;{{ Session::get('error') }}</div>
                                </div>
                            </div>
                        @endif

                        <div class="fv-row mb-3 fl">
                            <label class="required form-label" for="email">{{ __('site.email') }}</label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-transparent" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <span
                                    class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="fv-row mb-3 fl">
                            <label class="required form-label" for="password">{{ __('site.password') }}</label>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-transparent" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="fv-row mb-3 fl">
                            <label class="required form-label" for="password">{{ __('passwords.confirm') }}</label>
								<input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror bg-transparent" name="password_confirmation" autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="d-grid mb-10">
                            <button type="submit" id="btn-submit" class="btn btn-primary">
                                <span class="indicator-label">{{ __('passwords.resetlabel') }}</span>
                                <span class="indicator-progress">{{ __('site.wait') }}...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Authentication - Sign-in-->
@stop
@push('scripts')
    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
@endpush
