<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder; 

class TransactionTypeSeeder extends Seeder
{  
    public function run(){
        $data=[
            [
                'transaction_type_name'=>'Pulsa'
            ]
            ,
            [
                'transaction_type_name'=>'Token PLN'
            ]
            ,
            [
                'transaction_type_name'=>'Voucher Game'
            ]
            

        ];

        $this->db->table('wk_transaction_type')->insertBatch($data);
    
    }

}
?>