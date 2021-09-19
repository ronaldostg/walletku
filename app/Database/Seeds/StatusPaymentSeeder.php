<?php


namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder; 

class StatusPaymentSeeder extends Seeder
{   
    public function run(){
        $data=[
            [
                'status_name'=>'In Process'
            ]
            ,
            [
                'status_name'=>'Success'
            ]
            ,
            [
                'status_name'=>'Failed'
            ]
            

        ];

        $this->db->table('wk_status_payment')->insertBatch($data);
    }
}

?>