@extends('dashboard.layout.master')

@section('title', __('dashboard.offers'))

@push('styles')
<style>
#offers-page .menu.menu-sub.menu-sub-dropdown {
    display: none;
    position: absolute !important;
    z-index: 9999 !important;
}
#offers-page .menu.menu-sub.menu-sub-dropdown.show {
    display: block !important;
}

</style>
@endpush

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">{{ __('dashboard.offers') }}</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('customers.index') }}" class="text-muted text-hover-primary">{{ __('dashboard.dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">{{ __('dashboard.offers') }}</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div class="d-flex align-items-center">
                </div>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card" id="offers-page">
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
                            <input type="text" id="search-input" class="form-control form-control-solid w-250px ps-13" placeholder="{{ __('dashboard.search') }}" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-offer-table-toolbar="base">
                            <!--begin::Filter-->
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                {{ __('dashboard.filter') }}
                            </button>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">{{ __('dashboard.filter') }}</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Separator-->
                                <!--begin::Content-->
                                <div class="px-7 py-5" data-kt-offer-table-filter="form">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">{{ __('dashboard.status') }}:</label>
                                        <select class="form-select form-select-solid fw-bold" id="status-filter" data-placeholder="Select option">
                                            <option value="">{{ __('dashboard.all_statuses') }}</option>
                                            <option value="FINAL_OFFER_GENERATED">{{ __('dashboard.final_offer_generated') }}</option>
                                            <option value="OFFER_PENDING">{{ __('dashboard.offer_pending') }}</option>
                                            <option value="OFFER_APPROVED">{{ __('dashboard.offer_approved') }}</option>
                                            <option value="OFFER_REJECTED">{{ __('dashboard.offer_rejected') }}</option>
                                            <option value="OFFER_EXPIRED">{{ __('dashboard.offer_expired') }}</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">{{ __('dashboard.date') }}:</label>
                                        <input class="form-control form-control-solid" id="date-filter" type="date" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" onclick="resetFilters()">{{ __('dashboard.cancel') }}</button>
                                        <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" onclick="applyFilters()">{{ __('dashboard.filter') }}</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
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
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="kt_offers_table">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bold text-muted">
                                    {{-- <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check" />
                                        </div>
                                    </th> --}}
                                    <th class="min-w-150px">{{ __('dashboard.offer') }}</th>
                                    <th class="min-w-140px">{{ __('dashboard.customer') }}</th>
                                    <th class="min-w-120px">{{ __('dashboard.status') }}</th>
                                    <th class="min-w-120px">{{ __('dashboard.loan_amount') }}</th>
                                    <th class="min-w-120px">{{ __('dashboard.monthly_payment') }}</th>
                                    <th class="min-w-100px">{{ __('dashboard.period') }}</th>
                                    <th class="min-w-120px">{{ __('dashboard.created_date') }}</th>
                                    <th class="min-w-100px text-end">{{ __('dashboard.actions') }}</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody id="offers-table-body">
                                @include('dashboard.offer.partials.table-rows', ['offers' => $offers->items()])
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Table-->

                    <!--begin::Pagination-->
                    <div id="offers-pagination">
                        @include('dashboard.offer.partials.pagination', ['offers' => $offers])
                    </div>
                    <!--end::Pagination-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const table         = document.getElementById('kt_offers_table');
    const tbody         = document.getElementById('offers-table-body');
    const searchInput   = document.getElementById('search-input');
    const statusFilter  = document.getElementById('status-filter');
    const dateFilter    = document.getElementById('date-filter');

    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            performSearch();
        }, 500);
    });

    if (statusFilter) {
        statusFilter.addEventListener('change', performSearch);
    }
    if (dateFilter) {
        dateFilter.addEventListener('change', performSearch);
    }

    function performSearch(page = null) {
        const filterData = {
            search: searchInput?.value || '',
            offer_status: statusFilter?.value || '',
            created_at: dateFilter?.value || ''
        };

        if (page) {
            filterData.page = page;
        }

        Object.keys(filterData).forEach(k => { if (!filterData[k]) delete filterData[k]; });

        const queryString = new URLSearchParams(filterData).toString();
        const requestUrl  = '{{ route("offers.index") }}' + (queryString ? '?' + queryString : '');

        tbody.innerHTML = `
            <tr>
                <td colspan="9" class="text-center py-10">
                    <div class="d-flex flex-column align-items-center">
                        <div class="spinner-border text-primary mb-3" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="text-gray-600">Searching offers...</div>
                    </div>
                </td>
            </tr>
        `;

        fetch(requestUrl, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            }
        })
        .then(r => r.json())
        .then(data => {
            if (data?.html) {
                tbody.innerHTML = data.html;

                // update pagination
                const paginationContainer = document.getElementById('offers-pagination');
                if (paginationContainer) {
                    paginationContainer.innerHTML = data.pagination || '';
                }

                updateResultsIndicator(data.total || 0);
                reattachEventHandlers();
            } else {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="9" class="text-center py-10">
                            <div class="text-muted">No content returned.</div>
                        </td>
                    </tr>
                `;
            }
        })
        .catch(err => {
            console.error('Search error:', err);
            tbody.innerHTML = `
                <tr>
                    <td colspan="9" class="text-center py-10">
                        <div class="text-danger">Error loading offers. Please try again.</div>
                    </td>
                </tr>
            `;
        });
    }

    function updateResultsIndicator(count) {
        let indicator = document.querySelector('#offers-page .results-indicator');
        if (!indicator) {
            
        }
        if (indicator) {
            if (count > 0) {
                indicator.textContent = `${count} results`;
                indicator.className = 'results-indicator badge badge-light-success ms-2';
            } else {
                indicator.textContent = 'No results';
                indicator.className = 'results-indicator badge badge-light-primary ms-2';
            }
        }
    }

    function attachPaginationHandlers() {
        document.querySelectorAll('#offers-pagination .pagination .page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                if (!url || this.parentElement.classList.contains('disabled') || this.parentElement.classList.contains('active')) return;

                const urlParams = new URLSearchParams(url.split('?')[1] || '');
                const page = urlParams.get('page') || '1';

                // Loading state for page
                tbody.innerHTML = `
                    <tr>
                        <td colspan="9" class="text-center py-10">
                            <div class="d-flex flex-column align-items-center">
                                <div class="spinner-border text-primary mb-3" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="text-gray-600">Loading page ${page}...</div>
                            </div>
                        </td>
                    </tr>
                `;
                performSearch(page);
            });
        });
    }

    function reinitializeMenus() {
        if (typeof KTMenu !== 'undefined' && KTMenu.createInstances) {
            KTMenu.createInstances();
        }

        document.querySelectorAll('#offers-page [data-kt-menu="true"]').forEach(function(element) {
            if (element._menu && element._menu.dispose) {
                element._menu.dispose();
            }
        });

        if (typeof KTMenu !== 'undefined') {
            document.querySelectorAll('#offers-page [data-kt-menu="true"]').forEach(function(el) {
                try { new KTMenu(el); } catch(_) {}
            });
        }
    }

    function initializeSimpleMenus() {
        document.querySelectorAll('#offers-page [data-kt-menu-trigger="click"]').forEach(trigger => {
            const newTrigger = trigger.cloneNode(true);
            trigger.parentNode.replaceChild(newTrigger, trigger);
        });

        document.querySelectorAll('#offers-page [data-kt-menu-trigger="click"]').forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                document.querySelectorAll('#offers-page .menu.menu-sub.menu-sub-dropdown.show').forEach(m => {
                    m.classList.remove('show');
                    m.style.display = 'none';
                });

                const menu = this.nextElementSibling;
                if (menu && menu.matches('#offers-page .menu.menu-sub.menu-sub-dropdown')) {
                    const isOpen = menu.classList.contains('show');

                    if (!isOpen) {
                        const rect = this.getBoundingClientRect();
                        menu.style.position = 'absolute';
                        menu.style.top  = (rect.bottom + window.scrollY) + 'px';
                        menu.style.left = (rect.left + window.scrollX - menu.offsetWidth + this.offsetWidth) + 'px';
                        menu.style.zIndex = '9999';

                        menu.classList.add('show');
                        menu.style.display = 'block';
                    }
                }
            });
        });
    }

    function reattachEventHandlers() {
        attachPaginationHandlers();
        reinitializeMenus();
        initializeSimpleMenus();

        setTimeout(() => {
            reinitializeMenus();
            initializeSimpleMenus();
            if (typeof KT !== 'undefined' && KT.init) {
                KT.init();
            }
        }, 100);
    }

    document.addEventListener('click', function(e) {
        const insideTrigger = e.target.closest('#offers-page [data-kt-menu-trigger="click"]');
        const insideMenu    = e.target.closest('#offers-page .menu.menu-sub.menu-sub-dropdown');

        if (!insideTrigger && !insideMenu) {
            document.querySelectorAll('#offers-page .menu.menu-sub.menu-sub-dropdown.show').forEach(menu => {
                menu.classList.remove('show');
                menu.style.display = 'none';
            });
        }
    });

    reattachEventHandlers();
});
    
function applyFilters() {
    const searchInput = document.getElementById('search-input');
    if (searchInput) {
        searchInput.dispatchEvent(new Event('input'));
    }
}

function resetFilters() {
    const si = document.getElementById('search-input');
    const sf = document.getElementById('status-filter');
    const df = document.getElementById('date-filter');

    if (si) si.value = '';
    if (sf) sf.value = '';
    if (df) df.value = '';

    applyFilters();
}
</script>
@endpush
