<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBankRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bank_rate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bank_rate_id')->unique();
            $table->text('bank_eName');
            $table->double('rate',5,2);
            $table->double('cash_back',5,2);
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
        Schema::dropIfExists('tbl_bank_rate');
    }
}
