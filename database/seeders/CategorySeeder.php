<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    Category::create([
        'nama_kategori' => 'Makanan',
        'deskripsi' => 'Aneka makanan utama',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Minuman',
        'deskripsi' => 'Aneka minuman segar',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Dessert',
        'deskripsi' => 'Menu makanan penutup',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Snack',
        'deskripsi' => 'Makanan ringan',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Seafood',
        'deskripsi' => 'Menu olahan laut',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Ayam',
        'deskripsi' => 'Menu berbahan ayam',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Daging',
        'deskripsi' => 'Menu berbahan daging sapi',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Kopi',
        'deskripsi' => 'Aneka kopi',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Teh',
        'deskripsi' => 'Aneka teh',
        'status' => 'active'
    ]);

    Category::create([
        'nama_kategori' => 'Jus',
        'deskripsi' => 'Aneka jus buah',
        'status' => 'active'
    ]);
}
}
