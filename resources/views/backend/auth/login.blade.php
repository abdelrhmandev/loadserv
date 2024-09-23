@extends('backend.base.guest')
@section('title', __('login.login'))
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
                        <h1 class="text-dark fw-bolder mb-3"> <span class="svg-icon svg-icon-success svg-icon-5hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"/>
                        <path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="currentColor"/>
                        </svg>
                        </span>{{ __('login.login') }}</h1>
                    </div>
                    <form id="login" method="POST" action="{{ route('admin.login.submit') }} " class="form w-100"
                        data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                        data-form-agree-label="{{ __('site.agree') }}">
                        @csrf

                        @if (session('error'))
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
                        @elseif (Session::has('logout'))
                            <div class="w-md-400px">
                                <div
                                    class="alert alert-dismissible bg-primary me-3 text-white d-flex flex-column flex-sm-row p-5 mb-10">
                                    <span class="svg-icon svg-icon-1 svg-icon-primary text-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                                fill="currentColor" />
                                            <path
                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <div class="me-3">&nbsp; {{ Session::get('logout') }}</div>
                                </div>
                            </div>
                        @elseif (Session::has('resetpassword'))
                        <div class="w-md-400px">
                            <div
                                class="alert alert-dismissible bg-success me-3 text-white d-flex flex-column flex-sm-row p-5 mb-10">
                                <span class="svg-icon svg-icon-1 svg-icon-success text-white">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                            fill="currentColor" />
                                        <path
                                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <div class="me-3">&nbsp; {{ Session::get('resetpassword') }}</div>
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

                        <div class="fv-row mb-8">
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <span
                                    class="form-check-label fw-semibold text-gray-700 fs-base ms-1">{{ __('site.remember_me') }}</span>
                            </label>
                        </div>
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            @if (Route::has('admin.auth.password.request'))
                                <a href="{{ route('admin.auth.password.request') }}"
                                    class="link-primary">{{ __('passwords.forget') }}</a>
                            @endif
                        </div>
                        <div class="d-grid mb-10">
                            <button type="submit" id="btn-submit" class="btn btn-primary">
                                <span class="indicator-label">{{ __('login.login') }}</span>
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
