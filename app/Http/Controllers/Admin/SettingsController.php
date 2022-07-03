<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.settings-view', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.settings-create');
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
            'message' => 'Settings Information Add Successfully',
            'alert-type' => 'success',
        ];

        $image = $request->file('company_logo');
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(500, 500);
        $image_resize->save('company-logo/' . $filename);

        $settings = new Setting([
            'title' => $request->get('title'),
            'company_name' => $request->get('company_name'),
            'company_phone' => $request->get('company_phone'),
            'company_email' => $request->get('company_email'),
            'company_logo' => $filename,
            'web_link' => $request->get('web_link'),
            'address' => $request->get('address'),
        ]);

        $settings->save();

        return redirect('home/settings')->with($notification);
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
        $settings = Setting::where('settings.id', $id)->first();
        return view('admin.settings.settings-update', compact('settings'));
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
            'message' => 'Setting Update Successfully',
            'alert-type' => 'success',
        ];
        $settings = Setting::find($id);
        if ($request->hasfile('company_logo')) {

            $image = $request->file('company_logo');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(500, 500);
            $image_resize->save('company-logo/' . $filename);
            $settings->company_logo = $filename;
        }
        $settings->title = $request->title;
        $settings->company_name = $request->company_name;
        $settings->company_phone = $request->company_phone;
        $settings->company_email = $request->company_email;
        $settings->web_link = $request->web_link;
        $settings->address = $request->address;

        $settings->save();

        return redirect('home/settings')->with($notification);
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
            'message' => 'Setting Delete successfully',
            'alert-type' => 'success',
        ];
        $settings = Setting::findOrFail($id);
        $settings->delete();
        return redirect('home/settings')->with($notification);
    }
}
