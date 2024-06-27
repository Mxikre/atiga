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
            $table->integer('employee_id', true);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->char('password', 60)->nullable();
            $table->string('profile_picture')->nullable();
            $table->integer('user_id')->nullable()->index('user_id');
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
