<?php

namespace App\Models;

use CodeIgniter\Model;

class FullModel extends Model
{
    protected $table      = 'full_paper';
    protected $primaryKey = 'paper_id';
    protected $returnType     = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['abs_id', 'file_fp','decision',];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'last_update';
    
    public function full_all($year){
        $decision = ['waiting_decision','revision required','accept','decline','revision submitted'];
        $builderfull = $this->table('full_paper');
        $builderfull->select('c.abs_id');
        $builderfull->select('c.penulis');
        $builderfull->select('c.judul');
        $builderfull->select('c.abstrak');
        $builderfull->select('c.afiliasi');
        $builderfull->select('m.file_review');
        $builderfull->select('decision');
        $builderfull->select('c.keyword');
        $builderfull->select('n.nama_reviewer');
        $builderfull->select('created_at');
        $builderfull->select('last_update');
        $builderfull->select('file_fp');
        $builderfull->join('abstrak as c','full_paper.abs_id=c.abs_id');
        $builderfull->join('review as m','c.abs_id=m.abs_id');
        $builderfull->join('reviewer as n','n.id=m.id_reviewer');
        $builderfull->where('YEAR(`created_at`)',$year);
        $builderfull->whereIn('decision',$decision);
        $builderfull->orderBy('c.abs_id','ASC');
        return $builderfull;
    }
    public function full_acc($year){
        $builderacc = $this->table('full_paper');
        $builderacc->select('abstrak.abs_id');
        $builderacc->select('penulis');
        $builderacc->select('judul');
        $builderacc->select('abstrak');
        $builderacc->select('afiliasi');
        $builderacc->select('decision');
        $builderacc->select('keyword');
        $builderacc->select('nama_reviewer');
        $builderacc->select('created_at');
        $builderacc->select('last_update');
        
        $builderacc->select('file_fp');
        $builderacc->join('abstrak','full_paper.abs_id=abstrak.abs_id');
        $builderacc->join('review as m','abstrak.abs_id=m.abs_id');
        $builderacc->join('reviewer as n','n.id=m.id_reviewer');
        $builderacc->where('decision','accept');
        $builderacc->where('YEAR(`created_at`)',$year);
        $builderacc->orderBy('abstrak.abs_id','ASC');
        return $builderacc;
    }
    public function full_decline($year){
        $builderdec = $this->table('full_paper');
        $builderdec->select('abstrak.abs_id');
        $builderdec->select('penulis');
        $builderdec->select('judul');
        $builderdec->select('abstrak');
        $builderdec->select('afiliasi');
        $builderdec->select('decision');
        $builderdec->select('keyword');
        $builderdec->select('created_at');
        $builderdec->select('last_update');
        $builderdec->select('file_fp');
        $builderdec->join('abstrak','full_paper.abs_id=abstrak.abs_id');
        $builderdec->where('decision','decline');
        $builderdec->where('YEAR(`created_at`)',$year);
        $builderdec->orderBy('abstrak.abs_id','ASC');
        return $builderdec;
    }
    public function full_wait($year){
        $builderwa = $this->table('full_paper');
        $builderwa->select('b.abs_id');
        $builderwa->select('b.penulis');
        $builderwa->select('b.judul');
        $builderwa->select('b.abstrak');
        $builderwa->select('b.afiliasi');
        $builderwa->select('decision');
        $builderwa->select('b.keyword');
        $builderwa->select('created_at');
        $builderwa->select('last_update');
        
        $builderwa->select('file_fp');
        $builderwa->join('abstrak as b','full_paper.abs_id=b.abs_id');
        $builderwa->where('decision','waiting_decision');
        $builderwa->where('YEAR(`created_at`)',$year);
        $builderwa->orderBy('b.abs_id','ASC');
        return $builderwa;
    }
    public function search($keyword,$year){
        $builder = $this->table('full_paper');
        $builder->select('a.abs_id');
        $builder->select('a.penulis');
        $builder->select('a.judul');
        $builder->select('a.abstrak');
        $builder->select('a.afiliasi');
        $builder->select('decision');
        $builder->select('a.keyword');
        $builder->select('n.nama_reviewer');
        $builder->select('created_at');
        $builder->select('last_update');
        $builder->select('file_fp');
        $builder->join('abstrak as a','full_paper.abs_id=a.abs_id');
        $builder->join('review as m','a.abs_id=m.abs_id');
        $builder->join('reviewer as n','n.id=m.id_reviewer');
        $builder->where('YEAR(`created_at`)',$year);
        $builder->like('a.abs_id',$keyword);
        $builder->orLike('a.abstrak',$keyword);
        $builder->orLike('a.penulis',$keyword);
        $builder->orLike('a.afiliasi',$keyword);
        $builder->orLike('a.keyword',$keyword);
        $builder->orLike('a.judul',$keyword);
        return $builder;
    }


