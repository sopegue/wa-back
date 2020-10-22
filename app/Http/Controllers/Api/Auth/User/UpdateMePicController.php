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
        $mypic=$request->file('file');
        $extension=$mypic->getClientOriginalExtension();
        $pp="user.{$extension}";
        if($user->profile != null) {
            $oldpic=$user->profile;
            Storage::delete('public/users/'.$request->id.'//profile/'.$oldpic);
            Storage::putFileAs('public/users/'.$request->id.'//profile/'.$pp, $mypic);
            $user->profile=$pp;
        }
        else {
            Storage::putFileAs('public/users/'.$request->id.'//profile/'.$pp, $mypic);
            $user->profile=$pp;
        }
        $user->save();
        return  response()->json(['done' => 'yes'], Response::HTTP_OK);
    }
}
