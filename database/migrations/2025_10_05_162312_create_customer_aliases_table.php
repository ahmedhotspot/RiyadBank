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
        Schema::create('customer_aliases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('alias_id_number', 30)->unique()->index(); // رقم شبيه بالهوية (المفتاح الخارجي)
            $table->string('fake_full_name', 120)->nullable();
            $table->string('fake_email', 255)->nullable();
            $table->string('fake_mobile', 30)->nullable();
            $table->date('fake_date_of_birth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_aliases');
    }
};
