<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_holder_name', 255)->nullable();
            $table->string('account_number', 255)->nullable();
            $table->string('branch_name', 255)->nullable();
            $table->string('bank_name', 255)->nullable();
            $table->string('ifsc_code', 255)->nullable();
            $table->decimal('amount', 8,2)->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('bank_transfers');
    }
}
