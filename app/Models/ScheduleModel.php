<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table      = 'schedule';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['awal_abstrak','akhir_abstrak','awal_full','akhir_full','awal_payment','akhir_payment',
                                'awal_review1','akhir_review1','awal_review2','akhir_review2','awal_revised','akhir_revised',
                                'awal_poster','akhir_poster',];
    protected $createdField  = false;
    protected $updatedField  = false;

    
}
