<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumnInFeaturedCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_featured_category_tbl', function (Blueprint $table) {
            $table->enum('show_status', [0, 1])->comment('0 = Disable, 1 = Enable')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_featured_category_tbl', function (Blueprint $table) {
            $table->dropColumn('show_status');
        });
    }
}
