<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_district', function (Blueprint $table) {
            $table->increments('pkey');
            $table->string('sub_district_id')->unique();
            $table->text('subDistrict_cName')->nullable();
            $table->text('subDistrict_eName')->nullable();
            $table->integer('displayorder');
            $table->longText('subDistrict_desc')->nullable();

            $table->text('district_id');

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
        Schema::dropIfExists('tbl_sub_district');
    }
}
