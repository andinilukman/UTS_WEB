<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->enum('status_produk', [
                'Tersedia',
                'Habis',
                'Pre Order'
            ])->default('Tersedia');

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn('status_produk');

            $table->dropSoftDeletes();
        });
    }
};