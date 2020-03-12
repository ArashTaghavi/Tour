<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostelController extends BaseController
{
    public function our_hostels()
    {
        return Hostel::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
    }

    public function get($id)
    {
        return Hostel::find($id);
    }

    public function store(Request $request)
    {
        $this->handleValidate($request);
        $hostel = new Hostel();

        $hostel->fill($request->except('profile_image'));
        $hostel->fillImage($request);

        Auth::user()->hostels()->save($hostel);

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $hostel = Hostel::where('id', $id)->first();
        $hostel->fill($request->all());
        if ($hostel->isDirty('profile_image')) {
            $hostel->unlinkOriginalImage();
            $hostel->fillImage($request);
        }
        $hostel->save();

        return $this->successNotify();

    }

    public function destroy($id)
    {
        $hostel = Hostel::findOrFail($id);
        $hostel->delete();
        $hostel->unlinkOriginalImage();
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
