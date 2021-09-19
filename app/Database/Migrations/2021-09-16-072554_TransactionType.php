<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionType extends Migration
{
    public function up()
    {
        //

        $this->forge->addField([
            'transaction_type_id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true

            ],
            'transaction_type_name'=>[
                'type'=>'VARCHAR',
				'constraint'=>'1000',

            ]

        ]);

        $this->forge->addKey('transaction_type_id', true);
            
        $this->forge->createTable('wk_transaction_type', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('wk_transaction_type');
    }
}
