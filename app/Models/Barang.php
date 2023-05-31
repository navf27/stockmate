<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'id_kategori',
        'nama_barang',
        'harga',
        'stok',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
