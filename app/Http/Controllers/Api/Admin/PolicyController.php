<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends BaseController
{
    public function index()
    {
        return Policy::orderBy('created_at','DESC')->get();
    }

    public function store(Request $request)
    {
        $this->handleValidate($request);
        $feature = new Policy();
        $feature->fill($request->all());
        $feature->save();

        return $this->successNotify();


    }

    public function getById($id)
    {
        return Policy::whereId($id);
    }

    public function fieldUpdate(Request $request, $id, $field)
    {
        $_data = $request->data;

        $this->getById($id)->update([$field => $_data]);

        return $this->successNotify();
    }


    public function destroy($id)
    {
        $this->getById($id)->delete();

        return $this->deleteNotify();
    }

    public function handleValidate($request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            abort(403, $validator->errors()->first());
        }
    }
}
