<?php

namespace App\Http\Controllers\Api\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Favrite;
use App\User;
use Illuminate\Http\Response; 

class MyFavoritesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::find($request->id);
        if($user)
        {
            $fav = $user->favorites;
            if($fav)
            {
                $ids = array();
                foreach ($fav as $value) {
                    array_push($ids,$value->product_id);
                }
                // $someprod = collect(Product::whereIn('id', $ids)->get());
                // if()
                $product = Product::whereIn('id', $ids)->get();
                if(!$product->isEmpty())
                {
                    foreach ($product as $prod) {
                        $prod->shop=$prod->shop->name;
                    }
                    return response($product, Response::HTTP_OK);
                }
            }
        }
        return response()->json(['message' => 'Empty'], Response::HTTP_OK);
    }
}
