<?php

namespace App\Controllers;
use App\Models\Mbestseller;
use App\Models\Mpromo;

class Home extends BaseController
{
    public function index(): string
    {
        $modelBestSeller = new Mbestseller();
        $data['bestSellers'] = $modelBestSeller->getBestSeller();

        $modelPromo = new Mpromo(); 
        $data['dataPromo'] = $modelPromo->getListPromo();

        return view('index/index', $data);
    }
}
