<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showRequestForm()
    {
        return view('forgot_password');
    }

    public function update(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if(!empty($user)){
            $data = [
                'email' => $request->email,
                'updated_at' => now(),
            ];

            // Only update password if provided
            if (!empty($request->password)) {
                $data['password'] = Hash::make($request->password);
            }

            DB::table('users')->where('email', $request->email)->update($data);

            return redirect()->route('home');
        }
        else{
            return redirect()->back()->withErrors([
                'error' => 'Email not found in system'
            ]);
        }
    }
}