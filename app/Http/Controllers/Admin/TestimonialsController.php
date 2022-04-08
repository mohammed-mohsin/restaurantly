<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.testimonials.index',[
            'reviews' =>Testimonials::where('email',Auth::user()->email )->latest()->get(),
        ]);
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
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'message' => 'required',
            
        ]);

        $testimonials=new Testimonials();
        $testimonials->name = $request->name;
        $testimonials->designation = $request->designation;
        $testimonials->message = $request->message;
        $testimonials->email = Auth::user()->email;
        $testimonials->profile_photo_path = Auth::user()->profile_photo_path;
        $testimonials->save();
        Toastr::success('Review Has Been Given', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('testimonials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.testimonials.index',[ 
            'reviews' =>Testimonials::where('email',Auth::user()->email )->latest()->get(),
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonials = Testimonials::find($id);
        
        $testimonials->delete();

        Toastr::error('Review Has Been Deleted', 'Deleted', ["positionClass" => "toast-top-right"]);
        return redirect()->route('testimonials.index');
    }
}
