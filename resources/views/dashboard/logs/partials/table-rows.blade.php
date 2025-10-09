@forelse($logs as $log)
<tr>
    <!--begin::Operator TXN-->
    <td>
        <div class="d-flex align-items-center">
            <div class="symbol symbol-45px me-5">
                <div class="symbol-label bg-light-primary text-primary fw-bold">
                    {{ substr($log->operator_txn, -4) }}
                </div>
            </div>
            <div class="d-flex justify-content-start flex-column">
                <span class="text-dark fw-bold text-hover-primary fs-6">{{ $log->short_operator_txn }}</span>
                <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $log->x_request_id ?? 'N/A' }}</span>
            </div>
        </div>
    </td>
    <!--end::Operator TXN-->
    <!--begin::Method-->
    <td>
        <span class="badge badge-light-{{ $log->method_color }} fs-7 fw-bold">{{ $log->method }}</span>
    </td>
    <!--end::Method-->
    <!--begin::Path-->
    <td>
        <span class="text-dark fw-bold d-block fs-6">{{ Str::limit($log->path, 30) }}</span>
    </td>
    <!--end::Path-->
    <!--begin::Status-->
    <td>
        <span class="badge badge-light-{{ $log->status_color }} fs-7 fw-bold">
            {{ $log->response_status }} - {{ $log->status_text }}
        </span>
    </td>
    <!--end::Status-->
    <!--begin::Created Date-->
    <td>
        <div class="d-flex flex-column">
            <span class="text-dark fw-bold fs-6">{{ $log->created_at->format('d M Y') }}</span>
            <span class="text-muted fw-semibold fs-7">{{ $log->created_at->format('H:i:s') }}</span>
        </div>
    </td>
    <!--end::Created Date-->
    <!--begin::Actions-->
    <td class="text-end">
        <a href="{{ route('logs.show', $log) }}" class="btn btn-light btn-active-light-primary btn-sm">
            {{ __('dashboard.view_details') }}
        </a>
    </td>
    <!--end::Actions-->
</tr>
@empty
<tr>
    <td colspan="6" class="text-center py-10">
        <div class="d-flex flex-column align-items-center">
            <i class="ki-duotone ki-file-deleted fs-3x text-muted mb-3">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <div class="text-muted fs-6">{{ __('dashboard.no_logs_found') }}</div>
            <div class="text-muted fs-7">{{ __('dashboard.no_logs_message') }}</div>
        </div>
    </td>
</tr>
@endforelse
