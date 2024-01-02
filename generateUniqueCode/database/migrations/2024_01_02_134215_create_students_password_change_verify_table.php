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
        Schema::create('students_password_change_verify', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->integer('secure_number');
            $table->text('hash_url')->unique();
            $table->dateTime('expire_time');
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('students_password_change_verify');
    }
};
