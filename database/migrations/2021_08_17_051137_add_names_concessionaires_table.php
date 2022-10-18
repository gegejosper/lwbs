<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamesConcessionairesTable extends Migration
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
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
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
