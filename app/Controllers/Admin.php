<?php

namespace App\Controllers;

use App\Models\AbstrakModel;
use App\Models\ScopeModel;
use App\Models\FullModel;
use App\Models\RevisedModel;
use CodeIgniter\I18n\Time;
use App\Models\PaymentModel;
use App\Models\SertifikatModel;
use App\Models\PosterModel;
use App\Models\HomeModel;
use App\Models\UserModel;
use App\Models\ScheduleModel;
use App\Models\ReviewModel;
use App\Models\ReviewerModel;

use DateTime;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use ZipArchive;



class Admin extends BaseController
{
    protected $pager;
    public function __construct()
    {
        $this->email = \Config\Services::email();
        $this->abstrakModel = new AbstrakModel();
        $this->scopeModel = new ScopeModel();
        $this->fullModel = new FullModel();
        $this->homeModel = new HomeModel();
        $this->userModel = new UserModel();
        $this->reviewerModel = new ReviewerModel();
        $this->reviewModel = new ReviewModel();
        $this->revisedModel = new RevisedModel();
        $this->paymentModel = new PaymentModel();
        $this->scheduleModel = new ScheduleModel();
        $this->posterModel = new PosterModel();
        $this->sertifikatModel = new SertifikatModel();
        $this->session = session();
        $this->pager = \Config\Services::pager();
        $this->zip = new ZipArchive();
    }

    // HALAMAN HALAMAN ADMIN
    public function index()
    {

        
        
        $year = date('Y');
        $user = $this->session->get('nama');
        $data = [
            'title' => 'Dashboard Admin',
            'namaadmin' => $user,
            'usertotal' => $this->userModel->userTotal(),
            'userunikom' => $this->userModel->userUnikom(),
            'usernonunikom' =>$this->userModel->userNonUnikom(),
            'abs_total' =>$this->abstrakModel->abs_total($year),
            'abs_unikom' =>$this->abstrakModel->abs_unikom($year),
            'abs_non' =>$this->abstrakModel->abs_non($year),
            'full_total' =>$this->fullModel->full_total($year),
            'full_unikom' =>$this->fullModel->full_unikom($year),
            'full_non' =>$this->fullModel->full_non($year),
            'revised_total' =>$this->revisedModel->revised_total($year),
            'revised_unikom' =>$this->revisedModel->revised_unikom($year),
            'revised_non' =>$this->revisedModel->revised_non($year),
            'poster_total' =>$this->posterModel->poster_total($year),
            'poster_unikom' =>$this->posterModel->poster_unikom($year),
            'poster_non' =>$this->posterModel->poster_non($year),
        ];
        
        return view('admin/index', $data);
    }

    public function abstrak(){
        $user = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }

        $currentPage = $this->request->getVar('page_abstrak') ? $this->request->getVar('page_abstrak'):
        1;
        $keyword = $this->request->getVar('keyword');

        if($keyword){
            $abstrak = $this->abstrakModel->search($keyword,$year)->paginate(10,'abstrak');
        }else{

        
        $abstrak = $this->abstrakModel->abstrak_all($year)->paginate(10,'abstrak');

        
        
    }
    $wait = $this->abstrakModel->abstrak_wait($year)->paginate(10,'abstrak');
    $decline = $this->abstrakModel->abstrak_decline($year)->paginate(10,'abstrak');
    $accept = $this->abstrakModel->abstrak_acc($year)->paginate(10,'abstrak');
        

        $data = [
            'title' => 'Abstrak Admin',
            'namaadmin' => $user,
            'abstrak' => $abstrak,
            'pager' =>$this->abstrakModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            'accept' => $accept,
            'pager_acc' => $this->abstrakModel->pager,
            'decline' => $decline,
            'pager_decline' => $this->abstrakModel->pager,
            'wait' => $wait,
            'pager_wait' => $this->abstrakModel->pager,
            
        ];
        
