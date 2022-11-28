<?php

namespace App\Models;

use CodeIgniter\Model;

class RevisedModel extends Model
{
    protected $table      = 'revised_paper';
    protected $primaryKey = 'revised_id';
    protected $returnType     = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['abs_id', 'file_rp','decision_revised','notes_revised'];
    protected $createdField  = 'created_revised';
    protected $updatedField  = 'last_revised';
    
    public function revised_all($year){
        $decision = ['waiting decision','accepted','decline',];
        $builderfull = $this->table('revised_paper');
        $builderfull->select('c.abs_id');
        $builderfull->select('c.penulis');
        $builderfull->select('c.judul');
        $builderfull->select('c.abstrak');
        $builderfull->select('c.afiliasi');
        $builderfull->select('m.file_review');
        $builderfull->select('decision_revised');
        $builderfull->select('c.keyword');
        $builderfull->select('n.nama_reviewer');
        $builderfull->select('created_revised');
        $builderfull->select('last_revised');
        $builderfull->select('file_rp');
        
        $builderfull->join('abstrak as c','revised_paper.abs_id=c.abs_id');
        $builderfull->join('review as m','c.abs_id=m.abs_id');
        $builderfull->join('reviewer as n','n.id=m.id_reviewer');
        $builderfull->where('YEAR(`created_revised`)',$year);
        $builderfull->whereIn('decision_revised',$decision);
        $builderfull->orderBy('c.abs_id','ASC');
        return $builderfull;
    }

    //Revised Reviewer All Data
    public function revised_rev_all($year,$id_user){
        $decision = ['waiting decision','accepted','decline',];
        $builderrevall = $this->table('revised_paper');
        $builderrevall->select('c.abs_id');
        $builderrevall->select('c.penulis');
        $builderrevall->select('c.judul');
        $builderrevall->select('c.abstrak');
        $builderrevall->select('c.afiliasi');
        $builderrevall->select('m.file_review');
        $builderrevall->select('decision_revised');
        $builderrevall->select('c.keyword');
        $builderrevall->select('n.nama_reviewer');
        $builderrevall->select('created_revised');
        $builderrevall->select('last_revised');
        $builderrevall->select('file_rp');
        
        $builderrevall->join('abstrak as c','revised_paper.abs_id=c.abs_id');
        $builderrevall->join('review as m','c.abs_id=m.abs_id');
        $builderrevall->join('reviewer as n','n.id=m.id_reviewer');
        $builderrevall->join('user as u','n.id_user=u.id_user');
        $builderrevall->where('n.id_user',$id_user);
        $builderrevall->where('YEAR(`created_revised`)',$year);
        $builderrevall->whereIn('decision_revised',$decision);
        $builderrevall->orderBy('c.abs_id','ASC');
        return $builderrevall;
    }

    public function revised_acc($year){
        $builderacc = $this->table('revised_paper');
        $builderacc->select('abstrak.abs_id');
        $builderacc->select('penulis');
        $builderacc->select('judul');
        $builderacc->select('abstrak');
        $builderacc->select('afiliasi');
        $builderacc->select('decision_revised');
        $builderacc->select('keyword');
        $builderacc->select('created_revised');
        $builderacc->select('last_revised');
        
        $builderacc->select('file_rp');
        $builderacc->select('file_review');
        $builderacc->join('abstrak','revised_paper.abs_id=abstrak.abs_id');
        $builderacc->join('review as m','abstrak.abs_id=m.abs_id');
        $builderacc->join('reviewer as n','n.id=m.id_reviewer');
        $builderacc->where('decision_revised','accepted');
        $builderacc->where('YEAR(`created_revised`)',$year);
        $builderacc->orderBy('abstrak.abs_id','ASC');
        return $builderacc;
    }

