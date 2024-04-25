<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forgot');
    }

    public function sendPasswordResetEmail(Request $request)
    {
        $email = null;

        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $otp = mt_rand(1000, 9999);
            $user->otp = $otp;
            $user->otp_expire = now()->addMinutes(10); // OTP expires in 10 minutes
            $user->save();
            $email = $user->email;

            try {
                // Send OTP via email
                Mail::to($user->email)->send(new PasswordResetMail($otp));
                return view('auth.verifyOtp', compact('email'))->with('status', 'OTP sent to your email address. OTP is valid for 10 minutes.');
            } catch (\Exception $e) {
                // Log the error
                Log::error('Error sending password reset email: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Failed to send OTP. Please try again later.');
            }
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    public function verify_otp(Request $request)
    {
        $validatedData = $request->validate([
            'num1' => 'required',
            'num2' => 'required',
            'num3' => 'required',
            'num4' => 'required',
            'email' => 'required|email',
        ]);

        if ($validatedData) {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $otp = $user->otp;
                $otp_expire = $user->otp_expire;

                // Concatenate the OTP digits entered by the user
                $enteredOtp = $request->num1 . $request->num2 . $request->num3 . $request->num4;

                // Check if the entered OTP matches the stored OTP and it's not expired
                if ($otp === $enteredOtp && $otp_expire > now()) {
                    // Clear OTP and OTP expiration time after successful verification
                    $user->otp = null;
                    $user->otp_expire = null;
                    $user->save();

                    // Assign email to a variable
                    $email = $user->email;

                    // Redirect to the reset password view with email included
                    return view('auth.resetPassword', compact('user', 'email'));
                } else {
                    // Invalid OTP or OTP expired, redirect back with error message and include email
                    return redirect()->back()->with('error', 'Invalid OTP. Please try again.')->withInput($request->only('email'));
                }
            } else {
                // User not found, redirect back with error message and include email
                return redirect()->back()->with('error', 'User not found.')->withInput($request->only('email'));
            }
        } else {
            // Validation failed, redirect back with error message and include email
            return redirect()->back()->withErrors($validatedData)->withInput($request->only('email'));
        }
    }

    public function create_new_password(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validatedData) {
            $user = User::where('email', $validatedData['email'])->first();

            if ($user) {
                $user->password = bcrypt($validatedData['password']);
                $user->otp = null;
                $user->otp_expire = null;
                $user->simple_password = $validatedData['password'];
                $user->save();

                return redirect()->route('login')->with('success', 'Password reset successfully.');
            }
        }

        //     return redirect()->back()->with('error', 'Password reset failed.')->withInput($validatedData)->with('email', $request->email);
        dd('not vaild');
    }

    public function verify_otp_page()
    {
        return view('auth.login');
    }
}
