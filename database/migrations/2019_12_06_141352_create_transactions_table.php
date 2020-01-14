<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('travel_packages_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->integer('additional_visa');
            $table->integer('transaction_total');
            $table->string('transaction_status'); //in_cart, pending, cancel, success
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('users_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('travel_packages_id')->references('id')
                ->on('travel_packages')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
