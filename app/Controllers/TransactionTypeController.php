<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionTypeModel;
use CodeIgniter\API\ResponseTrait;

class TransactionTypeController extends BaseController
{
    use ResponseTrait;
    public function getDataTransType($idType)
    {
        //

        $TransactionTypeModel = new TransactionTypeModel();

        $dataTransactionType = $TransactionTypeModel->where('transaction_type_id', $idType)->first();

        // return $this->respond($dataStatusPayment, 200);

        return array(
            'trans_type_id'=>$dataTransactionType['transaction_type_id'],
            
            'trans_type_name'=>$dataTransactionType['transaction_type_name']
        );
        

    }
}
