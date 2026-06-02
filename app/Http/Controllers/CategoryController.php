<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $category = Category::latest();

        if ($search) {
        $category->where('nama_kategori', 'like', '%' . $search . '%');
        }

        return view('categories.index', [
            'title' => 'Category',
            'categories' => $category->paginate(7)->withQueryString(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('categories.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_kategori' => 'required',
        'deskripsi' => 'required',
        'status' => 'required'
    ]);

    Category::create([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status
    ]);

    return redirect()
        ->route('categories.index')
        ->with('success','Kategori berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    
    public function show(Category $category)
{
    $category->load('products');

    return view('categories.show', compact('category'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'nama_kategori' => 'required',
        'deskripsi' => 'required',
        'status' => 'required'
    ]);

    $category->update([
        'nama_kategori' => $request->nama_kategori,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status
    ]);

    return redirect()
        ->route('categories.index')
        ->with('success','Kategori berhasil diubah');
}
    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    $category->delete();

    return redirect()
        ->route('categories.index')
        ->with('success','Kategori berhasil dihapus');
}
}
