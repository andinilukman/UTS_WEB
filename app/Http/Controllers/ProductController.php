<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'deskripsi' => 'required',
            'status_produk' => 'required'
        ]);

        DB::beginTransaction();

        try {

            Product::create([
                'category_id' => $request->category_id,
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'merk' => $request->merk,
                'deskripsi' => $request->deskripsi,
                'status_produk' => $request->status_produk
            ]);

            DB::commit();

            return redirect()
                ->route('products.index')
                ->with('success', 'Produk berhasil ditambahkan');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->route('products.index')
                ->with('error', 'Produk gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
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
    public function update(Request $request, Product $product)
{
    DB::beginTransaction();

    try {

        $product->update([
            'category_id' => $request->category_id,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'merk' => $request->merk,
            'deskripsi' => $request->deskripsi,
            'status_produk' => $request->status_produk
        ]);

        DB::commit();

        return redirect()
            ->route('products.index')
            ->with('success','Produk berhasil diubah');

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with('error',$e->getMessage());
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}