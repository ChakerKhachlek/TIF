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


        return view('dashboard.pages.dashboard');
    }
}
