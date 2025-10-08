<?php

namespace Database\Seeders;

use App\Models\ApiCallLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApiCallLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];
        $paths = [
            '/api/v1/customers',
            '/api/v1/customers/123',
            '/api/v1/offers',
            '/api/v1/offers/456',
            '/api/v1/loans',
            '/api/v1/loans/789',
            '/api/v1/auth/login',
            '/api/v1/auth/logout',
            '/api/v1/auth/refresh',
            '/api/v1/profile',
            '/api/v1/transactions',
            '/api/v1/reports',
        ];
        
        $statusCodes = [200, 201, 204, 400, 401, 403, 404, 422, 500];
        
        $sampleHeaders = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'User-Agent' => 'RiyadBank-API/1.0',
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...',
            'X-Requested-With' => 'XMLHttpRequest',
        ];
        
        $sampleRequestBodies = [
            '{"name": "John Doe", "email": "john@example.com", "phone": "+966501234567"}',
            '{"amount": 50000, "duration": 24, "purpose": "home_improvement"}',
            '{"username": "admin", "password": "password123"}',
            '{"status": "approved", "notes": "Application reviewed and approved"}',
            '{"page": 1, "limit": 10, "sort": "created_at", "order": "desc"}',
        ];
        
        $sampleResponseBodies = [
            [
                'success' => true,
                'data' => [
                    'id' => 123,
                    'name' => 'John Doe',
                    'email' => 'john@example.com',
                    'created_at' => '2024-01-15T10:30:00Z'
                ],
                'message' => 'Customer created successfully'
            ],
            [
                'success' => true,
                'data' => [
                    'customers' => [
                        ['id' => 1, 'name' => 'Ahmed Al-Rashid'],
                        ['id' => 2, 'name' => 'Fatima Al-Zahra'],
                        ['id' => 3, 'name' => 'Mohammed Al-Saud']
                    ],
                    'total' => 150,
                    'page' => 1,
                    'per_page' => 10
                ]
            ],
            [
                'success' => false,
                'error' => 'Validation failed',
                'details' => [
                    'email' => ['The email field is required.'],
                    'phone' => ['The phone format is invalid.']
                ]
            ],
            [
                'success' => false,
                'error' => 'Unauthorized',
                'message' => 'Invalid credentials provided'
            ],
            [
                'success' => true,
                'data' => [
                    'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...',
                    'expires_in' => 3600,
                    'user' => [
                        'id' => 1,
                        'name' => 'Admin User',
                        'role' => 'administrator'
                    ]
                ]
            ]
        ];

        // Create 100 sample API call logs
        for ($i = 0; $i < 100; $i++) {
            $method = $methods[array_rand($methods)];
            $path = $paths[array_rand($paths)];
            $status = $statusCodes[array_rand($statusCodes)];
            $requestBody = $method !== 'GET' ? $sampleRequestBodies[array_rand($sampleRequestBodies)] : null;
            $responseBody = $sampleResponseBodies[array_rand($sampleResponseBodies)];
            
            // Adjust response body based on status code
            if ($status >= 400) {
                $responseBody = [
                    'success' => false,
                    'error' => $this->getErrorMessage($status),
                    'message' => $this->getErrorDescription($status)
                ];
            }

            ApiCallLog::create([
                'operator_txn' => ApiCallLog::makeOperatorTxn(),
                'x_request_id' => 'req-' . Str::uuid(),
                'method' => $method,
                'path' => $path,
                'response_status' => $status,
                'request_headers' => $sampleHeaders,
                'request_body' => $requestBody,
                'response_body' => $responseBody,
                'created_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ]);
        }
    }
    
    private function getErrorMessage($status)
    {
        $messages = [
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            422 => 'Unprocessable Entity',
            500 => 'Internal Server Error',
        ];
        
        return $messages[$status] ?? 'Unknown Error';
    }
    
    private function getErrorDescription($status)
    {
        $descriptions = [
            400 => 'The request could not be understood by the server due to malformed syntax.',
            401 => 'The request requires user authentication.',
            403 => 'The server understood the request, but is refusing to fulfill it.',
            404 => 'The requested resource could not be found.',
            422 => 'The request was well-formed but was unable to be followed due to semantic errors.',
            500 => 'The server encountered an unexpected condition which prevented it from fulfilling the request.',
        ];
        
        return $descriptions[$status] ?? 'An unknown error occurred.';
    }
}
