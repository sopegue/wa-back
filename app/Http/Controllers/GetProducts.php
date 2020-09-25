<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Response; 

use Illuminate\Http\Request;

class GetProducts extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products= Product::where('title','ilike','%'.$request->title.'%')->get();
        if(!$products->isEmpty())
            return response($products, Response::HTTP_OK);
        return response()->json(['error' => 'NotFound'], Response::HTTP_OK);
    }
}
