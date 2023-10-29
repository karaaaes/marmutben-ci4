<?php

namespace App\Controllers;
use App\Models\Mongkir;
use App\Models\Mpromo;


class Ongkir extends BaseController
{
    public function index(){

        $modelOngkir = new Mongkir(); 
        $data['dataWilayah'] = $modelOngkir->getWilayah();

        $modelPromo = new Mpromo(); 
        $data['dataPromo'] = $modelPromo->getListPromo();
        
        return view('ongkir/ongkir', $data);
    }

}