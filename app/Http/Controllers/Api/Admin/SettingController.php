<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    public function index()
    {
        return Setting::query()->first();
    }

    public function fieldUpdate(Request $request, Setting $setting, $field)
    {
        $setting->update([$field => $request->data]);

        return $this->successNotify();
    }


}
