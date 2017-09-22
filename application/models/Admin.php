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
		if($row['status']==='FALSE'){
		$query = $this->db->query('SELECT login,email FROM user_vrem WHERE login LIKE ?',$s_n[0]);
		foreach ($query->result_array() as $row){$rs_read[]=$row; $row['status']='НЕ ПОДТВЕРЖДЕН';}
		}
		$this->db->close();
		return $row; 
		}
   }								
?>