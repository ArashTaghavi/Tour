<?php

namespace App\Http\Controllers\Site;

use App\Model\Tour;
use App\Models\ReservedTour;
use App\Models\TourUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservedTourController extends Controller
{

    public function store(Request $request, $slug)
    {

        $tour_id = Tour::where('slug', $slug)->first()->id;
        $check = TourUser::where('tour_id', $tour_id)->where('user_id', Auth::id())->first();

        if ($check == null) {
            $reserved_tour = new TourUser();
            $reserved_tour->user_id = Auth::id();
            $reserved_tour->tour_id = $tour_id;
            $reserved_tour->save();
            Session::flash('success', 'Reserved Successful.');

            return redirect("/tours/$slug");

        }
        Session::flash('warning', 'You Already Reserved This Tour.');
        return redirect("/tours/$slug");

    }


}
