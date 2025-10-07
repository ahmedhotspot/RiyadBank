@extends('dashboard.layout.master')

@section('title', 'Offer Details - ' . $offer->offer_id)

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Offer Details</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('customers.index') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('offers.index') }}" class="text-muted text-hover-primary">Offers</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">{{ $offer->offer_id }}</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('offers.index') }}" class="btn btn-sm btn-light">
                    <i class="ki-duotone ki-arrow-left fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Back to Offers
                </a>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Offer Card-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Offer Information</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="badge badge-light-{{ $offer->status_color }} fs-7 fw-bold">
                            {{ $offer->formatted_status }}
                        </span>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body">
                    <div class="row mb-7">
                        <!--begin::Offer ID-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Offer ID</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $offer->offer_id }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Offer ID-->

                        <!--begin::Status-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Status</label>
                                <div class="col-lg-8">
                                    <span class="badge badge-light-{{ $offer->status_color }} fs-7 fw-bold">
                                        {{ $offer->formatted_status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--end::Status-->
                    </div>

                    <div class="row mb-7">
                        <!--begin::Created Date-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Created Date</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-semibold text-gray-800 fs-6">{{ $offer->created_at->format('d M Y, H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Created Date-->

                        <!--begin::Updated Date-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Updated Date</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-semibold text-gray-800 fs-6">{{ $offer->updated_at->format('d M Y, H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Updated Date-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Offer Card-->

            <!--begin::Customer Card-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Customer Information</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('customers.show', $offer->customer) }}" class="btn btn-sm btn-light-primary">
                            View Customer Details
                        </a>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body">
                    <div class="row mb-7">
                        <!--begin::Customer Name-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Customer Name</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $offer->customer->name ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Customer Name-->

                        <!--begin::Email-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Email</label>
                                <div class="col-lg-8">
                                    <span class="fw-semibold text-gray-800 fs-6">{{ $offer->customer->email ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Email-->
                    </div>

                    <div class="row mb-7">
                        <!--begin::Mobile Phone-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Mobile Phone</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-semibold text-gray-800 fs-6">{{ $offer->customer->mobile_phone ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Mobile Phone-->

                        <!--begin::Customer ID-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Customer ID</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-semibold text-gray-800 fs-6">{{ $offer->customer->id }}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Customer ID-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Customer Card-->

            <!--begin::Financial Details Card-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Financial Details</h3>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body">
                    <div class="row mb-7">
                        <!--begin::Loan Amount-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">
                                    <i class="ki-duotone ki-dollar fs-2 text-primary me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    Loan Amount
                                </label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-4 text-success">{{ number_format($offer->loan_amount) }} SAR</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Loan Amount-->

                        <!--begin::Monthly Installment-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">
                                    <i class="ki-duotone ki-calendar fs-2 text-warning me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Monthly Payment
                                </label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-4 text-primary">{{ number_format($offer->monthly_installment, 2) }} SAR</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Monthly Installment-->
                    </div>

                    <div class="row mb-7">
                        <!--begin::Finance Period-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">
                                    <i class="ki-duotone ki-time fs-2 text-info me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Finance Period
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-4 text-info">{{ $offer->finance_period }} Months</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Finance Period-->

                        <!--begin::Profit Rate-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">
                                    <i class="ki-duotone ki-percentage fs-2 text-danger me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    Profit Rate
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-4 text-danger">{{ $offer->profit_rate }}%</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Profit Rate-->
                    </div>

                    @if(isset($offer->response['updateOffer']))
                    <div class="row mb-7">
                        <!--begin::Repayment Amount-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">
                                    <i class="ki-duotone ki-wallet fs-2 text-success me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                    Total Repayment
                                </label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-4 text-success">{{ number_format($offer->response['updateOffer']['repaymentAmount'] ?? 0, 2) }} SAR</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Repayment Amount-->

                        <!--begin::Profit Amount-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">
                                    <i class="ki-duotone ki-chart-pie-4 fs-2 text-warning me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    Profit Amount
                                </label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-4 text-warning">{{ number_format($offer->response['updateOffer']['profitAmount'] ?? 0, 2) }} SAR</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Profit Amount-->
                    </div>

                    <div class="row mb-7">
                        <!--begin::Admin Fees-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">
                                    <i class="ki-duotone ki-bill fs-2 text-dark me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                    </i>
                                    Admin Fees
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-4 text-dark">{{ number_format($offer->response['updateOffer']['adminFees'] ?? 0, 2) }} SAR</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Admin Fees-->

                        <!--begin::Offer Validity-->
                        <div class="col-lg-6">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">
                                    <i class="ki-duotone ki-timer fs-2 text-primary me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    Offer Validity
                                </label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-4 text-primary">{{ $offer->response['updateOffer']['offerValidity'] ?? 'N/A' }} Days</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Offer Validity-->
                    </div>
                    @endif
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Financial Details Card-->

            <!--begin::Response Data Card-->
            @if(isset($offer->response['message']))
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Offer Message</h3>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body">
                    <div class="alert alert-primary d-flex align-items-center p-5">
                        <i class="ki-duotone ki-shield-tick fs-2hx text-primary me-4">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-dark">Offer Status Message</h4>
                            <span>{{ $offer->response['message'] }}</span>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            @endif
            <!--end::Response Data Card-->

        </div>
    </div>
    <!--end::Post-->
</div>
@endsection
