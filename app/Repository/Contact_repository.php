<?php

namespace App\Repository;

use App\Models\Contact_model;

class Contact_repository {

    private $contact_model;

    public function __construct() {
        $this->contact_model = new Contact_model();
    }

    public function create_contact($request) {
        $this->contact_model->create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);
    }

    public function update_contact($request, $contact) {
        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->save();
    }

}
