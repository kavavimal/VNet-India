<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPlanFeaturedSubCategoryTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_featured_sub_category_tbl', function (Blueprint $table) {
            $table->bigInteger('sub_menu_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_featured_sub_category_tbl', function (Blueprint $table) {
            $table->dropColumn('sub_menu_id');
        });
    }
}
