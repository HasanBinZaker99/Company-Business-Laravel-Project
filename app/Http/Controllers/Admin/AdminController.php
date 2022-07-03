<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Coursedetail;
use App\Models\Noticeboard;
use App\Models\Teacherassign;
use Rawilk\Printing\Facades\Printing;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notice = Noticeboard::orderBy('id', 'DESC')->paginate(3);
        $course = Coursedetail::with('course', 'teacher')->get();
        $teacherassign = Teacherassign::with('batch', 'teacher', 'coursedetail')->get();
        return view('admin.body.home', compact('notice', 'course', 'teacherassign'));
    }

    public function singlenotice($id)
    {
        $singlenotice = Noticeboard::where('noticeboards.id', $id)->first();
        return view('admin.body.single-notice-page', compact('singlenotice'));
    }
}
