<?php

namespace App\Models;

use CodeIgniter\Model;

class PosterModel extends Model
{
    protected $table      = 'poster';
    protected $primaryKey = 'id_poster';
    protected $returnType     = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['id_poster','abs_id','poster', 'status_poster','notes'];
    protected $createdField  = 'submit_poster';
    protected $updatedField  = 'update_poster';

    function poster_total($year){
        
        $totpap = $this->table('poster');
        $totpap->select('*');
        $totpap->join('abstrak','abstrak.abs_id=poster.abs_id');
        $totpap->join('user','user.id_user=abstrak.id_user');
        $totpap->where('YEAR(submit_poster)',$year);
        $totpap->where('status_poster','accepted');
        return $totpap->countAllResults();
    }
    function poster_unikom($year){
        
        $totun = $this->table('poster');
        $totun->select('*');
        $totun->join('abstrak','abstrak.abs_id=poster.abs_id');
        $totun->join('user','user.id_user=abstrak.id_user');
        $totun->where('YEAR(submit_poster)',$year);
        $totun->where('user.institusi','unikom');
        $totun->where('status_poster','accepted');
        return $totun->countAllResults();
    }
    function poster_non($year){
        
        $totnon = $this->table('poster');
        $totnon->select('*');
        $totnon->join('abstrak','abstrak.abs_id=poster.abs_id');
        $totnon->join('user','user.id_user=abstrak.id_user');
        $totnon->where('YEAR(`submit_poster`)',$year);
        $totnon->where('user.institusi','non_unikom');
        $totnon->where('status_poster','accepted');
        return $totnon->countAllResults();
    }

    public function poster_req($year){
        $em  = $this->table('poster');
        $em->select('email');
        $em->join('abstrak','abstrak.abs_id=poster.abs_id');
        $em->join('user','abstrak.id_user=user.id_user');
        $em->where('status_poster','not submitted');
        $em->where('YEAR(`submit_poster`)',$year);
        return $em->get()->getResultArray();
    }    

    public function poster_all($year){
        $stat = ['accepted','decline','submitted'];
        $all= $this->table('poster');
        $all->select('abstrak.abs_id');
        $all->select('judul');
        $all->select('penulis');
        $all->select('poster');
        $all->select('status_poster');
        $all->select('submit_poster');
        $all->select('update_poster');
        $all->join('abstrak','abstrak.abs_id=poster.abs_id');
        $all->where('YEAR(`submit_poster`)',$year);
        $all->whereIn('status_poster',$stat);
        return $all->get()->getResultArray();
    }

    public function poster_submit($year){
        $sub= $this->table('poster');
        $sub->select('abstrak.abs_id');
        $sub->select('judul');
        $sub->select('penulis');
        $sub->select('poster');
        $sub->select('status_poster');
        $sub->select('submit_poster');
        $sub->select('update_poster');
        $sub->join('abstrak','abstrak.abs_id=poster.abs_id');
        $sub->where('YEAR(`submit_poster`)',$year);
        $sub->where('status_poster','submitted');
        return $sub->get()->getResultArray();
    }
    public function poster_accepted($year){
        $ac= $this->table('poster');
        $ac->select('abstrak.abs_id');
        $ac->select('judul');
        $ac->select('penulis');
        $ac->select('poster');
        $ac->select('status_poster');
        $ac->select('submit_poster');
        $ac->select('update_poster');
        $ac->join('abstrak','abstrak.abs_id=poster.abs_id');
        $ac->where('YEAR(`submit_poster`)',$year);
        $ac->where('status_poster','accepted');
        return $ac->get()->getResultArray();
    }
    public function poster_decline($year){
        $dec= $this->table('poster');
        $dec->select('abstrak.abs_id');
        $dec->select('judul');
        $dec->select('penulis');
        $dec->select('poster');
        $dec->select('status_poster');
        $dec->select('submit_poster');
        $dec->select('update_poster');
        $dec->join('abstrak','abstrak.abs_id=poster.abs_id');
        $dec->where('YEAR(`submit_poster`)',$year);
        $dec->where('status_poster','decline');
        return $dec->get()->getResultArray();
    }
    
}
