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
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('customers_id', true);
            $table->string('name');
            $table->string('email')->unique('uq_email');
            $table->integer('no_telp');
            $table->text('address');
            $table->char('password', 60);
            $table->string('profile_pics')->nullable();
            $table->integer('user_id')->index('fk_user');
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
