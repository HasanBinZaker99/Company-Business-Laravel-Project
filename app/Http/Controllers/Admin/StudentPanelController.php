<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image as Image;
use Spatie\Permission\Models\Role;

class StudentPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.student-panel.student-panel-view', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $admission = Admission::doesnthave('user')->get();
        return view('admin.student-panel.student-panel-create', compact('admission', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = [
            'message' => 'Student Panel Create Successfully',
            'alert-type' => 'success',
        ];

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'designation' => 'required',
        ]);

        if ($request->hasfile('course_image')) {

            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(350, 350);
            $image_resize->save('profile-image/' . $filename);
            $image->image = $filename;
        }

        $studentpanel = new User([
            'admission_id' => $request->get('admission'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'designation' => ucfirst($request->get('designation')),
            'address' => $request->get('address'),
        ]);

        if ($request->roles) {
            $studentpanel->assignRole($request->roles);
        }

        $studentpanel->save();

        return redirect('home/student-panel')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = [
            'message' => 'Student Panel Delete successfully',
            'alert-type' => 'success',
        ];
        $studentpanel = User::findOrFail($id);
        $studentpanel->delete();
        return redirect('home/student-panel')->with($notification);
    }
}
