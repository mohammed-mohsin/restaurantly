<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function home()
    {
        return view('index', [
            'categories' => Category::all(),
            'items' => Item::all(),
            'testimonials'=>Testimonials::all(),

        ]);
    }
}
