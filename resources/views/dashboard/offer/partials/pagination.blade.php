@if($offers->hasPages())
<div class="d-flex justify-content-between align-items-center flex-wrap pt-6">
    <div class="fs-6 fw-bold text-gray-700">
        Showing {{ $offers->firstItem() }} to {{ $offers->lastItem() }} of {{ $offers->total() }} offers
    </div>
    <div class="d-flex align-items-center">
        {{ $offers->appends(request()->query())->links('custom-pagination') }}
    </div>
</div>
@endif
