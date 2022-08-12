<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // check id user is logged in 
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('users', [
            'users' => User::paginate(10)
        ]);
    }


    // user details update
    public function updateUser(Request $request)
    {
        // check id user is logged in 
        if (!Auth::check()) {
            return redirect()->route('login');
        }
       
        $user = User::findOrFail(base64_decode($request->id));

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);

            try {
                $user->name = $request->name;
                $user->email = $request->email;
               
                $user->save();
                Alert::success('Success', 'User updated successfully');
                return redirect()->route('users')->with('success', 'User details updated successfully');
            } catch (\Exception $e) {
                Alert::error('Error', 'Failed to update user');
                return back()->with('error', 'Failed to update user');
            }
        }
        return view('update_user', [
            'user' => $user
        ]);
    }

    // user delete
    public function deleteUser(Request $request, $id)
    {
        // check id user is logged in 
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = User::findOrFail(base64_decode($id));
       
        try {
            $user->delete();
            Alert::success('Success', 'User deleted successfully');
            return redirect()->route('users')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to delete user');
            return back()->with('error', 'Failed to delete user');
        }
    }

    // update passoword Column for user
    public function updatePassword(Request $request, $id)
    {
        // check id user is logged in 
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = User::findOrFail(base64_decode($id));
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required|confirmed',
            ]);
            try {
                $user->password = Hash::make($request->password);
                $user->save();
                Alert::success('Success', 'Password updated successfully');
                return redirect()->route('users')->with('success', 'Password updated successfully');
            } catch (\Exception $e) {
                Alert::error('Error', 'Failed to update password');
                return back()->with('error', 'Failed to update password');
            }
        }
    }

}
