<?php

namespace App\Models;

use CodeIgniter\Model;

class AbstrakModel extends Model
{
    protected $table      = 'abstrak';
    protected $primaryKey = 'abs_id';
    protected $returnType     = 'array';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $allowedFields = ['abs_id','judul', 'penulis', 'afiliasi', 'id_scope', 'keyword', 'abstrak', 'presenter','type','id_user','status','uniqid'];
    protected $createdField  = 'submit_date';
    protected $updatedField  = 'update_date';

    public function search($keyword,$year){
        $builder = $this->table('abstrak');
        $builder->where('YEAR(submit_date)',$year);
        $builder->like('abs_id',$keyword);
        $builder->orLike('abstrak',$keyword);
        $builder->orLike('penulis',$keyword);
        $builder->orLike('afiliasi',$keyword);
        $builder->orLike('keyword',$keyword);
        $builder->orLike('judul',$keyword);
        return $builder;
    }
public function abstrak_acc($year){
        $builder2 = $this->table('abstrak');
        
        $builder2->where('YEAR(`submit_date`)',$year);
        $builder2->where('status','accepted');
        $builder2->orderBy('abs_id','ASC');
        return $builder2;
    }
    public function abstrak_all($year){
        $builders = $this->table('abstrak');
        $builders->select('abstrak.abs_id');
        $builders->select('abstrak.judul');
        $builders->select('abstrak.penulis');
        $builders->select('abstrak.afiliasi');
        $builders->select('abstrak.abstrak');
        $builders->select('abstrak.status');
        $builders->select('abstrak.type');
        $builders->select('abstrak.keyword');
        $builders->select('abstrak.submit_date');
        $builders->select('abstrak.update_date');
        $builders->select('scope');
        $builders->join('scope','scope.id_scope=abstrak.id_scope');
        $builders->where('YEAR(`submit_date`)',$year);
        $builders->orderBy('abs_id','ASC');
        return $builders;
    }
    public function abstrak_decline($year){
        $builder1 = $this->table('abstrak');
        
        $builder1->where('status','decline');
        $builder1->where('YEAR(`submit_date`)',$year);
        $builder1->orderBy('abs_id','ASC');
        return $builder1;
    }
    public function abstrak_wait($year){
        $builderw = $this->table('abstrak');
        
        $builderw->where('status','awaiting decision');
        $builderw->where('YEAR(`submit_date`)',$year);
        $builderw->orderBy('abs_id','ASC');
        return $builderw;
    }

    public function metadata($year){
        $builders = $this->table('abstrak');
        $builders->select('abstrak.abs_id');
        $builders->select('abstrak.judul');
        $builders->select('abstrak.penulis');
        $builders->select('abstrak.afiliasi');
        $builders->select('abstrak.abstrak');
        $builders->select('abstrak.status');
        $builders->select('abstrak.type');
        $builders->select('abstrak.keyword');
        $builders->select('abstrak.submit_date');
        $builders->select('abstrak.update_date');
        $builders->select('scope');
        $builders->join('scope','scope.id_scope=abstrak.id_scope');
        $builders->where('YEAR(`submit_date`)',$year);
        $builders->where('status','accepted');
        $builders->orderBy('abs_id','ASC');
        return $builders;
    }
    public function allMetadata($year){
        $builderalm = $this->table('abstrak');
        $builderalm->select('abstrak.abs_id');
        $builderalm->select('nama');
        $builderalm->select('institusi');
        $builderalm->select('email');
        $builderalm->select('phone');
        $builderalm->select('abstrak.judul');
        $builderalm->select('abstrak.penulis');
        $builderalm->select('abstrak.afiliasi');
        $builderalm->select('abstrak.abstrak');
        $builderalm->select('abstrak.status');
        $builderalm->select('abstrak.type');
        $builderalm->select('abstrak.keyword');
        $builderalm->select('abstrak.submit_date');
        $builderalm->select('abstrak.update_date');
        $builderalm->select('decision');
        $builderalm->select('decision_revised');
        $builderalm->select('status_poster');
        $builderalm->select('scope');
        $builderalm->join('scope','scope.id_scope=abstrak.id_scope');
        $builderalm->join('user','user.id_user=abstrak.id_user');
        $builderalm->join('full_paper','full_paper.abs_id=abstrak.abs_id');
        $builderalm->join('revised_paper','revised_paper.abs_id=abstrak.abs_id');
        $builderalm->join('poster','poster.abs_id=abstrak.abs_id');
        $builderalm->where('YEAR(`submit_date`)',$year);
        
        $builderalm->where('level','user');
        $builderalm->orderBy('abs_id','ASC');
        return $builderalm;
    }

    public function email_acc(){
        $em = $this->table('abstrak');
        $em->select('abstrak.abs_id');
        $em->select('abstrak.id_user');
        $em->select('email');
        $em->join('user','user.id_user=abstrak.id_user');
        $em->where('abstrak.status','accepted');
        return $em->get()->getResultArray();
    }

    function abs_total($year){
        $totabs = $this->table('abstrak');
        $totabs->select('*');
        $totabs->join('user','user.id_user=abstrak.id_user');
        $totabs->where('YEAR(submit_date)',$year);
        return $totabs->countAllResults();
    }
    function abs_unikom($year){
        $totun = $this->table('abstrak');
        $totun->select('*');
        $totun->join('user','user.id_user=abstrak.id_user');
        $totun->where('YEAR(submit_date)',$year);
        $totun->where('user.institusi','unikom');
        return $totun->countAllResults();
    }
    function abs_non($year){
        $totnon = $this->table('abstrak');
        $totnon->select('*');
        $totnon->join('user','user.id_user=abstrak.id_user');
        $totnon->where('YEAR(submit_date)',$year);
        $totnon->where('user.institusi','non_unikom');
        return $totnon->countAllResults();
    }
    
}
