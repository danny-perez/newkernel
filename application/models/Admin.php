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
		public function admin_add_fav($name, $book, $glava, $stih,$tags,$color){
        $this->load->database('default');
        $query = $this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$book);
        $kn = $query->row('kn');
        $this->db->close();
        $this->load->database('pass');
        $query = $this->db->query('SELECT login,email FROM user WHERE login LIKE ?',$name);
        if(!$query->row()){$result[]='Error users'; goto label_stop;}
        $email = $query->row('email'); //Идентификация по login и e-mail в оригинале только login
        $s_n[]=$kn;
        $s_n[]=$glava;
        $s_n[]=$stih;
        $s_n[]=$color;
        $s_n[]=$tags;
        $s_n[]=$email;
        $query = $this->db->query('INSERT INTO `favorite`(`kn`, `gl`, `st`, `color`, `tags`, `name_user`) VALUES (?,?,?,?,?,?)',$s_n);
        if(!$query)$result[]='Error record'; else $result[]='Sucsessful';
		label_stop:
		return $result;
		}
   }								
?>