<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\HotelRoom;
use App\Models\ImageRoom;
use Illuminate\Http\Request;

class ImageRoomController extends BaseController
{
    public function index($id)
    {
        return HotelRoom::select('id')
            ->whereHas('images')
            ->with('images')
            ->whereId($id)
            ->first();
    }

    public function getById($id)
    {

        return ImageRoom::whereId($id);
    }

    public function store(Request $request, $id)
    {
        $this->handleValidate($request);
        $hotel_room = HotelRoom::findOrFail($id);
        $image_room = new ImageRoom();
        $image_room->fill($request->except('profile_image'));
        $image_room->fillImage($request);
        $hotel_room->images()->save($image_room);
        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $image_room = ImageRoom::findOrFail($id);
        $image_room->fill($request->except('profile_image'));
        $image_room->fillImage($request);
        $image_room->save();

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
