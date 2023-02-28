<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTaxTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_tax_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tax_name',255);
            $table->string('tax_percentage',255);
            $table->enum('sys_state',[0,1,-1])->comment('0 = active, 1 = inactive, -1 = deleted');
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
        Schema::dropIfExists('plan_tax_tbl');
    }
}
