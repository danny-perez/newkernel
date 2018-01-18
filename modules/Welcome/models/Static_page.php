<?php
//Application/Model/Static_page.php
   class Static_page extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function read_static_page($num_page){
		if(!$num_page){
		$this->load->database('default');
        $query = $this->db->query('SELECT id,page_type,title FROM static_page');
		foreach ($query->result_array() as $row){$rs_read[]=$row;}
		}else {
		      $this->load->database('default');
              $query = $this->db->query('SELECT id,title,text,service_info FROM static_page WHERE id=?',$num_page);
		      foreach ($query->result_array() as $row){$rs_read[]=$row;}
		      }
		return $rs_read;
		}
   }								
?>