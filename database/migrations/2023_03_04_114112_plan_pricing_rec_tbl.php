<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanPricingRecTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_pricing_rec_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('storage', 255);
            $table->string('storage_price', 255);
            $table->string('billing_cycle', 255);
            $table->string('server', 255);
            $table->string('window_server', 255);
            $table->string('upgrade_downgrade', 255);
            $table->string('price', 255);
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
        Schema::dropIfExists('plan_pricing_rec_tbl');
    }
}
