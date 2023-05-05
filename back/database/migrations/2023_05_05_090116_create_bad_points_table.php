<?php

use App\Enums\BadPointStatusEnum;
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
        Schema::create('bad_points', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('x');
            $table->string('y');
            $table->string('type');
            $table->text('description');
            $table->string('status')->default('not_viewed');
            $table->unsignedBigInteger('user_id');
            $table->unique(['x', 'y', 'user_id']);
            $table->timestamps();

            $table->index('user_id', 'point_user_idx');
            $table->foreign('user_id', 'point_user_fk')
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
        Schema::dropIfExists('bad_points');
    }
};
