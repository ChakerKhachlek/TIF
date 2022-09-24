<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tif;
use App\Models\Owner;
use App\Models\Style;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function home()
    {
        $styles=Style::inRandomOrder()->limit(9)->orderBy('display_order')->get();
        $categories=Category::inRandomOrder()->limit(8)->orderBy('display_order')->get();

        $latest_tifs=Tif::limit(8)->where('status','!=','On auction')->latest()->get();
        $biding_tifs=Tif::limit(8)->where('status','=','On auction')->latest()->get();

        $top_owners=Owner::with(['tifs' => function ($query) {
            $query;
        }])
            ->withCount('tifs')
			->orderBy('tifs_count', 'desc')
            ->limit(10)
            ->get();


        return view('welcome',[
            'styles'=>$styles,
            'latest_tifs'=>$latest_tifs,
            'biding_tifs'=>$biding_tifs,
            'top_owners'=>$top_owners,
            'categories'=>$categories
        ]);
    }

    public function show($id){
        $tif=Tif::with('categories')->findOrFail($id);
        $tif->incrementViewsCount();
        return view('front.pages.tif-details',['tif'=>$tif]);
    }
    public function owner($id){
        $owner=Owner::with('tifs')->findOrFail($id);
        return view('front.pages.owner',['owner'=>$owner]);
    }
}
