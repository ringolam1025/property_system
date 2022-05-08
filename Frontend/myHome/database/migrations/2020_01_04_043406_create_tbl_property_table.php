<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_property', function (Blueprint $table) {
            $table->increments('pkey');
            $table->string('property_id')->unique();
            $table->text('phase_id')->nullable();
            $table->text('property_cName')->nullable();
            $table->text('property_eName')->nullable();
            $table->text('floor')->nullable();
            $table->text('room')->nullable();
            $table->text('block')->nullable();
            $table->double('actual_size', 10, 4);
            $table->double('building_size', 10, 4);
            $table->double('rent_price', 10, 2);
            $table->double('sales_price', 10, 2);
            $table->integer('num_of_carpark');
            $table->integer('num_of_bedroom');
            $table->integer('num_of_kitchen');
            $table->integer('num_of_bathroom');
            $table->integer('num_of_dining_room');
            $table->integer('num_of_living_room');
            $table->text('property_type')->nullable();
            $table->text('clubhouse')->nullable();
            $table->longText('property_desc')->nullable();
            $table->text('last_remodel_yr')->nullable();
            $table->float('property_latitude', 10, 7);
            $table->float('property_longitude', 10, 7);

            $table->integer('has_seaview');
            $table->integer('near_mtr');
            $table->integer('near_bus');
            $table->integer('near_shopping');
            $table->integer('near_park');
            $table->integer('near_school');
            $table->integer('mountainview');
            $table->integer('courtyardview');
            

            $table->text('agent_id')->nullable();
            $table->text('template_id')->nullable();

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
        Schema::dropIfExists('tbl_property');
    }
}
