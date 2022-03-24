<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\UserVoiture;
use App\Models\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function index()
    {
        $voitures = Voiture::all();
        $categories = Category::all();
        return view('home', compact('voitures', 'categories'));
    }
}
