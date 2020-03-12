<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\BedHostelRoom;
use App\Models\HostelRoom;
use Illuminate\Http\Request;

class BedHostelRoomController extends BaseController
{

    public function index($id)
    {
        return BedHostelRoom::where('hostel_room_id', $id)->orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request, $id)
    {
        $this->handleValidate($request);

        $hostel_room = HostelRoom::findOrFail($id);

        $bed_hostel_room = new BedHostelRoom();
        $bed_hostel_room->fill($request->all());
        $hostel_room->beds()->save($bed_hostel_room);

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $bed_hostel_room = BedHostelRoom::findOrFail($id);
        $this->handleValidate($request, $bed_hostel_room->id);

        $bed_hostel_room->fill($request->all());
        $bed_hostel_room->save();
        return $this->successNotify();

    }

    public function discountUpdate(Request $request, $id)
    {
        $bed_hostel_room = BedHostelRoom::findOrFail($id);
        $this->handleDiscountValidate($request);
        $bed_hostel_room->start_date = (new \DateTime($request->start_date))->format('Y/m/d');
        $bed_hostel_room->end_date = (new \DateTime($request->end_date))->format('Y/m/d');
        $bed_hostel_room->discount = $request->discount;
        $bed_hostel_room->save();
        return $this->successNotify();

    }

    public function get($id)
    {
        return BedHostelRoom::findOrFail($id);
    }

    public function handleValidate($request, $id = null)
    {
        $validator = \Validator::make($request->all(), [
            'number' => $id == null ? 'required|unique:bed_hostel_rooms' : 'required|unique:bed_hostel_rooms,id,' . $id,
            'price' => 'required'
        ]);


        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }

        return $validator->getData();
    }

    public function handleReserve($id)
    {
        $bed_hostel_room = BedHostelRoom::findOrFail($id);
        $bed_hostel_room->is_reserved = $bed_hostel_room->is_reserved == 1 ? 0 : 1;
        $bed_hostel_room->save();

        return $this->successNotify();
    }

    public function destroy($id)
    {
        $bed_hostel_room = BedHostelRoom::findOrFail($id);
        $bed_hostel_room->delete();
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
