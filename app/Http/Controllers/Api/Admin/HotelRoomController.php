<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Hotel;
use App\Models\HotelRoom;
use Illuminate\Http\Request;

class HotelRoomController extends BaseController
{

    public function index($id)
    {
        return HotelRoom::where('hotel_id', $id)->orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request, $id)
    {

        $this->handleValidate($request);

        $hotel = Hotel::findOrFail($id);

        $hotel_room = new HotelRoom();
        $hotel_room->fill($request->except('profile_image'));
        $hotel_room->fillImage($request);
        $hotel->rooms()->save($hotel_room);

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $hotel_room = HotelRoom::findOrFail($id);
        $this->handleValidate($request, $hotel_room->id);

        $hotel_room->fill($request->except('profile_image'));
        if ($hotel_room->isDirty('profile_image')) {
            $hotel_room->unlinkOriginalImage();
            $hotel_room->fillImage($request);
        }
        $hotel_room->save();
        return $this->successNotify();

    }

    public function discountUpdate(Request $request, $id)
    {
        $hotel_room = HotelRoom::findOrFail($id);
        $this->handleDiscountValidate($request);
        $hotel_room->start_date = (new \DateTime($request->start_date))->format('Y/m/d');
        $hotel_room->end_date = (new \DateTime($request->end_date))->format('Y/m/d');
        $hotel_room->discount = $request->discount;
        $hotel_room->save();
        return $this->successNotify();

    }

    public function get($id)
    {
        return HotelRoom::findOrFail($id);
    }

    public function handleValidate($request, $id = null)
    {
        $validator = \Validator::make($request->all(), [
            'floor' => 'required',
            'number' => $id == null ? 'required|unique:hotel_rooms' : 'required|unique:hotel_rooms,id,' . $id,
            'bedroom_count' => 'required',
            'options' => 'required',
            'price' => 'required',
            'description' => 'required',
            'profile_image' => 'required',
        ]);


        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }

        return $validator->getData();
    }

    public function handleReserve($id)
    {
        $hotel_room = HotelRoom::findOrFail($id);
        $hotel_room->is_reserved = $hotel_room->is_reserved == 1 ? 0 : 1;
        $hotel_room->save();

        return $this->successNotify();
    }

    public function destroy($id)
    {
        $hotel = HotelRoom::findOrFail($id);
        $hotel->delete();
        $hotel->unlinkOriginalImage();
        return $this->deleteNotify();
    }

    public function handleDiscountValidate($request)
    {
        $validator = \Validator::make($request->all(), [
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);


        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }

        return $validator->getData();
    }


}
