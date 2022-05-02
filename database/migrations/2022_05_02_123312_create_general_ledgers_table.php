<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_ledgers', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->nullable();
            $table->string('month')->nullable();
            $table->string('date')->nullable();
            $table->string('department')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('status')->nullable();
            $table->string('transaction_type')->nullable();
            $table->integer('check_number')->nullable();
            $table->string('payee')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->string('credit')->nullable();
            $table->float('debit', 10, 0)->nullable();
            $table->string('project')->nullable();
            $table->integer('reference_number')->nullable();
            $table->string('division')->nullable();
            $table->string('account')->nullable();
            $table->string('memo')->nullable();
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
        Schema::dropIfExists('general_ledgers');
    }
}
