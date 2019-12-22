<?php

namespace App\Http\Controllers;
use App\Http\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index',  compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'sku' => ['integer', 'unique:products,sku'],
            'name' => ['required', 'min:3', 'max:100'],
            'quantity' => ['required'],
            'price' => ['required', 'numeric'],
            'description' => ['min:5', 'max:255'],
            'picture' => 'image'
        ]);

        if( $request->hasFile('picture'))
        { 
            $image = $request->file('picture');  
            $fileExtension = $image->getClientOriginalExtension();
            $destinationPath = '/img/products';
            $request->file('picture')->move($destinationPath, $request->file('picture')->getClientOriginalName());
            $file = (String) request('picture')->getClientOriginalName();

            Product::create([
                'name' => request('name'),
                'sku' => request('sku'),
                'quantity' => request('quantity'),
                'price' => request('price'),
                'description' => request('description'),
                'picture' => $file          
            ]);        
        } 
        else 
        {
            Product::create([
                'name' => request('name'),
                'sku' => request('sku'),
                'quantity' => request('quantity'),
                'price' => request('price'),
                'description' => request('description'),
                'picture' => "unavailable.jpg"            
            ]);            
        }
        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product)
    {
        request()->validate([
            'sku' => ['integer','unique:products,sku'],
            'name' => ['required', 'min:3', 'max:100'],
            'quantity' => ['required'],
            'price' => ['required', 'numeric'],
            'description' => ['min:5', 'max:255'],
            'picture' => 'image'
        ]);

        $productRepo = new ProductRepository(new Product());
        $findProduct = $productRepo->find($product->id);

        $data =[
            'name' => request('name'),
            'sku' => request('sku'),
            'quantity' => request('quantity'),
            'price' => request('price'),
            'description' => request('description'),
            'picture' => request('picture')     
        ];

        if ($findProduct->update($data)){
            return redirect('/products');
        }
        else {
            return "Error";
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
