<?php

namespace App\Libraries;

use App\Libraries\Crud_core;
use CodeIgniter\HTTP\RequestInterface;

class Crud extends Crud_core
{
    function __construct($params, RequestInterface $request)
    {
        parent::__construct($params, $request);
    }

    function form()
    {
        return $this->parent_form();
    }

    public function callback_days_left($item){
        $days = $this->days($item->p_end_date);
        if($days < 0){
            $out = '<span class="text-success">Completed</span>';
        }else{
            $out = '<span>' . $days . ' days left</span>';
        }

        return $out;
    }

    private function days($date)
    {
        $now = time(); // or your date as well
        $your_date = strtotime($date);
        $datediff = $your_date - $now;

        return round($datediff / (60 * 60 * 24));
    }

    public function callback_featured_image($item){
        $src = $item->p_image ? '/uploads/images/'.$item->p_image : '/admin/assets/img/profile.png';

        return '<img src="'.$src.'" style="width:54px;" class="img-circle">';
    }

    function copy_stage_1_2($l_id) {

        if (!file_exists('./assets'))
            mkdir('./assets', 0755, true);
        $uploadPath = './assets/uploads';
        if (!file_exists($uploadPath))
            mkdir($uploadPath, 0755, true);
        $uploadPath = './assets/uploads/links';
        if (!file_exists($uploadPath))
            mkdir($uploadPath, 0755, true);
        $uploadPath = './assets/uploads/links/'.$l_id;
        if (!file_exists($uploadPath))
            mkdir($uploadPath, 0755, true);

        $post = $this->ci->input->post();
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = "doc|docx|xls|xlsx|txt|pdf";
        $config['max_size'] = "3000";


        $txteditor = false;
        if(isset($_FILES['file'])){
          $file_original_name = explode('.', $_FILES['file']['name']);
          $upload = 'file';
        }
        elseif (isset($_FILES['upload'])) {
          $file_original_name = explode('.', $_FILES['upload']['name']);
          $upload = 'upload';
          $txteditor = true;
        }
        $file_name = $file_original_name[0];
        $file_name = preg_replace('!\s+!',"-",$file_name);
        $file_ext = $file_original_name[1];


        if(file_exists("$uploadPath/".$file_name.'.'.$file_ext)){
          $i = 1;
          while(file_exists("$uploadPath/".$file_name.'_'.$i.'.'.$file_ext)){
              $i++;
          }
          $file_name_to_upload = $file_name.'_'.$i;
        }else{
          $file_name_to_upload = $file_name;
        }

        $config['file_name'] = $file_name_to_upload;

        $this->ci->load->library('upload', $config);

        if($this->ci->upload->do_upload($upload)){
          $file = $this->ci->upload->data();

            //Insert media to database
            // b. Media name

            $data['l_file'] = $file['file_name'];
            $this->ci->db->where('l_id', $l_id);
          if($this->ci->db->update('links',  $data)){
            $result = [
              'link_id' => $l_id,
              'file_name' => $data['l_file'],
            ];
          }else{
            //Update error
          }

        }else{
          $result = [
            'status' => 'error',
            'error' => strip_tags($this->ci->upload->display_errors()),

          ];
        }
        echo json_encode($result);
      }
}