    //Revised reviewer acc data
    public function revised_rev_acc($year,$id_user){
        $builderrevacc = $this->table('revised_paper');
        $builderrevacc->select('abstrak.abs_id');
        $builderrevacc->select('penulis');
        $builderrevacc->select('judul');
        $builderrevacc->select('abstrak');
        $builderrevacc->select('afiliasi');
        $builderrevacc->select('decision_revised');
        $builderrevacc->select('keyword');
        $builderrevacc->select('created_revised');
        $builderrevacc->select('last_revised');
        
        $builderrevacc->select('file_rp');
        $builderrevacc->select('file_review');
        $builderrevacc->join('abstrak','revised_paper.abs_id=abstrak.abs_id');
        $builderrevacc->join('review as m','abstrak.abs_id=m.abs_id');
        $builderrevacc->join('reviewer as n','n.id=m.id_reviewer');
        $builderrevacc->join('user as u','n.id_user=u.id_user');
        $builderrevacc->where('n.id_user',$id_user);
        $builderrevacc->where('decision_revised','accepted');
        $builderrevacc->where('YEAR(`created_revised`)',$year);
        $builderrevacc->orderBy('abstrak.abs_id','ASC');
        return $builderrevacc;
    }

    public function revised_decline($year){
        $builderdec = $this->table('revised_paper');
        $builderdec->select('abstrak.abs_id');
        $builderdec->select('penulis');
        $builderdec->select('judul');
        $builderdec->select('abstrak');
        $builderdec->select('afiliasi');
        $builderdec->select('decision_revised');
        $builderdec->select('keyword');
        $builderdec->select('created_revised');
        $builderdec->select('last_revised');
        $builderdec->select('file_rp');
        $builderdec->select('file_review');
        $builderdec->join('abstrak','revised_paper.abs_id=abstrak.abs_id');
        $builderdec->join('review as m','abstrak.abs_id=m.abs_id');
        $builderdec->join('reviewer as n','n.id=m.id_reviewer');
        $builderdec->where('decision_revised','decline');
        $builderdec->where('YEAR(`created_revised`)',$year);
        $builderdec->orderBy('abstrak.abs_id','ASC');
        return $builderdec;
    }
    
    
    // Revised reviewer decline
    public function revised_rev_decline($year,$id_user){
        $builderrevdec = $this->table('revised_paper');
        $builderrevdec->select('abstrak.abs_id');
        $builderrevdec->select('penulis');
        $builderrevdec->select('judul');
        $builderrevdec->select('abstrak');
        $builderrevdec->select('afiliasi');
        $builderrevdec->select('decision_revised');
        $builderrevdec->select('keyword');
        $builderrevdec->select('created_revised');
        $builderrevdec->select('last_revised');
        $builderrevdec->select('file_rp');
        $builderrevdec->select('file_review');
        $builderrevdec->join('abstrak','revised_paper.abs_id=abstrak.abs_id');
        $builderrevdec->join('review as m','abstrak.abs_id=m.abs_id');
        $builderrevdec->join('reviewer as n','n.id=m.id_reviewer');
        $builderrevdec->join('user as u','n.id_user=u.id_user');
        $builderrevdec->where('n.id_user',$id_user);
        $builderrevdec->where('decision_revised','decline');
        $builderrevdec->where('YEAR(`created_revised`)',$year);
        $builderrevdec->orderBy('abstrak.abs_id','ASC');
        return $builderrevdec;
    }

    public function revised_wait($year){
        $builderwa = $this->table('revised_paper');
        $builderwa->select('b.abs_id');
        $builderwa->select('b.penulis');
        $builderwa->select('b.judul');
        $builderwa->select('b.abstrak');
        $builderwa->select('b.afiliasi');
        $builderwa->select('decision_revised');
        $builderwa->select('b.keyword');
        $builderwa->select('created_revised');
        $builderwa->select('last_revised');
        
        $builderwa->select('file_review');
        $builderwa->select('file_rp');
        $builderwa->join('abstrak as b','revised_paper.abs_id=b.abs_id');
        $builderwa->join('review as m','b.abs_id=m.abs_id');
        $builderwa->join('reviewer as n','n.id=m.id_reviewer');
        $builderwa->where('decision_revised','waiting decision');
        $builderwa->where('YEAR(`created_revised`)',$year);
        $builderwa->orderBy('b.abs_id','ASC');
        return $builderwa;
    }
    
