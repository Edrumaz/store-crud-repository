<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\ProductRepository;
use App\Http\Exceptions\NotFoundException;
use App\Product;

class ProductApiController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'sku' => $request->sku,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'description' => $request->description,
                'picture' => $request->picture,
            ];

            $productRepository = New ProductRepository(new Product());
            $product = $productRepository->store($data);

            $response = ['data' => 'Product created'];
            $code = 201;

            return response()->json($response, $code);
        }
        catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    public function show($id) : Product
    {
        try {
            return Product::findOrFail($id);
        }
        catch (ModelNotFoundException $e){
            throw new NotFoundException ($e);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $productRepository = New ProductRepository(new Product());
            $product = $productRepository->find($request->id);
            $product->delete();

            return response()->json(['data' => 'Product deleted'], 200);
        }
        catch (Exception $e){
            return response()->json(['data' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request)
    {
        try{
            $data =[
                'sku' => $request->sku,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'description' => $request->description,
                'picture' => $request->picture,
            ];

            $productRepository = new ProductRepository(new Product());
            $product = $productRepository->find($request->id);
            $updateProduct = $product->update($data);
        
            if ($updateProduct) {
                $response = ['data' => 'Product updated'];
                $code = 200;

                return response()->json($response, $code);
            }
        }
        catch (\Exception $e) {
            if ($e instanceof NotFoundException) {
                $code = 404;
                $message = ['date' => 'Not found'];
            }
            else {
                $code = 406;
                $message = ['data' => $e];
            }
            return response()->json($message, $code);
        }
    }
}
