@extends('backend.base.base')
@section('title', __($trans . '.plural') . ' - ' . __($trans . '.edit'))
@section('breadcrumbs')
    <h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __($trans . '.plural') }}</h1>
    <span class="h-20px border-gray-200 border-start mx-3"></span>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
        <li class="breadcrumb-item text-muted"><a href="{{ route('admin.dashboard') }}"
                class="text-muted text-hover-primary">{{ __('site.home') }}</a></li>
        <li class="breadcrumb-item"><span class="bullet bg-gray-200 w-5px h-2px"></span></li>
        <li class="breadcrumb-item text-dark">{{ __($trans . '.edit') }}</li>
    </ul>
@stop
@section('style')
    <link href="{{ asset('assets/backend/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/bootstrapicons-iconpicker.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/custom/file-upload/image-uploader.min.css') }}">
@stop
@section('content')
    <div id="kt_content_container" class="container-xxl">
        <form id="Edit{{ $trans }}" data-route-url="{{ $updateRoute }}" class="form d-flex flex-column flex-lg-row"
            data-form-submit-error-message="{{ __('site.form_submit_error') }}"
            data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $row->id }}" />
            @method('PUT')
            <div class="d-flex flex-column gap-3 gap-lg-7 w-100 mb-2 me-lg-5">
                <div class="card card-flush py-0">
                    <div class="card-body pt-0">
                        <div class="d-flex flex-column gap-5 mt-5">
                            <x-backend.cms.masterInputs :showDescription="1" :richTextArea="0" :showSlug="0"
                                :row="$row" />

                                <div class="fv-row fl">
        <label class="required form-label"
        for="amount">{{ __('site.amount') }}</label>
        <input placeholder="{{ __('site.amount') }}" type="text" id="amount"
        name="amount" class="form-control mb-2" required
        data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'amount']) }}"
        value="{{ $row->amount ?? '' }}" />
        </div>


        <div class="fv-row fl">
        <label class="required form-label"
        for="date">{{ __('site.date') }}</label>
        <input placeholder="{{ __('site.date') }}" type="text" id="date" readonly=""
        name="date" class="form-control form-control-inline input-medium date-picker" required
        data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'date']) }}"
        value="{{ $row->date ?? '' }}" />
        </div>


                     
                        </div>
                    </div>
                </div>

                <x-backend.btns.button :destroyRoute="$destroyRoute" :redirectRoute="$redirect_after_destroy" :row="$row" :trans="$trans" />
            </div>
            <div class="d-flex flex-column flex-row-fluid gap-0 w-lg-400px gap-lg-5">
                <x-backend.cms.image :image="$row->image" />
            </div>
        </form>
    </div>
@stop
@push('scripts')
    <script src="{{ asset('assets/backend/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom/handleFormSubmit.js') }}"></script>

    <script src="{{ asset('assets/backend/js/custom/deleteConfirmSwal.js') }}"></script>
    <script>


$("#date").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d",
});


        // end of tiny editor
        KTUtil.onDOMContentLoaded(function() {
            handleFormSubmitFunc('Edit{{ $trans }}');
        });
    </script>
@endpush
