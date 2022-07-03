<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Couresetopic;
use App\Models\Course;
use App\Models\Coursedetail;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseDetails = Coursedetail::with('course', 'teacher')->get();
        return view('admin.course-details.course-details-view', compact('courseDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::all();
        $teacher = Teacher::all();
        return view('admin.course-details.course-details-create', compact('course', 'teacher'));
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
            'message' => 'Course Details Add Successfully',
            'alert-type' => 'success',
        ];

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'company_name' => 'required',
        //     'designation' => 'required',
        //     'contact' => ['required', 'min:11', 'max:11'],
        //     'address' => 'required',
        // ]);

        $courseDetails = new Coursedetail([
            'course_id' => $request->get('course_id'),
            'teacher_id' => $request->get('teacher_id'),
        ]);

        $courseDetails->save();

        if ($request->module_class[0]) {
            foreach ($request->module_name as $key => $data) {
                $coursetopic = new Couresetopic();

                $coursetopic->module_name = $data;
                $coursetopic->module_class = $request->module_class[$key];
                $coursetopic->coursedetail_id = $courseDetails->id;

                $coursetopic->save();
            };
        }

        return redirect('home/course-details')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseDetails = Coursedetail::with('course', 'teacher', 'coursetopic')->where('coursedetails.id', $id)->first();
        return view('admin.course-details.course-details-show', compact('courseDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::all();
        $teacher = Teacher::all();
        $courseDetails = Coursedetail::with('course', 'teacher', 'coursetopic')->where('coursedetails.id', $id)->first();
        $courseDetail = Coursedetail::with('course', 'teacher', 'coursetopic')->where('coursedetails.id', $id)->get();
        return view('admin.course-details.course-details-update', compact('course', 'teacher', 'courseDetails', 'courseDetail'));
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
            'message' => 'Course Details Update successfully',
            'alert-type' => 'success',
        ];
        $courseDetails = Coursedetail::find($id);

        $courseDetails->course_id = $request->course_id;
        $courseDetails->teacher_id = $request->teacher_id;

        $courseDetails->update();

        if ($request->module_class) {
            foreach ($request->module_name as $key => $data) {
                $classID = NULL;
                if (isset($request->module[$key])) {
                    $classID = $request->module[$key];
                }
                Couresetopic::updateOrCreate(

                    ['id' => $classID],
                    [
                        'module_name' => $data,
                        'module_class' => $request->module_class[$key],
                        'coursedetail_id' => $courseDetails->id
                    ]
                );
            };
        }

        return redirect('home/course-details')->with($notification);
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
            'message' => 'Course Details Delete successfully',
            'alert-type' => 'success',
        ];
        $courseDetails = Coursedetail::findOrFail($id);
        $courseDetails->delete();
        return redirect('home/course-details')->with($notification);
    }
}
