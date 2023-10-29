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

    public function log(){
        $postData = $this->request->getPost();

        if(!empty($postData)){
            $firstDate = $postData['first_date']." 00:00:00";
            $lastDate = $postData['last_date']." 23:59:59";
        }else{
            $firstDate = "";
            $lastDate = "";
        }        

        $modelAdminHome = new Madminhome();
        $data['dataLog'] = $modelAdminHome->getLog($firstDate,$lastDate);

        return view('admin/index/log', $data);
    }
}
