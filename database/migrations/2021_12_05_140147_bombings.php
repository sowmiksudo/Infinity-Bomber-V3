<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bombings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bombings', function(Blueprint $table){
            $table->id();
            $table->string('note')->nullable();
            $table->string('target');
            $table->integer('threads')->default(1);
            $table->string('ip')->nullable();
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('sent')->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bombings');
    }
}
