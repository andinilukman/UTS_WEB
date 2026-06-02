<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $products = Product::with('category')

            ->when($search, function ($query) use ($search) {
                $query->where('nama_produk', 'like', "%{$search}%");
            })

            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })

            ->latest()
            ->paginate(5);

        $categories = Category::all();

        return view('products.index', compact(
            'products',
            'categories'
        ));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();

    return view('products.create', compact('categories'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'nama_produk' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'merk' => 'required',
        'deskripsi' => 'required'
    ]);

    Product::create([
        'category_id' => $request->category_id,
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'merk' => $request->merk,
        'deskripsi' => $request->deskripsi
    ]);

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Product $product)
{
    $categories = Category::all();

    return view(
        'products.edit',
        compact('product', 'categories')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    Product $product
)
{
    $request->validate([
        'category_id' => 'required',
        'nama_produk' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'merk' => 'required',
        'deskripsi' => 'required'
    ]);

    $product->update([
        'category_id' => $request->category_id,
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'merk' => $request->merk,
        'deskripsi' => $request->deskripsi
    ]);

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil diubah');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
