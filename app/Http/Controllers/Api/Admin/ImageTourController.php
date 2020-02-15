<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Model\Tour;
use App\Models\ImageTour;
use App\Models\ItineraryTour;
use Illuminate\Http\Request;

class ImageTourController extends BaseController
{


    public function index($id)
    {
        return Tour::select('id')
            ->whereHas('images')
            ->with('images')
            ->whereId($id)
            ->whereOperator(0)
            ->first();
    }

    public function getById($id)
    {

        return ImageTour::whereId($id);
    }

    public function store(Request $request, $id)
    {
        $this->handleValidate($request);
        $image_tour = new ImageTour();
        $image_tour->fill($request->except('profile_image'));
        $image_tour->fillImage($request);
        $image_tour->tour_id = $id;
        $image_tour->save();

        return $this->successNotify();
    }


    public function fieldUpdate(Request $request, $id, $field)
    {
        $_data = $request->data;

        if ($_data === "true")
            $_data = 1;
        if ($_data === "false")
            $_data = 0;
        $this->getById($id)->update([$field => $_data]);

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $image_tour = ImageTour::where('id', $id)->first();
        $image_tour->fill($request->except('profile_image'));
        $image_tour->fillImage($request);
        $image_tour->save();

        return $this->successNotify();
    }


    public function handleValidate($request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'profile_image' => 'required'
        ]);


        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }


        return $validator->getData();
    }


    public function destroy($id)
    {
        $image = $this->getById($id)->first();
        $image->delete();
        $image->unlinkOriginalImage();

        return $this->successNotify();

    }
}
