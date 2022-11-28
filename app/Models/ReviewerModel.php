<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewerModel extends Model
{
    protected $table      = 'reviewer';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_reviewer', 'id_user'];
    protected $createdField  = false;
    protected $updatedField  = false;
}
