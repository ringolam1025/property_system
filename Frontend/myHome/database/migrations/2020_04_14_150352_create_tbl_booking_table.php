<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_booking', function (Blueprint $table) {
            $table->bigIncrements('pkey');
            $table->string('booking_id')->unique();
            $table->string('property_id')->nullable();
            $table->string('agent_id')->nullable();
            $table->date('booked_date');
            $table->time('booked_start_time', 0);
            $table->time('booked_end_time', 0);
            $table->string('cust_name')->nullable();
            $table->string('cust_email')->nullable();
            $table->string('cust_phone')->nullable();
            $table->string('remark')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('tbl_booking');
    }
}
