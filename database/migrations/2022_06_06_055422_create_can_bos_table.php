<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanBosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('can_bo', function (Blueprint $table) {
            $table->string('maCanBo')->primary();
            $table->string('matKhau');
            $table->string('hoTen');
            $table->date('ngaySinh');
            $table->string('email');
            $table->string('sdt');
            $table->char('trangThai');
            $table->bigInteger('maQuyen')->unsigned();
            $table->foreign('maQuyen')->references('maQuyen')->on('phan_quyen')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('maDonVi')->unsigned();
            $table->foreign('maDonVi')->references('maDonVi')->on('don_vi')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('can_bos');
    }
}
