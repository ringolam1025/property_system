<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_agent', function (Blueprint $table) {
            $table->bigIncrements('pkey');
            $table->string('agent_id')->unique();
            $table->text('agent_cName_firstName')->nullable();
            $table->text('agent_cName_lastName')->nullable();
            $table->text('agent_eName_firstName')->nullable();
            $table->text('agent_eName_lastName')->nullable();
            $table->text('agent_title')->nullable();
            $table->text('agent_phone')->nullable();
            $table->text('agent_mobile')->nullable();
            $table->text('agent_email')->nullable();
            $table->text('agent_year_of_service')->nullable();
            $table->text('agent_license')->nullable();
            $table->longtext('agent_photo')->nullable();
            $table->text('color_code')->nullable();
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
        Schema::dropIfExists('tbl_agent');
    }
}
