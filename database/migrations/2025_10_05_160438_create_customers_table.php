<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            // بيانات أساسية
            $table->string('id_information')->nullable()->index(); // رقم الهوية الحقيقي
            $table->unsignedTinyInteger('education_level')->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('mobile_phone', 30)->nullable();
            $table->string('email', 255)->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('post_code', 20)->nullable();
            $table->unsignedTinyInteger('dependents')->nullable();

            // المصروفات
            $table->decimal('food_expense', 12, 2)->nullable();
            $table->decimal('housing_expense', 12, 2)->nullable();
            $table->decimal('utilities', 12, 2)->nullable();
            $table->decimal('insurance', 12, 2)->nullable();
            $table->decimal('healthcare_service', 12, 2)->nullable();
            $table->decimal('transportation_expense', 12, 2)->nullable();
            $table->decimal('education_expense', 12, 2)->nullable();
            $table->decimal('domestic_help', 12, 2)->nullable();
            $table->decimal('future_expense', 12, 2)->nullable();
            $table->decimal('mps', 12, 2)->nullable();
            $table->decimal('total_expenses', 12, 2)->nullable();

            // دخل ثانوي
            $table->string('secondary_income_type', 50)->nullable();
            $table->decimal('secondary_income_amount', 12, 2)->nullable();
            $table->string('secondary_income_frequency', 10)->nullable();

            // تفاصيل القرض
            $table->unsignedTinyInteger('purpose_of_loan')->nullable();
            $table->unsignedTinyInteger('home_ownership')->nullable();
            $table->unsignedTinyInteger('residential_type')->nullable();

            // فلاغ تشفير/اكتمال البيانات
            $table->boolean('pii_encrypted')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
