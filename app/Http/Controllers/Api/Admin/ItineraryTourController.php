<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Model\Tour;
use App\Models\ItineraryTour;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;

class ItineraryTourController extends BaseController
{
    public function index($id)
    {
        return ItineraryTour::whereHas('tour', function ($q) {
            $q->where('operator', 0);
        })->where('tour_id', $id)->get();
    }


    public function store(Request $request, $id)
    {
        $this->handleValidate($request);
        $itineraryTour = new ItineraryTour();
        $itineraryTour->fill($request->all());
        $itineraryTour->tour_id = $id;
        $itineraryTour->save();

        return $this->successNotify();
    }

    public function getById($id)
    {

        return ItineraryTour::where('id', $id);
    }

    public function fieldUpdate(Request $request, $id, $field)
    {
        $this->getById($id)->update([$field => $request->data]);

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $tour = ItineraryTour::whereHas('tours', function ($q) {
            $q->where('operator', 0);
        })->where('id', $id)->first();
        $tour->fill($request->all());
        $tour->save();

        $this->successNotify();
    }

    public function handleValidate($request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }

        return $validator->getData();
    }

    public function destroy($id)
    {
        $this->getById($id)->delete();

        return $this->deleteNotify();
    }
}
