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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->integer('total');
            // $table->foreignId('id_member')->constrained('members')->default(null);
            // $table->foreignId('id_kasir')->constrained('users')->default(null);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_member');
            $table->dropConstrainedForeignId('id_kasir');
        });
    }
};
