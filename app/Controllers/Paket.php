<?php

namespace App\Controllers;
use App\Models\Mpaket;
use App\Models\Mpromo;


class Paket extends BaseController
{

    public function index(){
        $dataPaket = new Mpaket();
        $data['dataWilayah'] = $dataPaket->getPaketMarmut();

        $modelPromo = new Mpromo(); 
        $data['dataPromo'] = $modelPromo->getListPromo();

        return view('paket/paket', $data);
    }

}