<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends BaseController
{
    public function our_hotels()
    {
        return Hotel::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
    }

    public function get($id)
    {
        return Hotel::find($id);
    }

    public function store(Request $request)
    {
        $this->handleValidate($request);
        $hotel = new Hotel();

        $hotel->fill($request->except('profile_image'));
        $hotel->fillImage($request);

        Auth::user()->hotels()->save($hotel);

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $hotel = Hotel::where('id', $id)->first();
        $hotel->fill($request->all());
        if ($hotel->isDirty('profile_image')) {
            $hotel->unlinkOriginalImage();
            $hotel->fillImage($request);
        }
        $hotel->save();

        return $this->successNotify();

    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        $hotel->unlinkOriginalImage();
        return $this->deleteNotify();
    }

    public function handleValidate($request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'country' => 'required',
            'city' => 'required',
            'star' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'profile_image' => 'required',
        ]);

        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }
        return $validator->getData();
    }

}
