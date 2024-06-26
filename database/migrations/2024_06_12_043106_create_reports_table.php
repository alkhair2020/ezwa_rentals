<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index('user_id')->nullable();
            $table->integer('client_id')->index('client_id')->nullable();
            $table->integer('property_id')->nullable();
            $table->integer('receipt_id')->nullable();
            $table->integer('expense_id')->nullable();
            $table->integer('status')->default('1')->comment('0=exit, 1=enter , 2=renew');
            $table->string('payment_way')->nullable();
            $table->string('cleaner')->nullable();
            $table->string('worker_checked')->nullable();
            $table->integer('status_door_card')->default('0')->comment('0=not received, 1=received');
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
        Schema::dropIfExists('reports');
    }
}
