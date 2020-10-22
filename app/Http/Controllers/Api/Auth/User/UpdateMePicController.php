<?php

namespace App\Http\Controllers\Api\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Favrite;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateMePicController extends Controller
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
        $extension = $request->file('file')->getClientOriginalExtension();
        $pp="user.{$extension}";
        if($user->profile != null) {
            Storage::delete('public/users/'.$request->id.'//profile/'.$user->profile);
            $request->file('file')->storeAs('public/users/'.$request->id.'//profile/',$pp);
        }
        else {
            $request->file('file')->storeAs('public/users/'.$request->id.'//profile/',$pp);
        }
        $user->profile=$pp;
        $user->save();
        return  response()->json(['done' => 'yes'], Response::HTTP_OK);
    }
}
