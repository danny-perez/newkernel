<?php
//Application/Model/User_model.php
   class User_model extends CI_Model {
		Public function __construct(){ 
									parent::__construct(); 
									} 
		public function modelka(){
								$this->load->database();
//----- Версия 1 ------					$query = $this->db->query('SELECT * FROM test');
/*-----Всю таблицу----*/				$query = $this->db->get('new_test');
								foreach ($query->result_array() as $row){$rrr[]=$row;}
								return $rrr;
								}
   }								
?>