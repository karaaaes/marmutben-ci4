<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MAdminhome;

class AdminHome extends BaseController
{
    public function index(){
        $modelAdminHome = new MAdminhome();
        $data['countCategories'] = $modelAdminHome->countMarmutCategories();
        $data['totalHits'] = $modelAdminHome->getDataHit();
        $data['dataLog']= $modelAdminHome->getAllLog();
        return view('admin/index/index', $data);
    }
}
