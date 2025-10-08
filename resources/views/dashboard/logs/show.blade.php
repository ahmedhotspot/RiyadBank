@extends('dashboard.layout.master')

@section('title', __('dashboard.log_details'))

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold fs-3 align-items-center my-1">{{ __('dashboard.log_details') }}</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{ __('dashboard.dashboard') }}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('logs.index') }}" class="text-muted text-hover-primary">{{ __('dashboard.api_logs') }}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">{{ $log->operator_txn }}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('logs.index') }}" class="btn btn-sm btn-light">
                    <i class="ki-duotone ki-arrow-left fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>{{ __('dashboard.back_to_logs') }}
                </a>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    @php
        // Normalize request headers to an array (if possible)
        $headersRaw = $log->request_headers ?? null;
        if (is_string($headersRaw)) {
            $decoded = json_decode($headersRaw, true);
            $headers = json_last_error() === JSON_ERROR_NONE ? $decoded : [];
        } elseif (is_array($headersRaw)) {
            $headers = $headersRaw;
        } elseif (is_object($headersRaw)) {
            $headers = (array) $headersRaw;
        } else {
            $headers = [];
        }

        // Prepare pretty JSON for request body if it's JSON string
        $requestBodyRaw = $log->formatted_request_body ?? null;
        if (is_string($requestBodyRaw)) {
            $decodedReq = json_decode($requestBodyRaw, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $requestBodyPretty = json_encode($decodedReq, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                $requestBodyPretty = $requestBodyRaw;
            }
        } elseif (is_array($requestBodyRaw) || is_object($requestBodyRaw)) {
            $requestBodyPretty = json_encode($requestBodyRaw, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            $requestBodyPretty = null;
        }

        // Prepare pretty JSON for response body if it's JSON string
        $responseBodyRaw = $log->formatted_response_body ?? null;
        if (is_string($responseBodyRaw)) {
            $decodedResp = json_decode($responseBodyRaw, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $responseBodyPretty = json_encode($decodedResp, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                $responseBodyPretty = $responseBodyRaw;
            }
        } elseif (is_array($responseBodyRaw) || is_object($responseBodyRaw)) {
            $responseBodyPretty = json_encode($responseBodyRaw, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            $responseBodyPretty = null;
        }
    @endphp

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Log Information Card-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">{{ __('dashboard.log_information') }}</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">
                                <span class="fw-semibold fs-5 text-gray-800 flex-grow-1">{{ __('dashboard.operator_txn') }}:</span>
                                <span class="badge badge-light-primary fs-6">{{ $log->operator_txn ?? 'N/A' }}</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">
                                <span class="fw-semibold fs-5 text-gray-800 flex-grow-1">{{ __('dashboard.request_id') }}:</span>
                                <span class="badge badge-light-info fs-6">{{ $log->x_request_id ?? 'N/A' }}</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">
                                <span class="fw-semibold fs-5 text-gray-800 flex-grow-1">{{ __('dashboard.method') }}:</span>
                                <span class="badge badge-light-{{ $log->method_color ?? 'secondary' }} fs-6">{{ $log->method ?? 'N/A' }}</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">
                                <span class="fw-semibold fs-5 text-gray-800 flex-grow-1">{{ __('dashboard.response_status') }}:</span>
                                <span class="badge badge-light-{{ $log->status_color ?? 'secondary' }} fs-6">{{ $log->response_status ?? 'N/A' }} - {{ $log->status_text ?? '' }}</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">
                                <span class="fw-semibold fs-5 text-gray-800 flex-grow-1">{{ __('dashboard.created_date') }}:</span>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold fs-6">{{ optional($log->created_at)->format('d M Y') ?? 'N/A' }}</span>
                                    <span class="text-muted fs-7">{{ optional($log->created_at)->format('H:i:s') ?? '--:--:--' }}</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-start mb-7">
                                <span class="fw-semibold fs-5 text-gray-800 flex-grow-1">{{ __('dashboard.path') }}:</span>
                                <div class="d-flex flex-column text-end">
                                    <span class="fw-bold fs-6 text-break">{{ $log->path ?? 'N/A' }}</span>
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Log Information Card-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-8">
                    <!--begin::Request Information Card-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">{{ __('dashboard.request_information') }}</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Request Headers-->
                            <div class="mb-10">
                                <h4 class="fw-bold text-dark mb-4">{{ __('dashboard.request_headers') }}</h4>
                                @if(!empty($headers))
                                    <div class="bg-light p-4 rounded">
                                        <pre class="mb-0">{!! json_encode($headers, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}</pre>
                                    </div>
                                @else
                                    <div class="text-muted">{{ __('dashboard.no_data') }}</div>
                                @endif
                            </div>
                            <!--end::Request Headers-->
                            <!--begin::Request Body-->
                            <div class="mb-10">
                                <h4 class="fw-bold text-dark mb-4">{{ __('dashboard.request_body') }}</h4>
                                @if($requestBodyPretty)
                                    <div class="bg-light p-4 rounded">
                                        <pre class="mb-0">{!! $requestBodyPretty !!}</pre>
                                    </div>
                                @else
                                    <div class="text-muted">{{ __('dashboard.no_data') }}</div>
                                @endif
                            </div>
                            <!--end::Request Body-->
                        </div>
                        <!--end::Body-->

                           <!--begin::Response Information Card-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">{{ __('dashboard.response_information') }}</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Response Body-->
                            <div class="mb-10">
                                <h4 class="fw-bold text-dark mb-4">{{ __('dashboard.response_body') }}</h4>
                                @if($responseBodyPretty)
                                    <div class="bg-light p-4 rounded">
                                        <pre class="mb-0">{!! $responseBodyPretty !!}</pre>
                                    </div>
                                @else
                                    <div class="text-muted">{{ __('dashboard.no_data') }}</div>
                                @endif
                            </div>
                            <!--end::Response Body-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Response Information Card-->
                    </div>
                    <!--end::Request Information Card-->


                </div>
                <!--end::Col-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@push('styles')
<style>
    pre {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 0.375rem;
        padding: 1rem;
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 12px;
        line-height: 1.4;
        white-space: pre-wrap;
        word-wrap: break-word;
        max-height: 400px;
        overflow-y: auto;
        direction: ltr;
        text-align: left;
    }

    .text-break {
        word-break: break-all;
    }

    /* Fix RTL issues for JSON content */
    html[dir="rtl"] pre {
        direction: ltr;
        text-align: left;
    }
</style>
@endpush
@endsection
