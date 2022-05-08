<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStampDutyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stamp_duty', function (Blueprint $table) {
            $table->bigIncrements('pkey');
            $table->string('stamp_duty_id')->unique();
            $table->double('from',10,2);
            $table->double('to',11,2);
            $table->double('rate',5,2);
            $table->string('rate_type')->nullable();
            $table->double('exceed',10,2);
            $table->integer('basePrice');
            $table->string('scale')->nullable();

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
        Schema::dropIfExists('tbl_stamp_duty');
    }
}
