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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('ident');
            $table->string('status')->nullable();
            $table->string('gate_origin')->nullable();
            $table->integer('progress_percent')->nullable();
            $table->string('origin_city')->nullable();
            $table->string('origin_code')->nullable();
            $table->string('destination_city')->nullable();
            $table->string('destination_code')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
