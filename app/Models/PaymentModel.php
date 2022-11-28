<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table      = 'payment';
    protected $primaryKey = 'id_payment';
    protected $returnType     = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['abs_id','payment_proof','transfer_date','transfer_time','bank_name','account_name','account_number', 'amount','payment_status'];
    protected $createdField  = 'created_payment';
    protected $updatedField  = 'update_payment';

    public function detailPayment($year){
        $paymen = $this->table('payment');
        $paymen->select('transfer_date');
        $paymen->select('payment_proof');
        $paymen->select('transfer_time');
        $paymen->select('bank_name');
        $paymen->select('account_name');
        $paymen->select('account_number');
        $paymen->select('amount');
        $paymen->select('payment.abs_id');
        $paymen->select('payment_status');
        $paymen->select('created_payment');
        $paymen->select('update_payment');
        $paymen->join('abstrak','abstrak.abs_id=payment.abs_id');
        $paymen->where('YEAR(`created_payment`)',$year);
        $paymen->where('payment_status','uploaded');
        return $paymen;
    }
    
}
