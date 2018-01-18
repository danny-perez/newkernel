<?php
//Application/Model/Admin.php
   class Admin extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function admin_emul($log,$pas,$cap){
        $cap==='  ' ? $flag=true:$flag=false;
        $sql='';
        $s_n[]=$log;
        $s_n[]=$pas;
        $row['status']='FALSE';
        $this->load->database('pass');
        $query = $this->db->query('SELECT * FROM user WHERE login LIKE ? AND passw LIKE sha1(?)',$s_n);
		foreach ($query->result_array() as $row){$rs_read[]=$row; $row['status']='TRUE';}
		$this->db->close();
		return $row;
		}
   }								
?>