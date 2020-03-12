<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Hostel;
use App\Models\HostelRoom;
use Illuminate\Http\Request;

class HostelRoomController extends BaseController
{

    public function index($id)
    {
        return HostelRoom::where('hostel_id', $id)->orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request, $id)
    {
        $this->handleValidate($request);

        $hostel = Hostel::findOrFail($id);

        $hostel_room = new HostelRoom();
        $hostel_room->fill($request->except('profile_image'));
        $hostel_room->fillImage($request);
        $hostel->rooms()->save($hostel_room);

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $hostel_room = HostelRoom::findOrFail($id);
        $this->handleValidate($request, $hostel_room->id);

        $hostel_room->fill($request->except('profile_image'));
        if ($hostel_room->isDirty('profile_image')) {
            $hostel_room->unlinkOriginalImage();
            $hostel_room->fillImage($request);
        }
        $hostel_room->save();
        return $this->successNotify();

    }

    public function discountUpdate(Request $request, $id)
    {
        $hostel_room = HostelRoom::findOrFail($id);
        $this->handleDiscountValidate($request);
        $hostel_room->start_date = (new \DateTime($request->start_date))->format('Y/m/d');
        $hostel_room->end_date = (new \DateTime($request->end_date))->format('Y/m/d');
        $hostel_room->discount = $request->discount;
        $hostel_room->save();
        return $this->successNotify();

    }

    public function get($id)
    {
        return HostelRoom::findOrFail($id);
    }

    public function handleValidate($request, $id = null)
    {
        $validator = \Validator::make($request->all(), [
            'floor' => 'required',
            'number' => $id == null ? 'required|unique:hostel_rooms' : 'required|unique:hostel_rooms,id,' . $id,
            'bed_count' => 'required',
            'options' => 'required',
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
        $hostel_room = HostelRoom::findOrFail($id);
        $hostel_room->is_reserved = $hostel_room->is_reserved == 1 ? 0 : 1;
        $hostel_room->save();

        return $this->successNotify();
    }

    public function destroy($id)
    {
        $hostel = HostelRoom::findOrFail($id);
        $hostel->delete();
        $hostel->unlinkOriginalImage();
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