    //revised reviewer waiting
    public function revised_rev_wait($year,$id_user){
        $builderrevwa = $this->table('revised_paper');
        $builderrevwa->select('b.abs_id');
        $builderrevwa->select('b.penulis');
        $builderrevwa->select('b.judul');
        $builderrevwa->select('b.abstrak');
        $builderrevwa->select('b.afiliasi');
        $builderrevwa->select('decision_revised');
        $builderrevwa->select('b.keyword');
        $builderrevwa->select('created_revised');
        $builderrevwa->select('last_revised');
        
        $builderrevwa->select('file_review');
        $builderrevwa->select('file_rp');
        $builderrevwa->join('abstrak as b','revised_paper.abs_id=b.abs_id');
        $builderrevwa->join('review as m','b.abs_id=m.abs_id');
        $builderrevwa->join('reviewer as n','n.id=m.id_reviewer');
        
        $builderrevwa->join('user as u','n.id_user=u.id_user');
        $builderrevwa->where('n.id_user',$id_user);
        $builderrevwa->where('decision_revised','waiting decision');
        $builderrevwa->where('YEAR(`created_revised`)',$year);
        $builderrevwa->orderBy('b.abs_id','ASC');
        return $builderrevwa;
    }
    public function search($keyword,$year){
        $builder = $this->table('revised_paper');
        $builder->select('a.abs_id');
        $builder->select('a.penulis');
        $builder->select('a.judul');
        $builder->select('a.abstrak');
        $builder->select('a.afiliasi');
        $builder->select('decision_revised');
        $builder->select('a.keyword');
        $builder->select('n.nama_reviewer');
        $builder->select('created_revised');
        $builder->select('last_revised');
        $builder->select('file_rp');
        $builder->select('file_review');
        $builder->join('abstrak as a','revised_paper.abs_id=a.abs_id');
        $builder->join('review as m','a.abs_id=m.abs_id');
        $builder->join('reviewer as n','n.id=m.id_reviewer');
        $builder->where('YEAR(`created_revised`)',$year);
        $builder->like('a.abs_id',$keyword);
        $builder->orLike('a.abstrak',$keyword);
        $builder->orLike('a.penulis',$keyword);
        $builder->orLike('a.afiliasi',$keyword);
        $builder->orLike('a.keyword',$keyword);
        $builder->orLike('a.judul',$keyword);
        return $builder;
    }


    public function revised_review($id_user,$year){
        $decision = ['waiting decision','accepted','decline'];
        $builderfull = $this->table('revised_paper');
        $builderfull->select('c.abs_id');
        $builderfull->select('c.penulis');
        $builderfull->select('c.judul');
        $builderfull->select('c.abstrak');
        $builderfull->select('c.afiliasi');
        $builderfull->select('m.file_review');
        $builderfull->select('decision_revised');
        $builderfull->select('c.keyword');
        $builderfull->select('n.nama_reviewer');
        $builderfull->select('created_revised');
        $builderfull->select('last_revised');
        $builderfull->select('file_fp');
        $builderfull->join('abstrak as c','revised_paper.abs_id=c.abs_id');
        $builderfull->join('review as m','c.abs_id=m.abs_id');
        $builderfull->join('reviewer as n','n.id=m.id_reviewer');
        $builderfull->join('user as u','u.id_user=n.id_user');
        $builderfull->where('u.id_user',$id_user);
        $builderfull->where('YEAR(`created_revised`)',$year);
        $builderfull->whereIn('decision_revised',$decision);
        $builderfull->orderBy('c.abs_id','ASC');
        return $builderfull;
    }
    public function full_review_acc($id_user,$year){
        
        $builderful = $this->table('revised_paper');
        $builderful->select('c.abs_id');
        $builderful->select('c.penulis');
        $builderful->select('c.judul');
        $builderful->select('c.abstrak');
        $builderful->select('c.afiliasi');
        $builderful->select('m.file_review');
        $builderful->select('decision_revised');
        $builderful->select('c.keyword');
        $builderful->select('n.nama_reviewer');
        $builderful->select('created_revised');
        $builderful->select('last_revised');
        $builderful->select('file_fp');
        
        $builderful->join('abstrak as c','revised_paper.abs_id=abstrak.abs_id');
        $builderful->join('review as m','c.abs_id=m.abs_id');
        $builderful->join('reviewer as n','n.id=m.id_reviewer');
        $builderful->join('user as u','u.id_user=n.id_user');
        $builderful->where('u.id_user',$id_user);
        $builderful->where('decision_revised','accepted');
        $builderful->where('YEAR(`created_revised`)',$year);
        
        $builderful->orderBy('c.abs_id','ASC');
        return $builderful;
    }


