<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table      = 'review';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['abs_id', 'notes', 'file_review', 'id_reviewer'];
    protected $createdField  = false;
    protected $updatedField  = false;

    public function email_acc(){
        $em  = $this->table('review');
        $em->select('email');
        $em->join('abstrak','abstrak.abs_id=review.abs_id');
        $em->join('user','abstrak.id_user=user.id_user');
        return $em->get()->getResultArray();
    }
}
