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
            $table->bigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('profile_image')->nullable();
            $table->date('birthday_date')->nullable();
            $table->enum('blood',['A','B','O','AB'])->nullable();
            $table->enum('status',['Active','InActive'])->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('bank_number')->unique()->nullable();
            $table->string('bank')->nullable();
            $table->string('department')->nullable();
            $table->enum('gender',['L','P'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