        return view('admin/abstrak', $data);
    }
    
    public function addPaperAuthor($abs_id)
    {
        $user = $this->session->get('nama');
        $data = [
            'title' => 'Admin - Add Paper Author',
            'abs_id' => $abs_id,
            'namaadmin' => $user,
        ];
        return view('admin/uploadpaper',$data);
    }
    
    public function setReviewer($abs_id)
    {
        $user = $this->session->get('nama');
        $in = ['3'];
        $this->reviewerModel->whereNotIn('id',$in);
        $reviewer = $this->reviewerModel->get()->getResultArray();
        $data = [
            'title' => 'Admin - Set Reviewer',
            'abs_id' => $abs_id,
            'namaadmin' => $user,
            'rev' => $reviewer
        ];
        return view('admin/setreviewer',$data);
    }

    // PROSES ADMIN
    public function validasi_abstrak_acc($abs_id){
        $this->abstrakModel->set('status','accepted');
        $this->abstrakModel->where('abs_id',$abs_id);
        $this->abstrakModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Abstract.. </div>');
        return redirect()->to('/admin/abstrak');
    }
    public function validasi_abstrak_decline($abs_id){
        $this->abstrakModel->set('status','decline');
        $this->abstrakModel->where('abs_id',$abs_id);
        $this->abstrakModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Abstract.. </div>');
        return redirect()->to('/admin/abstrak');
    }
    public function validasi_full_acc($abs_id){
        $this->fullModel->set('decision','accept');
        $this->fullModel->where('abs_id',$abs_id);
        $this->fullModel->update();
        

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Full Paper.. </div>');
        return redirect()->to('/admin/full_paper');
    }
    
    public function validasi_full_decline($abs_id){
        $this->fullModel->set('decision','decline');
        $this->fullModel->where('abs_id',$abs_id);
        $this->fullModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Full Paper.. </div>');
        return redirect()->to('/admin/full_paper');
    }

    public function validasi_revised_acc($abs_id){
        $this->revisedModel->set('decision_revised','accepted');
        $this->revisedModel->where('abs_id',$abs_id);
        $this->revisedModel->update();
        
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Full Paper.. </div>');
        return redirect()->to('/admin/revised_paper');
    }
    public function validasi_revised_decline($abs_id){
        $this->revisedModel->set('decision_revised','decline');
        $this->revisedModel->where('abs_id',$abs_id);
        $this->revisedModel->update();
        

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Full Paper.. </div>');
        return redirect()->to('/admin/revised_paper');
    }
    public function validasi_poster_acc($abs_id){
        $this->posterModel->set('status_poster','accepted');
        $this->posterModel->where('abs_id',$abs_id);
        $this->posterModel->update();
        

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Full Paper.. </div>');
        return redirect()->to('/admin/poster');
    }
    public function validasi_poster_decline($abs_id){
        $this->posterModel->set('status_poster','decline');
        $this->posterModel->where('abs_id',$abs_id);
        $this->posterModel->update();
        

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status Full Paper.. </div>');
        return redirect()->to('/admin/poster');
    }

    public function validasi_sertifikat($abs_id){
        $this->sertifikatModel->set('status_kehadiran','hadir');
        $this->sertifikatModel->where('abs_id',$abs_id);
        $this->sertifikatModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Set Present Paper.. </div>');
        return redirect()->to('/admin/sertifikat');
    }

    public function validasi_sertifikat_reset($abs_id){
        $this->sertifikatModel->set('status_kehadiran','');
        $this->sertifikatModel->where('abs_id',$abs_id);
        $this->sertifikatModel->update();

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Reset Present Paper.. </div>');
        return redirect()->to('/admin/sertifikat');
    }

    public function accept_all(){
        $ab = $this->abstrakModel->findAll();

        foreach ($ab as $a){
            $data[] = [
                'abs_id' => $a['abs_id'],
                'status' => 'accepted'
            ];
            }
        $this->abstrakModel->updateBatch($data,'abs_id');
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status All Abstract.. </div>');
        return redirect()->to('/admin/abstrak');
    }
    public function decline_all(){
        $ab = $this->abstrakModel->findAll();

        foreach ($ab as $a){
            $data[] = [
                'abs_id' => $a['abs_id'],
                'status' => 'decline'
            ];
            }
        $this->abstrakModel->updateBatch($data,'abs_id');
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Status All Abstract.. </div>');
        return redirect()->to('/admin/abstrak');
    }

    public function abstrak_acc(){
        $user = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }

        $currentPage = $this->request->getVar('page_abstrak') ? $this->request->getVar('page_abstrak'):
        1;
        $keyword = $this->request->getVar('keyword');

        if($keyword){
            $abstrak = $this->abstrakModel->search($keyword);
        }else{

        

        $this->abstrakModel->select('abstrak.abs_id');
        $this->abstrakModel->select('abstrak.id_scope');
        $this->abstrakModel->select('judul');
        $this->abstrakModel->select('abstrak');
        $this->abstrakModel->select('penulis');
        $this->abstrakModel->select('afiliasi');
        $this->abstrakModel->select('presenter');
        $this->abstrakModel->select('keyword');
        $this->abstrakModel->select('status');
        $this->abstrakModel->select('scope');
        $this->abstrakModel->select('submit_date');
        $this->abstrakModel->select('update_date');
        $this->abstrakModel->join('scope','scope.id_scope=abstrak.id_scope');
        $this->abstrakModel->where('YEAR(`submit_date`)',$year);
        $this->abstrakModel->where('status','accepted');
        $this->abstrakModel->orderBy('abs_id','ASC');
        $abstrak = $this->abstrakModel;
        }
    }

    // Full paper

    public function full_paper(){
        $user = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }

        $currentPage = $this->request->getVar('page_abstrak') ? $this->request->getVar('page_abstrak'):
        1;
        $keyword = $this->request->getVar('keyword');

        if($keyword){
            $full_all = $this->fullModel->search($keyword,$year)->paginate(10,'abstrak');
        }else{

        
        $full_all = $this->fullModel->full_all($year)->paginate(10,'abstrak');

        // acc
        
    }
    $wait = $this->fullModel->full_wait($year)->paginate(10,'abstrak');
    $decline = $this->fullModel->full_decline($year)->paginate(10,'abstrak');
    $accept = $this->fullModel->full_acc($year)->paginate(10,'abstrak');
        

        $data = [
            'title' => 'Full Paper Admin',
            'namaadmin' => $user,
            'abstrak' => $full_all,
            'pager' =>$this->fullModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            'accept' => $accept,
            'pager_acc' => $this->fullModel->pager,
            'decline' => $decline,
            'pager_decline' => $this->fullModel->pager,
            'wait' => $wait,
            'pager_wait' => $this->fullModel->pager,
            
        ];
        
        return view('admin/full_paper', $data);
    }

    public function uploadPaper(){
        $abs_id = $this->request->getPost('abs_id');
        //Ambil File
        $full_paper = $this->request->getFile('full_paper');
        
        //generateNama Random
        $namafullpaper = 'FP_'.$abs_id.'_'.$full_paper->getRandomName();

        //Masukkan Ke Folder Penyimpanan
        $full_paper->move('fullpaper',$namafullpaper);
  
            $this->fullModel->set('file_fp',$namafullpaper);
            $this->fullModel->set('decision','waiting_decision');
            $this->fullModel->where('abs_id',$abs_id);
            $this->fullModel->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Upload Full Paper '.$abs_id.'.. </div>');
        return redirect()->to('/admin/full_paper');
    }

    public function settingReviewer(){
        $abs_id = $this->request->getPost('abs_id');
        $id_reviewer = $this->request->getPost('id_reviewer');

        
            
        $this->reviewModel->set('id_reviewer', $id_reviewer);
        $this->reviewModel->where('abs_id',$abs_id);
        $this->reviewModel->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Setting Reviewer Full Paper '.$abs_id.'.. </div>');
        return redirect()->to('/admin/full_paper');
    }

    public function revised_paper(){
        $user = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }

        $currentPage = $this->request->getVar('page_abstrak') ? $this->request->getVar('page_abstrak'):
        1;
        $keyword = $this->request->getVar('keyword');

        if($keyword){
            $revised_all = $this->revisedModel->search($keyword,$year)->paginate(10,'revised_paper');
        }else{

        
        $revised_all = $this->revisedModel->revised_all($year)->paginate(10,'revised_paper');

        // acc
        
    }
    $wait = $this->revisedModel->revised_wait($year)->paginate(10,'revised_paper');
    $decline = $this->revisedModel->revised_decline($year)->paginate(10,'revised_paper');
    $accept = $this->revisedModel->revised_acc($year)->paginate(10,'revised_paper');
        

        $data = [
            'title' => 'Revised Paper Admin',
            'namaadmin' => $user,
            'abstrak' => $revised_all,
            'pager' =>$this->revisedModel->pager,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            'accept' => $accept,
            'pager_acc' => $this->revisedModel->pager,
            'decline' => $decline,
            'pager_decline' => $this->revisedModel->pager,
            'wait' => $wait,
            'pager_wait' => $this->revisedModel->pager,
            
        ];
        
        return view('admin/revised_paper', $data);
    }
    public function poster(){
        $user = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }

        $poster_all = $this->posterModel->poster_all($year);

        // acc
        
        $wait = $this->posterModel->poster_submit($year);
        $decline = $this->posterModel->poster_decline($year);
        $accept = $this->posterModel->poster_accepted($year);
        

        $data = [
            'title' => 'Poster Paper Admin',
            'namaadmin' => $user,
            'all' => $poster_all,
            'pager' =>$this->posterModel->pager,
            'accept' => $accept,
            'pager_acc' => $this->posterModel->pager,
            'decline' => $decline,
            'pager_decline' => $this->posterModel->pager,
            'wait' => $wait,
            'pager_wait' => $this->posterModel->pager,
            
        ];
        
        return view('admin/poster', $data);
    }

    public function sertifikat(){
        $user = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }

        $sertifikat_all = $this->sertifikatModel->all();
        
        
        $data = [
            'namaadmin' => $user,
            'title' => 'Admin - Sertifikat',
            'all' => $sertifikat_all,
        ];

        return view('admin/sertifikat', $data);
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

    public function DownloadAllRevised(){
        
        $year = date('Y');
        $as = $this->revisedModel->revised_acc($year);
        $RP = $as->get()->getResultArray();
        $zipname = 'Revised Paper ISCEER '.$year.'.zip';
        $this->zip->open($zipname, ZipArchive::CREATE|ZipArchive::OVERWRITE);
        foreach($RP as $a){
            $filename = 'revisedpaper/'.$a['file_rp'];
            $this->zip->addFile($filename);
        }
        
        $this->zip->close();

        ///Then download the zipped file.
        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename='.$zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);

        
    }

    public function DownloadMetadata(){
        $year = date("Y");
        $dataAbstrak = $this->abstrakModel->metadata($year);
        $dataAb = $dataAbstrak->get()->getResultArray();

        $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'ABS-ID')
                ->setCellValue('C1', 'Author')
                ->setCellValue('D1', 'Afiliasi')
                ->setCellValue('E1', 'Scope')
                ->setCellValue('F1', 'Title')
                ->setCellValue('G1', 'Abstrak');
    
    $column = 2;
    $no =1;
    // tulis data mobil ke cell
    foreach($dataAb as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $no)
                    ->setCellValue('B' . $column, $data['abs_id'])
                    ->setCellValue('C' . $column, $data['penulis'])
                    ->setCellValue('D' . $column, $data['afiliasi'])
                    ->setCellValue('E' . $column, $data['scope'])
                    ->setCellValue('F' . $column, $data['judul'])
                    ->setCellValue('G' . $column, $data['abstrak']);
        $column++;
        $no++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Meta Data ISCEER';

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    }
    public function DownloadAllMetadata(){
        $year = date("Y");
        $dataAbstrak = $this->abstrakModel->allMetadata($year);
        $dataAb = $dataAbstrak->get()->getResultArray();

        $spreadsheet = new Spreadsheet();
    // tulis header/nama kolom 
    $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'Name')
                ->setCellValue('C1', 'Email')
                ->setCellValue('D1', 'Phone')
                ->setCellValue('E1', 'ABS-ID')
                ->setCellValue('F1', 'Author')
                ->setCellValue('G1', 'Afiliation')
                ->setCellValue('H1', 'Scope')
                ->setCellValue('I1', 'Title')
                ->setCellValue('J1', 'Abstract')
                ->setCellValue('K1', 'Abstract Status')
                ->setCellValue('L1', 'Full Paper Status')
                ->setCellValue('M1', 'Revised Paper Status')
                ->setCellValue('N1', 'Status Poster');
    
    $column = 2;
    $no =1;
    // tulis data mobil ke cell
    foreach($dataAb as $data) {
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $no)
                    ->setCellValue('B' . $column, $data['nama'])
                    ->setCellValue('C' . $column, $data['email'])
                    ->setCellValue('D' . $column, $data['phone'])
                    ->setCellValue('E' . $column, $data['abs_id'])
                    ->setCellValue('F' . $column, $data['penulis'])
                    ->setCellValue('G' . $column, $data['afiliasi'])
                    ->setCellValue('H' . $column, $data['scope'])
                    ->setCellValue('I' . $column, $data['judul'])
                    ->setCellValue('J' . $column, $data['abstrak'])
                    ->setCellValue('K' . $column, $data['status'])
                    ->setCellValue('L' . $column, $data['decision'])
                    ->setCellValue('M' . $column, $data['decision_revised'])
                    ->setCellValue('N' . $column, $data['status_poster']);
        $column++;
        $no++;
    }
    // tulis dalam format .xlsx
    $writer = new Xlsx($spreadsheet);
    $fileName = 'Keseluruhan Data ISCEER '.$year;

    // Redirect hasil generate xlsx ke web client
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    }


    public function payment(){
        $user = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }
        $payment = $this->paymentModel->detailPayment($year)->paginate(10,'payment');
        $data = [
            'title' => 'Payment Menu Admin',
            'namaadmin' => $user,
            'payment' => $payment
        ];
        
        return view('admin/payment', $data);
    }

    public function download_payment($abs_id){
        $this->paymentModel->where('abs_id',$abs_id);
        $paper = $this->paymentModel->get()->getRowArray();
        return $this->response->download('payment/'.$paper['payment_proof'],null);
    }


    public function schedule(){
        $user = $this->session->get('nama');
        $year = $this->request->getPost('year');
        if($year==''){
            $year=date("Y");
        }else{
            $year=$year;
        }
        $schedule = $this->scheduleModel->get()->getRowArray();
        
        $data = [
            'title' => 'Schedule Menu Admin',
            'namaadmin' => $user,
            'schedule' => $schedule,
        
        ];
        
        return view('admin/schedule', $data);
    }

    public function updateScheduleAbstrak(){
        $id =1;
        // Input Date atau Time Harus pakai getVar ga bisa getPost
        $awal_abstrak = $this->request->getVar('awal_abstrak');
        
        $akhir_abstrak = $this->request->getVar('akhir_abstrak');
        
        if($awal_abstrak!='' && $akhir_abstrak!=''){

            $this->scheduleModel->set('awal_abstrak',$awal_abstrak);
            $this->scheduleModel->set('akhir_abstrak',$akhir_abstrak);
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();
        }else if($awal_abstrak!='' && $akhir_abstrak==''){
            $this->scheduleModel->set('awal_abstrak',$awal_abstrak);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }else if($awal_abstrak=='' && $akhir_abstrak!=''){
            $this->scheduleModel->set('akhir_abstrak',$akhir_abstrak);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Schedule <b>Abstract</b>..</div>');
        return redirect()->to('/admin/schedule');
    }

    public function updateScheduleFull(){
        $id =1;
        // Input Date atau Time Harus pakai getVar ga bisa getPost
        $awal_full = $this->request->getVar('awal_full');
        
        $akhir_full = $this->request->getVar('akhir_full');
        
        

        if($awal_full!='' && $akhir_full!=''){

            $this->scheduleModel->set('awal_full',$awal_full);
            $this->scheduleModel->set('akhir_full',$akhir_full);
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();
        }else if($awal_full!='' && $akhir_full==''){
            $this->scheduleModel->set('awal_full',$awal_full);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }else if($awal_full=='' && $akhir_full!=''){
            $this->scheduleModel->set('akhir_full',$akhir_full);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Schedule <b>Full Paper</b>..</div>');
        return redirect()->to('/admin/schedule');
        
    }
    public function updateSchedulePayment(){
        $id =1;
        // Input Date atau Time Harus pakai getVar ga bisa getPost
        $awal_payment = $this->request->getVar('awal_payment');
        
        $akhir_payment = $this->request->getVar('akhir_payment');
        
        

        if($awal_payment!='' && $akhir_payment!=''){

            $this->scheduleModel->set('awal_payment',$awal_payment);
            $this->scheduleModel->set('akhir_payment',$akhir_payment);
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();
        }else if($awal_payment!='' && $akhir_payment==''){
            $this->scheduleModel->set('awal_payment',$awal_payment);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }else if($awal_payment=='' && $akhir_payment!=''){
            $this->scheduleModel->set('akhir_payment',$akhir_payment);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Schedule <b>Payment</b>..</div>');
        return redirect()->to('/admin/schedule');
        
    }
    public function updateScheduleReview1(){
        $id =1;
        // Input Date atau Time Harus pakai getVar ga bisa getPost
        $awal_review1 = $this->request->getVar('awal_review1');
        
        $akhir_review1 = $this->request->getVar('akhir_review1');
        
        

        if($awal_review1!='' && $akhir_review1!=''){

            $this->scheduleModel->set('awal_review1',$awal_review1);
            $this->scheduleModel->set('akhir_review1',$akhir_review1);
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();
        }else if($awal_review1!='' && $akhir_review1==''){
            $this->scheduleModel->set('awal_review1',$awal_review1);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }else if($awal_review1=='' && $akhir_review1!=''){
            $this->scheduleModel->set('akhir_review1',$akhir_review1);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Schedule <b>Review Round 1</b>..</div>');
        return redirect()->to('/admin/schedule');
        
    }
    public function updateScheduleReview2(){
        $id =1;
        // Input Date atau Time Harus pakai getVar ga bisa getPost
        $awal_review2 = $this->request->getVar('awal_review2');
        
        $akhir_review2 = $this->request->getVar('akhir_review2');
        
        

        if($awal_review2!='' && $akhir_review2!=''){

            $this->scheduleModel->set('awal_review2',$awal_review2);
            $this->scheduleModel->set('akhir_review2',$akhir_review2);
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();
        }else if($awal_review2!='' && $akhir_review2==''){
            $this->scheduleModel->set('awal_review2',$awal_review2);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }else if($awal_review2=='' && $akhir_review2!=''){
            $this->scheduleModel->set('akhir_review2',$akhir_review2);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Schedule <b>Review Round 2</b>..</div>');
        return redirect()->to('/admin/schedule');
        
    }
    public function updateScheduleRevised(){
        $id =1;
        // Input Date atau Time Harus pakai getVar ga bisa getPost
        $awal_revised = $this->request->getVar('awal_revised');
        
        $akhir_revised = $this->request->getVar('akhir_revised');
        
        

        if($awal_revised!='' && $akhir_revised!=''){

            $this->scheduleModel->set('awal_revised',$awal_revised);
            $this->scheduleModel->set('akhir_revised',$akhir_revised);
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();
        }else if($awal_revised!='' && $akhir_revised==''){
            $this->scheduleModel->set('awal_revised',$awal_revised);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }else if($awal_revised=='' && $akhir_revised!=''){
            $this->scheduleModel->set('akhir_revised',$akhir_revised);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Schedule <b>Revised Paper</b>..</div>');
        return redirect()->to('/admin/schedule');
        
    }
    public function updateSchedulePoster(){
        $id =1;
        // Input Date atau Time Harus pakai getVar ga bisa getPost
        $awal_poster = $this->request->getVar('awal_poster');
        
        $akhir_poster = $this->request->getVar('akhir_poster');
        
        

        if($awal_poster!='' && $akhir_poster!=''){

            $this->scheduleModel->set('awal_poster',$awal_poster);
            $this->scheduleModel->set('akhir_poster',$akhir_poster);
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();
        }else if($awal_poster!='' && $akhir_poster==''){
            $this->scheduleModel->set('awal_poster',$awal_poster);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }else if($awal_poster=='' && $akhir_poster!=''){
            $this->scheduleModel->set('akhir_poster',$akhir_poster);
            
            $this->scheduleModel->where('id',$id);
            $this->scheduleModel->update();

        }

        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Updated Schedule <b>Poster</b>..</div>');
        return redirect()->to('/admin/schedule');
        
    }
    public function Email(){
        $user = $this->session->get('nama');
        $data = [
            'title' => 'Admin -- Email Notification ',
            'namaadmin' => $user,
            
        
        ];
        
        return view('admin/email', $data);
    }

    public function prosesEmail(){
        $tema = $this->request->getVar('tema');
        $subject = $this->request->getVar('subject');
        $isi = $this->request->getVar('isi');
        $year = date('Y');
        
        foreach($this->request->getFileMultiple('file') as $f ){
            $namaFile=[
                $nama = $f->getName(),
                $f->move('gambar',$nama),
            ];

            $upload[] = FCPATH ."gambar/".$nama;
            
            
            
        }
        
        if($tema=='abstract_acc'){
            //Abstract sudah di ACC
            $email = $this->abstrakModel->email_acc($year);
        }else if($tema=='full_req'){
            //Full Paper Submit -> ingatkan Payment untuk non unikom
            $email = $this->fullModel->full_req($year);
        }else if($tema=='revised_req'){
            //Review telah dilakukan -> Ingatkan Merevisi
            $email = $this->revisedModel->revised_req($year);
        }else if($tema=='revised_acc'){
            //Revised nya di ACC -> Ingatkan Upload Poster
            $email = $this->revisedModel->email_revised_acc($year);
        }else if($tema=='poster_req'){
            //Revised nya di ACC -> Ingatkan Upload Poster
            $email = $this->posterModel->poster_req($year);
        }
        
        foreach ($email as $e){
            $email_k=[
                $e['email'], 
            ];
        }
        $year = date("Y");
        // Jika Full Paper, Jika Revised Paper, Jika Abstract, Jika Poster
        $this->email->setFrom('injuratech@email.unikom.ac.id', 'ISCEER ' . $year);
        $this->email->setTo([
                implode(",", $email_k)
            ]);

        $this->email->setSubject($subject);
        $this->email->setMessage($isi);
        foreach($upload as $key){
            $this->email->attach($key);
        }

        if (!$this->email->send()) {
            $data = $this->email->printDebugger(['body']);
            print_r($data);;
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Send Email for <b>'.$tema.'</b>..</div>');
        return redirect()->to('/admin/email');
        }

        
    }

    public function setHome(){
        $user = $this->session->get('nama');
        $data = [
            'title' => 'Admin -- Home Management ',
            'namaadmin' => $user,
        
        ];
        
        return view('admin/set_home', $data);
    }

    public function setDate(){
        $user = $this->session->get('nama');
        $home = $this->homeModel->get()->getRowArray();
        $data = [
            'title' => 'Admin -- Conference Date ',
            'namaadmin' => $user,
            'tanggal' => $home['conf_date'],
        
        ];
        
        return view('admin/set_date', $data);
    }

    public function prosesDate(){
        $id =1;
        $tanggal = $this->request->getVar('conf_date');
        $this->homeModel->set('conf_date',$tanggal);
        $this->homeModel->where('id',$id);
        $this->homeModel->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Update Conference Date for <b>'.$tanggal.'</b>..</div>');
        return redirect()->to('/admin/setHome');
    }

    public function setAbout(){
        $user = $this->session->get('nama');
        $home = $this->homeModel->get()->getRowArray();
        $data = [
            'title' => 'Admin -- About Conference ',
            'namaadmin' => $user,
            'about' => $home['about'],
        
        ];
        
        return view('admin/set_about', $data);
    }

    function setLogo(){
        $user = $this->session->get('nama');
        $home = $this->homeModel->get()->getRowArray();
        $data = [
            'title' => 'Admin -- Set Logo',
            'namaadmin' => $user,
            'logo' => $home['logo'],
        ];
        return view('admin/set_logo', $data);
    }

    function prosesLogo(){
        $id =1;
        
        $logo = $this->request->getFile('logo');
        
        //generateNama Random
        $namalogo = $logo->getRandomName();

        //Masukkan Ke Folder Penyimpanan
        $logo->move('event/img/home',$namalogo);


        $this->homeModel->set('logo',$namalogo);
        $this->homeModel->where('id',$id);
        $this->homeModel->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success"> <b>Success</b> Update Logo ISCEER ..</div>');
        return redirect()->to('/admin/setLogo');
    }

    
}