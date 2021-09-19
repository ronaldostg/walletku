<?php namespace App\Database\Seeds;
  
  use CodeIgniter\Database\Seeder; 

class AllTableSeeder extends Seeder
{
    public function run()
    {
        $this->call('CustomerSeeder');
        $this->call('PaymentSeeder');
        $this->call('StatusPaymentSeeder');
        $this->call('TransactionTypeSeeder');
    }
} 