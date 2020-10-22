<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

use App\User;
use App\Phone;
use App\Adresse;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|unique:users|max:255',

            'name' => 'required|max:255',

            'password' => 'required|min:8',

        ]);

        if($validator->fails()){

            return response()->json(['message' => 'Email already exists'], 200);

        }

        else {

            $user = new User();

            $user->email = $request->email;

            $user->name = $request->name;

            $user->password = Hash::make($request->password);

            if($request->input('surname') != "" ){

                $user->surname = $request->surname;

            }

            $user->save();

            if($request->input('phone') != "" ){
                
                $phone = new Phone(['phone' => $request->phone]);

                $phone->user_id = $user->id;

                $phone->save();
            }

            if($request->input('adress') != "" ){

                $adress = new Adresse(['adress' => $request->adress]);

                $adress->user_id = $user->id;

                $adress->save();
            }

            return response()->json(['message' => 'User registered with success'], 201);
        }
        
    }
}
