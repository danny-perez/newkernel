<?php
//Application/Model/Group.php
   class Group extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function gr_list(){
		$this->load->database('default');
        $query = $this->db->query('SELECT * FROM `bible_group`');
        foreach ($query->result() as $row)$rs_group[]=$row;
		return $rs_group;
		}
		public function gr_news(){
		$this->load->database('default');
        $query = $this->db->query('SELECT * FROM `static_page` WHERE `page_type` = 6');
        foreach ($query->result() as $row)$rs_group[]=$row;
		return $rs_group;
		}
		public function gr_art(){
		$this->load->database('default');
        $query = $this->db->query('SELECT * FROM `static_page` WHERE `page_type` = 7');
        foreach ($query->result() as $row)$rs_group[]=$row;
		return $rs_group;
		}		
   }
?>