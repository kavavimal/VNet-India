<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanServerLocationTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_server_location_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('base_country', 255);
            $table->string('amount', 255);
            $table->string('currency', 255);
            $table->string('server_location_country', 255);
            $table->string('percentage', 255);
            $table->enum('sys_state', [0, 1, -1])->comment('0 = active, 1 = inactive, -1 = deleted');
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
        Schema::dropIfExists('plan_server_location_tbl');
    }
}
