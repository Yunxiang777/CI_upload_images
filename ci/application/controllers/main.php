<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
	//functions  
	function image_upload()
	{
		$data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";
		$this->load->view('image_upload', $data);
	}
	function ajax_upload()
	{
		if (isset($_FILES["image_file"]["name"])) { //檢查是否有一個名為 "image_file" 的檔案正在上傳
			$config['upload_path'] = './images/'; //圖片上傳路徑
			$config['allowed_types'] = 'jpg|jpeg|png|gif'; //允許的型態
			$this->load->library('upload', $config); //使用lib，並將設定資訊 $config 傳遞給該程式庫
			if (!$this->upload->do_upload('image_file')) { //上傳失敗與否， 這行代碼獲取上傳成功後的圖片資訊，如檔案名稱、路徑
				echo $this->upload->display_errors(); //失敗
			} else {
				$data = $this->upload->data(); //成功則回傳值
				// echo '<img src="' . base_url() . 'images/' . $data["file_name"] . '" width="300" height="225" class="img-thumbnail" />';
				// print_r($data);
				$image_url = base_url() . 'images/' . $data["file_name"];
				$response = array(
					'image' => '<img src="' . $image_url . '" width="300" height="225" class="img-thumbnail" />',
					'data' => $data
				);
				echo json_encode($response);
			}
		}
	}
}
