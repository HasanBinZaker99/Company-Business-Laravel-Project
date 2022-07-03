<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admission = Admission::with('course', 'batch')->get();
        return view('admin.admission.admission-view', compact('admission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::all();
        $batch = Batch::all();
        return view('admin.admission.admission-create', compact('course', 'batch'));
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
            'message' => 'Admission Complete Successfully',
            'alert-type' => 'success',
        ];

        $admission = new Admission([
            'studentID' => rand(111111, 999999),
            'course_id' => $request->get('course'),
            'batch_id' => $request->get('batch'),
            'date' => $request->get('admission_date'),
            'student_name' => $request->get('student_name'),
            'student_email' => $request->get('student_email'),
            'student_phone' => $request->get('student_phone'),
            'emergency_phone' => $request->get('emergency_phone'),
            'gender' => $request->get('gender'),
            'relationwith_emergency_phone' => $request->get('relationwith_emergency_phone'),
            'name_ofrelation_number' => $request->get('name_ofrelation_number'),
            'religion' => $request->get('religion'),
            'blood_group' => $request->get('blood_group'),
            'nid' => $request->get('nid'),
            'present_address' => $request->get('present_address'),
            'permanent_address' => $request->get('permanent_address'),
            'course_price' => $request->get('course_price'),
            'discount' => $request->get('discount'),
            'due' => $request->get('due'),
            'total_payment' => $request->get('total_payment'),
        ]);

        $admission->save();
        $settings = Setting::first();
        $admission = Admission::with('course', 'batch')->where('admissions.id', $admission->id)->first();

        return view('admin.admission.admission-show', compact('admission', 'settings'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settings = Setting::first();
        $admission = Admission::with('course', 'batch')->where('admissions.id', $id)->first();
        return view('admin.admission.admission-show', compact('admission', 'settings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $print = Admission::newPrintTask()
            ->printer($id)
            ->file('path_to_file.pdf')
            ->send();

        // $printJob->id(); // the id number returned from the print server
        $course = Course::all();
        $batch = Batch::all();
        $admission = Admission::with('course', 'batch')->where('admissions.id', $id)->first();
        return view('admin.admission.admission-update', compact('admission', 'batch', 'course', 'print'));
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
            'message' => 'Admission Information Update Successfully',
            'alert-type' => 'success',
        ];
        $admission = Admission::find($id);

        $admission->course_id = $request->course;
        $admission->batch_id = $request->batch;
        $admission->date = $request->admission_date;
        $admission->student_name = $request->student_name;
        $admission->student_email = $request->student_email;
        $admission->student_phone = $request->student_phone;
        $admission->emergency_phone = $request->emergency_phone;
        $admission->gender = $request->gender;
        $admission->relationwith_emergency_phone = $request->relationwith_emergency_phone;
        $admission->name_ofrelation_number = $request->name_ofrelation_number;
        $admission->religion = $request->religion;
        $admission->blood_group = $request->blood_group;
        $admission->nid = $request->nid;
        $admission->present_address = $request->present_address;
        $admission->permanent_address = $request->permanent_address;
        $admission->course_price = $request->course_price;
        $admission->discount = $request->discount;
        $admission->due = $request->due;
        $admission->total_payment = $request->total_payment;

        $admission->save();

        return redirect('home/admission')->with($notification);
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
            'message' => 'Admission Delete successfully',
            'alert-type' => 'success',
        ];
        $admission = Admission::findOrFail($id);
        $admission->delete();
        return redirect('home/admission')->with($notification);
    }
}
