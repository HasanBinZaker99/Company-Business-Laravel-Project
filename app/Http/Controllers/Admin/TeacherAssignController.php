<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Coursedetail;
use App\Models\Teacher;
use App\Models\Teacherassign;
use Illuminate\Http\Request;

class TeacherAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacherassign = Teacherassign::with('batch', 'teacher', 'coursedetail')->get();
        return view('admin.teacher-assign.teacher-assign-view', compact('teacherassign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch = Batch::all();
        $teacher = Teacher::all();
        $coursedetail = Coursedetail::all();
        $teacherassign = Teacherassign::all();
        return view('admin.teacher-assign.teacher-assign-create', compact('teacherassign', 'batch', 'teacher', 'coursedetail'));
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
            'message' => 'Teacher Assign Successfully',
            'alert-type' => 'success',
        ];

        $course = new Teacherassign([
            'batch_id' => $request->get('batch'),
            'teacher_id' => $request->get('teacher'),
            'coursedetail_id' => $request->get('coursedetail'),
            'designation' => $request->get('designation'),
        ]);

        $course->save();

        return redirect('home/teacher-assign')->with($notification);
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
        $batch = Batch::all();
        $teacher = Teacher::all();
        $coursedetail = Coursedetail::all();
        $teacherassign = Teacherassign::with('batch', 'teacher')->where('teacherassigns.id', $id)->first();
        return view('admin.teacher-assign.teacher-assign-update', compact('teacherassign', 'batch', 'teacher', 'coursedetail'));
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
            'message' => 'Notice Information Update Successfully',
            'alert-type' => 'success',
        ];
        $teacherassign = Teacherassign::find($id);

        $teacherassign->batch_id = $request->batch;
        $teacherassign->teacher_id = $request->teacher;
        $teacherassign->coursedetail_id = $request->coursedetail;
        $teacherassign->designation = $request->designation;

        $teacherassign->save();

        return redirect('home/teacher-assign')->with($notification);
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
            'message' => 'Assign Teacher Delete successfully',
            'alert-type' => 'success',
        ];
        $teacherassign = Teacherassign::findOrFail($id);
        $teacherassign->delete();
        return redirect('home/teacher-assign')->with($notification);
    }
}
