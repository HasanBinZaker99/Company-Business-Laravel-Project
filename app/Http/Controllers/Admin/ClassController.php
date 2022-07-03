<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Teacherassign;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        // $class = Teacherassign::withCount('batch.admission')->with('batch.admission', 'teacher', 'coursedetail')->get();
        $class = Batch::withCount('admission')->with('teacherassign', 'admission')->get();
        foreach ($class as $batchadmit) {
            $batchadmit->admission_count;
        }
        // dd($class);
        return view('admin.class.class-view', compact('class'));
    }

    public function show($id)
    {
        $class = Teacherassign::with('batch.admission', 'coursedetail', 'teacher')->where('teacherassigns.batch_id', $id)->first();
        $singleclass = Teacherassign::with('batch.admission', 'coursedetail.coursetopic')->where('teacherassigns.batch_id', $id)->get();
        // $singleclass = Batch::with('coursetopicdetails')->where('batches.id', $id)->get();
        // dd($singleclass);
        return view('admin.class.class-show', compact('class', 'singleclass'));
    }
}
