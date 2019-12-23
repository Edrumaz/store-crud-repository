<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\User;

class UserSearchController extends Controller
{
   public function index(Request $request)
   {
      if(!empty($users = $this->searchName($request)))
      {
         return view('users.index',  compact('users'));
      }
      else if (!empty($users = $this->searchEmail($request)))
      {
         return view('users.index',  compact('users'));
      }
      else {
         return null;
      }
   }

   public function searchName($data)
   {
      request()->validate([
         'searchValue' => ['required'],
      ]);

      $users = User::select("*")
      ->where("name","LIKE",'%'.$data->searchValue.'%')
      ->paginate(7);

      if (!empty($users)) {
         return $users;
      }
      else { 
         return null;
      }  
   }

   public function searchEmail($data)
   {
      request()->validate([
         'searchValue' => ['required'],
      ]);

      $products = User::select("*")
      ->where("email","LIKE",'%'.$data->searchValue.'%')
      ->paginate(7);
      
      if (!empty($users)) {
         return $users;
      }
      else { 
         return null;
      }
   }

   public function get()
   {
      return redirect('/users');
   }
}
