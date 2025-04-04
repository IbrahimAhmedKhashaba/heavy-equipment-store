<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\Home\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }
    public function index()
    {
        $productsChart = $this->homeService->getProductsChart();
        $categoriesChart = $this->homeService->getCategoriesChart();
        $adminsChart = $this->homeService->getAdminsChart();
        $contactsChart = $this->homeService->getContactsChart();
        return view('dashboard.index' , compact([
            'productsChart' ,
            'categoriesChart' ,
            'adminsChart' ,
            'contactsChart',
        ]));
    }
}
