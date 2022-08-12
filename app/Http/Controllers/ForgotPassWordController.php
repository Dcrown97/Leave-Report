<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPassWordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'email' => 'required|email',
            ]);

           try{
                $status = Password::sendResetLink(
                    $request->only('email'),
                    //  function (Message $message) {
                    //     $message->subject('Reset Password');
                    // }
                );
                return $status === Password::RESET_LINK_SENT
                    ?  redirect('/forgot-password-success')->with([
                        'status' => __($status)
                    ])
                    : back()->withErrors(['email' => __($status)]);
            }catch(\Exception $e){
                return back()->withErrors(['email' => 'Something went wrong, please try again later.']);
            }
           }
        return view('forgot-password.forgot-password');
    }

    public function forgotPasswordSuccess()
    {
        return view('forgot-password.forgot-password-success');
    }

    public function resetPassword(Request $request, $token)
    {
        return view('forgot-password.reset-password', [
            'token' => $token,
        ]);
    }

    public function updatePassword(Request $request)
    {

         $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
      ]);
 
     $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
     );
 
     return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with(['status'=> [__($status)]])
                : back()->withErrors(['email' => [__($status)]]);

    }
}
