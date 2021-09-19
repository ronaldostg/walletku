<?php


namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder; 
use CodeIgniter\I18n\Time;


class PaymentSeeder extends Seeder
{   
    public function run(){
        $data=[
            [
                'number_payment'=>'#477r4ig45gu4g',
                'amount'=>50000,
                'description'=>'Pembayaran listrik mas angga',
                'status_payment_id'=>1,
                'transaction_type_id'=>2,
                'customer_id'=>2,
                'created_at'=>Time::now(),
                
            ]
            

        ];

        $this->db->table('wk_payment')->insertBatch($data);
    }
}

?>