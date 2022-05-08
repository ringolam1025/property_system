<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_status', function (Blueprint $table) {
            $table->increments('pkey');
            $table->string('status_id')->unique();
            $table->text('status_cName')->nullable();;
            $table->text('status_eName')->nullable();;
            $table->text('belong_table')->nullable();;
            $table->longText('status_desc')->nullable();;

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
        Schema::dropIfExists('tbl_status');
    }
}
