<?php

namespace App\Http\Controllers\Website;

use App\Models\Contact;
use App\Services\WebSite\Contact\ContactService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\ContactRequest;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    private $contactService;
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function index()
    {
        return view('website.contact');
    }
    public function send(ContactRequest $request)
    {

        $contact = $this->contactService->store($request);
        $contact ? Session::flash('success', __('dashboard.success_msg')) :
            Session::flash('error', __('dashboard.error_msg'));
        return redirect()->back();
    }
}
