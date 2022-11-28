<?php

namespace App\Controllers;

use App\Models\AbstrakModel;
use App\Models\ScopeModel;
use App\Models\FullModel;
use App\Models\RevisedModel;
use CodeIgniter\I18n\Time;
use App\Models\PaymentModel;
use App\Models\PosterModel;
use App\Models\UserModel;
use App\Models\ReviewModel;
use App\Models\ReviewerModel;

class Reviewer extends BaseController
{
    public function __construct()
    {
        $this->abstrakModel = new AbstrakModel();
        $this->fullModel = new FullModel();
        $this->reviewModel = new ReviewModel();
        $this->revisedModel = new RevisedModel();
        $this->session = session();
    }

    public function index()
    {
        $user = $this->session->get('nama');
        $data = [
            'title' => 'Dashboard Reviewer',
            'namareviewer' => $user
        ];

        return view('reviewer/index', $data);
    }

    public function full_paper()
    {
        $user = $this->session->get('id_user');
        $nama = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }

        $keyword = $this->request->getVar('keyword');
        $currentPage = $this->request->getVar('page_abstrak') ? $this->request->getVar('page_abstrak'):
        1;
        if($keyword){
            $full = $this->fullModel->searchFullReviewer($keyword,$user,$year)->paginate(10,'full_paper');
        }else{

        
        $full = $this->fullModel->full_review($user,$year)->paginate(10,'full_paper');

    
        
    }
    $full_acc = $this->fullModel->full_review_acc($user,$year)->paginate(10,'full_paper');
    $full_wait = $this->fullModel->full_review_wait($user,$year)->paginate(10,'full_paper');


        $data = [
            'title' => 'Dashboard Reviewer',
            'namareviewer' => $nama,
            'keyword' => $keyword,
            'abstrak' => $full,
            'pager' => $this->fullModel->pager,
            'full_acc' => $full_acc,
            'pager_acc' => $this->fullModel->pager,
            'full_wait' => $full_wait,
            'currentPage' => $currentPage,
        ];

        return view('reviewer/full_paper', $data);
    }

    public function uploadReview($abs_id){
        $user = $this->session->get('nama');
        $data = [
            'title' => 'Reviewer - Upload Review Paper',
            'abs_id' => $abs_id,
            'namareviewer' => $user,
        ];
        return view('reviewer/uploadreview',$data);
    }

    public function prosesUpload(){
        $abs_id = $this->request->getPost('abs_id');
        $notes = $this->request->getPost('notes');
        //Ambil File
        $review_paper = $this->request->getFile('review_paper');
        
        //generateNama Random
        $namafullpaper = 'Review_'.$abs_id.'_'.$review_paper->getRandomName();

        //Masukkan Ke Folder Penyimpanan
        $review_paper->move('review',$namafullpaper);
  
            $this->reviewModel->set('file_review',$namafullpaper);
            $this->reviewModel->set('notes',$notes);
            $this->reviewModel->where('abs_id',$abs_id);
            $this->reviewModel->update();

            $this->fullModel->set('decision','revision required');
            $this->fullModel->where('abs_id',$abs_id);
            $this->fullModel->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Review Full Paper '.$abs_id.'.. </div>');
        return redirect()->to('/reviewer/full_paper');

    }

    public function downloadReview($abs_id){
        $this->reviewModel->where('abs_id',$abs_id);
        $paper = $this->reviewModel->get()->getRowArray();
        return $this->response->download('review/'.$paper['file_review'],null);
    }

    public function revised_paper(){
        $user = $this->session->get('nama');
        $id_user = $this->session->get('id_user');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }

        $currentPage = $this->request->getVar('page_abstrak') ? $this->request->getVar('page_abstrak'):
        1;
        
        $revised_all = $this->revisedModel->revised_rev_all($year,$id_user)->paginate(10,'revised_paper');

    $wait = $this->revisedModel->revised_rev_wait($year,$id_user)->paginate(10,'revised_paper');
    $decline = $this->revisedModel->revised_rev_decline($year,$id_user)->paginate(10,'revised_paper');
    $accept = $this->revisedModel->revised_rev_acc($year,$id_user)->paginate(10,'revised_paper');
        

        $data = [
            'title' => 'Revised Paper Reviewer',
            'namareviewer' => $user,
            'abstrak' => $revised_all,
            'pager' =>$this->revisedModel->pager,
            'currentPage' => $currentPage,
            
            'accept' => $accept,
            'pager_acc' => $this->revisedModel->pager,
            'decline' => $decline,
            'pager_decline' => $this->revisedModel->pager,
            'wait' => $wait,
            'pager_wait' => $this->revisedModel->pager,
            
        ];
        
        return view('reviewer/revised_paper', $data);
    }

    public function validasi_rev_acc($abs_id){
        $this->revisedModel->set('decision_revised','accepted');
        $this->revisedModel->where('abs_id',$abs_id);
        $this->revisedModel->update();
        
        $this->fullModel->set('decision','accept');
        $this->fullModel->where('abs_id',$abs_id);
        $this->fullModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Revised Paper.. </div>');
        return redirect()->to('/reviewer/revised_paper');
    }
    public function validasi_rev_dec($abs_id){
        $this->revisedModel->set('decision_revised','decline');
        $this->revisedModel->where('abs_id',$abs_id);
        $this->revisedModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Revised Paper.. </div>');
        return redirect()->to('/reviewer/revised_paper');
    }

    public function setDecisionRevised($abs_id){
        $user = $this->session->get('nama');
        $data = [
            'title' => 'Reviewer - Upload Review Paper',
            'abs_id' => $abs_id,
            'namareviewer' => $user,
        ];
        return view('reviewer/revised_decision',$data);
    }

    public function decisionRevised(){
        $notes_revised = $this->request->getPost('notes_revised');
        $abs_id = $this->request->getPost('abs_id');
        $decision_revised = $this->request->getPost('decision_revised');

        $this->revisedModel->set('decision_revised',$decision_revised);
        $this->revisedModel->set('notes_revised',$notes_revised);
        $this->revisedModel->where('abs_id',$abs_id);
        $this->revisedModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Revised Paper.. </div>');
        return redirect()->to('/reviewer/revised_paper');
    }

}
