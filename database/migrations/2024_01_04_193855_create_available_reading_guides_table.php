<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('available_reading_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('version')->default('1.0.0');
            $table->string('path_csv', 1020);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_reading_guides');
    }
};
