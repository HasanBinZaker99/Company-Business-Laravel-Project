<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\StudentEmail;
use Illuminate\Support\Facades\Mail;

class StudentEmailController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.email.email-view', compact('users'));
    }

    public function sendMail(Request $request)
    {
        $users = User::whereIn("id", $request->ids)->get();

        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new StudentEmail($user));
        }

        return response()->json(['success' => 'Send email successfully.']);
    }
}
