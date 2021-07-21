<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('jenis');
            $table->string('kategori');
            $table->integer('prodi');
            $table->string('nama_pemateri');
            $table->date('buka_registrasi');
            $table->date('tutup_registrasi');
            $table->date('tgl_pelaksanaan');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->longText('deskripsi');
            $table->string('contact_person', 15);
            $table->string('nama_foto');
            $table->string('link_meet');
            $table->integer('status')->unsigned()->default(1);
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
        Schema::dropIfExists('kegiatan');
    }
}
