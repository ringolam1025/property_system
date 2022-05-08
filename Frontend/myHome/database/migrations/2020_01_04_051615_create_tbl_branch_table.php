<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_branch', function (Blueprint $table) {
            $table->increments('pkey');
            $table->string('branch_id')->unique();
            $table->text('branch_cName')->nullable();
            $table->text('branch_eName')->nullable();
            $table->text('branch_cAddress')->nullable();
            $table->text('branch_eAddress')->nullable();
            $table->text('branch_phone1')->nullable();
            $table->text('branch_phone2')->nullable();
            $table->text('branch_manager1')->nullable();
            $table->text('branch_manager2')->nullable();
            $table->integer('displayorder');
            $table->longText('branch_desc')->nullable();
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
        Schema::dropIfExists('tbl_branch');
    }
}
