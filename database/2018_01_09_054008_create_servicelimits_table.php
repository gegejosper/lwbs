<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicelimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicelimits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serviceLimitId');
            $table->string('serviceLimitFrom');
            $table->string('serviceLimitTo');
            $table->string('serviceLimitAmount');
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
        Schema::dropIfExists('servicelimits');
    }
}
