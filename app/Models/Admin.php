<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $PrimaryKey = 'id';
    protected $fillable = [
        'nama', 'email', 'password', 'jenis_kelamin', 'notelp', 'id_prodi'
    ];
}