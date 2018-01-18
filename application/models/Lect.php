<?php
//Application/Model/Lect.php
   class Lect extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function lect_art(){
		$this->load->database('default');
        $query = $this->db->query('SELECT * FROM `static_page` WHERE `page_type` = 5');
        foreach ($query->result() as $row)$rs_group[]=$row;
		return $rs_group;
		}
		public function lect_up(){
		$this->load->database('default');
        $query = $this->db->query('SELECT * FROM `static_page` WHERE `page_type` = 51');
        foreach ($query->result() as $row)$rs_group[]=$row;
		return $rs_group;
		}		
   }
?>