    public function searchFullReviewer($keyword, $user, $year){
        $builders = $this->table('revised_paper');
        $builders->select('a.abs_id');
        $builders->select('a.penulis');
        $builders->select('a.judul');
        $builders->select('a.abstrak');
        $builders->select('a.afiliasi');
        $builders->select('decision_revised');
        $builders->select('a.keyword');
        $builders->select('n.nama_reviewer');
        $builders->select('created_revised');
        $builders->select('last_revised');
        $builders->select('file_fp');
        $builders->select('m.file_review');
        $builders->join('abstrak as a','revised_paper.abs_id=a.abs_id');
        $builders->join('review as m','a.abs_id=m.abs_id');
        $builders->join('reviewer as n','n.id=m.id_reviewer');
        $builders->join('user as u','u.id_user=n.id_user');
        $builders->where('YEAR(`created_revised`)',$year);
        $builders->where('u.id_user',$user);
        $builders->like('a.abs_id',$keyword);
        $builders->orLike('a.abstrak',$keyword);
        $builders->orLike('a.penulis',$keyword);
        $builders->orLike('a.afiliasi',$keyword);
        $builders->orLike('a.keyword',$keyword);
        $builders->orLike('a.judul',$keyword);
        return $builders;
    }

    public function DownloadRevised($year){
        $download = $this->table('revised_paper');
        $download->select('*');
        $download->whereIn('decision_revised','accepted');
        $download->where('YEAR(`created_revised`)',$year);
        return $download;

    }

    function email_revised_acc($year){
        $em  = $this->table('revised_paper');
        $em->select('email');
        $em->join('abstrak','abstrak.abs_id=revised_paper.abs_id');
        $em->join('user','abstrak.id_user=user.id_user');
        $em->where('decision_revised','accepted');
        return $em->get()->getResultArray();
    }

    public function revised_req($year){
        $ems  = $this->table('revised_paper');
        $ems->select('email');
        $ems->join('abstrak','abstrak.abs_id=revised_paper.abs_id');
        $ems->join('user','abstrak.id_user=user.id_user');
        $ems->where('decision_revised','not submitted');
        $ems->where('YEAR(`created_revised`)',$year);
        return $ems->get()->getResultArray();
    }

    function revised_total($year){
        $stat = ['accepted', 'decline', 'waiting decision'];
        $totpap = $this->table('revised_paper');
        $totpap->select('*');
        $totpap->join('abstrak','abstrak.abs_id=revised_paper.abs_id');
        $totpap->join('user','user.id_user=abstrak.id_user');
        $totpap->where('YEAR(created_revised)',$year);
        $totpap->whereIn('decision_revised',$stat);
        return $totpap->countAllResults();
    }
    function revised_unikom($year){
        $stat = ['accepted', 'decline', 'waiting decision'];
        $totun = $this->table('revised_paper');
        $totun->select('*');
        $totun->join('abstrak','abstrak.abs_id=revised_paper.abs_id');
        $totun->join('user','user.id_user=abstrak.id_user');
        $totun->where('YEAR(created_revised)',$year);
        $totun->where('user.institusi','unikom');
        $totun->whereIn('decision_revised',$stat);
        return $totun->countAllResults();
    }
    function revised_non($year){
        $stat = ['accepted', 'decline', 'waiting decision'];
        $totnon = $this->table('revised_paper');
        $totnon->select('*');
        $totnon->join('abstrak','abstrak.abs_id=revised_paper.abs_id');
        $totnon->join('user','user.id_user=abstrak.id_user');
        $totnon->where('YEAR(created_revised)',$year);
        $totnon->where('user.institusi','non_unikom');
        $totnon->whereIn('decision_revised',$stat);
        return $totnon->countAllResults();
    }

    function revised_acc_user($year,$id_user){
        $accus = $this->table('revised_paper');
        $accus->select('abstrak.abs_id');
        $accus->select('judul');
        $accus->select('penulis');
        $accus->join('abstrak','abstrak.abs_id=revised_paper.abs_id');
        $accus->where('YEAR(submit_date)',$year);
        $accus->where('id_user',$id_user);
        $accus->where('decision_revised','accepted');
        return $accus->get()->getResultArray();
    }
}
