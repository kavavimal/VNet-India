<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanBillingCycleTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_billing_cycle_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('billing_name',255);
            $table->string('billing_desc',255);
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
        Schema::dropIfExists('plan_billing_cycle_tbl');
    }
}
