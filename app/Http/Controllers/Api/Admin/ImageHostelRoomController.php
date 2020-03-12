<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\HostelRoom;
use App\Models\ImageHostelRoom;
use App\Models\ImageRoom;
use Illuminate\Http\Request;

class ImageHostelRoomController extends BaseController
{
    public function index($id)
    {
        return HostelRoom::select('id')
            ->whereHas('images')
            ->with('images')
            ->whereId($id)
            ->first();
    }

    public function getById($id)
    {

        return ImageHostelRoom::whereId($id);
    }

    public function store(Request $request, $id)
    {
        $this->handleValidate($request);
        $hostel_room = HostelRoom::findOrFail($id);
        $image_hostel_room = new ImageHostelRoom();
        $image_hostel_room->fill($request->except('profile_image'));
        $image_hostel_room->fillImage($request);
        $hostel_room->images()->save($image_hostel_room);
        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $image_hostel_room = ImageHostelRoom::findOrFail($id);
        $image_hostel_room->fill($request->except('profile_image'));
        $image_hostel_room->fillImage($request);
        $image_hostel_room->save();

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
