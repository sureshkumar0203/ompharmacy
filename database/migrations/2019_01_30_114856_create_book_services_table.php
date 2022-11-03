<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('user_registrations');
            $table->integer('services_id')->unsigned()->nullable();
            $table->foreign('services_id')->references('id')->on('services');
            $table->boolean('acpt_status')->comment = '0=Not Accepted,1=Accepted';
            $table->integer('req_acpt_id')->unsigned()->nullable();
            $table->foreign('req_acpt_id')->references('id')->on('users');
            $table->boolean('disp_only_adm')->comment = '0=Both,1=Admin';
            $table->decimal('price', 7, 2);
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
        Schema::dropIfExists('book_services');
    }
}
