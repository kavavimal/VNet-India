<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPlanRec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan__rec_tbl', function (Blueprint $table) {
            $table->string('negotiation_min',100);
            $table->string('negotiation_max',100);
            $table->enum('negotiation_status',[0,1])->comment('0 = active, 1 = inactive');
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
            $table->dropColumn('negotiation_min');
            $table->dropColumn('negotiation_max');
            $table->dropColumn('negotiation_status');
        });
    }
}
