<?php

namespace App\Repositories\WebSite\Contact;

use App\Models\Contact;

class ContactRepository
{
    public function store($request){
        return Contact::create($request->all());
    }
}
