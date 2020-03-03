<?php

namespace App\Http\Controllers\Site;

use App\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $panel_address = '';

        if (Auth::check()) {
            if (Auth::user()->role==User::ADMIN) {
                $panel_address = '/admin';
            } else {
                $panel_address = '/user';
            }
        }


        return view('site.index',compact('panel_address'));
    }
}
