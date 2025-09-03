<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
        // Example in your ProductController


    }

    // Show create form
    public function create()
    {
        return view('products.create');
    }

    // ✅ Show multiple create form

    public function solarsysEnergy()
    {
        return view('solarsys'); // no 'products.'
    }


    public function agrosysFarmFresh()
    {
        return view('products.agrosys-farm-fresh');
    }

    public function gspvNewEnergyBd()
    {
        return view('products.gspv-new-energy-bd');
    }

    public function sysExpress()
    {
        return view('products.sys-express');
    }

    public function insysInternational()
    {
        return view('products.insys-international');
    }


    public function createMultiple()
    {
        return view('products.create-multiple');
    }

    public function storeMultiple(Request $request)
    {
        $request->validate([
            'products.*.name' => 'required|string|max:255',
            'products.*.description' => 'nullable|string',
            'products.*.price' => 'required|numeric|min:0',
            'products.*.image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        foreach ($request->products as $productData) {
            $path = null;
            if (isset($productData['image'])) {
                $path = $productData['image']->store('products', 'public');
            }

            Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'] ?? null,
                'price' => $productData['price'],
                'image' => $path,
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Multiple products added successfully!');
    }



    // Store single product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }




    // ✅ Bulk delete selected products
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (!$ids || count($ids) === 0) {
            return redirect()->route('products.index')->with('error', 'No products selected for deletion.');
        }

        Product::whereIn('id', $ids)->delete();

        return redirect()->route('products.index')->with('success', 'Selected products deleted successfully.');
    }



    // Show gallery
    public function gallery()
    {
        $products = Product::all();
        return view('products.gallery', compact('products'));
    }

    // Show single product
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show edit form
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Delete single product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
