<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'nama_produk' => 'Nasi Goreng Spesial',
            'harga' => 25000,
            'stok' => 50,
            'merk' => 'Dapur Nusantara',
            'deskripsi' => 'Nasi goreng dengan telur dan ayam'
        ]);

        Product::create([
            'category_id' => 1,
            'nama_produk' => 'Mie Goreng',
            'harga' => 22000,
            'stok' => 40,
            'merk' => 'Dapur Nusantara',
            'deskripsi' => 'Mie goreng pedas'
        ]);

        Product::create([
            'category_id' => 2,
            'nama_produk' => 'Es Teh Manis',
            'harga' => 8000,
            'stok' => 100,
            'merk' => 'Fresh Drink',
            'deskripsi' => 'Es teh segar'
        ]);

        Product::create([
            'category_id' => 2,
            'nama_produk' => 'Jus Alpukat',
            'harga' => 18000,
            'stok' => 30,
            'merk' => 'Fresh Drink',
            'deskripsi' => 'Jus alpukat dengan susu'
        ]);

        Product::create([
            'category_id' => 3,
            'nama_produk' => 'Ice Cream Coklat',
            'harga' => 15000,
            'stok' => 25,
            'merk' => 'Sweet Food',
            'deskripsi' => 'Es krim rasa coklat'
        ]);

        Product::create([
            'category_id' => 4,
            'nama_produk' => 'Kentang Goreng',
            'harga' => 12000,
            'stok' => 45,
            'merk' => 'Snack Time',
            'deskripsi' => 'Kentang goreng renyah'
        ]);

        Product::create([
            'category_id' => 5,
            'nama_produk' => 'Udang Bakar',
            'harga' => 35000,
            'stok' => 20,
            'merk' => 'Seafood House',
            'deskripsi' => 'Udang bakar bumbu spesial'
        ]);

        Product::create([
            'category_id' => 6,
            'nama_produk' => 'Ayam Geprek',
            'harga' => 22000,
            'stok' => 35,
            'merk' => 'Ayam Mantap',
            'deskripsi' => 'Ayam geprek sambal pedas'
        ]);

        Product::create([
            'category_id' => 7,
            'nama_produk' => 'Steak Sapi',
            'harga' => 55000,
            'stok' => 15,
            'merk' => 'Steak House',
            'deskripsi' => 'Steak daging sapi premium'
        ]);

        Product::create([
            'category_id' => 8,
            'nama_produk' => 'Kopi Americano',
            'harga' => 18000,
            'stok' => 50,
            'merk' => 'Coffee Corner',
            'deskripsi' => 'Kopi hitam tanpa gula'
        ]);
    }
}