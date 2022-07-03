<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionListsController extends Controller
{
    public function index()
    {
        $admission = Admission::with('course', 'batch')->get();
        return view('admin.admission.admission-lists', compact('admission'));
    }
}
