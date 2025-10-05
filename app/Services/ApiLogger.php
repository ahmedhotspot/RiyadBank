<?php

// app/Services/ApiLogger.php

namespace App\Services;

use App\Models\ApiCallLog;
use Illuminate\Http\Request;

class ApiLogger
{
    public function log(Request $request, array $responseBody, int $status): ApiCallLog
    {
        $op = ApiCallLog::makeOperatorTxn();

        return ApiCallLog::create([
            'operator_txn' => $op,
            'x_request_id' => $request->headers->get('X-Request-Id')
                                   ?? $request->headers->get('x-request-id')
                                   ?? $request->headers->get('x_request_id')
                                   ?? $request->input('x_request_id'),
            'method' => $request->method(),
            'path' => $request->path(),
            'response_status' => $status,
            'request_headers' => $this->filteredHeaders($request->headers->all()),
            'request_body' => $this->rawBody($request),
            'response_body' => $responseBody,
        ]);
    }

    protected function rawBody(Request $request): ?string
    {
        $raw = $request->getContent();

        return $raw !== '' ? $raw : null;
    }

    protected function filteredHeaders(array $headers): array
    {
        foreach (['authorization', 'cookie', 'x-api-key'] as $h) {
            if (isset($headers[$h])) {
                $headers[$h] = ['***'];
            }
        }

        return $headers;
    }
}
