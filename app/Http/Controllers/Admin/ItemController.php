<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.item.index', [
            'items' => Item::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        return view('admin.item.create', [
            'categories' => Category::all()
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
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $current_Date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $current_Date . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/item')) {

                mkdir('uploads/item', 077, true);
            }
            $image->move('uploads/item', $imageName);
        } else {
            $imageName = 'default.png';
        }

        $item = new item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->category_id = $request->category;
        $item->image = $imageName;

        $item->save();
        return redirect()->route('item.index');
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
        // $item = item::find($id);
        // $categories = Category::all();
        return view('admin.item.edit', [
            'item' => item::find($id),
            'categories' => Category::all()
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
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required'
        ]);
        $item =  Item::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $current_Date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $current_Date . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/item')) {

                mkdir('uploads/item', 077, true);
            }
            $image->move('uploads/item', $imageName);
        } else {
            $imageName = $item->image;
        }



        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->category_id = $request->category;
        $item->image = $imageName;

        $item->save();
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (file_exists('uploads/item' . $item->image)) {
            unlink('uploads/item' . $item->image);
        };
        $item->delete();
        return redirect()->route('item.index');
    }
}
