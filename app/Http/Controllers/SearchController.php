<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show($query)
    {
        $query = Input::get ( 'query' );
        $user = User::where('name','LIKE','%'.$query.'%')->orWhere('email','LIKE','%'.$query.'%')->get();
        if(count($user) > 0) 
        {
            return view('/users')->withDetails($user)->withQuery ( $query );
        }
        else
        {
            return view ('/users')->withMessage('No user(s) found. Try to search again');
        } 
    }
}
