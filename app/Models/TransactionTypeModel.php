<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionTypeModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'wk_transaction_type';
    protected $primaryKey           = 'transaction_type_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'transaction_type_name'
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function getTypeTransaction($id_type){

        $db = \Config\Database::connect();

        $textQuery= 'SELECT transaction_type_name FROM wk_transaction_type WHERE transaction_type_id ='.$id_type ;

        $query   = $db->query($textQuery);
        
        $result = $query->getResultArray();



        return $result;


    }


}
