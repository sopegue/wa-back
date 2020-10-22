<?php

namespace App\Http\Controllers\Api\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Favrite;
use App\User;
use Illuminate\Http\Response; 
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DelMePicController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user=User::find($request->id);
        $oldpic=$user->profile;
        Storage::delete('public/users/'.$request->id.'//profile/'.$oldpic);
        $user->profile = null;
        $user->save();
        return  response()->json(['done' => 'yes'], Response::HTTP_OK);
    }
}
