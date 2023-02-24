<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanFeaturedCategoryTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_featured_category_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('featured_cat_name',255);
            $table->string('featured_cat_desc',255);
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
        Schema::dropIfExists('plan_featured_category_tbl');
    }
}
