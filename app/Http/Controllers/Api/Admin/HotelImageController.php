<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Hotel;
use App\Models\HotelImage;
use Illuminate\Http\Request;

class HotelImageController extends BaseController
{

    public function index($id)
    {
        return Hotel::select('id')
            ->whereHas('images')
            ->with('images')
            ->whereId($id)
            ->orderBy('created_at','DESC')
            ->first();
    }

    public function getById($id)
    {

        return HotelImage::whereId($id);
    }

    public function store(Request $request, $id)
    {
        $this->handleValidate($request);
        $hotel_image = new HotelImage();
        $hotel_image->fill($request->except('profile_image'));
        $hotel_image->fillImage($request);
        $hotel_image->hotel_id = $id;
        $hotel_image->save();

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $hotel_image = HotelImage::where('id', $id)->first();
        $hotel_image->fill($request->except('profile_image'));
        $hotel_image->fillImage($request);
        $hotel_image->save();

        return $this->successNotify();
    }

    public function handleValidate($request)
    {

        $validator = \Validator::make($request->all(), [
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

        return $this->deleteNotify();

    }
}
