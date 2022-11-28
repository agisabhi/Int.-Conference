<?php

namespace App\Controllers;

use App\Models\AbstrakModel;
use App\Models\ScopeModel;
use App\Models\FullModel;
use App\Models\RevisedModel;
use CodeIgniter\I18n\Time;
use App\Models\PaymentModel;
use App\Models\PosterModel;
use App\Models\ScheduleModel;
use App\Models\ReviewModel;
use App\Models\SertifikatModel;
use DateTime;

class User extends BaseController
{
    protected $abstrakModel;
    protected $posterModel;
    protected $scopeModel;
    protected $fullModel;
    protected $revisedModel;
    protected $paymentModel;
    protected $id_user; 
    public function __construct()
    {
        $this->abstrakModel = new AbstrakModel();
        $this->scopeModel = new ScopeModel();
        $this->fullModel = new FullModel();
        $this->scheduleModel = new ScheduleModel();
        $this->revisedModel = new RevisedModel();
        $this->paymentModel = new PaymentModel();
        $this->posterModel = new PosterModel();
        $this->reviewModel = new ReviewModel();
        $this->sertifikatModel = new SertifikatModel();
        $this->session = session();
    }
    public function index()
    {
        $id_user = $this->session->get('id_user');
        $nama = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }
        $sql = "SELECT abstrak.abs_id, id_payment, file_review, review.notes as notrev, payment_proof, transfer_date, transfer_time, bank_name, account_name, account_number, amount, payment_status, file_rp, judul, penulis, poster, created_at, last_update, status_poster, submit_poster, update_poster, afiliasi, 
        abstrak.id_scope, scope, created_payment, update_payment, keyword, abstrak, presenter, decision, decision_revised, created_revised, last_revised,  full_paper.notes, notes_revised, user.id_user, nama, abstrak.status, submit_date, uniqid, paper_id, file_fp,
        update_date FROM abstrak join scope on scope.id_scope=abstrak.id_scope join user on user.id_user=abstrak.id_user
        inner join full_paper on abstrak.abs_id=full_paper.abs_id inner join payment on abstrak.abs_id=payment.abs_id inner join revised_paper on revised_paper.abs_id=abstrak.abs_id
        inner join review on abstrak.abs_id=review.abs_id inner join poster on poster.abs_id=abstrak.abs_id where abstrak.id_user = '$id_user' AND YEAR(submit_date) = '$year' order by abstrak.abs_id ASC";
        
        $abstrak = $this->abstrakModel->query($sql)->getResultArray();
        $jum = $this->abstrakModel->query($sql)->getNumRows();
        $sc = $this->scheduleModel->get()->getRowArray();
        date_default_timezone_set("Asia/Jakarta");
        $now = date('Y-m-d H:i:s');
        
