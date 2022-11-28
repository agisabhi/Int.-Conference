<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'institusi', 'email', 'password', 'level', 'status', 'phone'];
    protected $createdField  = false;
    protected $updatedField  = false;

    function userTotal(){
        $builder = $this->table('user');
        $builder->select('*');
        $builder->where('level','user');
        return $builder->countAllResults();
    }
    function userUnikom(){
        $builder1 = $this->table('user');
        $builder1->select('*');
        $builder1->where('level','user');
        $builder1->where('institusi','unikom');
        return $builder1->countAllResults();
    }
    function userNonUnikom(){
        $builder2 = $this->table('user');
        $builder2->select('*');
        $builder2->where('level','user');
        $builder2->where('institusi','non_unikom');
        return $builder2->countAllResults();
    }
}
