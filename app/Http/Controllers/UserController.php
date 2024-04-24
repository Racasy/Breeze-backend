<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the authenticated user's name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
<<<<<<< HEAD
        return response()->json(['name' => $request->user()->name,
                                 'email' => $request->user()->email, 
                                 'company_id' => $request->user()->company_id, 
                                ]);
    }

    public function getUserData() {
        $user = auth()->user();
        $user->load('company:id,company_name');
    
        return response()->json($user);
=======
        return response()->json(['name' => $request->user()->name]);
>>>>>>> ed3fe74c0edc0b9289cfd240b85781e01a2ec818
    }
}
