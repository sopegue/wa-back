<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Response; 

use Illuminate\Http\Request;

class GetAllProductsTitle extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $productsTitle= Product::all('title');
        return response($productsTitle, Response::HTTP_OK);
    }
}
