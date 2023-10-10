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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('candidateName')->nullable();
            $table->string('idNumber')->nullable();
            $table->string('series')->nullable();
            $table->foreignId('trade_id')->nullable();
            $table->string('grade')->nullable();
            $table->string('testingCentre')->nullable();
            $table->string('status')->nullable();
            $table->string('uploadedBy')->nullable();
            $table->timestamps();
            $table->foreign('trade_id')->references('id')->on('trades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
