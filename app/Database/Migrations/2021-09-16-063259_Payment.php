<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payment extends Migration
{
    public function up()
    {
        //

        $this->forge->addField([
            'payment_id'=>[
                'type'=>'INT',
                'constraint'=>'100',
                'unsigned'=>true,
                'auto_increment'=>true

            ],'number_payment' =>[
				'type'=>'VARCHAR',
				'constraint'=>'1000',

			],
			'amount' =>[
				'type'=>'VARCHAR',
				'constraint'=>'1000',

			]
            ,
			
			'description' =>[
				'type'=>'VARCHAR',
				'constraint'=>'1000',

			]
            ,
			
			'status_payment_id' =>[
				'type'=>'INT',

			]
            ,
             
			
			'customer_id' =>[
				'type'=>'INT',

			]
            ,
			'transaction_type_id' =>[
				'type'=>'INT',

			]
            ,
            
			'created_at' =>[
				'type'=>'DATE',
				'null'=>true,

			]
             
          

            ]);


            $this->forge->addKey('payment_id', true);
            
            $this->forge->createTable('wk_payment', true);

    }

    public function down()
    {
        $this->forge->dropTable('wk_payment');
    }
}
