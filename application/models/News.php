<?php
//Application/Model/Admin.php
   class News extends CI_Model {
		Public function __construct(){
		parent::__construct();
		}
		public function news($mode){
        $this->load->database('pass');
        $query = $this->db->query('SELECT * FROM `news` ORDER BY `data` DESC LIMIT 10');
		    foreach ($query->result_array() as $row){$render_news[]=$row;}
		    return $render_news;
		}
   }
?>
