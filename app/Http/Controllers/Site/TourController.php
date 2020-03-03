<?php

namespace App\Http\Controllers\Site;

use App\Model\Tour;
use App\Models\PeriodTour;
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
        $last_end_date = "$year-$month-31";
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


    public function tour($slug, $end_date)
    {
        $period_tour_id = PeriodTour::where('end_date', $end_date)->whereHas('tour', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->first()->id;
        $check = TourUser::where('period_tour_id', $period_tour_id)->where('user_id', Auth::id())->first();
        if ($check != null)
            $is_user_reserved = true;
        else
            $is_user_reserved = false;

        $tour = Tour::with(['itineraryTour', 'images', 'periods' => function ($query) use ($end_date) {
            $query->where('end_date', $end_date);
        }])->where('slug', $slug)->first();
        return view('site.tours.tour', compact('tour', 'is_user_reserved'));

    }
}
