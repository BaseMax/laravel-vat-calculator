<?php

use App\Enums\RequestType;
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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();

            // Relactions
            $table->foreignId('currency_id');

            // Inputs
            $table->float('amount');
            $table->integer('vat');
            $table->enum('type', RequestType::possibleValues());

            // Outputs
            $table->decimal('vat_result', 20, 2);
            $table->decimal('amount_result', 20, 2);

            $table->unique(['amount', 'vat', 'currency_id', 'type']);

            $table->timestamps();

            $table->foreign('currency_id')
                ->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
