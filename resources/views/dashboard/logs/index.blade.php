@extends('dashboard.layout.master')

@section('title', __('dashboard.api_logs'))

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold fs-3 align-items-center my-1">{{ __('dashboard.api_logs') }}</h1>
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
                    <li class="breadcrumb-item text-dark">{{ __('dashboard.api_logs') }}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">

            <!--begin::Statistics Cards-->
            <div class="row g-5 g-xl-8 mb-5 mb-xl-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <div class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="ki-duotone ki-chart-simple text-white fs-2x ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ number_format(\App\Models\ApiCallLog::getTotalLogsCount()) }}</div>
                            <div class="fw-semibold text-white">{{ __('dashboard.total_logs') }}</div>
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
                            <i class="ki-duotone ki-check-circle text-white fs-2x ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ number_format(\App\Models\ApiCallLog::getSuccessfulCallsCount()) }}</div>
                            <div class="fw-semibold text-white">{{ __('dashboard.successful_calls') }}</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <div class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="ki-duotone ki-cross-circle text-white fs-2x ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ number_format(\App\Models\ApiCallLog::getErrorCallsCount()) }}</div>
                            <div class="fw-semibold text-white">{{ __('dashboard.error_calls') }}</div>
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
                            <i class="ki-duotone ki-calendar-8 text-white fs-2x ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                            </i>
                            <div class="text-white fw-bold fs-2 mb-2 mt-5">{{ number_format(\App\Models\ApiCallLog::getTodayLogsCount()) }}</div>
                            <div class="fw-semibold text-white">{{ __('dashboard.today_logs') }}</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Statistics Cards-->

            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-logs-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="{{ __('dashboard.search') }}" value="{{ request('search') }}" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-logs-table-toolbar="base">
                            <!--begin::Filter-->
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>{{ __('dashboard.filter') }}
                            </button>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">{{ __('dashboard.filter_options') }}</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Separator-->
                                <!--begin::Content-->
                                <form method="GET" action="{{ route('logs.index') }}">
                                    <div class="px-7 py-5" data-kt-logs-table-filter="form">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">{{ __('dashboard.filter_by_method') }}:</label>
                                            <select class="form-select form-select-solid fw-bold" name="method" data-kt-select2="true" data-placeholder="{{ __('dashboard.all_methods') }}" data-allow-clear="true">
                                                <option></option>
                                                <option value="GET" {{ request('method') == 'GET' ? 'selected' : '' }}>GET</option>
                                                <option value="POST" {{ request('method') == 'POST' ? 'selected' : '' }}>POST</option>
                                                <option value="PUT" {{ request('method') == 'PUT' ? 'selected' : '' }}>PUT</option>
                                                <option value="PATCH" {{ request('method') == 'PATCH' ? 'selected' : '' }}>PATCH</option>
                                                <option value="DELETE" {{ request('method') == 'DELETE' ? 'selected' : '' }}>DELETE</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">{{ __('dashboard.filter_by_status') }}:</label>
                                            <select class="form-select form-select-solid fw-bold" name="status" data-kt-select2="true" data-placeholder="{{ __('dashboard.all_statuses') }}" data-allow-clear="true">
                                                <option></option>
                                                <option value="200" {{ request('status') == '200' ? 'selected' : '' }}>200 - OK</option>
                                                <option value="201" {{ request('status') == '201' ? 'selected' : '' }}>201 - Created</option>
                                                <option value="400" {{ request('status') == '400' ? 'selected' : '' }}>400 - Bad Request</option>
                                                <option value="401" {{ request('status') == '401' ? 'selected' : '' }}>401 - Unauthorized</option>
                                                <option value="404" {{ request('status') == '404' ? 'selected' : '' }}>404 - Not Found</option>
                                                <option value="422" {{ request('status') == '422' ? 'selected' : '' }}>422 - Unprocessable Entity</option>
                                                <option value="500" {{ request('status') == '500' ? 'selected' : '' }}>500 - Internal Server Error</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">{{ __('dashboard.date_from') }}:</label>
                                            <input class="form-control form-control-solid" placeholder="{{ __('dashboard.date_from') }}" name="date_from" type="date" value="{{ request('date_from') }}" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">{{ __('dashboard.date_to') }}:</label>
                                            <input class="form-control form-control-solid" placeholder="{{ __('dashboard.date_to') }}" name="date_to" type="date" value="{{ request('date_to') }}" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('logs.index') }}" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6">{{ __('dashboard.reset') }}</a>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6">{{ __('dashboard.apply') }}</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                </form>
                                <!--end::Content-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Filter-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    @if($logs->count() > 0)
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted">
                                        <th class="min-w-150px">{{ __('dashboard.operator_txn') }}</th>
                                        <th class="min-w-100px">{{ __('dashboard.method') }}</th>
                                        <th class="min-w-150px">{{ __('dashboard.path') }}</th>
                                        <th class="min-w-100px">{{ __('dashboard.response_status') }}</th>
                                        <th class="min-w-120px">{{ __('dashboard.created_date') }}</th>
                                        <th class="min-w-100px text-end">{{ __('dashboard.actions') }}</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody id="logs-table-body">
                                    @include('dashboard.logs.partials.table-rows', ['logs' => $logs])
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->

                        <!--begin::Pagination-->
                        <div id="logs-pagination">
                            @include('dashboard.logs.partials.pagination', ['logs' => $logs])
                        </div>
                        <!--end::Pagination-->
                    @else
                        <!--begin::Empty state-->
                        <div class="text-center py-10">
                            <div class="text-gray-400 fs-1 mb-5">
                                <i class="ki-duotone ki-file-deleted fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <div class="text-gray-400 fs-4 fw-bold mb-2">{{ __('dashboard.no_logs_found') }}</div>
                            <div class="text-gray-600 mb-5">{{ __('dashboard.no_logs_message') }}</div>
                        </div>
                        <!--end::Empty state-->
                    @endif
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tbody = document.getElementById('logs-table-body');
    const paginationContainer = document.getElementById('logs-pagination');

    // Search functionality with AJAX
    const searchInput = document.querySelector('[data-kt-logs-table-filter="search"]');
    if (searchInput) {
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                performAjaxFilter();
            }, 500);
        });
    }

    // Filter functionality with AJAX
    const filterSelects = document.querySelectorAll('select[name="method"], select[name="status"], input[name="date_from"], input[name="date_to"]');
    filterSelects.forEach(filter => {
        filter.addEventListener('change', function() {
            performAjaxFilter();
        });
    });

    // Perform AJAX filter
    function performAjaxFilter() {
        const formData = new FormData();

        // Get search value
        const searchValue = searchInput ? searchInput.value : '';
        if (searchValue) {
            formData.append('search', searchValue);
        }

        // Get filter values
        const methodSelect = document.querySelector('select[name="method"]');
        const statusSelect = document.querySelector('select[name="status"]');
        const dateFromInput = document.querySelector('input[name="date_from"]');
        const dateToInput = document.querySelector('input[name="date_to"]');

        if (methodSelect && methodSelect.value) {
            formData.append('method', methodSelect.value);
        }
        if (statusSelect && statusSelect.value) {
            formData.append('status', statusSelect.value);
        }
        if (dateFromInput && dateFromInput.value) {
            formData.append('date_from', dateFromInput.value);
        }
        if (dateToInput && dateToInput.value) {
            formData.append('date_to', dateToInput.value);
        }

        // Convert FormData to URLSearchParams
        const params = new URLSearchParams();
        for (let [key, value] of formData) {
            params.append(key, value);
        }

        // Make AJAX request
        fetch(`{{ route('logs.index') }}?${params.toString()}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.html) {
                tbody.innerHTML = data.html;

                // Update pagination
                if (paginationContainer && data.pagination) {
                    paginationContainer.innerHTML = data.pagination;
                }

                // Re-attach pagination handlers
                attachPaginationHandlers();

                // Update results indicator
                updateResultsIndicator(data.total);
            }
        })
        .catch(error => {
            console.error('Filter error:', error);
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-10">
                        <div class="text-muted">{{ __('dashboard.error_loading_data') }}</div>
                    </td>
                </tr>
            `;
        });
    }

    // Pagination handlers
    function attachPaginationHandlers() {
        document.querySelectorAll('.pagination .page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                if (url && !this.parentElement.classList.contains('disabled') && !this.parentElement.classList.contains('active')) {
                    // Extract page number from URL
                    const urlObj = new URL(url);
                    const page = urlObj.searchParams.get('page');

                    // Get current filter values
                    const formData = new FormData();
                    const searchValue = searchInput ? searchInput.value : '';
                    if (searchValue) {
                        formData.append('search', searchValue);
                    }

                    const methodSelect = document.querySelector('select[name="method"]');
                    const statusSelect = document.querySelector('select[name="status"]');
                    const dateFromInput = document.querySelector('input[name="date_from"]');
                    const dateToInput = document.querySelector('input[name="date_to"]');

                    if (methodSelect && methodSelect.value) {
                        formData.append('method', methodSelect.value);
                    }
                    if (statusSelect && statusSelect.value) {
                        formData.append('status', statusSelect.value);
                    }
                    if (dateFromInput && dateFromInput.value) {
                        formData.append('date_from', dateFromInput.value);
                    }
                    if (dateToInput && dateToInput.value) {
                        formData.append('date_to', dateToInput.value);
                    }

                    // Add page parameter
                    if (page) {
                        formData.append('page', page);
                    }

                    // Convert FormData to URLSearchParams
                    const params = new URLSearchParams();
                    for (let [key, value] of formData) {
                        params.append(key, value);
                    }

                    // Make AJAX request
                    fetch(`{{ route('logs.index') }}?${params.toString()}`, {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.html) {
                            tbody.innerHTML = data.html;

                            // Update pagination
                            if (paginationContainer && data.pagination) {
                                paginationContainer.innerHTML = data.pagination;
                            }

                            // Re-attach handlers
                            attachPaginationHandlers();

                            // Update results indicator
                            updateResultsIndicator(data.total);
                        }
                    })
                    .catch(error => {
                        console.error('Pagination error:', error);
                    });
                }
            });
        });
    }

    // Update results indicator
    function updateResultsIndicator(total) {
        // You can add a results indicator here if needed
        console.log(`Found ${total} logs matching your criteria`);
    }

    // Initial attachment of pagination handlers
    attachPaginationHandlers();
});
</script>
@endpush

@endsection
