<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'data_barangs';
    protected $primaryKey = 'kode_barang';
    protected $fillable = ['nama_barang', 'kategori', 'status'];
}