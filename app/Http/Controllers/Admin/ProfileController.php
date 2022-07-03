<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.profile-view');
    }

    public function update(Request $request, $id)
    {
        $notification = [
            'message' => 'Profile Update Successfully',
            'alert-type' => 'success',
        ];
        $profile = User::find($id);
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(350, 350);
            $image_resize->save('profile-image/' . $filename);
            $profile->image = $filename;
        }
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->address;

        $profile->save();

        return redirect('home/profile')->with($notification);
    }
}
