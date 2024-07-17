<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index('user_id');
            $table->integer('property_id')->index('property_id');
            $table->string('name');
            $table->string('type');
            $table->string('nationality');
            $table->string('id_number');
            $table->string('phone');
            $table->integer('number_companions');
            $table->string('age')->nullable();
            $table->string('start_date');
            $table->string('time');
            $table->string('end_date');
            $table->string('property_type');
            $table->string('count_day');
            $table->float('discount')->default('0');
            $table->float('property_price')->default('0');
            $table->float('total')->default('0');
            $table->integer('status')->default('1')->comment('0=expired, 1=not expired , 2=renew');
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
        Schema::dropIfExists('clients');
    }
}
