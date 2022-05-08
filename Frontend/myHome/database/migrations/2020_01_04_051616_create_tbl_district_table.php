<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_district', function (Blueprint $table) {
            $table->increments('pkey');
            $table->string('district_id')->unique();
            $table->text('district_cName')->nullable();
            $table->text('district_eName')->nullable();
            $table->integer('displayorder');
            $table->longText('district_desc')->nullable();
            
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
        Schema::dropIfExists('tbl_district');
    }
}
