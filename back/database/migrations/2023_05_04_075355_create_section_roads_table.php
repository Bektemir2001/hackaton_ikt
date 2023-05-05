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
        Schema::create('section_roads', function (Blueprint $table) {
            $table->id();
            $table->string('x1');
            $table->string('y1');
            $table->string('x2');
            $table->string('y2');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status')->nullable();
            $table->integer('lifetime')->nullable();
            $table->string('type');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('contractor_id');
            $table->timestamps();

            $table->index('contractor_id', 'contractor_idx');
            $table->foreign('contractor_id', 'contractor_fk')
                ->on('contractors')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_roads');
    }
};
