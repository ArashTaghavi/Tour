<?php

namespace App\Http\Controllers\Api\Admin;

use App\Model\Tour;
use Illuminate\Http\Request;

class TourController extends BaseController
{
    public function our_tours()
    {
        return Tour::with('tourLeader:tour_leaders.id,tour_leaders.name')->orderBy('created_at', 'DESC')->get();
    }

    public function get($id)
    {
        return Tour::with('periods')->with('tourLeader:tour_leaders.id,tour_leaders.name')->where('id', $id)->first();
    }

    public function store(Request $request)
    {
        $this->handleValidate($request);
        $tour = new Tour();

        $tour->fill($request->except(['periods', 'profile_image']));
        $tour->fillImage($request);

        $tour->save();

        $period_tours = [];

        // ========================= Method 1 =========================
        /* foreach ($request->periods as $period) {
             $period['start_date'] = (new \DateTime($period['start_date']))->format('Y/m/d');
             $period['end_date'] = (new \DateTime($period['end_date']))->format('Y/m/d');
             $period_tour = new PeriodTour();
             $period_tour->fill($period);
             $period_tours[] = $period_tour;
         }
         $tour->periods()->saveMany($period_tours);*/

        // ========================= Method 1 =========================
        foreach ($request->periods as $period) {
            $period['start_date'] = (new \DateTime($period['start_date']))->format('Y/m/d');
            $period['end_date'] = (new \DateTime($period['end_date']))->format('Y/m/d');
            $period_tours[] = $period;
        }
        $tour->periods()->createMany($period_tours);

        return $this->successNotify();
    }


    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $tour = Tour::where('id', $id)->first();
        $tour->fill($request->except(['periods', 'tour_leader']));
        if ($tour->isDirty('profile_image')) {
            $tour->unlinkOriginalImage();
            $tour->fillImage($request);
        }
        $tour->save();
        $period_tours = [];


        foreach ($request->periods as $period) {
            $period['start_date'] = (new \DateTime($period['start_date']))->format('Y/m/d');
            $period['end_date'] = (new \DateTime($period['end_date']))->format('Y/m/d');
            $period_tours[] = $period;
        }

        $tour->periods()->delete();
        $tour->periods()->createMany($period_tours);

        return $this->successNotify();

    }


    public function destroy($id)
    {
        Tour::where('id', $id)->delete();
        return $this->deleteNotify();
    }


    public function handleValidate($request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'from' => 'required',
            'to' => 'required',
            'min_age' => 'required',
            'max_age' => 'required',
            'min_group' => 'required',
            'max_group' => 'required',
            'accommodation' => 'required',
            'transportation' => 'required',
            'travel_style' => 'required',
            'trips' => 'required',
            /* 'start_date' => 'required',
             'end_date' => 'required',*/
            'price' => 'required',
            // 'periods.*' => 'required',
            'profile_image'=>'required',
            'tour_leader_id'=>'required'
        ]);

        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }
        return $validator->getData();
    }

}
