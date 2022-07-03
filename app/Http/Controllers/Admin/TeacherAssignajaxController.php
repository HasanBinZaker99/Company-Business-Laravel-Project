<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherAssignajaxController extends Controller
{
    public function teacherDesignation(Request $request)
    {
        $parent_id = $request->teacherID;
        $teacherdegination = Teacher::with('designation')->where('teachers.id', $parent_id)->get();
        return response()->json(['teacherdegination' => $teacherdegination]);
    }
}