    public function full_review($id_user,$year){
        $decision = ['waiting_decision','revision required','accept','decline','revision submitted'];
        $builderfull = $this->table('full_paper');
        $builderfull->select('c.abs_id');
        $builderfull->select('c.penulis');
        $builderfull->select('c.judul');
        $builderfull->select('c.abstrak');
        $builderfull->select('c.afiliasi');
        $builderfull->select('m.file_review');
        $builderfull->select('decision');
        $builderfull->select('c.keyword');
        $builderfull->select('n.nama_reviewer');
        $builderfull->select('created_at');
        $builderfull->select('last_update');
        $builderfull->select('file_fp');
        $builderfull->join('abstrak as c','full_paper.abs_id=c.abs_id');
        $builderfull->join('review as m','c.abs_id=m.abs_id');
        $builderfull->join('reviewer as n','n.id=m.id_reviewer');
        $builderfull->join('user as u','u.id_user=n.id_user');
        $builderfull->where('u.id_user',$id_user);
        $builderfull->where('YEAR(`created_at`)',$year);
        $builderfull->whereIn('decision',$decision);
        $builderfull->orderBy('c.abs_id','ASC');
        return $builderfull;
    }
    public function full_review_wait($id_user,$year){
        
        $builderfullw = $this->table('full_paper');
        $builderfullw->select('c.abs_id');
        $builderfullw->select('c.penulis');
        $builderfullw->select('c.judul');
        $builderfullw->select('c.abstrak');
        $builderfullw->select('c.afiliasi');
        $builderfullw->select('m.file_review');
        $builderfullw->select('decision');
        $builderfullw->select('c.keyword');
        $builderfullw->select('n.nama_reviewer');
        $builderfullw->select('created_at');
        $builderfullw->select('last_update');
        $builderfullw->select('file_fp');
        $builderfullw->join('abstrak as c','full_paper.abs_id=c.abs_id');
        $builderfullw->join('review as m','c.abs_id=m.abs_id');
        $builderfullw->join('reviewer as n','n.id=m.id_reviewer');
        $builderfullw->join('user as u','u.id_user=n.id_user');
        $builderfullw->where('u.id_user',$id_user);
        $builderfullw->where('YEAR(`created_at`)',$year);
        $builderfullw->where('decision','waiting_decision');
        $builderfullw->orderBy('c.abs_id','ASC');
        return $builderfullw;
    }
    public function full_review_acc($id_user,$year){
        
        $builderful = $this->table('full_paper');
        $builderful->select('c.abs_id');
        $builderful->select('c.penulis');
        $builderful->select('c.judul');
        $builderful->select('c.abstrak');
        $builderful->select('c.afiliasi');
        $builderful->select('m.file_review');
        $builderful->select('decision');
        $builderful->select('c.keyword');
        $builderful->select('n.nama_reviewer');
        $builderful->select('created_at');
        $builderful->select('last_update');
        $builderful->select('file_fp');
        $builderful->select('m.file_review');
        $builderful->join('abstrak as c','full_paper.abs_id=c.abs_id');
        $builderful->join('review as m','c.abs_id=m.abs_id');
        $builderful->join('reviewer as n','n.id=m.id_reviewer');
        $builderful->join('user as u','u.id_user=n.id_user');
        $builderful->where('u.id_user',$id_user);
        $builderful->where('decision','accept');
        $builderful->where('YEAR(`created_at`)',$year);
        $builderful->whereIn('decision','accept');
        $builderful->orderBy('c.abs_id','ASC');
        return $builderful;
    }


    public function searchFullReviewer($keyword, $user, $year){
        $builders = $this->table('full_paper');
        $builders->select('a.abs_id');
        $builders->select('a.penulis');
        $builders->select('a.judul');
        $builders->select('a.abstrak');
        $builders->select('a.afiliasi');
        $builders->select('decision');
        $builders->select('a.keyword');
        $builders->select('n.nama_reviewer');
        $builders->select('created_at');
        $builders->select('last_update');
        $builders->select('file_fp');
        $builders->select('m.file_review');
        $builders->join('abstrak as a','full_paper.abs_id=a.abs_id');
        $builders->join('review as m','a.abs_id=m.abs_id');
        $builders->join('reviewer as n','n.id=m.id_reviewer');
        $builders->join('user as u','u.id_user=n.id_user');
        $builders->where('YEAR(`created_at`)',$year);
        $builders->where('u.id_user',$user);
        $builders->like('a.abs_id',$keyword);
        $builders->orLike('a.abstrak',$keyword);
        $builders->orLike('a.penulis',$keyword);
        $builders->orLike('a.afiliasi',$keyword);
        $builders->orLike('a.keyword',$keyword);
        $builders->orLike('a.judul',$keyword);
        return $builders;
    }

    public function full_req($year){
        $em  = $this->table('full_paper');
        $em->select('email');
        $em->join('abstrak','abstrak.abs_id=full_paper.abs_id');
        $em->join('user','abstrak.id_user=user.id_user');
        $em->where('decision','not submitted');
        $em->where('YEAR(created_at)',$year);
        return $em->get()->getResultArray();
    }
    function full_total($year){
        $stat = ['accept', 'decline', 'waiting_decision', 'revision required', 'revision submitted'];
        $totpap = $this->table('full_paper');
        $totpap->select('*');
        $totpap->join('abstrak','abstrak.abs_id=full_paper.abs_id');
        $totpap->join('user','user.id_user=abstrak.id_user');
        $totpap->where('YEAR(created_at)',$year);
        $totpap->whereIn('decision',$stat);
        return $totpap->countAllResults();
    }
    function full_unikom($year){
        $stat = ['accept', 'decline', 'waiting_decision', 'revision required', 'revision submitted'];
        $totun = $this->table('full_paper');
        $totun->select('*');
        $totun->join('abstrak','abstrak.abs_id=full_paper.abs_id');
        $totun->join('user','user.id_user=abstrak.id_user');
        $totun->where('YEAR(created_at)',$year);
        $totun->where('user.institusi','unikom');
        $totun->whereIn('decision',$stat);
        return $totun->countAllResults();
    }
    function full_non($year){
        $stat = ['accept', 'decline', 'waiting_decision', 'revision required', 'revision submitted'];
        $totnon = $this->table('full_paper');
        $totnon->select('*');
        $totnon->join('abstrak','abstrak.abs_id=full_paper.abs_id');
        $totnon->join('user','user.id_user=abstrak.id_user');
        $totnon->where('YEAR(created_at)',$year);
        $totnon->whereIn('decision',$stat);
        $totnon->where('user.institusi','non_unikom');
        return $totnon->countAllResults();
    }
}
