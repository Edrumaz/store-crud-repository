<?php

namespace App\Http\Controllers;
use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\NotFoundException;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);

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
            'picture' => ['image'], ['mimes:jpeg,png,jpg,gif,svg'], ['max:2048']
        ]);

        if( $request->hasFile('picture'))
        {
            $image = $request->file('picture');
            $name = time().'.'.$image->getClientOriginalExtension();            
            $destinationPath = public_path('/img/products');   
            $image->move(public_path('img/products'), $name);

            Product::create([
                'name' => request('name'),
                'sku' => request('sku'),
                'quantity' => request('quantity'),
                'price' => request('price'),
                'description' => request('description'),          
            ]);
            
            $productRepo = new ProductRepository(new Product());
            $findProduct = Product::orderBy('created_at', 'desc')->first();

            $data = [
                'picture' => "$name"
            ];

            if ($findProduct->update($data)){
                return redirect('/products');
            }
            else {
                return redirect('/products');
            }
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
        dd($product);
        return view('products.show', compact('product'));
    }
}
