<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_estate', function (Blueprint $table) {
            $table->increments('pkey');
            $table->string('estate_id')->unique();
            $table->text('estate_cName')->nullable();
            $table->text('estate_eName')->nullable();
            $table->text('estate_c_street_name')->nullable();
            $table->text('estate_e_street_name')->nullable();
            $table->text('estate_developer')->nullable();
            $table->date('first_sales_date');
            $table->string('estate_status')->nullable();
            $table->longText('estate_desc')->nullable();
            $table->string('estate_photo_src')->nullable();
            $table->integer('displayorder');
            $table->text('sub_district_id')->nullable();
            
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
        Schema::dropIfExists('tbl_estate');
    }
}
