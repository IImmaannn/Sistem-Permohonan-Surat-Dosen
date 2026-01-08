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
        // 1. Modifikasi Tabel Users sesuai ERD kamu
        Schema::create('users', function (Blueprint $table) {
            $table->id('ID_User'); // PK sesuai rancangan [cite: 54, 165]
            $table->string('Username')->unique(); // [cite: 55, 153]
            $table->string('Password'); // [cite: 56, 155]
            $table->string('Nama_Lengkap'); // [cite: 57, 157]
            $table->string('Gender'); // [cite: 58, 159]
            $table->string('Email')->unique(); // 
            
            // Enum Role sesuai rancangan [cite: 60, 163]
            $table->enum('Role', [
                'Admin', 'Dosen', 'Operator_Surat', 'Operator_Nomor', 
                'Supervisor', 'Manager', 'Wakil_Dekan', 'Dekan'
            ]);

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
