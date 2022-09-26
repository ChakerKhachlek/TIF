<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Tif;
use App\Models\Owner;
use App\Models\Style;
use App\Models\Category;
use Carbon\CarbonPeriod;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){


        $tifs=Tif::with('owner')->get();
        $categories=Category::all();
        $styles=Style::all();
        $stylesTifsCounts=[];
        foreach($styles as $style){
            array_push($stylesTifsCounts,($style->tifs()->count()));
        }


        $owners=Owner::all();
        $bids=Bid::all();
        $newsletters=Newsletter::all();


        function random_color(){
            return 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) .', ' . rand(0, 255). ')';
        }

        $randomColors=[];
        foreach($styles as $key=>$style){
            array_push($randomColors,random_color());
        }



        $week=CarbonPeriod::create(Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek());

        $thisWeekDays = $week->toArray();


        $weekTifs=$tifs->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()]);

        $weekTifsCount=[];
        foreach ($thisWeekDays as $date) {


            array_push($weekTifsCount,$weekTifs->filter(function ($tif) use ($date) {

                return $tif->created_at->isSameDay($date);

            })->count());

        }

        $weekTifsSelled=$tifs->where('status','=','Buyed')
        ->whereBetween('updated_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
        ->where('owner.name', '!=', 'Imagination Factory');



        $weekTifsSelledCount=[];
        foreach ($thisWeekDays as $date) {
            array_push($weekTifsSelledCount,$weekTifsSelled->filter(function ($tif) use ($date) {

                return $tif->updated_at->isSameDay($date);

            })->count());

        }


        return view('dashboard.pages.dashboard',
        [
            'tifs'=>$tifs,
            'categories'=>$categories,
            'styles'=>$styles,
            'owners'=>$owners,
            'bids'=>$bids,
            'newsletters'=>$newsletters,
            'tifsCount'=>$tifs->count(),
            'categoriesCount'=>$categories->count(),
            'stylesCount'=>$styles->count(),
            'ownersCount'=>$owners->count(),
            'bidsCount'=>$bids->count(),
            'newslettersCount'=>$newsletters->count(),

            'stylesTifsCounts'=>$stylesTifsCounts,
            'randomColors'=>$randomColors,
            'thisWeekDays'=>$thisWeekDays,
            'weekTifsCount'=>$weekTifsCount,
            'weekTifsSelledCount'=>$weekTifsSelledCount

        ]
    );
    }
}
