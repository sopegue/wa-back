<?php

namespace App\Http\Controllers\Api\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Phone;
use App\Adresse;
use App\User;
use Illuminate\Http\Response; 

class MyAdressesController extends Controller
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
            $adr = $user->adresses;
            if(!$adr->isEmpty())
            {
                return response($adr, Response::HTTP_OK);
            }
        }
        return response()->json(['message' => 'Empty'], Response::HTTP_OK);
    }
}
