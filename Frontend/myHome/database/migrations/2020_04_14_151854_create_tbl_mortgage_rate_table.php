<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMortgageRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mortgage_rate', function (Blueprint $table) {
            $table->bigIncrements('pkey');
            $table->string('morgtgage_id')->unique();
            $table->double('mortgage_from', 10, 2);
            $table->double('mortgage_to', 10, 2);
            $table->double('mortgage_rate_from', 5, 2);
            $table->double('mortgage_rate_to', 5, 2);
            $table->double('max_mortgage_price', 10, 2);
            
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
        Schema::dropIfExists('tbl_mortgage_rate');
    }
}
