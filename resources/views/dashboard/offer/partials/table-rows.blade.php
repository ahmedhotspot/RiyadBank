@forelse($offers as $offer)
<tr>
    <!--begin::Checkbox-->
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid">
            <input class="form-check-input widget-13-check" type="checkbox" value="{{ $offer->id }}" />
        </div>
    </td>
    <!--end::Checkbox-->

    <!--begin::Offer-->
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-45px me-5">
                <div class="symbol-label bg-light-primary text-primary fw-bold">
                    {{ $offer->short_offer_id }}
                </div>
            </div>
            <div class="d-flex justify-content-start flex-column">
                <a href="{{ route('offers.show', $offer) }}" class="text-dark fw-bold text-hover-primary fs-6">{{ $offer->offer_id }}</a>
                <span class="text-muted fw-semibold text-muted d-block fs-7">ID: {{ $offer->id }}</span>
            </div>
        </div>
    </td>
    <!--end::Offer-->

    <!--begin::Customer-->
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-35px me-3">
                <div class="symbol-label bg-light-info text-info fw-bold">
                    {{ substr($offer->customer->name ?? 'N/A', 0, 2) }}
                </div>
            </div>
            <div class="d-flex justify-content-start flex-column">
                <a href="{{ route('customers.show', $offer->customer) }}" class="text-dark fw-bold text-hover-primary fs-6">{{ $offer->customer->name ?? 'N/A' }}</a>
                <span class="text-muted fw-semibold fs-7">{{ $offer->customer->email ?? 'N/A' }}</span>
            </div>
        </div>
    </td>
    <!--end::Customer-->

    <!--begin::Status-->
    <td>
        <span class="badge badge-light-{{ $offer->status_color }} fs-7 fw-bold">
            {{ $offer->formatted_status }}
        </span>
    </td>
    <!--end::Status-->

    <!--begin::Loan Amount-->
    <td>
        <span class="text-dark fw-bold d-block fs-6">
            {{ number_format($offer->loan_amount) }} SAR
        </span>
    </td>
    <!--end::Loan Amount-->

    <!--begin::Monthly Payment-->
    <td>
        <span class="text-dark fw-bold d-block fs-6">
            {{ number_format($offer->monthly_installment, 2) }} SAR
        </span>
    </td>
    <!--end::Monthly Payment-->

    <!--begin::Period-->
    <td>
        <span class="text-dark fw-bold d-block fs-6">
            {{ $offer->finance_period }} {{ __('dashboard.months') }}
        </span>
    </td>
    <!--end::Period-->

    <!--begin::Created Date-->
    <td>
        <div class="d-flex flex-column">
            <span class="text-dark fw-bold fs-6">{{ $offer->created_at->format('d M Y') }}</span>
            <span class="text-muted fw-semibold fs-7">{{ $offer->created_at->format('H:i') }}</span>
        </div>
    </td>
    <!--end::Created Date-->

    <!--begin::Actions-->
    <td class="text-end">
        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            {{ __('dashboard.actions') }}
            <span class="svg-icon svg-icon-5 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                </svg>
            </span>
        </a>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="{{ route('offers.show', $offer) }}" class="menu-link px-3">{{ __('dashboard.view_details') }}</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="{{ route('customers.show', $offer->customer) }}" class="menu-link px-3">{{ __('dashboard.view_customer') }}</a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu-->
    </td>
    <!--end::Actions-->
</tr>
@empty
<tr>
    <td colspan="9" class="text-center py-10">
        <div class="text-gray-400 fs-1 mb-5">
            <i class="ki-duotone ki-handcart fs-1">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <div class="text-gray-400 fs-4 fw-bold mb-2">{{ __('dashboard.no_offers_found') }}</div>
        <div class="text-gray-600 mb-5">{{ __('dashboard.no_offers_match_criteria') }}</div>
    </td>
</tr>
@endforelse
