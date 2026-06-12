<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'nama_produk',
        'harga',
        'stok',
        'merk',
        'deskripsi',
        'status_produk'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}