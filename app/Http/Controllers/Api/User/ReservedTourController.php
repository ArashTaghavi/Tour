<?php

namespace App\Http\Controllers\Api\User;

use App\Model\Tour;
use App\Models\PeriodTour;
use Illuminate\Support\Facades\Auth;

class ReservedTourController extends BaseController
{
    public function index()
    {

        return PeriodTour::with('tour')->whereHas('users', function ($q) {
            $q->where('user_id', Auth::id());
        })->get();

        return Tour::whereHas('users', function ($q) {
            $q->where('user_id', Auth::id());
        })->get();
    }
}
