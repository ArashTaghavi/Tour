<?php

namespace App\Http\Controllers\Api\User;

use App\Model\Tour;
use Illuminate\Support\Facades\Auth;

class ReservedTourController extends BaseController
{
    public function index()
    {
        return Tour::whereHas('users', function ($q) {
            $q->where('user_id', Auth::id());
        })->get();
    }
}
