<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chefs;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.chefs.index', [
            'chefs' =>Chefs::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chefs.create', [
            // 'categories' => Category::all()
        ]);
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
            'image' => 'required',
            'social_link_twitter' => 'required',
            'social_link_facebook' => 'required',
            'social_link_instagram' => 'required',
            'social_link_linkedin' => 'required',
            
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $current_Date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $current_Date . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/chefs')) {

                mkdir('uploads/chefs', 077, true);
            }
            $image->move('uploads/chefs', $imageName);
        } else {
            $imageName = 'default.png';
        }

        $chefs = new Chefs();
        $chefs->name = $request->name;
        $chefs->designation = $request->designation;
        $chefs->image = $imageName;
        $chefs->social_link_twitter = $request->social_link_twitter;
        $chefs->social_link_facebook = $request->social_link_facebook;
        $chefs->social_link_instagram = $request->social_link_instagram;
        $chefs->social_link_linkedin = $request->social_link_linkedin;

        $chefs->save();

        Toastr::success( $chefs->name.'  Chef Has been Created', 'Creates', ["positionClass" => "toast-top-right"]);
        return redirect()->route('chefs.index');
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
        return view('admin.chefs.edit', [
            'chef' => Chefs::find($id),
        ]);
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
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            // 'image' => 'required',
            'social_link_twitter' => 'required',
            'social_link_facebook' => 'required',
            'social_link_instagram' => 'required',
            'social_link_linkedin' => 'required',
            
        ]);
        $chefs =  Chefs::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $current_Date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $current_Date . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/chefs')) {

                mkdir('uploads/chefs', 077, true);
            }
            $image->move('uploads/chefs', $imageName);
        } else {
            $imageName = $chefs->image;
        }



        $chefs->name = $request->name;
        $chefs->designation = $request->designation;
        $chefs->image = $imageName;
        $chefs->social_link_twitter = $request->social_link_twitter;
        $chefs->social_link_facebook = $request->social_link_facebook;
        $chefs->social_link_instagram = $request->social_link_instagram;
        $chefs->social_link_linkedin = $request->social_link_linkedin;

        $chefs->save();
        Toastr::success( $chefs->name.'  Chef Has been Updated', 'Updated', ["positionClass" => "toast-top-right"]);
        return redirect()->route('chefs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chefs = Chefs::find($id);
        if (file_exists('uploads/chefs' . $chefs->image)) {
            unlink('uploads/chefs' . $chefs->image);
        };
        $chefs->delete();
        Toastr::error( $chefs->name.'  Chef Has been Deleted', 'Deleted', ["positionClass" => "toast-top-right"]);
        return redirect()->route('chefs.index');
    }
}
