<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        return view('admin.course.course-view', compact('course'));
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
            'message' => 'Course Add Successfully',
            'alert-type' => 'success',
        ];

        $image = $request->file('course_image');
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(1280, 850);
        $image_resize->save('course-image/' . $filename);

        $course = new Course([
            'course_name' => $request->get('course_name'),
            'course_price' => $request->get('course_price'),
            'course_length' => $request->get('course_length'),
            'course_lessons' => $request->get('course_lessons'),
            'long_details' => $request->get('long_details'),
            'course_image' => $filename,
        ]);

        $course->save();

        return redirect('home/course-add')->with($notification);
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
        $course = Course::where('courses.id', $id)->first();
        return view('admin.course.course-update', compact('course'));
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
        $course = Course::find($id);
        if ($request->hasfile('course_image')) {

            $image = $request->file('course_image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(1280, 850);
            $image_resize->save('course-image/' . $filename);
            $course->course_image = $filename;
        }
        $course->course_name = $request->course_name;
        $course->course_price = $request->course_price;
        $course->course_length = $request->course_length;
        $course->course_lessons = $request->course_lessons;
        $course->long_details = $request->long_details;

        $course->save();

        return redirect('home/course-add')->with($notification);
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
            'message' => 'Course Information Delete successfully',
            'alert-type' => 'success',
        ];
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('home/course-add')->with($notification);
    }
}
