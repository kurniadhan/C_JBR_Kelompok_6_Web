<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $PrimaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'nama_pemateri',
        'kategori',
        'jenis',
        'id_prodi',
        'id_jurusan',
        'tgl_buka',
        'tgl_tutup',
        'tgl_pelaksanaan',
        'jam_mulai',
        'jam_selesai',
        'contact_person',
        'nama_foto',
        'link_meet',
        'deskripsi',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
