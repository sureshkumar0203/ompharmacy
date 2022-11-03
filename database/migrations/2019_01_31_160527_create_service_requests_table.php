<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('user_registrations');
            $table->integer('services_id')->unsigned()->nullable();
            $table->foreign('services_id')->references('id')->on('services');
            $table->integer('associate_id')->unsigned()->nullable();
            $table->foreign('associate_id')->references('id')->on('users');
            $table->boolean('disp_id')->comment = '0=Both,1=Admin,2=Associate';
            $table->date('booking_date')->nullable();
            $table->timestamp('booking_time')->nullable();
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
        Schema::dropIfExists('service_requests');
    }
}
