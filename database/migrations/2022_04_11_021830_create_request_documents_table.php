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
        Schema::create('request_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('requests')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('campus_document_id')->constrained('campus_documents')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('copy')->default('1');
            $table->boolean('withAuth')->default(false);
            $table->string('number_of_pages')->default('0');
            $table->string('total_amount')->default('0');
            $table->string('docx_status')->default('pending');
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
        Schema::dropIfExists('request_documents');
    }
};