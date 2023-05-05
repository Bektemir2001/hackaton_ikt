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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->text('comment');
            $table->integer('mark');
            $table->string('phone_number')->nullable();
            $table->timestamps();

            $table->index('section_id', 'section_idx');
            $table->foreign('section_id', 'section_fk')
                ->on('section_roads')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
