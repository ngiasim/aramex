<?php

namespace Ngiasim\Aramex;
 
use App\Http\Controllers\Controller;
use Carbon\Carbon;
 
class TimezonesController extends Controller
{
 
    public function index($timezone = null)
    {

        $current_time = ($timezone)? Carbon::now(str_replace('-', '/', $timezone)) : Carbon::now();
        //echo $time->toDateTimeString();
        return view('timezones::time', compact('current_time'));
    }
 
}