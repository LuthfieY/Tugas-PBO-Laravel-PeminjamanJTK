<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjams';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'nim_nidn'];
}
