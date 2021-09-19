<?php

namespace App\Models;

use App\Controllers\StatusPaymentController;
use App\Controllers\TransactionTypeController;
use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'wk_payment';
    protected $primaryKey           = 'payment_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'number_payment',
        'amount',
        'description',
        'status_payment_id',
        'customer_id',
        'transaction_type_id',
        'created_at'
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];



    public function getDataPaymentByCustomer($query)
    {

        $db = \Config\Database::connect();



        $textQuery = 'SELECT * FROM wk_payment ' . $query[0] . ' ' . $query[1] . ' ' . $query[2];

        $query = $db->query($textQuery);

        $result = $query->getResultArray();




        $transType = new TransactionTypeController();
        $statusPayment = new StatusPaymentController();

        for ($i = 0; $i < count($result); $i++) {
            # code...

            $transactionTypeValue = $transType->getDataTransType($result[$i]['transaction_type_id']);

            $statusValue = $statusPayment->getDataStatusById($result[$i]['status_payment_id']);

            $Data[$i] = array(

                'number_payment' => $result[$i]['number_payment'],
                'amount' => $result[$i]['amount'],
                'description' => $result[$i]['description'],

                'status' => $statusValue['status_name'],

                'transaction_type' => $transactionTypeValue['trans_type_name'],




                'created_at' => $result[$i]['created_at']


                
            );
        }
        return $Data;
    }


    public function addDataPayment($data){
        
        // var_dump($data);  

        // public $naldo=1;
        
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        if($builder->insert($data)){
            // echo "berhasil";

            $response = array(
                'status'=>200,
                'message'=>'Berhasil ditambahkan',
                'data'=>$data,

            );
        }else{

            // echo "gagal";
            $response = array(
                'status'=>500,
                'message'=>'Gagal ditambahkan',
                

            );
        }

        return $response;

        


    }
}
