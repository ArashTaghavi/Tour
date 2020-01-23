<?php

namespace App\Http\Controllers\Site;

use App\Model\Tour;
use App\Models\TourUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{

    public function index()
    {
    }

    public function search(Request $request)
    {

        $start_date = str_replace('/', '-', $request->sd);
        $end_date = str_replace('/', '-', $request->ed);

        $tours = Tour::where('title', 'like', "%{$request->get('w')}%")
            ->orWhere('trips', 'like', "%{$request->get('w')}%")
            ->orWhere('to', 'like', "%{$request->get('w')}%");
        if ($request->sd != null)
            $tours->where('start_date', '>=', $start_date);
        if ($request->ed != null)
            $tours->where('end_date', '<=', $end_date);

        $tours = $tours->get();
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
        return view('site.tours.tour', compact('tour','is_user_reserved'));

    }
}
