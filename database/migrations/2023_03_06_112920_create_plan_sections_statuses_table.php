<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanSectionsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan__sections_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->enum('status', [0, 1])->comment('0 = Disable, 1 = Enable');
            $table->enum('sys_state', [0, 1, -1])->comment('0 = active, 1 = inactive, -1 = deleted');
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
        Schema::dropIfExists('plan__sections_statuses');
    }
}
