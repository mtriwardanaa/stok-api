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
        Schema::create('good_histories', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('good_id');
            $table->ulid('reference_id');
            $table->enum('type', ['Incoming', 'Outgoing']);
            $table->string('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_histories');
    }
};
