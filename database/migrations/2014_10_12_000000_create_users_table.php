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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id')->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile_phone', 100);
            $table->string('phone', 15);
            $table->string('placebirth', 100);
            $table->date('birthdate');
            $table->enum('gender', ['male', 'female']);
            $table->enum('bloodtype', ['A', 'B', 'AB', 'O']);
            $table->enum('religion', ['Catholic', 'Islam', 'Christian', 'Buddha', 'Hindu', 'Confucius', 'Others']);
            $table->enum('identity_address', ['KTP', 'Passport']);
            $table->string('identity_numbers', 100);
            $table->date('identity_expired');
            $table->string('postal_code', 20);
            $table->text('citizen_idaddress', 'longtext');
            $table->text('recidential_address', 'longtext');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
