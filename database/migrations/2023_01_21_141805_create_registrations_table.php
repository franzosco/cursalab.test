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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('cource_id');
            $table->integer('score');
            $table->integer('attempts');
            $table->dateTime('approval_date')->null();
            $table->timestamps();

            // $table
            //     ->foreign('student_id')
            //     ->references('id')
            //     ->on('students')
            //     ->onDelete('cascade');

            // $table
            //     ->foreign('cource_id')
            //     ->references('id')
            //     ->on('cources')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
