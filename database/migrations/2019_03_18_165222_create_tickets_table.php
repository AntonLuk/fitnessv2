<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('name');
            $table->integer('amount');
            $table->integer('cost');
            $table->date('date_delivery');
            $table->boolean('activity')->default(true);
            $table->date('date_start_off')->nullable();
            $table->date('date_finish_off')->nullable();
            $table->integer('count_off')->default(30);
            $table->bigInteger('type_ticket_id')->unsigned();
            $table->foreign('type_ticket_id')->references('id')->on('type_tickets');
            $table->bigInteger('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
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
        Schema::dropIfExists('tickets');
    }
}
