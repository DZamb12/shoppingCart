<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required'

        ]);
        $formFields['user_id'] = auth()->id();
        if ($request->hasFile('image_url')) {
            $formFields['image_url'] = $request->file('image_url')->store('images', 'public');
        }
        Product::create($formFields);
        return redirect('/')->with('success', 'New product saved successfully!');
    }

    public function edit(Product $product)
    {

        if (auth()->id() == $product->user_id) {
            return view('products.edit', [
                'product' => $product
            ]);
        } else {
            abort(403, 'Invalid Action');
        }
    }

    public function update(Product $product, Request $request)
    {

        if (auth()->id() == $product->user_id) {
            $formFields = $request->validate([
                'unit' => 'required',
                'unitPrice' => 'required|decimal:0,2',
                'category' => 'required',
                'name' => 'required'
            ]);

            if ($request->hasFile('image_url')) {
                File::delete('storage/' . $product->image_url);
                $formFields['image_url'] = $request->file('image_url')->store('images', 'public');
            } else {
            }

            $product->update($formFields);
        } else {
            abort(403, 'Invalid Action');
        }
        return redirect('/')->with('success', 'New product updated');
    }
    public function destroy(Product $product)
    {
        if (auth()->id() === $product->user_id) {
            if (File::exists('storage/' . $product->image_url)) {
                File::delete('storage/' . $product->image_url);
            }

            $product->delete();
            return redirect('/products/manage')->with('removed', 'Product deleted successfully!');
        } else {
            abort(403, 'Invalid Action');
        }
    }

    public function manage()
    {
        return view('products.products', [
            'heading' => 'Manage Products',
            'products' => auth()->user()->product2()->paginate(5)
        ]);
    }


    public function addProducttoCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('product.cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "unit" => $product->unit,
                "quantity" => 1,
                "unitPrice" => $product->unitPrice,
                "image" => $product->image_url
            ];
        }
        session()->put('product.cart', $cart);
        return redirect()->back()->with('success', 'Product has been added to cart!');
    }

    // public function addProducttoCart($id)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->back()->with('error', 'You must be logged in to add the product to your cart.');
    //     }
    
    //     $product = Product::findOrFail($id);
    //     $cart = session()->get('product.cart', []);
    
    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $product->name,
    //             "unit" => $product->unit,
    //             "quantity" => 1,
    //             "unitPrice" => $product->unitPrice,
    //             "image" => $product->image_url
    //         ];
    //     }
    
    //     session()->put('product.cart', $cart);
    //     return redirect()->back()->with('success', 'Product has been added to cart!');
    // }


    public function ProductCart()
    {
        return view('product.cart');
    }
}
