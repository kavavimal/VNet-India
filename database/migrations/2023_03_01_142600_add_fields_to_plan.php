<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan__rec_tbl', function (Blueprint $table) {
            $table->string('service_type_type',100);
            $table->string('service_type_price',100);
            $table->string('servive_type_currency',100);
            $table->string('service_type_renewal_price',100);
            $table->string('service_type_discount',100);
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
            $table->dropColumn('service_type_type');
            $table->dropColumn('service_type_price');
            $table->dropColumn('servive_type_currency');
            $table->dropColumn('service_type_renewal_price');
            $table->dropColumn('service_type_discount');
        });
    }
}
