<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusPayment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'status_id'=>[
                'type'=>'INT',
                'constraint'=>'100',
                'unsigned'=>true,
                'auto_increment'=>true

            ],'status_name' =>[
				'type'=>'VARCHAR',
				'constraint'=>'1000',

			] 

            ]);


            $this->forge->addKey('status_id', true);
            
            $this->forge->createTable('wk_status_payment', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('wk_status_payment');
    }
}
