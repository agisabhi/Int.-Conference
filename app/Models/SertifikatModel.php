<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifikatModel extends Model
{
    protected $table      = 'sertifikat';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['id','abs_id', 'status_kehadiran'];
    protected $createdField  = false;
    protected $updatedField  = false;
    

    public function all(){
        $al = $this->table('sertifikat');
        $al->select('judul');
        $al->select('abstrak.abs_id');
        $al->select('penulis');
        $al->select('status_kehadiran');
        $al->join('abstrak','abstrak.abs_id=sertifikat.abs_id');
        return $al->get()->getResultArray();
    }

    public function all_user($year,$id_user){
        $us = $this->table('sertifikat');
        $us->select('judul');
        $us->select('abstrak.abs_id');
        $us->select('penulis');
        $us->select('status_kehadiran');
        $us->join('abstrak','abstrak.abs_id=sertifikat.abs_id');
        $us->where('id_user',$id_user);
        $us->where('status_kehadiran','hadir');
        $us->where('YEAR(submit_date)',$year);
        return $us->get()->getResultArray();
    }
}
