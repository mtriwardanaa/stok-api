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
        Schema::create('goods', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('unit_id')->nullable();
            $table->string('name');
            $table->string('price');
            $table->string('qty');
            $table->string('qty_warning');
            $table->string('code')->unique();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('unit_id')->references('id')
                ->on('units')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
