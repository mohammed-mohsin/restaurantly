<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
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
        //
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
        
        // $this->validate($request, [
            
        // ]);
        $profile =  User::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $current_Date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $current_Date . '.' . $image->getClientOriginalExtension();
            if (!file_exists('storage')) {

                mkdir('storage', 077, true);
            }
            $image->move('storage', $imageName);
        } else {
            $imageName = Auth::user()->profile_photo_path;
        }



        $profile->name = $request->name;
        $profile->email = $request->email;
        // $profile->password = $request->price;
      
        $profile->profile_photo_path = $imageName;

        $profile->save();
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
