<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coursedetail;
use Illuminate\Http\Request;

class CourseViewController extends Controller
{
    public function index()
    {
        $courses = Coursedetail::with('course', 'teacher')->get();
        return view('admin.course-view.all-course-view', compact('courses'));
    }

    public function courseInfo($id)
    {
        $courseInfo = Coursedetail::with('course', 'teacher', 'coursetopic')->where('coursedetails.id', $id)->first();
        return view('admin.course-view.all-course-info', compact('courseInfo'));
    }
}
