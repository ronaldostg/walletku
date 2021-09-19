<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'customer_id'=>[
                'type'=>'INT',
                'constraint'=>'100',
                'unsigned'=>true,
                'auto_increment'=>true

            ],'username' =>[
				'type'=>'VARCHAR',
				'constraint'=>'1000',

			],
			'password' =>[
				'type'=>'VARCHAR',
				'constraint'=>'1000',

			],
			
			'fullname' =>[
				'type'=>'VARCHAR',
				'constraint'=>'1000',

			]
			,
			'phone_number' =>[
				'type'=>'VARCHAR',
				'constraint'=>'1000',

            ]
            ,
			'birthday' =>[
				'type'=>'DATE',
				'null'=>true,

			]
            ,
			'gender' =>[
				'type'=>'VARCHAR',
                'constraint'=>'2',
				'null'=>true,

			],
            
			'balance' =>[
				'type'=>'FLOAT',
				'null'=>true,

			]
			,
			'created_at' =>[
				'type'=>'DATE',
				'null'=>true,

			]

            ]);


            $this->forge->addKey('customer_id', true);
            
            $this->forge->createTable('wk_customer', true);


    }

    public function down()
    {
        //

        $this->forge->dropTable('wk_customer');
    }
}
