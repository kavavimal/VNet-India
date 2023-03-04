<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPlanPricingTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan__pricing_tbl', function (Blueprint $table) {
            $table->string('upgrade_downgrade')->nullable()->after('window_server');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan__pricing_tbl', function (Blueprint $table) {
            $table->dropColumn('upgrade_downgrade');
        });
    }
}
