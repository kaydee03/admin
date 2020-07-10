<?php namespace App\Models;

    use CodeIgniter\Database\ConnectionInterface;


    class AdminModel{

        protected $db;

        public function __construct(ConnectionInterface &$db)
        {
            $this->db = &$db;
        }

        public function schema($table)
        {
            $query = "SHOW COLUMNS FROM $table";
            $result = $this->db->query($query)->getResult();
            return $result;
        }

        public function getCompanies(){
        
            $result = $this->db->table('compinfo');
    
            return $result->get()->getResult();
        }

        public function uploadFile($category, $company, $name, $ext){
            
            $data = [
                'f_name' => $name,
                'f_type' => $ext,
                'f_company_id' => $company,
                'f_category' => $category,
            ];
            $this->db->table('files')->insert($data);

        }

        public function getFileTable($f_id){
        
            $result = $this->db->table('files');
            $result->where('f_id', $f_id);
    
            return $result->get()->getRow();
        }

        public function getAllFiles($where = false){

            $result = $this->db->table('files');
            $result->join('compinfo', 'compinfo.ci_id = files.f_company_id');
            if($where){
                $result->where($where);
            }
    
            return $result->get()->getResult();
        }

        public function deleteFile($f_id){
        
            $result = $this->db->table('files');
            $result->where('f_id', $f_id);

            return $result->delete();
        }


    }
