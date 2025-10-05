<?php

namespace App\Http\Controllers;

use App\Models\MockApiResponse;
use App\Services\ApiLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferStatusController extends Controller
{
    public function show(string $offer, Request $request, ApiLogger $logger)
    {
        $xreq = $this->readXRequestId($request);
        if (! in_array($xreq, ['1', '2'], true)) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'error' => 'X-Request-Id must be one',
            ], 400);
        }
        $template = MockApiResponse::where('key', (string) $xreq)->first();
        if (! $template) {
            return response()->json([
                'status' => 404,
                'message' => 'Template not found for this X-Request-Id',
            ], 404);
        }

        $body = $template->body ?? [];

        if (isset($body['response']['header']['timestamp'])) {
            $body['response']['header']['timestamp'] = now()->getTimestampMs();
        }

        $status = (int) ($template->http_status ?? 200);

        $log = $logger->log($request, $body, $status);

        $body['operatorTxn'] = $log->operator_txn;

        return response()->json($body, $status)
            ->header('Operator-Transaction-Number', $log->operator_txn);
    }

    public function inquiry(Request $request, ApiLogger $logger)
    {
        $validator = Validator::make($request->all(), [

            'filterKeys.status' => 'required|array',
            'filterKeys.status.*' => 'string',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'errors' => $validator->errors(),
            ], 400);
        }

        $xreq = $this->readXRequestId($request);
        if (! in_array($xreq, ['3', '4', '5'], true)) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'error' => 'X-Request-Id must be one',
            ], 400);
        }

        $accepted = [
            'FINAL_OFFER_ACCEPTED',
            'ACCEPTED',

        ];
        $statuses = (array) ($request->input('filterKeys.status') ?? []);
        $invalid = array_values(array_diff($statuses, $accepted));

        if (! empty($invalid)) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'response' => 'Invalid value for null, acceptedValues : ['.implode(', ', $accepted).']',
            ], 400);
        }

        $template = MockApiResponse::where('key', (string) $xreq)->first();
        if (! $template) {
            return response()->json([
                'status' => 404,
                'message' => 'Template not found for this X-Request-Id',
            ], 404);
        }

        $body = $template->body ?? [];
        if (isset($body['response']['header']['timestamp'])) {
            $body['response']['header']['timestamp'] = now()->getTimestampMs();
        }
        $status = (int) ($template->http_status ?? 200);

        $log = $logger->log($request, $body, $status);
        $body['operatorTxn'] = $log->operator_txn;

        return response()->json($body, $status)
            ->header('Operator-Transaction-Number', $log->operator_txn);
    }

    public function export(Request $request, ApiLogger $logger)
    {
        $xreq = $this->readXRequestId($request);

        if (! in_array($xreq, ['6', '7', '8', '9'], true)) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'error' => 'X-Request-Id must be one',
            ], 400);
        }

        $acceptedStatus = [
            'CANCELLED_OFFER', 'FINAL_OFFER_ACCEPTED', 'FINAL_OFFER_REJECTED', 'FINAL_OFFER_GENERATED',
            'INITIAL_OFFER_REJECTED', 'INITIAL_OFFER_ACCEPTED', 'INITIAL_OFFER_MODIFIED', 'INITIAL_OFFER_GENERATED',
        ];

        $allowedFields = [
            'offerId', 'status', 'mobilePhoneNumber', 'stage', 'thirdPartyIdentifier',
            'cusName', 'loanAmount', 'opportunityCreationDate', 'opportunityModificationDate',
            'opportunityClosedDate', 'opportunityId',
        ];

        $baseRules = [
            'header.sender' => 'nullable|string',
            'header.receiver' => 'nullable|string',
            'header.timestamp' => 'nullable|integer',
            'pageNumber' => 'nullable|integer|min:1',
            'pageSize' => 'nullable|integer|min:1|max:1000',
            'sortBy' => 'nullable|in:createdAt',
            'sortOrder' => 'nullable|in:asc,desc',
            'filterKeys.status' => 'nullable|array',
            'filterKeys.status.*' => 'string|in:'.implode(',', $acceptedStatus),

            'selectedFieldsMap' => 'required|array',
            'selectedFieldsMap.*' => 'string|max:100',

            'checkExportAllRequest' => 'required|boolean',
            'offerId' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $baseRules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'errors' => $validator->errors(),
            ], 400);
        }

        $map = (array) ($request->input('selectedFieldsMap') ?? []);
        $invalidKeys = array_values(array_diff(array_keys($map), $allowedFields));

        if ($xreq === '7') {
            if ($request->boolean('checkExportAllRequest') !== false) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Bad request',
                    'errors' => ['checkExportAllRequest' => ['must be false for individual export']],
                ], 400);
            }
            if (! filled($request->input('offerId'))) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Bad request',
                    'errors' => ['offerId' => ['offerId is required when checkExportAllRequest is false']],
                ], 400);
            }

            if (! empty($invalidKeys)) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Bad request',
                    'response' => ['Selected fields list must be under allowed fields'],
                ], 400);
            }

            $template = MockApiResponse::where('key', '7')->first();
            if (! $template) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Template not found for this X-Request-Id',
                ], 404);
            }

            $body = $template->body ?? [];
            if (isset($body['response']['header']['timestamp'])) {
                $body['response']['header']['timestamp'] = now()->getTimestampMs();
            }
            $status = (int) ($template->http_status ?? 422);

            $log = $logger->log($request, $body, $status);
            $body['operatorTxn'] = $log->operator_txn;

            return response()->json($body, $status)
                ->header('Operator-Transaction-Number', $log->operator_txn);
        }

        if ($xreq === '8') {
            if (! empty($invalidKeys)) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Bad request',
                    'response' => ['Selected fields list must be under allowed fields'],
                ], 400);
            }

            $template = MockApiResponse::where('key', '8')->first();
            if (! $template) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Template not found for this X-Request-Id',
                ], 404);
            }

            $body = $template->body ?? [];
            if (isset($body['response']['header']['timestamp'])) {
                $body['response']['header']['timestamp'] = now()->getTimestampMs();
            }
            $status = (int) ($template->http_status ?? 400);

            $log = $logger->log($request, $body, $status);
            $body['operatorTxn'] = $log->operator_txn;

            return response()->json($body, $status)
                ->header('Operator-Transaction-Number', $log->operator_txn);
        }

        if ($xreq === '9') {
            if ($request->boolean('checkExportAllRequest') !== false) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Bad request',
                    'errors' => ['checkExportAllRequest' => ['must be false for individual export']],
                ], 400);
            }

            $offerId = (string) $request->input('offerId', '');
            if ($offerId === '') {
                return response()->json([
                    'status' => 400,
                    'message' => 'Bad request',
                    'errors' => ['offerId' => ['offerId is required for individual export']],
                ], 400);
            }
            if (! preg_match('/^Fintech_IdPL-\d{16}$/', $offerId)) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Bad request',
                    'errors' => ['offerId' => ['offerId must match pattern: Fintech_IdPL-XXXXXXXXXXXXXXXX']],
                ], 400);
            }

            if (! empty($invalidKeys)) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Bad request',
                    'response' => ['Selected fields list must be under allowed fields'],
                ], 400);
            }

            $template = MockApiResponse::where('key', '9')->first();
            if (! $template) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Template not found for this X-Request-Id',
                ], 404);
            }

            $body = $template->body ?? [];
            if (isset($body['response']['header']['timestamp'])) {
                $body['response']['header']['timestamp'] = now()->getTimestampMs();
            }
            $status = (int) ($template->http_status ?? 200);

            $log = $logger->log($request, $body, $status);
            $body['operatorTxn'] = $log->operator_txn;

            return response()->json($body, $status)
                ->header('Operator-Transaction-Number', $log->operator_txn);
        }

        $template = MockApiResponse::where('key', $xreq)->first();
        if (! $template) {
            return response()->json([
                'status' => 404,
                'message' => 'Template not found for this X-Request-Id',
            ], 404);
        }

        $body = $template->body ?? [];
        if (isset($body['response']['header']['timestamp'])) {
            $body['response']['header']['timestamp'] = now()->getTimestampMs();
        }
        $status = (int) ($template->http_status ?? 200);

        $log = $logger->log($request, $body, $status);
        $body['operatorTxn'] = $log->operator_txn;

        return response()->json($body, $status)
            ->header('Operator-Transaction-Number', $log->operator_txn);
    }

    public function eligibility(Request $request, ApiLogger $logger)
    {

        $validator = Validator::make($request->all(), [

            'header.sender' => 'required|string',
            'header.receiver' => 'required|string',
            'header.timestamp' => 'required|integer',
            'nationality' => 'required|in:Saudi,Non-Saudi',
            'sector' => 'required|in:PRIVATE,PUBLIC,GOVERNMENT',
            'monthlyIncome' => 'required|numeric|min:0',
            'typeOfSalary' => 'required|in:SALARY_TRANSFER,NON_SALARY_TRANSFER',
            'personalLoanObligation' => 'required|numeric|min:0',
            'creditCardObligation' => 'required|numeric|min:0',
            'mortgageObligation' => 'required|numeric|min:0',
            'autoLeaseObligation' => 'required|numeric|min:0',
            'financePeriodInMonths' => 'required|integer|in:12,24,36,48,60,72,84',
            'userBirthDay' => 'required|date_format:d/m/Y|before:today',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'errors' => $validator->errors(),
            ], 400);
        }

        $xreq = $this->readXRequestId($request);

        if (! in_array($xreq, ['10', '11', '12'], true)) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'error' => 'X-Request-Id must be one of: 10, 11, 12',
            ], 400);
        }

        $template = MockApiResponse::where('key', $xreq)->first();
        if (! $template) {
            return response()->json([
                'status' => 404,
                'message' => 'Template not found for this X-Request-Id',
            ], 404);
        }

        $body = $template->body ?? [];
        if (isset($body['response']['header']['timestamp'])) {
            $body['response']['header']['timestamp'] = now()->getTimestampMs();
        }

        $status = (int) ($template->http_status ?? 200);

        $log = $logger->log($request, $body, $status);

        $body['operatorTxn'] = $log->operator_txn;

        return response()->json($body, $status)
            ->header('Operator-Transaction-Number', $log->operator_txn);
    }

    public function initial(Request $request, ApiLogger $logger)
    {

        $validator = Validator::make($request->all(), [

            'header' => 'required|array',
            'header.sender' => 'required|string',
            'header.receiver' => 'required|string',
            'header.timestamp' => 'required|integer',

            'productCode' => 'required|string',
            'gosiTimeStamp' => 'required|date_format:Y-m-d\TH:i:s\Z',
            'hasRbRelationship' => 'required|in:Y,N',

            'relationshipName' => 'required_if:hasRbRelationship,Y|nullable|string',
            'militaryRank' => 'present|nullable|string',
            'militaryRankDescription' => 'present|nullable|string',

            'customerDetails' => 'required|array',
            'customerDetails.idInformation' => 'required|digits:10', // الهوية 10 أرقام
            'customerDetails.educationLevel' => 'required|integer',
            'customerDetails.maritalStatus' => 'required|in:Single,Married,Divorced,Widowed',
            'customerDetails.dateOfBirth' => 'required|date|before:today',
            'customerDetails.mobilePhoneNumber' => ['required', 'string', 'regex:/^\+?9665\d{8}$/'], // جوال سعودي
            'customerDetails.email' => 'required|email',
            'customerDetails.city' => 'required|integer',
            'customerDetails.postCode' => 'required|digits:5',   // بريد سعودي 5 أرقام
            'customerDetails.numberOfDependents' => 'required|integer|min:0',

            'customerExpenses' => 'required|array',
            'customerExpenses.foodExpense' => 'required|numeric|min:0',
            'customerExpenses.housingExpense' => 'required|numeric|min:0',
            'customerExpenses.utilities' => 'required|numeric|min:0',
            'customerExpenses.insurance' => 'required|numeric|min:0',
            'customerExpenses.healthcareService' => 'required|numeric|min:0',
            'customerExpenses.transportationExpense' => 'required|numeric|min:0',
            'customerExpenses.educationExpense' => 'required|numeric|min:0',
            'customerExpenses.domesticHelp' => 'required|numeric|min:0',
            'customerExpenses.futureExpense' => 'required|numeric|min:0',
            'customerExpenses.mps' => 'required|numeric|min:0',
            'customerExpenses.totalExpenses' => 'required|numeric|min:0',

            'loanDetails' => 'required|array',
            'loanDetails.purposeOfLoan' => 'required|integer',
            'loanDetails.homeOwnership' => 'required|integer',
            'loanDetails.residentialType' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'errors' => $validator->errors(),
            ], 400);
        }

        $xreq = $this->readXRequestId($request);

        if (! in_array($xreq, ['13', '14', '15', '16', '17', '18', '19', '40', '20', '51', '53', '41'], true)) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'error' => 'X-Request-Id must be ',
            ], 400);
        }

        $template = MockApiResponse::where('key', $xreq)->first();
        if (! $template) {
            return response()->json([
                'status' => 404,
                'message' => 'Template not found for this X-Request-Id',
            ], 404);
        }

        $body = $template->body ?? [];

        if (isset($body['response']['header']['timestamp'])) {
            $body['response']['header']['timestamp'] = now()->getTimestampMs();
        }

        $status = (int) ($template->http_status ?? 200);

        $log = $logger->log($request, $body, $status);

        $body['operatorTxn'] = $log->operator_txn;

        return response()->json($body, $status)
            ->header('Operator-Transaction-Number', $log->operator_txn);
    }

    public function decision(string $offerId, Request $request, ApiLogger $logger)
    {
        $allowed = ['21', '22', '23', '24', '38'];

        $v = Validator::make(
            ['offerId' => $offerId],
            ['offerId' => ['required', 'regex:/^Fintech_IdPL-\d{16}$/']]
        );
        if ($v->fails()) {  
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'errors' => $v->errors(),
            ], 400);
        }

        $xreq = $this->readXRequestId($request);

        if (! in_array($xreq, $allowed, true)) {
            return response()->json([
                'status' => 400,
                'message' => 'Bad request',
                'error' => 'X-Request-Id must be one',
            ], 400);
        }

        $template = MockApiResponse::where('key', $xreq)->first();
        if (! $template) {
            return response()->json([
                'status' => 404,
                'message' => 'Template not found for this X-Request-Id',
            ], 404);
        }

        $body = $template->body ?? [];

        if (isset($body['response']['header']['timestamp'])) {
            $body['response']['header']['timestamp'] = now()->getTimestampMs();
        }

        $status = (int) ($template->http_status ?? 200);

        $log = $logger->log($request, $body, $status);

        $body['operatorTxn'] = $log->operator_txn;

        return response()->json($body, $status)
            ->header('Operator-Transaction-Number', $log->operator_txn);
    }

    protected function readXRequestId(Request $request): ?string
    {
        $candidates = [
            'X-Request-Id', 'x-request-id', 'x_request_id',
        ];

        foreach ($candidates as $name) {
            $v = $request->headers->get($name);
            if ($v !== null && $v !== '') {
                return (string) $v;
            }
        }

        $v = $request->input('x_request_id') ?? $request->input('X-Request-Id');

        return $v !== null && $v !== '' ? (string) $v : null;
    }
}
