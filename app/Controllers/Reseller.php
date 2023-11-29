<?php

namespace App\Controllers;
use App\Models\Mpaket;
use App\Models\Mpromo;


class Reseller extends BaseController
{
    public function index(){
        return view('reseller/index');
    }

    public function register(){
        return view('reseller/register');
    }
}