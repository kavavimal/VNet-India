<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product__rec_tbl', function (Blueprint $table) {
            $table->enum('sys_state',[0,1,-1])->comment('0 = active, 1 = inactive, -1 = deleted')->after('category_id');;            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product__rec_tbl', function (Blueprint $table) {
            $table->dropColumn('sys_state');
        });
    }
}
