<?php

namespace App\Http\Controllers\Site;

use App\Model\Tour;
use App\Models\TourUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{

    public function index()
    {
    }

    public function search(Request $request)
    {

        $year = Carbon::now()->format('Y');
        $month = $request->month;
        $day = 1;
        $date = "$year-$month-$day";
        $tours = Tour::where(function ($q) use ($request) {
            $q->where('title', 'like', "%{$request->get('w')}%")
                ->orWhere('trips', 'like', "%{$request->get('w')}%")
                ->orWhere('to', 'like', "%{$request->get('w')}%");
        })->where('end_date', '>=', $date)->get();
        return view('site.tours.search', compact('tours'));
    }


    public function tour($slug)
    {

        $tour_id = Tour::where('slug', $slug)->first()->id;
        $check = TourUser::where('tour_id', $tour_id)->where('user_id', Auth::id())->first();
        if ($check != null)
            $is_user_reserved = true;
        else
            $is_user_reserved = false;

        $tour = Tour::with(['itineraryTour', 'images'])->where('slug', $slug)->first();
        return view('site.tours.tour', compact('tour', 'is_user_reserved'));

    }
}
