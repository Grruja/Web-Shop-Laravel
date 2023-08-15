<?php

namespace App\Http\Controllers;

use App\Http\Requests\Save_contact_request;
use App\Models\Contact_model;
use App\Repository\Contact_repository;
use Illuminate\Http\Request;

class Contact_controller extends Controller
{
    private $contact_repo;

    public function __construct() {
        $this->contact_repo = new Contact_repository();
    }

    public function index() {
        return view('contact');
    }

    public function save_contact(Save_contact_request $request) {
        echo 'Email: '.$request->get('email').' Title: '.$request->get('subject').' Message: '.$request->get('message');

        $this->contact_repo->create_contact($request);
        return redirect('/shop');
    }

    public function all_contacts() {
        $all_contacts = Contact_model::all();
        return view('all_contacts', compact('all_contacts'));
    }

    public function edit_contact(Contact_model $contact) {
        return view('contacts.edit_contact', compact('contact'));
    }

    public function  update_contact(Request $request, Contact_model $contact) {
        $request->validate([
            'email' => 'required|string|email|unique:contact,email,'.$contact->id,
            'subject' => 'required|string',
        ]);

        $this->contact_repo->update_contact($request, $contact);
        return redirect( route('contact.all') );
    }

    public function delete_contact(Contact_model $contact) {
        $contact->delete();
        return redirect()->back();
    }
}


