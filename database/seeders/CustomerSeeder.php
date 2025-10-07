<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Services\CustomerAliasFactory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA');
        $aliasFactory = app(CustomerAliasFactory::class);

        // إنشاء 20 عميل تجريبي
        for ($i = 1; $i <= 20; $i++) {
            $customer = Customer::create([
                // بيانات أساسية
                'id_information' => $faker->numerify('##########'), // 10 أرقام
                'name' => $faker->name,
                'education_level' => $faker->numberBetween(1, 10),
                'marital_status' => $faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
                'date_of_birth' => $faker->dateTimeBetween('-65 years', '-18 years')->format('Y-m-d'),
                'mobile_phone' => '+9665' . $faker->numerify('########'),
                'email' => $faker->email,
                'city_id' => $faker->numberBetween(1, 50), // مدن سعودية
                'post_code' => $faker->numerify('#####'),
                'dependents' => $faker->numberBetween(0, 8),

                // المصروفات الشهرية
                'food_expense' => $faker->randomFloat(2, 500, 3000),
                'housing_expense' => $faker->randomFloat(2, 1000, 8000),
                'utilities' => $faker->randomFloat(2, 200, 1000),
                'insurance' => $faker->randomFloat(2, 100, 800),
                'healthcare_service' => $faker->randomFloat(2, 200, 1500),
                'transportation_expense' => $faker->randomFloat(2, 300, 2000),
                'education_expense' => $faker->randomFloat(2, 0, 2000),
                'domestic_help' => $faker->randomFloat(2, 0, 1500),
                'future_expense' => $faker->randomFloat(2, 200, 1000),
                'mps' => $faker->randomFloat(2, 100, 500),
                'total_expenses' => null, // سيتم حسابها

                // دخل ثانوي
                'secondary_income_type' => $faker->randomElement(['Investment', 'Part-time', 'Rental', 'Business', null]),
                'secondary_income_amount' => $faker->optional(0.3)->randomFloat(2, 500, 5000),
                'secondary_income_frequency' => $faker->randomElement(['Monthly', 'Quarterly', 'Annually', null]),

                // تفاصيل القرض
                'purpose_of_loan' => $faker->numberBetween(1, 10),
                'home_ownership' => $faker->numberBetween(1, 5),
                'residential_type' => $faker->numberBetween(1, 5),

                'pii_encrypted' => true,
            ]);

            // حساب إجمالي المصروفات
            $totalExpenses = $customer->food_expense + $customer->housing_expense +
                           $customer->utilities + $customer->insurance +
                           $customer->healthcare_service + $customer->transportation_expense +
                           $customer->education_expense + $customer->domestic_help +
                           $customer->future_expense + $customer->mps;

            $customer->update(['total_expenses' => $totalExpenses]);

            // إنشاء alias للعميل
            $alias = $aliasFactory->ensureAlias($customer);

        }

        $this->command->info('تم إنشاء 20 عميل بنجاح!');
    }
}
