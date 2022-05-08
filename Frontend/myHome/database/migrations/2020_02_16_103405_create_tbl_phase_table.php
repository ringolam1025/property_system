<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPhaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phase', function (Blueprint $table) {
            $table->bigIncrements('pkey');
            $table->string('phase_id')->unique();
            $table->text('estate_id')->nullable();
            $table->text('phase_cName')->nullable();
            $table->text('phase_eName')->nullable();
            $table->date('phase_complate_date');
            $table->text('phase_c_street_name')->nullable();
            $table->text('phase_e_street_name')->nullable();
            $table->float('phase_latitude', 10, 7);
            $table->float('phase_longitude', 10, 7);
            $table->text('displayorder')->nullable();
            $table->text('phase_photo_src')->nullable();
            
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
        Schema::dropIfExists('tbl_phase');
    }
}
