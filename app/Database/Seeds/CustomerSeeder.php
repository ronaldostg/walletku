<?php 

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder; 
use CodeIgniter\I18n\Time;

class CustomerSeeder extends Seeder 
{
    public function run()
    {
        $data = [
            [
                'username'  => 'ronaldostg',
                'password'  =>  "ronaldo123",
                'fullname'  =>  "Ronaldo Sitanggang",
                'phone_number'  =>  '081232233222',
                'birthday'  =>  '1999-10-12',
                'gender'  =>  'L',
                'balance'  =>  500000,
                'created_at'=> Time::now()
            ],
            [
                'username'  => 'nurdinsjafii',
                'password'  =>  "nurdinsjafii123",
                'fullname'  =>  "Nurdin Sjafii",
                'phone_number'  =>  '081232233222',
                'birthday'  =>  '2003-05-15',
                'gender'  =>  'L',
                'balance'  =>  100000,
                'created_at'=> Time::now()
            ]
            
        ];
        $this->db->table('wk_customer')->insertBatch($data);
    }
} 