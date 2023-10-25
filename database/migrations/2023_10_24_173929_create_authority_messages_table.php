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
        Schema::create('authority_messages', function (Blueprint $table) {
            $table->id();
            $table->string('authority_name');
            $table->string('authority_type');
            $table->longText('authority_message');
            $table->string('authority_image')->default('default_image.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authority_messages');
    }
};
