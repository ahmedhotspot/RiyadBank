<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UpdateCustomersSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // تحديث العملاء الموجودين بمصادر عشوائية
        $customers = \App\Models\Customer::all();

        foreach ($customers as $customer) {
            // 70% من التطبيق، 30% من النظام
            $source = rand(1, 10) <= 7 ? 'app' : 'system';
            $customer->update(['source' => $source]);
        }

        $this->command->info('تم تحديث مصادر العملاء بنجاح!');
    }
}
