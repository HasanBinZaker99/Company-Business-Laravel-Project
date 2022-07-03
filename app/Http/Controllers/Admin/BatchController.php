<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch = Batch::all();
        return view('admin.batch.batch-view', compact('batch'));
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
            'message' => 'Batch Add Successfully',
            'alert-type' => 'success',
        ];

        $course = new Batch([
            'batch_name' => $request->get('batch_name'),
            'student_capacity' => $request->get('student_capacity'),
            'batchID' => rand(1111, 9999),
            'batch_time' => $request->get('batch_time'),
            'start_date' => $request->get('start_date'),
            'batch_session' => $request->get('batch_session'),
            'status' => $request->get('status'),
        ]);

        $course->save();

        return redirect('home/batch')->with($notification);
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
        $batch = Batch::where('batches.id', $id)->first();
        $batches = Batch::where('batches.id', $id)->get();
        return view('admin.batch.batch-update', compact('batches', 'batch'));
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
            'message' => 'Batch Information Update Successfully',
            'alert-type' => 'success',
        ];
        $course = Batch::find($id);

        $course->batch_name = $request->batch_name;
        $course->student_capacity = $request->student_capacity;
        $course->batch_time = $request->batch_time;
        $course->start_date = $request->start_date;
        $course->batch_session = $request->batch_session;
        $course->status = $request->status;

        $course->save();

        return redirect('home/batch')->with($notification);
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
            'message' => 'Batch Delete successfully',
            'alert-type' => 'success',
        ];
        $batch = Batch::findOrFail($id);
        $batch->delete();
        return redirect('home/batch')->with($notification);
    }
}
