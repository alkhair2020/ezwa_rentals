<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('losses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index('user_id');
            $table->integer('client_id')->index('client_id');
            $table->integer('property_id')->index('property_id');
            $table->string('name');
            $table->string('count')->nullable();
            $table->integer('status')->default('0')->comment('0=not good, 1=good');
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('losses');
    }
}
