<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanBanDisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('van_ban_di', function (Blueprint $table) {
            $table->bigIncrements('maVanBanDi')->unsigned();
            $table->string('tenFileVanBan');
            $table->string('soHieu');
            $table->date('ngayBanHanh');
            $table->string('moTa');
            $table->date('ngayHetHieuLuc');
            $table->bigInteger('maLoaiVB')->unsigned();
            $table->foreign('maLoaiVB')->references('maLoaiVB')->on('loai_van_ban')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('maDonViGui')->unsigned();
            $table->foreign('maDonViGui')->references('maDonVi')->on('don_vi')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('van_ban_dis');
    }
}
