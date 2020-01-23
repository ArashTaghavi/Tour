<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Model\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TourController extends BaseController
{
    public function our_tours()
    {
        return Tour::where('operator', 0)->orderBy('created_at', 'DESC')->get();
    }

    public function get($id)
    {
        return Tour::where('id',$id)->where('operator',0)->first();
    }

    public function store(Request $request)
    {

        $this->handleValidate($request);
        $request->start_date = (new \DateTime($request->start_date))->format('Y/m/d');
        $request->end_date = (new \DateTime($request->end_date))->format('Y/m/d');
        $tour = new Tour();
        $tour->fill($request->except(['start_date', 'end_date']));
        $tour->start_date = $request->start_date;
        $tour->end_date = $request->end_date;
        $tour->save();

        return $this->successNotify();
    }


    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $tour = Tour::where('id', $id)->where('operator', 0)->first();
        $request->start_date = (new \DateTime($request->start_date))->format('Y/m/d');
        $request->end_date = (new \DateTime($request->end_date))->format('Y/m/d');
        $tour->fill($request->except(['start_date', 'end_date']));
        $tour->start_date = $request->start_date;
        $tour->end_date = $request->end_date;
        $tour->save();


        return $this->successNotify();

    }


    public function destroy($id)
    {
        Tour::where('id', $id)->where('operator', 0)->delete();
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
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }
        return $validator->getData();
    }

}
