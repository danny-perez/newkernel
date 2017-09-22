<?php
//Application/Model/User_model.php
   class Ekzeget_model extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		}
		public function ekzeget_list(){
		$this->load->database('admin_ekzeget');
        $query = $this->db->query('SELECT id_author,ekzegets FROM new_sermon');
		foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
		return $rs_ekzeget;
		}
		public function ekzeget_author($author){
		$this->load->database('admin_ekzeget');
        $query = $this->db->query('SELECT author_i18n.name, author_i18n.description FROM new_sermon LEFT JOIN author_i18n ON new_sermon.ekzegets LIKE author_i18n.name WHERE new_sermon.id=?',$author);
		foreach ($query->result_array() as $row){$rs_about[]=$row;}
		return $rs_about;
		}
		public function tolk_author($id_slug){
		$this->load->database('default');
  		$query=$this->db->query('SELECT Tradition.start_pointer,Tradition.end_pointer,Tradition_i18n.contents FROM Tradition LEFT JOIN Tradition_i18n ON Tradition.id=Tradition_i18n.id WHERE Tradition.author_id=?',$id_slug);
		foreach ($query->result_array() as $row){$rs_tolk[]=$row;}
		return $rs_tolk;
		}
   }								
?>