<?php


namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\PosterModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->posterModel = new PosterModel();
    }
    public function index()
    {
        $tgl = $this->homeModel->get()->getRowArray();
        $year = date('Y');
        $pos = $this->posterModel->getWhere(['status_poster'=>'accepted', 'YEAR(submit_poster)'=>$year])->getResultArray();
        
        $data = [
            'title' => 'ISCEER '.$year,
            'tanggal' => $tgl['conf_date'],
            'logo' => $tgl['logo'],
            'pos' => $pos,
        ];
        return view('home/index',$data);
    }
}
