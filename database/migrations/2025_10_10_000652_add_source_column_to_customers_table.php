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
        Schema::table('customers', function (Blueprint $table) {
            // إضافة عمود مصدر العميل (app = التطبيق، system = النظام)
            $table->enum('source', ['app', 'system'])->default('app')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // حذف عمود المصدر
            $table->dropColumn('source');
        });
    }
};
