<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Product;

class ProductSearchController extends Controller
{
   public function index(Request $request)
   {
      if(($products = $this->searchName($request)) != null)
      {
         return view('products.index',  compact('products'));
      }
      else if (($products = $this->searchSku($request)) != null)
      {
         return view('products.index',  compact('products'));
      }
      else {
         return redirect('/products')->with->error(404);
      }
   }

   public function searchName($data)
   {
      request()->validate([
         'searchValue' => ['required'],
      ]);

      $products = Product::select("*")
      ->where("name","LIKE",'%'.$data->searchValue.'%')
      ->paginate(7);

      if (!empty($products)){
         return $products;
      }
      else {
         return null;
      } 
   }

   public function searchSku($data)
   {
      request()->validate([
         'searchValue' => ['required'],
      ]);

      $products = Product::select("*")
      ->where("sku","LIKE",'%'.$data->searchValue.'%')
      ->paginate(7);
      
      if (!empty($products)){
         return $products;
      }
      else {
         return null;
      }
   }
   public function get()
   {
      return redirect('/products');
   }
}
