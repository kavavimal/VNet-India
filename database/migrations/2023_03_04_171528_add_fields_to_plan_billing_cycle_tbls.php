<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPlanBillingCycleTbls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_billing_cycle_tbl', function (Blueprint $table) {
            $table->string('billing_amount',100);
            $table->string('billing_percentage',100);
            $table->string('billing_upgrade_downgrade',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_billing_cycle_tbl', function (Blueprint $table) {
            $table->dropColumn('billing_amount');
            $table->dropColumn('billing_percentage');
            $table->dropColumn('billing_upgrade_downgrade');
        });
    }
}
