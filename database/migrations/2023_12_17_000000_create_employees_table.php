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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('orgID');
            $table->integer('branchID');
            $table->integer('depID');
            $table->integer('subDepID')->nullable();
            $table->integer('jobID');
            $table->integer('salaryID');
            $table->string('nameAr');
            $table->string('nameEn');
            $table->string('nationality');
            $table->string('area')->nullable();
            $table->string('city')->nullable();
          
            $table->string('addressAr')->nullable();
            $table->string('addressEn')->nullable();
           
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('jobClass')->nullable();
            $table->string('idNo')->nullable();
            $table->integer('marriedStatus')->nullable();
            $table->integer('sonCount')->nullable();
            $table->date('idEndDate');
            $table->date('hireDate');
            $table->integer('Status')->default(1);

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
