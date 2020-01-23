<?php
namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{


    public function successNotify()
    {
        return ['message' => __('messages.save_success')];
    }

    public function deleteNotify()
    {
        return ['message' => __('messages.delete_success')];
    }
}
