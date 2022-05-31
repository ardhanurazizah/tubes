<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPembeli extends Model
{
    use HasFactory;
    protected $table = 'produk_pembelis';

    protected $fillable = [
        'id_produk',
        'id_pembeli',
        'tanggal',
        'total',
    ];
}
