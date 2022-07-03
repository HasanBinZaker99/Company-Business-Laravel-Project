<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designation = Designation::all();
        return view('admin.designation.designation-view', compact('designation'));
    }

    public function store(Request $request)
    {
        $notification = [
            'message' => 'Designation Add Successfully',
            'alert-type' => 'success',
        ];

        $designation = new Designation([
            'name' => $request->get('name'),
        ]);

        $designation->save();

        return redirect('home/designation')->with($notification);
    }

    public function destroy($id)
    {
        $notification = [
            'message' => 'Designation Delete successfully',
            'alert-type' => 'success',
        ];
        $designation = Designation::findOrFail($id);
        $designation->delete();
        return redirect('home/designation')->with($notification);
    }
}
