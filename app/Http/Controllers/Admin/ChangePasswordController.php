<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.password.password-view', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $notification = [
            'message' => 'Password Change Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect('home/change-password')->with($notification);
    }
}
