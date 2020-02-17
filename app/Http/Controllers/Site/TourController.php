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
        $first_end_date = "$year-$month-01";
        $last_end_date = "$year-$month-30";
        $tours = Tour::with(['periods' => function ($query) use ($first_end_date, $last_end_date) {
            $query->where('end_date', '>=', $first_end_date)
                ->where('end_date', '<=', $last_end_date)
                ->where('start_date', '>=', Carbon::now()->format('Y-m-d'));
        }])
            ->with('tourLeader')
            ->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->get('w')}%")
                    ->orWhere('trips', 'like', "%{$request->get('w')}%")
                    ->orWhere('to', 'like', "%{$request->get('w')}%");
            })->get();
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
