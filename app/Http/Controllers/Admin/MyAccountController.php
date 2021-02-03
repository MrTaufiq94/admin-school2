<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MyAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.my_account.index', compact('user'));
    }

    public function edit_password()
    {
        $user = Auth::user();
        return view('admin.my_account.edit_password', compact('user'));
    }

    // public function update_password(Request $request)
    // {
    //     // $this->validate($request, [
    //     //     'name'      => 'required',
    //     //     'email'     => 'required|email|unique:users,email,'.$user->id
    //     // ]);

    //     $user = User::findOrFail(auth()->user()->id);
           
    //     // if($request->input('password') == "") {
    //     //     $user->update([
    //     //         'name'      => $request->input('name'),
    //     //         'email'     => $request->input('email')
    //     //     ]);
    //     // } else {
    //         $user->update([
    //             // 'name'      => $request->input('name'),
    //             // 'email'     => $request->input('email'),
    //             'password'  => bcrypt($request->input('password'))
    //         ]);
    //     // }

    //     if($user){
    //         //redirect dengan pesan sukses
    //         return redirect()->route('admin.my_account.edit_password')->with('toast_success','Your password has been updated!');
    //     }else{
    //         //redirect dengan pesan error
    //         return redirect()->route('admin.my_account.edit_password')->with('toast_error','Your password failed to update!');
    //     }

    // }

    public function update_profile(Request $request)
    {
        $this->validate($request, [
            // 'name'      => 'required',
            // 'email'     => 'required|email|unique:users,email,'.$user->id,
            'ic_no'     => 'required|numeric',
            'phone'     => 'nullable|numeric',
            'phone2'    => 'nullable|numeric'
        ]);

        $user = User::find(auth()->user()->id);
        
        $user->update([
            // 'name'         => $request->input('name'),
            // 'email'        => $request->input('email'),
            'dob'      => $request->input('dob'),
            'gender'   => $request->input('gender'),
            'phone'    => $request->input('phone'),
            'phone2'   => $request->input('phone2'),
            'address'  => $request->input('address'),
        ]);
        
        if($user) {
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Updated!'
            // ], 200);
            return redirect()
            ->route('admin.my_account.index')
            ->with('toast_success','Your profile has been updated!');
        } else {
            // return response()->json([
            //     'success' => false,
            //     'message' => 'Failed to Updated!'
            // ], 500);
            return redirect()
            ->route('admin.my_account.index')
            ->with('toast_error','Your profile failed to update!');
        }
    }
}
