<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVBDiDVNhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VBDi_DVNhan', function (Blueprint $table) {
            $table->bigInteger('maVanBanDi')->unsigned();
            $table->foreign('maVanBanDi')->references('maVanBanDi')->on('van_ban_di')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('maDonViNhan')->unsigned();
            $table->foreign('maDonViNhan')->references('maDonVi')->on('don_vi')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->char('trangThai');
            $table->date('ngayGuiThongBao');
            $table->date('ngayCapNhat');
            $table->primary(['maVanBanDi','maDonViNhan']);
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
        Schema::dropIfExists('VBDi_DVNhan');
    }
}
