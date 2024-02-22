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
        Schema::create('outgoing_goods', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('taking_good_id');
            $table->string('outgoing_number');
            $table->dateTime('date');
            $table->ulid('created_by')->nullable();
            $table->ulid('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('taking_good_id')->references('id')
                ->on('taking_goods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('created_by')->references('id')
                ->on('users')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('updated_by')->references('id')
                ->on('users')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_goods');
    }
};
