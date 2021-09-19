<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StatusPaymentModel;

use CodeIgniter\API\ResponseTrait;

class StatusPaymentController extends BaseController
{

    use ResponseTrait;
    public function getDataStatusById($idStatus)
    {
        //

        $statusPaymentModel = new StatusPaymentModel();

        $dataStatusPayment = $statusPaymentModel->where('status_id', $idStatus)->first();

        // return $this->respond($dataStatusPayment, 200);

        return array(
            'status_id'=>$dataStatusPayment['status_id'],
            
            'status_name'=>$dataStatusPayment['status_name']
        );
        

    }
}
