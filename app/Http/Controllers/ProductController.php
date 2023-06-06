<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;



class ProductController extends Controller
{
    public function indexusers(){
        return view('user.product2',[
            'products'=> Product::latest()->filter(request(['search']))->simplePaginate(3)
                
           
        ]);
    }
    
   public function index(){
    return view('admin.product2',[
        'products'=> Product::latest()->filter(request(['search']))->simplePaginate(3)
			
       
    ]);
   }
   public function index2(){
    return view('admin.products',[
        'products'=> auth()->user()->products2()->simplePaginate(5)
			
       
    ]);
   }
   public function show(Product $product){
    return view('admin.product',[
        'product'=>$product
    ]);
			
       
   
   }
   public function create(){
    return view('admin.create');
			
       
   
   }
   public function store(Request $request){
    $formFields = $request->validate([
        'name'=>'required',
        'unit'=>'required',
        'category'=>'required',
        'unitPrice'=>'required',
       
    ]);
    $formFields['user_id']=auth()->id();
    if($request->hasFile('image_url')){
        $formFields['image_url']=$request->file('image_url')->store('images','public');
        }
    Product::create($formFields);
			
    return redirect('/')->with('success','New product save');
       
   
   }
   public function edit(Product $product){
   
    if(auth()->id()==$product->user_id){
            return view('admin.edit',[
            'product'=>$product
        ]);
       }else{
        abort(403,'Invalid Acton');
       }
    
    
}
public function update(Product $product,Request $request){
    
    if(auth()->id()==$product->user_id){
        $formFields = $request->validate([
            'name'=>'required',
            'unit'=>'required',
            'category'=>'required',
            'unitPrice'=>'required',
        
           
        ]);
        
          if($request->hasFile('image_url')){
             File::delete('storage/'.$product->image_url);
             $formFields['image_url']=$request->file('image_url')->store('images','public');
            }else{
                
            }
            
        $product->update($formFields);
       }else{
        abort(403,'Invalid Acton');
       }
       

			
    return redirect('/')->with('success','New product updated');
       
   
   }
public function destroy(Product $product){
     
   if(auth()->id()==$product->user_id){
    if(File::exists('storage/'.$product->image_url)){
    File::delete('storage/'.$product->image_url);

   }
    $product->delete();
   }else{
    abort(403,'Invalid Acton');
   }
   
    
   return redirect('/index2')->with('success','New product deleted');
   
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