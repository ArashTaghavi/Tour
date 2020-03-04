<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'fullname'=>'required',
           'email'=>'required',
           'description'=>'required'
        ],
            [
                'fullname.required'=>'Fullname is required',
                'email.required'=>'Email is required',
                'description.required'=>'Message is required',
            ]);
        $contact = new Contact();

        $contact->fill($request->all());
        $contact->save();

        return back()->with('success', 'Your Message Send Successful!');

    }
}
