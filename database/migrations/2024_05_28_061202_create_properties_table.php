<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('number');
            $table->integer('rooms');
            $table->integer('baths');
            $table->float('price_day');
            $table->float('price_week');
            $table->float('price_month');
            $table->string('address')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->default('waiting')->comment('rented,maintenance,notclean_rented,notclean,waiting,vacant');
            $table->integer('percentage')->default(0);
            $table->string('tax_number')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
