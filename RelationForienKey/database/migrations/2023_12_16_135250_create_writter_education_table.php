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
        Schema::create('writter_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('writter_id');
            $table->string('board_name');
            $table->foreign('writter_id')
                ->references('id')
                ->on('writter')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('writter_education');
    }
};
