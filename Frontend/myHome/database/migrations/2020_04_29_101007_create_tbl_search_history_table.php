<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSearchHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_search_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_id', 255)->nullable();;
            $table->dateTime('search_date', 0);
            $table->string('search_category', 255);
            $table->string('search_val', 255)->nullable();;
            $table->string('platform', 100)->nullable();;
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
        Schema::dropIfExists('tbl_search_history');
    }
}
