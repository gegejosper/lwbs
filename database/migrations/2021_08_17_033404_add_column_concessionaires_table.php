<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnConcessionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concessionaires', function (Blueprint $table) {
            //
            $table->string('brgy');
            $table->string('town');
            $table->string('street');
            $table->string('service');
            $table->string('installion_date');
            $table->dropColumn('clark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concessionaires', function (Blueprint $table) {
            //
        });
    }
}
