<?php

namespace App\Http\Controllers\Site;

use App\Model\Tour;
use App\Models\PeriodTour;
use App\Models\TourUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservedTourController extends Controller
{

    public function store(Request $request, $slug, $end_date)
    {
        $period_tour_id = PeriodTour::where('end_date', $end_date)->whereHas('tour', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->first()->id;
        $check = TourUser::where('period_tour_id', $period_tour_id)->where('user_id', Auth::id())->first();

        if ($check == null) {
            $reserved_tour = new TourUser();
            $reserved_tour->user_id = Auth::id();
            $reserved_tour->period_tour_id = $period_tour_id;
            $reserved_tour->save();
            Session::flash('success', 'Reserved Successful.');

            return back();

        }
        Session::flash('warning', 'You Already Reserved This Tour.');
        return back();

    }


}
