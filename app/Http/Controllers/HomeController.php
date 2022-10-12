<?php

namespace App\Http\Controllers;

use App\Models\Tif;
use App\Models\Owner;
use App\Models\Style;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','home','show','owner','explore','search','categories','styles','about-us','contact-us');
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
            ->get()->where('tifs_count','>','0');


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
        $auction_closed=false;
        if($tif->status=="On auction"){
            $now=Carbon::now();
            $bidding_end_date =  Carbon::createFromFormat('Y-m-d H', $tif->auction_end_date->format('Y-m-d').' '.$tif->auction_end_date_time);


            if($now->gt($bidding_end_date)){
                $auction_closed=true;
            }

        }
        return view('front.pages.tif-details',['tif'=>$tif,'auction_closed'=>$auction_closed]);
    }
    public function owner($id){
        $owner=Owner::with('tifs')->findOrFail($id);
        $owner->incrementViewsCount();
        return view('front.pages.owner',['owner'=>$owner]);
    }

    public function search(Request $request){
        return view('front.pages.explore',['search'=>$request->search]);
    }

    public function categories($id){
        $category=Category::with('tifs')->findOrFail($id);
        $category->incrementViewsCount();
        return view('front.pages.categories',['selected_id'=>$id]);
    }

    public function styles($id){
        $style=Style::with('tifs')->findOrFail($id);
        $style->incrementViewsCount();
        return view('front.pages.styles',['selected_id'=>$id]);
    }

}
