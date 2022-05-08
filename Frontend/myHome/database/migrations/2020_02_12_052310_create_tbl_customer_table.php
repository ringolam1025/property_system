<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->increments('pkey');
            $table->string('customer_id')->unique();
            $table->text('customer_cName_firstName')->nullable();
            $table->text('customer_cName_lastName')->nullable();
            $table->text('customer_eName_firstName')->nullable();
            $table->text('customer_eName_lastName')->nullable();
            $table->text('customer_cRoom')->nullable();
            $table->text('customer_cFloor')->nullable();
            $table->text('customer_cBlock')->nullable();
            $table->text('customer_cStreet')->nullable();
            $table->text('customer_eRoom')->nullable();
            $table->text('customer_eFloor')->nullable();
            $table->text('customer_eBlock')->nullable();
            $table->text('customer_eStreet')->nullable();
            $table->text('district_id')->nullable();
            $table->text('customer_phone')->nullable();
            $table->text('customer_mobile')->nullable();
            $table->text('customer_whatsapp')->nullable();
            $table->string('customer_photo_src')->nullable();
            $table->text('user_id')->nullable();

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
        Schema::dropIfExists('tbl_customer');
    }
}
