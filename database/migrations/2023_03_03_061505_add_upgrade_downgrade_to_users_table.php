<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpgradeDowngradeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_server_location_tbl', function (Blueprint $table) {
            $table->string('upgrade_downgrade',100)->after('percentage');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_server_location_tbl', function (Blueprint $table) {
            $table->dropColumn('upgrade_downgrade');
        });
    }
}
