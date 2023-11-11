<?php

/**
 * 一次上傳多張圖片
 */
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class Images_upload
 * @property Images_model $Images_model
 */
class Images_upload extends CI_Controller
{
    function image_upload()
    {
        $data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";
        $this->load->model('Images_model');
        $data["image_data"] = $this->Images_model->fetch_image();
        $this->load->view('images_upload', $data);
    }
    function ajax_upload()
    {
        if (isset($_FILES["image_file"]["name"])) {
            //這裡的config，跟ci文件夾config配置，是兩個完全不同的關係，這裡純粹是個array
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_file')) { //input type的name
                echo $this->upload->display_errors();
            } else {
                $data = $this->upload->data();

                $this->load->model('Images_model');

                $image_data = array(
                    'name'          =>     $data["file_name"]
                );
                $this->Images_model->insert_image($image_data);
                echo $this->Images_model->fetch_image();
            }
        }
    }
}
