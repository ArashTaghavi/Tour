<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Hostel;
use App\Models\HostelImage;
use Illuminate\Http\Request;

class HostelImageController extends BaseController
{

    public function index($id)
    {
        return Hostel::select('id')
            ->whereHas('images')
            ->with('images')
            ->whereId($id)
            ->orderBy('created_at','DESC')
            ->first();
    }

    public function getById($id)
    {

        return HostelImage::whereId($id);
    }

    public function store(Request $request, $id)
    {
        $this->handleValidate($request);
        $hostel_image = new HostelImage();
        $hostel_image->fill($request->except('profile_image'));
        $hostel_image->fillImage($request);
        $hostel_image->hostel_id = $id;
        $hostel_image->save();

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $hostel_image = HostelImage::where('id', $id)->first();
        $hostel_image->fill($request->except('profile_image'));
        $hostel_image->fillImage($request);
        $hostel_image->save();

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
