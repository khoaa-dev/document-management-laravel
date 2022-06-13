<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVBDenDVNhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VBDen_DVNhan', function (Blueprint $table) {
            $table->bigInteger('maVanBanDen')->unsigned();
            $table->foreign('maVanBanDen')->references('maVanBanDen')->on('van_ban_den')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('maDonViNhan')->unsigned();
            $table->foreign('maDonViNhan')->references('maDonVi')->on('don_vi')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->char('trangThai');
            $table->date('ngayGuiThongBao');
            $table->date('ngayCapNhat');
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
        Schema::dropIfExists('VBDen_DVNhan');
    }
}
