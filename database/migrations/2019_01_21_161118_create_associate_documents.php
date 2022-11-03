<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociateDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associate_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('id_proof', 255)->nullable();
            $table->string('residence_proof', 255)->nullable();
            $table->string('educational_certificates', 255)->nullable();
            $table->string('verification_certificate', 255)->nullable();
            $table->string('experience_certificate', 255)->nullable();
            $table->string('agreement_letter', 255)->nullable();
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
        Schema::dropIfExists('associate_documents');
    }
}
