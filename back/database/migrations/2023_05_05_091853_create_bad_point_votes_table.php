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
        Schema::create('bad_point_votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_like');
            $table->timestamps();

            $table->index('point_id', 'votes_point_idx');
            $table->index('user_id', 'votes_user_idx');

            $table->foreign('point_id', 'votes_point_fk')
                ->on('bad_points')
                ->references('id')
                ->cascadeOnDelete();
            $table->foreign('user_id', 'votes_user_fk')
                ->on('users')
                ->references('id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bad_point_votes');
    }
};
