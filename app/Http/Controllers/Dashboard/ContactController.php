<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use App\Services\Dashboard\Contact\ContactService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    private $contactService;

    public function __construct(ContactService $contactService){
        $this->contactService = $contactService;
    }
    public function index()
    {
        $this->contactService->markAsRead();
        return view('dashboard.contacts.index');
    }
    public function getAll()
    {
        return $this->contactService->getAll();
    }

    public function destroy($id)
    {
        $contact = $this->contactService->destroy($id);
        if(!$contact){
            return response()->json(['status' => 'error','message'=>__('dashboard.not_fount')]);
        }
        return response()->json(['status' => 'success','message'=>__('dashboard.success_msg')]);
    }

}
