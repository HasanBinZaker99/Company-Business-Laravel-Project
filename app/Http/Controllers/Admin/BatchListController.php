<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;

class BatchListController extends Controller
{
    public function index()
    {
        $batchlist = Batch::withCount('admission')->with('teacherassign', 'admission')->get();
        foreach ($batchlist as $batchadmit) {
            $batchadmit->admission_count;
        }
        return view('admin.batch.batch-lists', compact('batchlist'));
    }
}
