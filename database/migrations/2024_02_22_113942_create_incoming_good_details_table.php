<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incoming_good_details', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('incoming_good_id');
            $table->ulid('good_id');
            $table->string('qty');
            $table->string('price');
            $table->timestamps();

            $table->foreign('incoming_good_id')->references('id')
                ->on('incoming_goods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('good_id')->references('id')
                ->on('goods')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_good_details');
    }
};
