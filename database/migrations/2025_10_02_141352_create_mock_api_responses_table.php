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
        Schema::create('mock_api_responses', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique()->index();
            $table->unsignedSmallInteger('http_status')->default(200);
            $table->json('body');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mock_api_responses');
    }
};
