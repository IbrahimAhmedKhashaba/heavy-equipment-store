<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\CatalogRequest;
use App\Models\Catalog;
use App\Services\Dashboard\Catalog\CatalogService;
use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{

    public $catalogService;
    public function __construct(CatalogService $catalogService)
    {
        $this->catalogService = $catalogService;
    }
    public function index()
    {
        return view('dashboard.settings.catalog');
    }
    public function store(CatalogRequest $request)
    {
        if ($this->catalogService->store($request)) {
            Session::flash('success', __('dashboard.success_msg'));
        }
        return redirect()->back();
    }
}
