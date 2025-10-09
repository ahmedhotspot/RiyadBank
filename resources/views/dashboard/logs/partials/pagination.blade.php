@if($logs->hasPages())
<div class="d-flex justify-content-between align-items-center flex-wrap pt-6">
    <div class="fs-6 fw-bold text-gray-700">
        {{ __('dashboard.showing') }} {{ $logs->firstItem() }} {{ __('dashboard.to') }} {{ $logs->lastItem() }} {{ __('dashboard.of') }} {{ $logs->total() }} {{ __('dashboard.logs') }}
    </div>
    <div class="d-flex align-items-center">
        {{ $logs->appends(request()->query())->links('custom-pagination') }}
    </div>
</div>
@endif
