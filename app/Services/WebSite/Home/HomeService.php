<?php

namespace App\Services\WebSite\Home;

use App\Repositories\WebSite\Home\HomeRepository;

class HomeService
{
    private $homeRepository;
    public function __construct(HomeRepository $homeRepository)
    {
        //
        $this->homeRepository = $homeRepository;
    }

    public function getSliders()
    {
        return $this->homeRepository->getSliders();
    }

    public function getProducts()
    {
        return $this->homeRepository->getProducts();
    }
}
