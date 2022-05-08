<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPropertyPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_property_photo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_id')->unique();
            $table->text('property_id')->nullable();
            $table->text('path')->nullable();
            $table->text('photo_type')->nullable();
            $table->integer('is_valid')->default(1);
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
        Schema::dropIfExists('tbl_property_photo');
    }
}
