<?php 
namespace App\Controllers;
 
use App\Models\AdminModel;
use App\Libraries\Crud;


class Fileupload extends BaseController
{

    protected $crud;
    protected $admin_model;

    function __construct(){

        $this->db = db_connect();
        $this->admin_model = new AdminModel($this->db);

    }

    public function index()
    {

        $data['title'] = 'File upload';

        $data['companies'] = $this->admin_model->getCompanies();

        $data['files'] = $this->admin_model->getAllFiles();
        
        return view('fileupload/upload_zone', $data);

    }

    public function upload($cat_id){
        
        if($this->request->getMethod() == 'post'){

            $category = $this->request->getVar('fileCategory');
            $company = $this->request->getVar('companiesBrand');
        
            $rules = [
                'theFile' => [
                    'rules' => 'uploaded[theFile.0]',
                    'label' => 'Files',
                ],
            ]; 

            if($this->validate($rules)){

                $files = $this->request->getFiles();
    
                foreach ($files['theFile'] as $file) {
                    if($file->isValid() && !$file->hasMoved()){

                        $uploadPath = './uploads/company_files/'.$company. '/' . $cat_id;
                        $path = $uploadPath. '/' . $file->getName();
                        $file->move($uploadPath);
    
                        
                        $dname = explode(".", $file->getName());
                        $ext = end($dname);

                        $type_file = 'other';
              
                        if(exif_imagetype($path)) {
                            $type_file = 'image';

                        }else{
                            if($ext == 'docx' || $ext == 'doc'){
                                $type_file = 'doc';

                            }elseif($ext == 'xlsx' || $ext == 'xls' || $ext == 'csv'){
                                $type_file = 'excel';

                            }elseif($ext == 'zip'){
                                $type_file = 'zip';

                            }elseif($ext == 'pdf'){
                                $type_file = 'pdf';

                            }elseif($ext == 'mp4'){
                                $type_file = 'video';
                            }
                        }
      
                        $this->admin_model->uploadFile($category, $company, $file->getName(), $type_file);
                    }
                }
                return redirect()->to('/fileupload/list/'.$cat_id);

            }else{
                $data['validation'] = $this->validator;

            }
        }
      }

    public function list($category = false){

        $where = '';
        $category_title = 'Files';

        if($category){
            if($category == 1){
                $where = ['f_category' => 'Insurance Policy'];
                $category_title = 'Insurance Policy';
            }elseif($category == 2){
                $where = ['f_category' => 'License'];
                $category_title = 'License';
            }elseif($category == 3){
                $where = ['f_category' => 'Permits'];
                $category_title = 'Permits';
            }elseif($category == 4){
                $where = ['f_category' => 'Company Policies'];
                $category_title = 'Company Policies';
            }
            $data['files'] = $this->admin_model->getAllFiles($where);
        }else{
            $data['files'] = $this->admin_model->getAllFiles();
        }

        $data['companies'] = $this->admin_model->getCompanies();
        $data['category'] = $category;
        $data['title'] = $category_title;

        return view('fileupload/table', $data);

    }

    public function delete($category, $f_id){
        
        $this->admin_model->deleteFile($f_id);

        session()->setFlashdata('success', 'Successfuly Deleted');
        return redirect()->to('/fileupload/list/'.$category);

    }

}
