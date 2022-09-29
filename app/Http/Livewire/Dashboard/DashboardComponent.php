<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Bid;
use App\Models\Tif;
use App\Models\Owner;
use App\Models\Style;
use Livewire\Component;
use App\Models\Category;
use Carbon\CarbonPeriod;
use App\Models\Newsletter;
use Illuminate\Support\Carbon;

class DashboardComponent extends Component
{


    public function render()
    {
        $tifs=Tif::with('owner')->get();
        $categories=Category::all();
        $categoriesTifsCounts=[];
        foreach($categories as $category){
            array_push($categoriesTifsCounts,($category->tifs()->count()));
        }

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

        $randomStylesColors=[];
        foreach($styles as $key=>$style){
            array_push($randomStylesColors,random_color());
        }

        $randomCategoriesColors=[];
        foreach($categories as $key=>$style){
            array_push($randomCategoriesColors,random_color());
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


        $randomWeekColors=[];
        foreach($week as $key=>$day){
            array_push($randomWeekColors,random_color());
        }

        $weekTifsSelledCount=[];
        foreach ($thisWeekDays as $date) {
            array_push($weekTifsSelledCount,$weekTifsSelled->filter(function ($tif) use ($date) {

                return $tif->updated_at->isSameDay($date);

            })->count());

        }

        $weekBidsCount=[];
        foreach ($thisWeekDays as $date) {
            array_push($weekBidsCount,$bids->filter(function ($bid) use ($date) {

                return $bid->created_at->isSameDay($date);

            })->count());

        }
        $randomBidColors=[];
        foreach($week as $key=>$day){
            array_push($randomBidColors,random_color());
        }

        $weekConfirmedBidsCount=[];
        foreach ($thisWeekDays as $date) {
            array_push($weekConfirmedBidsCount,$bids->filter(function ($bid) use ($date) {

                return $bid->created_at->isSameDay($date) and $bid->display==true;

            })->count());

        }


        $maxViewsTifs=$tifs->sortBy('views', 0, true)->first();
        $maxViewsCategories=$categories->sortBy('views', 0, true)->first();
        $maxViewsStyles=$styles->sortBy('views', 0, true)->first();



        return view('livewire.dashboard.dashboard-component',
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
            'randomStylesColors'=>$randomStylesColors,
            'thisWeekDays'=>$thisWeekDays,
            'weekTifsCount'=>$weekTifsCount,
            'weekTifsSelledCount'=>$weekTifsSelledCount,
            'randomWeekColors'=>$randomWeekColors,
            'randomCategoriesColors'=>$randomCategoriesColors,
            'categoriesTifsCounts'=>$categoriesTifsCounts,

            'weekBidsCount'=>$weekBidsCount,
            'weekConfirmedBidsCount'=>$weekConfirmedBidsCount,
            'randomBidColors'=>$randomBidColors,

            'maxViewsTifs'=>$maxViewsTifs,
            'maxViewsCategories'=>$maxViewsCategories,
            'maxViewsStyles'=>$maxViewsStyles,


        ]);
    }
}
