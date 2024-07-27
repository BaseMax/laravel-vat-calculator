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
        Schema::create('users_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->foreignId('request_id');
            $table->foreignId('ip_id');

            $table->timestamps();

            $table->foreign('request_id')
                ->references('id')->on('requests')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->foreign('ip_id')
                ->references('id')->on('geo_ips');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_requests');
    }
};
