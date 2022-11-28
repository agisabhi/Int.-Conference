<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table      = 'home';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['conf_date','logo', 'about','scope','important_dates'];
    protected $createdField  = false;
    protected $updatedField  = false;
    
}
