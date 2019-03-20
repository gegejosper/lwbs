<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlybillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlybills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cubicCount');
            $table->string('prevrec');
            $table->string('newrec');
            $table->date('monthlyDueDate');
            $table->string('monthlyRecordDate');
            $table->string('monthlyBillDate');
            $table->string('billAmount');
            $table->integer('status');
            $table->integer('meternum');
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
        Schema::dropIfExists('monthlybills');
    }
}
