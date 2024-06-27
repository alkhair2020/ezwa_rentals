<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index('user_id');
            $table->integer('client_id')->index('client_id');
            $table->integer('property_id')->index('property_id');
            $table->integer('bathroom')->default('0')->comment('0=not good, 1=good');
            $table->text('bathroom_desc')->nullable();

            $table->integer('conditioning')->default('0')->comment('0=not good, 1=good');
            $table->text('conditioning_desc')->nullable();
            
            $table->integer('door')->default('0')->comment('0=not good, 1=good');
            $table->text('door_desc')->nullable();

            $table->integer('room')->default('0')->comment('0=not good, 1=good');
            $table->text('room_desc')->nullable();

            $table->integer('kitchen')->default('0')->comment('0=not good, 1=good');
            $table->text('kitchen_desc')->nullable();

            $table->integer('other')->default('0')->comment('0=not good, 1=good');
            $table->text('other_desc')->nullable();
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
        Schema::dropIfExists('cleans');
    }
}