         $data = [
            'title' => 'Dashboard User',
            'abstrak' => $abstrak,
            'year' => $year,
            'jum' => $jum,
            'now' => $now,
            'sc' => $sc,
            'namauser' => $nama,
        
        ];
        echo view('user/index', $data);
    }

    public function tambahabstrak()
    {
        $nama = $this->session->get('nama');
        //Mengambil Data Topic
        $this->scopeModel->select("*");
        $scope = $this->scopeModel->get()->getResultArray();
        $data = [
            'title' => 'Add Abstract',
            'scope' => $scope,
            'namauser' => $nama,
        ];
        return view('user/tambahabstrak', $data);
    }
    

    public function tambah(){
        $id_user = $this->session->get('id_user');
        //Inisiasi ABS-ID untuk bertambah ++
        $this->abstrakModel->select("*");
        $this->abstrakModel->orderBy('abs_id','DESC');
        $id = $this->abstrakModel->get()->getRowArray();
        $count = $this->abstrakModel->countAllResults();
        if($count==0){

            $idnow = 1;
        }else{
            $idnow = substr($id['abs_id'],4)+1;
        }

        //Membuat UniqID
        $uniq = '0123456789abcdefghijklmnopqrstuvwxyz';
        $uniqid = substr(str_shuffle($uniq),0,10);

        //Proses Simpan Data ke Table
        $this->abstrakModel->insert([
            'abs_id' => 'ABS-'.$idnow,
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'afiliasi' => $this->request->getPost('afiliasi'),
            'id_scope' => $this->request->getPost('scope'),
            'abstrak' => $this->request->getPost('abstrak'),
            'keyword' => $this->request->getPost('keyword'),
            'presenter' => $this->request->getPost('presenter'),
            'type' => $this->request->getPost('type'),
            'id_user' => $id_user,
            'status' => 'awaiting decision',
            'uniqid' => $uniqid
            
        ]);
        $this->revisedModel->save([
            'abs_id'=>'ABS-'.$idnow,
            'decision_revised' => 'not submitted'
        ]);
        $this->fullModel->save([
            'abs_id'=>'ABS-'.$idnow,
            'decision' => 'not submitted'
        ]);
        $this->paymentModel->save([
            'abs_id'=>'ABS-'.$idnow,
            'payment_status' => 'not uploaded'
        ]);
        $this->posterModel->save([
            'abs_id'=>'ABS-'.$idnow,
            'status_poster' => 'not submitted'
        ]);
        $this->reviewModel->save([
            'abs_id'=>'ABS-'.$idnow,
            'id_reviewer' => 3
        ]);
        $this->sertifikatModel->save([
            'abs_id'=>'ABS-'.$idnow,
            'status_kehadiran' => '',
        ]);
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Added New Abstract.. </div>');
        return redirect()->to('/user');

    }

    public function editabstrak($id)
    {
        $nama = $this->session->get('nama');
        //Mengambil Data Topic
        $this->scopeModel->select("*");
        $scope = $this->scopeModel->get()->getResultArray();
        //Mengambil Data Abstrak
        $this->abstrakModel->select("*");
        $this->abstrakModel->where('uniqid',$id);
        $abstrak = $this->abstrakModel->get()->getRowArray();
        $data = [
            'title' => 'Edit Abstract',
            'abstrak' => $abstrak,
            'scope' => $scope,
            'namauser' => $nama
        ];
        return view('user/editabstrak', $data);
    }

    public function edit(){
        $this->abstrakModel->save([
            'abs_id' => $this->request->getPost('abs_id'),
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'afiliasi' => $this->request->getPost('afiliasi'),
            'id_scope' => $this->request->getPost('scope'),
            'abstrak' => $this->request->getPost('abstrak'),
            'keyword' => $this->request->getPost('keyword'),
            'presenter' => $this->request->getPost('presenter'),
            
        ]);
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Abstract.. </div>');
        return redirect()->to('/user');
    }

    public function delete($id){
        $this->abstrakModel->delete($id);
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Deleted Abstract.. </div>');
        return redirect()->to('/user');
    }

    public function full_paper(){
        
        $abs_id = $this->request->getPost('abs_id');
        //Ambil File
        $full_paper = $this->request->getFile('full_paper');
        
        //generateNama Random
        $namafullpaper = 'FP_'.$abs_id.'_'.$full_paper->getRandomName();

        //Masukkan Ke Folder Penyimpanan
        $full_paper->move('fullpaper',$namafullpaper);

        
        
            $update = date("Y-m-d h:i:sa");
            $this->fullModel->set('file_fp',$namafullpaper);
            $this->revisedModel->set('last_update',$update);
            $this->revisedModel->set('created_at',$update);
            $this->fullModel->set('decision','waiting_decision');
            $this->fullModel->where('abs_id',$abs_id);
            $this->fullModel->update();
        
        //Add Data ke tabel Review
        $this->reviewModel->where('abs_id',$abs_id);
        $review = $this->reviewModel->countAllResults();
        if($review==0){

            $data = [
                'abs_id' => $abs_id,
                'id_reviewer' => 3
            ];
            $this->reviewModel->insert($data);
        }
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Upload Full Paper '.$abs_id.'.. </div>');
        return redirect()->to('/user');
    }

    public function revised_paper(){
        
        $abs_id = $this->request->getPost('abs_id');
        //Ambil File
        $revised_paper = $this->request->getFile('revised_paper');
        
        //generateNama Random
        $namarevisedpaper = 'RP_'.$abs_id.'_'.$revised_paper->getRandomName();

        //Masukkan Ke Folder Penyimpanan
        $revised_paper->move('revisedpaper',$namarevisedpaper);

        
        
            $update = date("Y-m-d h:i:sa");
            $this->revisedModel->set('file_rp',$namarevisedpaper);
            $this->revisedModel->set('last_revised',$update);
            $this->revisedModel->set('created_revised',$update);
            $this->revisedModel->set('decision_revised','waiting decision');
            $this->revisedModel->where('abs_id',$abs_id);
            $this->revisedModel->update();

            $this->fullModel->set('decision','revision submitted');
            $this->fullModel->where('abs_id',$abs_id);
            $this->fullModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Upload Revised Paper '.$abs_id.'.. </div>');
        return redirect()->to('/user');
    }
    public function poster(){
        
        $abs_id = $this->request->getPost('abs_id');
        //Ambil File
        $poster = $this->request->getFile('poster');
        
        //generateNama Random
        $namaposter = 'POSTER_'.$abs_id.'_'.$poster->getRandomName();

        //Masukkan Ke Folder Penyimpanan
        $poster->move('poster',$namaposter);

        
        
            $update = date("Y-m-d h:i:sa");
            $status = 'submitted';
            $this->posterModel->set('poster',$namaposter);
            $this->posterModel->set('update_poster',$update);
            $this->posterModel->set('status_poster',$status);
            $this->posterModel->where('abs_id',$abs_id);
            $this->posterModel->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Upload POSTER '.$abs_id.'.. </div>');
        return redirect()->to('/user');
    }

    public function payment(){
        //Ambil File
        $payment = $this->request->getFile('payment');
        //MembuatRenameFilePaper
        $namapayment = 'PAYMENT_'.$payment->getRandomName();

        //Masukkan Ke Folder Penyimpanan
        $payment->move('payment',$namapayment);

        
        $date = date("Y-m-d h:i:sa");
        $abs_id = $this->request->getVar('abs_id');
        $id = $this->request->getVar('id_payment');
        $transfer_date =$this->request->getVar('transfer_date');
        $transfer_time = $this->request->getVar('transfer_time');
        $bank_name = $this->request->getVar('bank_name');
        $account_name = $this->request->getVar('account_name');
        $account_number = $this->request->getVar('account_number');
        $amount = $this->request->getVar('amount');
        $status = 'uploaded';
        $data = [

            'payment_proof' => $namapayment,
            'payment_status'=>$status,
            'transfer_date'=>$transfer_date,
            'transfer_time'=>$transfer_time ,
            'bank_name'=>$bank_name,
            'account_name'=> $account_name,
            'account_number'=> $account_number,
            'amount'=> $amount,
            'created_payment'=> $date,
            'update_payment'=> $date
        ];
        
        $this->paymentModel->update($id,$data);
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Upload Payment Proof Paper '.$abs_id.'.. </div>');
        return redirect()->to('/user');
    }

    public function summary(){
        $nama = $this->session->get('nama');
        $id_user = $this->session->get('id_user');
        $year = $this->request->getPost('year');
        if($year==''){
            $year = date('Y');
        }else{
            $year=$year;
        }
        $this->abstrakModel->select('abstrak.abs_id');
        $this->abstrakModel->select('judul');
        $this->abstrakModel->select('penulis');
        $this->abstrakModel->select('afiliasi');
        $this->abstrakModel->select('abstrak.id_scope');
        $this->abstrakModel->select('scope');
        $this->abstrakModel->select('keyword');
        $this->abstrakModel->select('abstrak');
        $this->abstrakModel->select('abstrak.status');
        $this->abstrakModel->select('decision',);
        $this->abstrakModel->select('decision_revised',);
        $this->abstrakModel->select('presenter');
        $this->abstrakModel->select('type');
        $this->abstrakModel->select('user.id_user');
        $this->abstrakModel->select('nama');
        $this->abstrakModel->select('abstrak.status');
        $this->abstrakModel->select('submit_date');
        $this->abstrakModel->select('uniqid');
        $this->abstrakModel->select('payment_status');
        $this->abstrakModel->select('paper_id');
        $this->abstrakModel->select('file_fp');
        $this->abstrakModel->select('update_date');
        $this->abstrakModel->join('scope','scope.id_scope=abstrak.id_scope');
        $this->abstrakModel->join('user','user.id_user=abstrak.id_user');
        $this->abstrakModel->join('full_paper','full_paper.abs_id=abstrak.abs_id');
        $this->abstrakModel->join('payment','payment.abs_id=abstrak.abs_id');
        $this->abstrakModel->join('revised_paper','revised_paper.abs_id=abstrak.abs_id');
        $this->abstrakModel->where('abstrak.id_user',$id_user);
        $this->abstrakModel->where('YEAR(submit_date)',$year);
        $this->abstrakModel->orderBy('abstrak.abs_id','asc');
        
        $abstrak = $this->abstrakModel->get()->getResultArray();
        
         $data = [
            'year' => date('Y'),
            'title' => 'Dashboard User',
            'abstrak' => $abstrak,
            'namauser' => $nama
        
        ];
        echo view('user/summary', $data);
    }

    public function download_full($abs_id){
        $this->fullModel->where('abs_id',$abs_id);
        $paper = $this->fullModel->get()->getRowArray();
        return $this->response->download('fullpaper/'.$paper['file_fp'],null);
    }
    public function download_review($abs_id){
        $this->reviewModel->where('abs_id',$abs_id);
        $paper = $this->reviewModel->get()->getRowArray();
        return $this->response->download('review/'.$paper['file_review'],null);
    }
    public function download_revised($abs_id){
        $this->fullModel->where('abs_id',$abs_id);
        $paper = $this->revisedModel->get()->getRowArray();
        return $this->response->download('revisedpaper/'.$paper['file_rp'],null);
    }
    public function download_payment($abs_id){
        $this->paymentModel->where('abs_id',$abs_id);
        $paper = $this->paymentModel->get()->getRowArray();
        return $this->response->download('payment/'.$paper['payment_proof'],null);
    }
    public function download_poster($abs_id){
        $this->posterModel->where('abs_id',$abs_id);
        $paper = $this->posterModel->get()->getRowArray();
        return $this->response->download('poster/'.$paper['poster'],null);
    }

    public function download(){
        $nama = $this->session->get('nama');
        $id_user = $this->session->get('id_user');
        $year = $this->request->getPost('year');
        if($year==''){
            $year = date('Y');
        }else{
            $year=$year;
        }
        $loa = $this->revisedModel->revised_acc_user($year,$id_user);
        $sertifikat = $this->sertifikatModel->all_user($year,$id_user);
        $data = [
            'year' => date('Y'),
            'title' => 'Dashboard User',
            'sertifikat' => $sertifikat,
            'loa' => $loa,
            'namauser' => $nama
        
        ];
        echo view('user/download', $data);
    }

    public function download_sertifikat($abs_id){
        $a = $this->abstrakModel->getWhere(['abs_id'=>$abs_id]);
        $b = $a->getRowArray();
        
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => [210, 297],
            'orientation' => 'L'
        ]);
        $mpdf->SetWatermarkImage('sertifikat.png', 1);
        $mpdf->watermarkImgBehind = true;
        $mpdf->showWatermarkImage = true;
        
        $mpdf->WriteHTML('<html>
        <body>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <p align="center" style="font-size:24px; font-family:verdana">'.$b['penulis'].'</p>
        <br><br><br><br>
        <p align="center" style="font-size:16px; font-family:verdana"><b>'.$b['judul'].'</b></p>
        </body>
        </html>');    
        $mpdf->Output();

        
    }

    public function download_loa($abs_id){
        
        $a = $this->abstrakModel->getWhere(['abs_id'=>$abs_id]);
        $b = $a->getRowArray();
        $t = date('F, Y',strtotime($b['submit_date']));
        
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => [210, 297],
            'orientation' => 'P'
        ]);
        
        $mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="33%"><img src="logoisceer.png" width="130px" height="70px"></td>
                        <td width="67%" style="text-align: right;"><b>International Student Conference on Engineering and Environmental Research '.date('Y',strtotime($b['submit_date'])).'</b></td>
                    </tr>
                    
                </table>
                <hr>
                ');
        $mpdf->WriteHTML('
        <br><br><br><br>
        <h2 align="center"><u>Letter of Acceptance</u> </h2><br>
                <table width="100%">
                    <tr>
                        <td width="20%">Paper Title</td>
                        <td width="5%">:</td>
                        <td width="75%">'.$b['judul'].'</td>
                    </tr>
                    <tr>
                        <td width="20%">Authors</td>
                        <td width="5%">:</td>
                        <td width="75%">'.$b['penulis'].'</td>
                    </tr>
                    <tr>
                        <td width="20%">Affiliation</td>
                        <td width="5%">:</td>
                        <td width="75%">'.$b['afiliasi'].'</td>
                    </tr>
                </table>
                <br>
                <b>Dear Authors,</b> <br>
                <p align="justify"> 
                I am pleased to inform you that the paper you kindly submitted to the The 1st International
                 Student Conference on Engineering and Environmental Research '.date('Y',strtotime($b['submit_date'])).' (ISCEER '.date('Y',strtotime($b['submit_date'])).') has now 
                 been accepted and the first author is invited to present the paper in the conference. 
                 Your interest in ISCEER '.date('Y',strtotime($b['submit_date'])).' is very much appreciated. I look forward to meeting you at 
                 the conference
                </p>
                <br>
                <br>
                
                <table width="100%">
                    <tr>
                        <td width="33%">&nbsp;&nbsp;</td>
                        <td width="33%">&nbsp;&nbsp;</td>
                        <td width="33%">Bandung, '.$t.' <br>
                        <img src="ttdbuponi.png" width="150px" height="150px"> <br>
                        Dr. Poni Sukaesih Kurniati, S.IP., M.Si. <br>
                        Chief of The Conference
                        </td>
                    </tr>
                </table>

                
        ');
        $mpdf->Output();

    }
}
