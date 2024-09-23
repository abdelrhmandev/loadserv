@extends('backend.base.base')
@section('title', __('site.dashboard'))
@section('breadcrumbs')
<h1 class="d-flex align-items-center text-gray-900 fw-bold my-1 fs-3">{{ __('site.dashboard')}}</h1>
<span class="h-20px border-gray-200 border-start mx-3"></span>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">{{ __('site.home') }}</a>
    </li>
</ul>
@stop
@section('style')
<link href="{{ asset('assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
<div id="kt_content_container" class="container-xxl">


    <div class="row gy-5 g-xl-8">
        <div class="col-xl-4">
            <div class="card card-xl-stretch mb-xl-8">
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Site Statistics</span>
                    </h3>
                </div>
                <div class="card-body p-0 d-flex flex-column">
                    <div class="card-p pt-5 bg-body flex-grow-1">
                        <div class="row g-0">
                            <div class="col">
                                <div class="fs-7 text-muted fw-bold">SOON</div>            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@push('scripts')
<script src="{{ asset('assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{ asset('assets/backend/js/widgets.bundle.js')}}"></script>
<script src="{{ asset('assets/backend/js/custom/widgets.js')}}"></script>
@endpush
