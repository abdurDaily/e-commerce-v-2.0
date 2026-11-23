<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //*SHOW 
    public function index()
    {
        return view('backend.profile.index');
    }

    //* UPDATE 
    public function update(Request $request)
    {
        $request->validate([
            'current_pass' => 'required',
            'new_pass' => 'required',
        ]);

        $user = Auth::user();

        $new_password = Hash::make($request->new_pass);

        if($user && Hash::check($request->current_pass, $user->password)){

            $user->update([
                'password' => $new_password,
            ]);

            return back()->with('success', 'password updated successfully!');
        }


        return "update data";
    }
}
