<?php

namespace App\Services\WebSite\Contact;

use App\Repositories\WebSite\Contact\ContactRepository;

class ContactService
{
    private $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        //
        $this->contactRepository = $contactRepository;
    }

    public function store($request){
        return $this->contactRepository->store($request);
    }
}
