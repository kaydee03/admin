<?php namespace App\Models;

    use CodeIgniter\Model;


    class RoleModel extends Model {

        protected $table = 'roles';
        protected $returnType     = 'object';
        protected $allowedFields = ['r_name'];
        protected $primaryKey = 'r_id';



    }
