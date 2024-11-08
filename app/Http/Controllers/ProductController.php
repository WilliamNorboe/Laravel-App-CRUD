<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('products.index', ['products'=>$products]);
    }

    public function show($slug){
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('products.show', ['product'=> $product]);
        
    }
    
    public function create(){

        return view('products.create');

    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable|string'
        ]);

        $data['description'] = $data['description'] ?? null;

        $newProduct = Product::create($data);
        return redirect(route('product.index'));
    }
    public function edit(Product $product){
        return view("products.edit", ['product' => $product]);
    }

    public function updateProd(Request $request, Product $product){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $data['description'] = $data['description'] ?? null;
        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');

    }

    public function destroy(Request $request, Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }

}
