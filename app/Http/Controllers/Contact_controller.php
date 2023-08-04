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

    public function get_all_contacts()
    {
        $all_contacts = Contact_model::all(); // SELECT * FROM contact
        return view('all_contacts', compact('all_contacts'));
    }

    public function  send_contact(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string|min:5',
        ]);

        echo 'Email: '.$request->get('email').' Title: '.$request->get('subject').' Message: '.$request->get('message');

        Contact_model::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect('/shop');
    }

    public function delete_contact($contact)
    {
        $single_contact = Contact_model::where(['id' => $contact])->first();

        if ($single_contact === null)
        {
            die('Contact not found');
        }

        $single_contact->delete();

        return redirect()->back();
    }
}


