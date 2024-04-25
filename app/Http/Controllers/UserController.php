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
        return response()->json(['name' => $request->user()->name,
                                 'email' => $request->user()->email, 
                                 'company_id' => $request->user()->company_id, 
                                ]);
    }

    public function getUserData() {
        $user = auth()->user();
        $user->load('company:id,company_name,company_type,address,phone_number');
    
        return response()->json($user);
    }
}
