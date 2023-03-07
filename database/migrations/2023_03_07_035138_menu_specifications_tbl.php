<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MenuSpecificationsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_specifications_tbl', function (Blueprint $table) {
            $table->bigInteger('id')->nullable();
            $table->bigInteger('plan_product_id')->nullable();       
            $table->string('billing_cycles',100)->nullable();     
            $table->string('specification',100)->nullable();     
            $table->string('featured_category',100)->nullable();     
            $table->string('featured_sub_category',100)->nullable();     
            $table->string('plan_pricing',100)->nullable();     
            $table->string('taxation',100)->nullable();     
            $table->string('negotiation_min',100)->nullable();     
            $table->string('negotiation_max',100)->nullable();     
            $table->enum('negotiation_status',[0,1])->comment('0 = active, 1 = inactive');
            $table->string('service_type_type',100)->nullable();     
            $table->string('service_type_price',100)->nullable();     
            $table->string('servive_type_currency',100)->nullable();     
            $table->string('service_type_renewal_price',100)->nullable();     
            $table->string('service_type_discount',100)->nullable();     
            $table->string('plan_pricingids',100)->nullable();     
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
        Schema::dropIfExists('menu_specifications_tbl');
    }
}
