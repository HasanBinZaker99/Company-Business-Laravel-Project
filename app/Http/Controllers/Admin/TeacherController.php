<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::with('designation')->get();
        return view('admin.teacher.teacher-view', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'message' => 'Teacher Add Successfully',
            'alert-type' => 'success',
        ];

        $image = $request->file('teacher_image');
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(350, 350);
        $image_resize->save('teacher-image/' . $filename);

        $teacher = new Teacher([
            'teacher_name' => $request->get('teacher_name'),
            'teacher_phone' => $request->get('teacher_phone'),
            'teacher_email' => $request->get('teacher_email'),
            'teacher_address' => $request->get('teacher_address'),
            'teacher_skill' => $request->get('teacher_skill'),
            'teacher_image' => $filename,
            'teacher_about' => $request->get('teacher_about'),
            'designation_id' => $request->get('teacher_designation'),
        ]);
        // dd($product);
        $teacher->save();

        return redirect('home/teacher')->with($notification);
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
        $designation = Designation::all();
        $teacher = Teacher::where('teachers.id', $id)->first();
        return view('admin.teacher.teacher-update', compact('teacher', 'designation'));
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
        $notification = [
            'message' => 'Teacher Details Update Successfully',
            'alert-type' => 'success',
        ];
        $teacher = Teacher::find($id);
        if ($request->hasfile('teacher_image')) {

            $image = $request->file('teacher_image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(350, 350);
            $image_resize->save('teacher-image/' . $filename);
            $teacher->teacher_image = $filename;
        }
        $teacher->teacher_name = $request->teacher_name;
        $teacher->teacher_email = $request->teacher_email;
        $teacher->teacher_phone = $request->teacher_phone;
        $teacher->designation_id = $request->teacher_designation;
        $teacher->teacher_address = $request->teacher_address;
        $teacher->teacher_skill = $request->teacher_skill;
        $teacher->teacher_about = $request->teacher_about;

        $teacher->save();

        return redirect('home/teacher')->with($notification);
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
            'message' => 'Teacher Delete successfully',
            'alert-type' => 'success',
        ];
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect('home/teacher')->with($notification);
    }
}
