<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoomsToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('floor')->nullable()->after('tax_number');  //  الطابق
            $table->string('num_single_bed')->nullable();  // عدد السراير الفردي
            $table->string('num_double_bed')->nullable();  // عدد السراير المزدوجة
            $table->string('num_locker')->nullable();   // عدد الخزائن
            $table->string('num_TVs')->nullable();      // عدد التي في
            $table->string('conditioner_type')->nullable();  // نوع المكيف
            $table->integer('price_id')->nullable()->index('price_id');  // نوع الغرفة
            
            $table->integer('internet')->nullable()->default('0')->comment('0=not found, 1=found');
            $table->integer('parking')->nullable()->default('0')->comment('0=not found, 1=found');   
            $table->integer('elevator')->nullable()->default('0')->comment('0=not found, 1=found'); // مصعد
            $table->integer('cleaning_rooms')->nullable()->default('0')->comment('0=not found, 1=found'); 

            $table->integer('telephone_directory')->nullable()->default('0')->comment('0=not found, 1=found');   // دليل الهاتف
            $table->integer('newspaper')->nullable()->default('0')->comment('0=not found, 1=found');   // صحيفة
            $table->integer('qibla')->nullable()->default('0')->comment('0=not found, 1=found');
            $table->integer('list_restaurant')->nullable()->default('0')->comment('0=not found, 1=found');
            $table->integer('fridge')->nullable()->default('0')->comment('0=not found, 1=found');    // ثلاجة
            $table->integer('lounge')->nullable()->default('0')->comment('0=not found, 1=found');   // صالة
            $table->integer('oven')->nullable()->default('0')->comment('0=not found, 1=found');     // فرن 
            $table->integer('microwave')->nullable()->default('0')->comment('0=not found, 1=found');
            $table->integer('washing_machine')->nullable()->default('0')->comment('0=not found, 1=found'); //غسالة 
            $table->integer('iron')->nullable()->default('0')->comment('0=not found, 1=found');   // مكوة
            $table->integer('dining_table')->nullable()->default('0')->comment('0=not found, 1=found');    // طاولة طعام
            $table->integer('kitchen')->nullable()->default('0')->comment('0=not found, 1=found');    // مطبخ
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            //
        });
    }
}
