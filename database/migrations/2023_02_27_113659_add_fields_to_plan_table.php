<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan__rec_tbl', function (Blueprint $table) {
            $table->string('billing_cycles',100);
            $table->string('specification',100);
            $table->string('featured_category',100);
            $table->string('featured_sub_category',100);
            $table->string('plan_pricing',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan__rec_tbl', function (Blueprint $table) {
            $table->dropColumn('billing_cycles');
            $table->dropColumn('specification');
            $table->dropColumn('featured_category');
            $table->dropColumn('featured_sub_category');
            $table->dropColumn('plan_pricing');
        });
    }
}
