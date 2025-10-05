<?php

namespace Database\Seeders;

use App\Models\MockApiResponse;
use Illuminate\Database\Seeder;

class MockApiResponsesSeeder extends Seeder
{
    public function run(): void
    {

        MockApiResponse::updateOrCreate(
            ['key' => '1'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'header' => [
                            'sender' => 'RB-Partner',
                            'receiver' => 'RB',
                            'timestamp' => null,
                        ],
                        'status' => 'CANCELLED_OFFER',
                    ],
                ],
                'description' => 'Success -> CANCELLED_OFFER template',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '2'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Offer not found',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '1003',
                        ]],
                    ],
                ],
                'description' => 'Unprocessable entity template',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '3'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null,
                        ],
                        'offers' => [
                            [
                                'offerId' => 'Fintech_IdPL-1234567891234567',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'loanAmount' => 30000,
                                'loanPeriod' => 24,
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011750341171005',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'loanAmount' => 30000,
                                'loanPeriod' => 24,
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011750315711076',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '04 - Initial Approval',
                                'loanPeriod' => 24,
                                'opportunityCreationDate' => [2025, 6, 16],
                                'opportunityModificationDate' => [2025, 6, 17],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011750254849655',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '04 - Initial Approval',
                                'loanPeriod' => 24,
                                'opportunityCreationDate' => [2025, 6, 16],
                                'opportunityModificationDate' => [2025, 6, 17],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011750145322914',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '04 - Initial Approval',
                                'loanPeriod' => 24,
                                'opportunityCreationDate' => [2025, 6, 16],
                                'opportunityModificationDate' => [2025, 6, 17],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011750075138111',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '04 - Initial Approval',
                                'loanPeriod' => 24,
                                'opportunityCreationDate' => [2025, 6, 16],
                                'opportunityModificationDate' => [2025, 6, 17],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011749573352437',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '23 - Closed Cancelled',
                                'loanPeriod' => 24,
                                'opportunityCreationDate' => [2025, 6, 10],
                                'opportunityModificationDate' => [2025, 6, 10],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011749039299968',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '23 - Closed Cancelled',
                                'loanPeriod' => 12,
                                'opportunityCreationDate' => [2025, 6, 4],
                                'opportunityModificationDate' => [2025, 6, 4],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011749023311982',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '23 - Closed Cancelled',
                                'loanPeriod' => 12,
                                'opportunityCreationDate' => [2025, 6, 4],
                                'opportunityModificationDate' => [2025, 6, 4],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011749022063127',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '23 - Closed Cancelled',
                                'loanPeriod' => 12,
                                'opportunityCreationDate' => [2025, 6, 4],
                                'opportunityModificationDate' => [2025, 6, 4],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011749018415959',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '23 - Closed Cancelled',
                                'loanPeriod' => 12,
                                'opportunityCreationDate' => [2025, 6, 4],
                                'opportunityModificationDate' => [2025, 6, 4],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                            [
                                'offerId' => 'Fintech_IdPL-0011749018369607',
                                'thirdPartyIdentifier' => 'Fintech_Name',
                                'status' => 'FINAL_OFFER_ACCEPTED',
                                'stage' => '23 - Closed Cancelled',
                                'loanPeriod' => 24,
                                'opportunityCreationDate' => [2025, 6, 4],
                                'opportunityModificationDate' => [2025, 6, 4],
                                'product' => 'Consumer Personal Loan',
                                'channel' => 'RBWL',
                                'salesMethod' => 'Retail Consumer Finance',
                                'cusName' => 'لاشذه ؤةذلا ؤذذذ غذهلاذلا',
                                'cusCis' => '638362',
                                'cusId' => '1484798473',
                                'finId' => 'Fintech_Id',
                                'finName' => 'Fintech_Name',
                            ],
                        ],
                        'totalNumberOfPages' => 1,
                        'totalRecordCount' => 12,
                    ],
                ],
                'description' => 'Success with offers list (page 1/1, 12 records)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '4'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null,
                        ],
                        'offers' => [],
                        'totalNumberOfPages' => 0,
                        'totalRecordCount' => 0,
                    ],
                ],
                'description' => 'Success with empty offers',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '5'],
            [
                'http_status' => 400,
                'body' => [
                    'status' => 400,
                    'message' => 'Bad request',
                    'response' => 'Invalid value for null, acceptedValues : [CANCELLED_OFFER, FINAL_OFFER_ACCEPTED, FINAL_OFFER_REJECTED, FINAL_OFFER_GENERATED, INITIAL_OFFER_REJECTED, INITIAL_OFFER_ACCEPTED, INITIAL_OFFER_MODIFIED, INITIAL_OFFER_GENERATED]',
                ],
                'description' => 'Bad request: invalid status filter',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '6'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'errors' => null,
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null,
                        ],
                        'content' => 'QXBwbGljYXRpb24gSWQsQ3VzdG9tZXIgUGhvbmUNCkFyaWJfSWRQTC0wMDExNzUwNTgxMzMyMzA1LA0KQXJpYl9JZFBMLTAwMTE3NTA1ODExODgwNDksDQpBcmliX0lkUEwtMDAxMTc1MDU4MTE2MjUxMCwNCg==',
                        'contentType' => 'text/csv',
                    ],
                ],
                'description' => 'Export CSV (page with content #1)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '7'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Offer not found',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '1003',
                        ]],
                    ],
                ],
                'description' => 'Offer not found',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '8'],
            [
                'http_status' => 400,
                'body' => [
                    'status' => 400,
                    'message' => 'Bad request',
                    'response' => [
                        'Selected fields list must be under allowed fields',
                    ],
                ],
                'description' => 'Bad request: selected fields not allowed',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '9'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'errors' => null,
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null,
                        ],
                        'content' => 'QXBwbGljYXRpb24gSWQsQ3VzdG9tZXIgUGhvbmUNCkFyaWJfSWRQTC0wMDExNzUwNTgxNzU1ODE3LA0K',
                        'contentType' => 'text/csv',
                    ],
                ],
                'description' => 'Export CSV (page with content #2)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '10'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'errors' => null,
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null, // يُحدّث في الكنترولر
                        ],
                        'maximumProductAmount' => 500000,
                        'eligibility' => true,
                        'financeAmount' => '527,209.00',
                        'installment' => '9,665.5',
                        'financePeriodInMonths' => 60,
                        'totalLoanAmount' => '579,930.00',
                        'status' => true,
                    ],
                ],
                'description' => 'Eligibility success with computed amounts',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '11'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Invalid Data',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '1007',
                        ]],
                    ],
                ],
                'description' => 'Eligibility: invalid data',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '12'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'You are not eligible',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '1008',
                        ]],
                    ],
                ],
                'description' => 'Eligibility: not eligible',
            ]
        );
        MockApiResponse::updateOrCreate(
            ['key' => '13'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null,
                        ],
                        'status' => 'INITIAL_OFFER_GENERATED',
                        'initialOffer' => [
                            'offerId' => 'Fintech_IdPL-1234567891234567',
                            'maximumEligibilityAmount' => 3000000,
                            'minimumEligibilityAmount' => 5000,
                            'minimumNumberOfInstallments' => 6,
                            'maximumNumberOfInstallments' => 60,
                            'offerValidity' => 5,
                        ],
                        'message' => 'this offer is not finalized offer, it depends on your initial eligibility check',
                    ],
                ],
                'description' => 'Initial offer generated (13)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '14'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null,
                        ],
                        'status' => 'INITIAL_OFFER_GENERATED',
                        'initialOffer' => [
                            'offerId' => 'Fintech_IdPL-1234567891234567',
                            'maximumEligibilityAmount' => 3000000,
                            'minimumEligibilityAmount' => 5000,
                            'minimumNumberOfInstallments' => 6,
                            'maximumNumberOfInstallments' => 60,
                            'offerValidity' => 5,
                        ],
                        'message' => 'this offer is not finalized offer, it depends on your initial eligibility check',
                    ],
                ],
                'description' => 'Initial offer generated (14)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '15'],
            [
                'http_status' => 400,
                'body' => [
                    'status' => 400,
                    'message' => 'Bad request',
                    'response' => [
                        'Employer Commercial Registration Number must be exactly 10 digits',
                    ],
                ],
                'description' => 'Bad request: CR number length',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '16'],
            [
                'http_status' => 400,
                'body' => [
                    'status' => 400,
                    'message' => 'Bad request',
                    'response' => [
                        'Initial offer rejected as per RB policy: cr number 1010001054',
                    ],
                ],
                'description' => 'Bad request: policy rejection by CR',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '17'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Fintech details are not found',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '4006',
                        ]],
                    ],
                ],
                'description' => 'Fintech details not found (4006)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '18'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Apologies, due to your internal liabilities, you are not eligible for a personal loan.',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '4014',
                        ]],
                    ],
                ],
                'description' => 'Not eligible (4014)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '19'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Apologies, due to your internal liabilities, you are not eligible for a personal loan.',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '4013',
                        ]],
                    ],
                ],
                'description' => 'Not eligible (4013)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '40'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Apologies, due to your internal liabilities, you are not eligible for a personal loan.',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '4013',
                        ]],
                    ],
                ],
                'description' => 'Not eligible (4013)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '20'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => ' Apologies, due to your internal liabilities, you are not eligible for a personal loan.',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '4002',
                        ]],
                    ],
                ],
                'description' => 'Not eligible (4002, leading space)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '51'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Open Opportunity Exist',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '4019',
                        ]],
                    ],
                ],
                'description' => 'Open Opportunity Exist (4019)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '53'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Customer is Related Party',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '4015',
                        ]],
                    ],
                ],
                'description' => 'Related Party (4015)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '41'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Customer does not have current account in Riyad Bank, please open Riyad Bank Account with salary transfer and after 3 months salary deposits apply again.',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '4011',
                        ]],
                    ],
                ],
                'description' => 'No RB current account (4011)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '21'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null, // يتحدث في الكنترولر وقت الإرجاع
                        ],
                        'offerStatus' => 'FINAL_OFFER_GENERATED',
                        'updateOffer' => [
                            'monthlyInstallment' => 1301.25,
                            'financePeriodInMonths' => 24,
                            'repaymentAmount' => 31229.96,
                            'loanAmount' => 30000,
                            'profitRate' => 1.79,
                            'profitAmount' => 1790.06,
                            'adminFees' => 150.96,
                            'totalFees' => 148.51,
                            'totalFeesApr' => 150.96,
                            'offerValidity' => 3,
                        ],
                        'message' => 'LoanAmount/LoanPeriod adjusted based on the Eligible Ranges Maximum Eligible Amount : 3000000 Minimum Eligible Amount : 5000 Maximum Installment : 60 Minimum Installment : 6',
                    ],
                ],
                'description' => 'Update offer (final offer generated)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '22'],
            [   
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => 'Un processable entity error',
                    'response' => [
                        'errors' => [[
                            'message' => 'Offer Already Generated',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '1004',
                        ]],
                    ],
                ],
                'description' => 'Offer already generated (1004)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '23'],
            [
                'http_status' => 200,
                'body' => [
                    'status' => 200,
                    'message' => 'Success',
                    'response' => [
                        'header' => [
                            'sender' => 'RB',
                            'receiver' => 'Fintech',
                            'timestamp' => null,
                        ],
                        'offerStatus' => 'INITIAL_OFFER_REJECTED',
                    ],
                ],
                'description' => 'Initial offer rejected (success payload)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '24'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => ' Un processable entity error ',
                    'response' => [
                        'errors' => [[
                            'message' => 'Request is triggered after initial offer validity expired ',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '1010',
                        ]],
                    ],
                ],
                'description' => 'Initial offer validity expired (1010, message has spaces)',
            ]
        );

        MockApiResponse::updateOrCreate(
            ['key' => '38'],
            [
                'http_status' => 422,
                'body' => [
                    'status' => 422,
                    'message' => ' Un processable entity error ',
                    'response' => [
                        'errors' => [[
                            'message' => 'Request is triggered after initial offer validity expired ',
                            'status' => 'UNPROCESSABLE_ENTITY',
                            'code' => '1010',
                        ]],
                    ],
                ],
                'description' => 'Initial offer validity expired (duplicate of 24)',
            ]
        );

    }
}
