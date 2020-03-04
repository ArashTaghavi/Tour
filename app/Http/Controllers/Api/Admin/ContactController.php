<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Contact;

class ContactController extends BaseController
{
    public function index()
    {
        return Contact::orderBy('created_at', 'DESC')->get();
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();

        return $this->deleteNotify();
    }
}
