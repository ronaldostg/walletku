<?php

namespace App\Controllers;
 
use App\Models\PaymentModel;

use CodeIgniter\RESTful\ResourceController; 
use CodeIgniter\API\ResponseTrait;
use App\Controllers\StatusPaymentController;
use App\Models\TransactionTypeModel;
use CodeIgniter\I18n\Time;

class PaymentController extends ResourceController
{
    use ResponseTrait;

    
    public function getAllPayment(){

        // deklarasi model payment
        $paymentModel = new PaymentModel();

        $dataPayment = $paymentModel->findAll();

        // deklarasi beberapa controller 
        $statusPayment = new StatusPaymentController();
        
        $transType = new TransactionTypeController();

        $customers = new CustomerController();

        // return $this->respondCreated($dataPayment);
        
        
        // looping untuk melakukan memecahkan data dari payment
        for ($i = 0; $i < count($dataPayment); $i++) {

            // memanggil method untk pengambilan data tertentu
            $statusValue = $statusPayment->getDataStatusById($dataPayment[$i]['status_payment_id']);
            $transactionTypeaValue = $transType->getDataTransType($dataPayment[$i]['transaction_type_id']);
            $customersValue = $customers->getDataCustomerById($dataPayment[$i]['customer_id']);


            // menyusun data-data yang dipecah dan dimasukkan ke dalam array
            $data[$i] = array(
                'number_payment' => $dataPayment[$i]['number_payment'],
                'amount' => $dataPayment[$i]['amount'],
                'description' => $dataPayment[$i]['description'],


                'customer'=>array(
                    
                    'customer_id'=>$customersValue['customer_id'],
                    'username'=>$customersValue['username'],

                    'fullname'=>$customersValue['fullname'],

                ),

                'status_payment' => $statusValue['status_name'], 
                
                // array(
                //     'status_id' =>$statusValue['status_id'],
                //     'status_name' =>$statusValue['status_name'],
                // ),


                'transaction_type' =>$transactionTypeaValue['trans_type_name'], 
                
                // array(
                //     'trans_type_id' =>$transactionTypeaValue['trans_type_id'],
                //     'trans_type_name' =>$transactionTypeaValue['trans_type_name'],
                    

                // )
                

            );

            $response = array(
                'status'=>200,
                'error'=>false,
                'message'=>'Berhasil menampilkan data',
                'data'=>$data

            );
        }

        // print untuk hasil response
        return $this->respond($response, 200);


    }

    public function getPaymentsByUser(){
        // deklarasi model payment
        $paymentModel = new PaymentModel();

        // deklarasi beberapa controller 
        $statusPayment = new StatusPaymentController();
                
        $transType = new TransactionTypeController();

        $customers = new CustomerController();


        $dataPayment = $paymentModel->findAll();

        $customer_id =$this->request->getPost('customer_id');
        $status_payment =$this->request->getPost('status_payment');
        $type_transaction =$this->request->getPost('type_transaction');
        
        $id_customer =($customer_id)?$customer_id:$this->request->getPost('customer_id');
        $payment_status =($status_payment)?$status_payment:$this->request->getPost('status_payment');
        $transaction_type =($type_transaction)?$type_transaction:$this->request->getPost('type_transaction');
        
        $cekIdCustomer = ($id_customer)?'WHERE customer_id = '.$id_customer :'';
        $cekPaymentStatus = ($payment_status)?'AND status_payment_id = '.$payment_status :'';
        $cekTransType = ($transaction_type)?'AND transaction_type_id = '.$transaction_type :'';


        $partsQuery= array(
            $cekIdCustomer,
            $cekPaymentStatus,
            $cekTransType
        );

       $valuePayment= $paymentModel->getDataPaymentByCustomer($partsQuery);



        
        $response = array(
            'status'=>200,
            'message'=>'Berhasil mengambil data',
            'customer'=>array($customers->getDataCustomerById($id_customer)),
               
            'payment_data'=>$valuePayment
        );
    
        return $this->respond($response, 200);


    }


    public function addPayment(){

        $transactionTypeModel = new TransactionTypeModel();


        $customer_id = $this->request->getPost('customer_id');

        $transactionType = $this->request->getPost('trans_type');
        
        $description = $this->request->getPost('description');

        $statusPayment = 1;

        $amount = $this->request->getPost('amount');
        
        $createdAt = Time::now();

        // untuk key sesuaikan dengan table
        $data = array(
            'number_payment'=>'WK-'.rand(0,100).''.rand(0,100),
            'customer_id'=>$customer_id,
            // 'transaction_type'=>$transactionTypeModel->getTypeTransaction(2),
            'transaction_type_id'=>$transactionType,
            'status_payment_id'=>$statusPayment,
            'amount'=>$amount,
            'description'=>$description,
            'created_at'=>$createdAt,
        );

        $paymentModel = new PaymentModel();
        
        $response = $paymentModel->addDataPayment($data);
        

        return $this->respondCreated($response);



    }



    
}
