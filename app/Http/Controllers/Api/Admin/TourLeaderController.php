<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\TourLeader;
use Illuminate\Http\Request;

class TourLeaderController extends BaseController
{
    public function index()
    {
        return TourLeader::all();
    }


    public function store(Request $request)
    {
        $this->handleValidate($request);
        $tour_leader = new TourLeader();
        $tour_leader->fill($request->except('profile_image'));
        $tour_leader->fillImage($request);
        $tour_leader->save();

        return $this->successNotify();
    }

    public function update(Request $request, $id)
    {
        $this->handleValidate($request);
        $tour_leader = TourLeader::find($id);
        $tour_leader->fill($request->all());
        if ($tour_leader->isDirty('profile_image')) {
            $tour_leader->fillImage($request);
            $tour_leader->unlinkOriginalImage();
        }
        $tour_leader->save();

        return $this->successNotify();
    }

    public function fieldUpdate(Request $request, $id, $field)
    {
        $this->getById($id)->update([$field => $request->data]);

        return $this->successNotify();
    }

    public function getById($id)
    {

        return TourLeader::where('id', $id);
    }


    public function handleValidate($request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'profile_image' => 'required'
        ]);


        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }


        return $validator->getData();
    }

    public function destroy($id)
    {
        $tour_leader = TourLeader::find($id);

        $tour_leader->unlinkOriginalImage();

        $tour_leader->delete();

        return $this->deleteNotify();
    }

}
