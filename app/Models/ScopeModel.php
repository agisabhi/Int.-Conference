<?php

namespace App\Models;

use CodeIgniter\Model;

class ScopeModel extends Model
{
    protected $table      = 'scope';
    protected $primaryKey = 'id_scope';
    protected $returnType     = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['id_scope', 'scope'];
    
}
