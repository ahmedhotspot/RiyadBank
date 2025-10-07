<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\Customer;
use Faker\Factory as Faker;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        // جلب جميع العملاء الموجودين
        $customers = Customer::all();

        if ($customers->isEmpty()) {
            $this->command->warn('No customers found. Please run CustomerSeeder first.');
            return;
        }

        // إنشاء offers لكل عميل (أو عدد منهم)
        foreach ($customers->take(15) as $customer) {
            // إنشاء 1-3 offers لكل عميل
            $offersCount = $faker->numberBetween(1, 3);

            for ($i = 0; $i < $offersCount; $i++) {
                $this->createOffer($customer, $faker);
            }
        }

        $this->command->info('Offers seeded successfully!');
    }

    private function createOffer($customer, $faker)
    {
        // قائمة بحالات العروض المختلفة
        $offerStatuses = [
            'FINAL_OFFER_GENERATED',
            'OFFER_PENDING',
            'OFFER_APPROVED',
            'OFFER_REJECTED',
            'OFFER_EXPIRED'
        ];

        // بيانات مختلفة للعروض
        $loanAmounts = [15000, 20000, 25000, 30000, 35000, 40000, 50000];
        $financePeriods = [12, 24, 36, 48, 60];
        $profitRates = [1.79, 2.15, 2.45, 2.89, 3.12];

        $loanAmount = $faker->randomElement($loanAmounts);
        $financePeriod = $faker->randomElement($financePeriods);
        $profitRate = $faker->randomElement($profitRates);

        // حساب القيم المالية
        $profitAmount = ($loanAmount * $profitRate) / 100;
        $adminFees = $faker->randomFloat(2, 100, 200);
        $totalFees = $faker->randomFloat(2, 140, 160);
        $repaymentAmount = $loanAmount + $profitAmount + $adminFees;
        $monthlyInstallment = $repaymentAmount / $financePeriod;

        $offerStatus = $faker->randomElement($offerStatuses);

        // إنشاء response data
        $responseData = [
            'header' => [
                'sender' => 'RB',
                'receiver' => 'Fintech',
                'timestamp' => now()->timestamp,
            ],
            'offerStatus' => $offerStatus,
            'updateOffer' => [
                'monthlyInstallment' => round($monthlyInstallment, 2),
                'financePeriodInMonths' => $financePeriod,
                'repaymentAmount' => round($repaymentAmount, 2),
                'loanAmount' => $loanAmount,
                'profitRate' => $profitRate,
                'profitAmount' => round($profitAmount, 2),
                'adminFees' => round($adminFees, 2),
                'totalFees' => round($totalFees, 2),
                'totalFeesApr' => round($adminFees, 2),
                'offerValidity' => $faker->numberBetween(3, 30),
            ],
            'message' => $this->generateOfferMessage($offerStatus, $loanAmount),
        ];

        // إنشاء الـ offer
        Offer::create([
            'customer_id' => $customer->id,
            'offer_id' => 'OFF-' . strtoupper($faker->bothify('??##??##')),
            'offerStatus' => $offerStatus,
            'response' => $responseData,
        ]);
    }

    private function generateOfferMessage($status, $loanAmount)
    {
        $messages = [
            'FINAL_OFFER_GENERATED' => "LoanAmount/LoanPeriod adjusted based on the Eligible Ranges Maximum Eligible Amount : 3000000 Minimum Eligible Amount : 5000 Maximum Installment : 60 Minimum Installment : 6",
            'OFFER_PENDING' => "Your loan application for SAR {$loanAmount} is under review. Please wait for approval.",
            'OFFER_APPROVED' => "Congratulations! Your loan application for SAR {$loanAmount} has been approved.",
            'OFFER_REJECTED' => "We regret to inform you that your loan application for SAR {$loanAmount} has been rejected.",
            'OFFER_EXPIRED' => "Your loan offer for SAR {$loanAmount} has expired. Please submit a new application."
        ];

        return $messages[$status] ?? "Loan application status updated.";
    }
}
