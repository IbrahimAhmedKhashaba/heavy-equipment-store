<?php

namespace App\Repositories\Dashboard\Contact;

use App\Models\Contact;

class ContactRepository
{
    public function markAsRead(){
        return Contact::where('is_read', 0)->update(['is_read' => 1]);
    }

    public function getAll(){
        return Contact::latest()->get();
    }

    public function getContact($id){
        return Contact::find($id);
    }

    public function destroy($contact){
        $contact->delete();
        return $contact;
    }
}
