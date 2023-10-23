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
        Schema::create('admission_requirments', function (Blueprint $table) {
            $table->id();
            $table->string('admission_type');
            $table->string('admission_department');
            $table->string('admission_image')->default('default_admission_requirment.png');
            $table->longText('requirment_description');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_requirments');
    }
};
