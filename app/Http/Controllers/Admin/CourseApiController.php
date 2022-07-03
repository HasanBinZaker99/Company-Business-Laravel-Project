<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseApiController extends Controller
{
    public function coursePrice(Request $request)
    {
        $parent_id = $request->courseID;
        $coursedetails = Course::where('courses.id', $parent_id)->get();
        return response()->json(['coursedetails' => $coursedetails]);
    }

    public function studentDetails(Request $request)
    {
        $parent_id = $request->studentID;
        $admissiondetails = Admission::where('admissions.id', $parent_id)->get();
        return response()->json(['admissiondetails' => $admissiondetails]);
    }

    public function userInfo(Request $request)
    {
        $parent_id = $request->userID;
        $userInfo = User::where('users.id', $parent_id)->get();
        return response()->json(['userInfo' => $userInfo]);
    }

    public function admissionDetails(Request $request)
    {
        $parent_id = $request->admissionID;
        $admissionID = Admission::with('course', 'batch')->where('admissions.id', $parent_id)->get();
        return response()->json(['admissionID' => $admissionID]);
    }
}
