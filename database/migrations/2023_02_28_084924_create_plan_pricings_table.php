<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan__pricing_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->nullable();
            $table->string('storage',100);
            $table->double('storage_price',7,2);
            $table->bigInteger('billing_cycle')->nullable();
            $table->string('server',100);
            $table->string('window_server',100);
            $table->double('price',7,2);
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
        Schema::dropIfExists('plan__pricing_tbl');
    }
}
