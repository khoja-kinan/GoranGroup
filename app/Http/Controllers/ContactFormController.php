<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $data = request()->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);
        /* var_dump($data);die(); */
        Mail::to('ahmedbeg@gorangroup.com')->send(new ContactFormMail($data));

        return redirect('/#footer')->with('success','Email has been sent successfully, We\'ll be on touch. ');
        // return 'DONE';
    }

}
