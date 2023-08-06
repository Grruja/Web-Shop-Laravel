<?php

namespace App\Http\Controllers;

use App\Models\Contact_model;
use Illuminate\Http\Request;

class contact_controller extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function  save_contact(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:contact',
            'subject' => 'required|string',
            'message' => 'required|string|max:255',
        ]);

        echo 'Email: '.$request->get('email').' Title: '.$request->get('subject').' Message: '.$request->get('message');

        Contact_model::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect('/shop');
    }

    public function all_contacts()
    {
        $all_contacts = Contact_model::all();
        return view('all_contacts', compact('all_contacts'));
    }

    public function edit_contact(Contact_model $contact)
    {
        return view('contacts.edit_contact', compact('contact'));
    }

    public function  update_contact(Request $request, Contact_model $contact)
    {
        $request->validate([
            'email' => 'required|string|email|unique:contact,email,'.$contact->id,
            'subject' => 'required|string',
        ]);

        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->save();

        return redirect( route('all_contacts') );
    }

    public function delete_contact(Contact_model $contact)
    {
        $contact->delete();

        return redirect()->back();
    }
}


