<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('requests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('total_document_amount')->nullable();
            $table->string('additional_charges')->nullable();
            $table->string('total_amount_to_pay')->nullable();
            $table->string('amount_paid')->nullable();
            $table->string('paid_at')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('status')->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};