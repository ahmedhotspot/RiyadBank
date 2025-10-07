@extends('dashboard.layout.master')

@section('title', 'Dashboard')

@section('content')
<div id="kt_content_container" class="container-xxl">
    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Statistics Cards-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <div class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22S2 17.5 2 12S6.5 2 12 2S22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"/>
                            <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ number_format($totalCustomers) }}</div>
                    <div class="fw-bold text-white">Total Customers</div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget 5-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <div class="card bg-success hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black"/>
                            <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ number_format($totalOffers) }}</div>
                    <div class="fw-bold text-white">Total Offers</div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget 5-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <div class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"/>
                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"/>
                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"/>
                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ number_format($approvedOffers) }}</div>
                    <div class="fw-bold text-white">Approved Offers</div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget 5-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-3">
            <!--begin::Statistics Widget 5-->
            <div class="card bg-info hoverable card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.5" d="M11.0657 13L11.4343 13.3686C11.7467 13.681 12.2533 13.681 12.5657 13.3686L16.3686 9.56569C16.681 9.25327 16.681 8.74673 16.3686 8.43431C16.0562 8.12189 15.5496 8.12189 15.2372 8.43431L12 11.6715L8.76284 8.43431C8.45042 8.12189 7.94384 8.12189 7.63142 8.43431C7.319 8.74673 7.319 9.25327 7.63142 9.56569L11.4343 13.3686C11.7467 13.681 12.2533 13.681 12.5657 13.3686L11.0657 13Z" fill="black"/>
                            <path d="M12.5657 13.3686C12.2533 13.681 11.7467 13.681 11.4343 13.3686L7.63142 9.56569C7.319 9.25327 7.319 8.74673 7.63142 8.43431C7.94384 8.12189 8.45042 8.12189 8.76284 8.43431L12 11.6715L15.2372 8.43431C15.5496 8.12189 16.0562 8.12189 16.3686 8.43431C16.681 8.74673 16.681 9.25327 16.3686 9.56569L12.5657 13.3686Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ number_format($totalLoanAmount / 1000000, 1) }}M</div>
                    <div class="fw-bold text-white">Total Loans (SAR)</div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Statistics Widget 5-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-6">
            <!--begin::Chart Widget 8-->
            <div class="card card-xxl-stretch">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Offers Statistics</span>
                        <span class="text-muted fw-bold fs-7">By Status</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Chart-->
                    <div class="d-flex flex-column">
                        @foreach($offerStatusStats as $status)
                            @php
                                $percentage = $totalOffers > 0 ? round(($status->count / $totalOffers) * 100, 1) : 0;
                            @endphp
                            <div class="d-flex align-items-center mb-7">
                                <span class="fw-bold fs-5 text-gray-800 flex-grow-1 pe-3">{{ $status->status_text }}</span>
                                <span class="fw-bolder fs-6 text-{{ $status->status_color }}">{{ $status->count }}</span>
                                <span class="fw-bold fs-6 text-gray-400 px-2">({{ $percentage }}%)</span>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                        @endforeach
                    </div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart Widget 8-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-6">
            <!--begin::List Widget 6-->
            <div class="card card-xxl-stretch">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title fw-bolder text-dark">Recent Customers</h3>
                    <div class="card-toolbar">
                        <a href="{{ route('customers.index') }}" class="btn btn-sm btn-light-primary">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"/>
                                    <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"/>
                                </svg>
                            </span>
                            View All
                        </a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                    @foreach($recentCustomers as $customer)
                        <!--begin::Item-->
                        <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-40px me-5">
                                <div class="symbol-label bg-light-warning text-warning fw-bold">
                                    {{ mb_strtoupper(mb_substr($customer->name , 0, 1, 'UTF-8'), 'UTF-8') }}


                                </div>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Text-->
                            <div class="flex-grow-1 me-2">
                                <a href="{{ route('customers.show', $customer) }}" class="fw-bolder text-gray-800 text-hover-primary fs-6">{{ $customer->name }}</a>
                                <span class="text-muted fw-bold d-block">{{ $customer->city_name }}</span>
                            </div>
                            <!--end::Text-->
                            <!--begin::Wrapper-->
                            <div class="fw-bolder text-primary">{{ $customer->created_at->diffForHumans() }}</div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Item-->
                    @endforeach
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-12">
            <!--begin::Table Widget 5-->
            <div class="card card-xxl-stretch">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Recent Offers</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Latest offers added to the system</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{ route('offers.index') }}" class="btn btn-sm btn-light-primary">
                            View All Offers
                        </a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-150px">Customer</th>
                                    <th class="min-w-140px">Loan Amount</th>
                                    <th class="min-w-120px">Status</th>
                                    <th class="min-w-120px">Created Date</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach($recentOffers as $offer)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-45px me-5">
                                                    <div class="symbol-label bg-light-primary text-primary fw-bold">
                                                        {{ mb_strtoupper(mb_substr($offer->customer->name , 0, 1, 'UTF-8'), 'UTF-8') }}

                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="{{ route('customers.show', $offer->customer) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{ $offer->customer->name }}</a>
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">{{ $offer->customer->city_name }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-dark fw-bolder d-block fs-6">{{ number_format($offer->loan_amount) }} SAR</span>
                                            <span class="text-muted fw-bold d-block fs-7">{{ $offer->loan_duration }} months</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-light-{{ $offer->status_color }} fs-7 fw-bold">{{ $offer->status_text }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark fw-bolder d-block fs-6">{{ $offer->created_at->format('Y-m-d') }}</span>
                                            <span class="text-muted fw-bold d-block fs-7">{{ $offer->created_at->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <a href="{{ route('offers.show', $offer) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"/>
                                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"/>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Table Widget 5-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>
@endsection
