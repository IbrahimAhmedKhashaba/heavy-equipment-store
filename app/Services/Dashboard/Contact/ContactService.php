<?php

namespace App\Services\Dashboard\Contact;

use App\Repositories\Dashboard\Contact\ContactRepository;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class ContactService
{
    private $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        //
        $this->contactRepository = $contactRepository;
    }

    public function markAsRead(){
        return $this->contactRepository->markAsRead();
    }

    public function getAll()
    {
        $contacts = $this->contactRepository->getAll();
        return DataTables::of($contacts)
            ->addIndexColumn()
            ->addColumn('action', function ($contact) {
                return view('dashboard.contacts.datatables._action', compact('contact'));
            })
            ->addColumn('created_at', function ($contact) {
                return $contact->created_at->diffForHumans();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function destroy($id){
        $contact = $this->contactRepository->getContact($id);
        if(!$contact){
            return $contact;
        }
        $contact = $this->contactRepository->destroy($contact);
        if($contact){
            Cache::forget('contacts');
            Cache::forget('contacts_count');
        }
        return $contact;
    }
}
