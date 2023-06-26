<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                    ->references('id')
                    ->on('posts')
                    ->cascadeOnDelete();

            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')
                    ->references('id')
                    ->on('technologies')
                    ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_technology');
    }
};
