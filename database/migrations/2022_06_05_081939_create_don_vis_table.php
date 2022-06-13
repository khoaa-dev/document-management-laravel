<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonVisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_vi', function (Blueprint $table) {
            $table->bigIncrements('maDonVi')->unsigned();
            $table->string('tenDonVi');
            $table->string('moTa');
            $table->bigInteger('maLoaiDV')->unsigned();
            $table->foreign('maLoaiDV')->references('maLoaiDV')->on('loai_don_vi')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('don_vi');
    }
}
