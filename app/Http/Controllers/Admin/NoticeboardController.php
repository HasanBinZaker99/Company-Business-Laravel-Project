<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticeboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;

class NoticeboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = Noticeboard::all();
        return view('admin.noticeboard.notice-view', compact('notice'));
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
            'message' => 'Notice Add Successfully',
            'alert-type' => 'success',
        ];

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(238, 158);
        $image_resize->save('notice-board/' . $filename);

        $teacher = new Noticeboard([
            'short_title' => $request->get('short_title'),
            'long_title' => $request->get('long_title'),
            'date' => $request->get('date'),
            'user_id' => Auth::user()->id,
            'image' => $filename,
        ]);
        // dd($product);
        $teacher->save();

        return redirect('home/notice-board')->with($notification);
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
        $notice = Noticeboard::where('noticeboards.id', $id)->first();
        return view('admin.noticeboard.notice-update', compact('notice'));
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
            'message' => 'Notice Information Update Successfully',
            'alert-type' => 'success',
        ];
        $teacher = Noticeboard::find($id);
        if ($request->hasfile('image')) {

            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(238, 158);
            $image_resize->save('notice-board/' . $filename);
            $teacher->image = $filename;
        }
        $teacher->short_title = $request->short_title;
        $teacher->long_title = $request->long_title;
        $teacher->date = $request->date;

        $teacher->save();

        return redirect('home/notice-board')->with($notification);
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
            'message' => 'Notice Delete successfully',
            'alert-type' => 'success',
        ];
        $notice = Noticeboard::findOrFail($id);
        $notice->delete();
        return redirect('home/notice-board')->with($notification);
    }
}
