<?php
class Images_model extends CI_Model
{
    function insert_image($data)
    {
        $this->db->insert("tbl_images", $data);
    }
    function fetch_image()
    {
        $output = '';
        $this->db->select("name");
        $this->db->from("tbl_images");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $output .= '  
                     <div class="col-md-3">  
                          <img src="' . base_url() . 'images/' . $row->name . '" class="img-responsive img-thumbnail" />  
                     </div>  
                ';
        }
        // 在上述程式碼中，$output .= ... 表示將目前循環迭代中產生的 HTML 程式碼附加到 $output 變數的結尾。 這樣，透過每次循環迭代都將新的 HTML 程式碼附加到 $output，最終形成一個包含所有圖片標籤的完整 HTML 字串。
        return $output;
    }
}
