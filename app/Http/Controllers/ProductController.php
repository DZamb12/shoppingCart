<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.products2', [
            'heading' => 'Product Catalog',
            'products' => Product::latest()->filter(request(['search']))->simplePaginate(5)
        ]);
    }

    public function show(Product $product)
    {
        return view('products.product', [
            'product' => $product
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'unit' => 'required',
            'unitPrice' => 'required|decimal:0,2',
            'category' => 'required',
            'name' => 'required|unique:products'
        ]);

        if ($request->hasFile('image_url')) {
            $formFields['image_url'] =  $request->file('image_url')->store('images', 'public');
        }

        Product::create($formFields);

        return redirect('/')->with('success', 'New product saved successfully!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request)
    {
        $formFields = $request->validate([
            'unit' => 'required',
            'unitPrice' => 'required|decimal:0,2',
            'category' => 'required',
            'name' => 'required'
        ]);

        if(File::exists('storage/' . $product ->image_url)){
            File::delete('storage/'. $product->image_url);
        }

        if ($request->hasFile('image_url')) {
            $formFields['image_url'] =  $request->file('image_url')->store('images', 'public');
        }

        $product->update($formFields);

        return redirect('/')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    { 
        
        if(File::exists('storage/' . $product ->image_url)){
            File::delete('storage/'. $product->image_url);
        }

        $product->delete();

        return redirect('/')->with('success', 'Product deleted successfully!');

    }

    public function manage()
    {
        return view('products.products', [
            'heading' => 'Manage Products',
            'products' => Product::latest()->paginate(5)
        ]);
    }


    public function addProducttoCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('product.cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "unit"=>$product->unit,
                "quantity" => 1,
                "unitPrice" => $product->unitPrice,
                "image" => $product->image_url
            ];
        }
        session()->put('product.cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }
     public function ProductCart()
    {
        return view('product.cart');
    }




}
