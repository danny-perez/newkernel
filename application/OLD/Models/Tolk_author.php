<?php
//Application/Model/User_model.php
   class Tolk_author extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function list_author(){
		$this->load->database('default');
  		$query=$this->db->query('SELECT id,name FROM author_i18n WHERE id>0');
		foreach ($query->result_array() as $row){$rs_author[]=$row;}
		return $rs_author;
		}
   	    public function about_author($id_slug){
		$this->load->database('default');
  		$query=$this->db->query('SELECT name,description FROM author_i18n WHERE id=?',$id_slug);
		foreach ($query->result_array() as $row){$rs_author[]=$row;}
		return $rs_author;
		}
		public function tolk_author($id_slug){
		$this->load->database('default');
  		$query=$this->db->query('SELECT Tradition.start_pointer,Tradition.end_pointer,Tradition_i18n.contents FROM Tradition LEFT JOIN Tradition_i18n ON Tradition.id=Tradition_i18n.id WHERE Tradition.author_id=?',$id_slug);
		foreach ($query->result_array() as $row){$rs_tolk[]=$row;}
		return $rs_tolk;
		}
		public function comment_book($id_author, $book_id){
		$this->load->database('default');
		$s_n[]=$book_id;
		$s_n[]=$id_author;
  		$query=$this->db->query('SELECT Tradition.start_pointer,Tradition.end_pointer,Tradition_i18n.contents FROM Tradition LEFT JOIN Tradition_i18n ON Tradition.id=Tradition_i18n.id WHERE LENGTH(start_pointer)=7 AND SUBSTRING(start_pointer,-7,1) LIKE ? AND author_id=?',$s_n);
		foreach ($query->result_array() as $row){$rs_book[]=$row;}
		return $rs_book;
		}
		public function comment_book2($id_author, $book_id){
		$this->load->database('default');
		$s_n[]=$book_id;
		$s_n[]=$id_author;
  		$query=$this->db->query('SELECT Tradition.start_pointer,Tradition.end_pointer,Tradition_i18n.contents FROM Tradition LEFT JOIN Tradition_i18n ON Tradition.id=Tradition_i18n.id WHERE LENGTH(start_pointer)>7 AND SUBSTRING(start_pointer,1,2) LIKE ? AND author_id=?',$s_n);
		foreach ($query->result_array() as $row){$rs_book[]=$row;}
		return $rs_book;
		}
		public function glava_autor2($id_author, $book_id, $chapter){
		$this->load->database('default');
		$s_n[]=$book_id;
		$s_n[]=$chapter;
		$s_n[]=$id_author;
  		$query=$this->db->query('SELECT Tradition.start_pointer,Tradition.end_pointer,Tradition_i18n.contents FROM Tradition LEFT JOIN Tradition_i18n ON Tradition.id=Tradition_i18n.id WHERE LENGTH(start_pointer)>7 AND SUBSTRING(start_pointer,1,2) LIKE ? AND SUBSTRING(start_pointer,3,3) LIKE ? AND author_id=?',$s_n);
		foreach ($query->result_array() as $row){$rs_book[]=$row;}
		return $rs_book;
		}
		public function glava_autor($id_author, $book_id, $chapter){
		$this->load->database('default');
		$s_n[]=$book_id;
		$s_n[]=$chapter;
		$s_n[]=$id_author;
  		$query=$this->db->query('SELECT Tradition.start_pointer,Tradition.end_pointer,Tradition_i18n.contents FROM Tradition LEFT JOIN Tradition_i18n ON Tradition.id=Tradition_i18n.id WHERE LENGTH(start_pointer)=7 AND SUBSTRING(start_pointer,-7,1) LIKE ? AND SUBSTRING(start_pointer,2,3) LIKE ? AND author_id=?',$s_n);
		foreach ($query->result_array() as $row){$rs_book[]=$row;}
		return $rs_book;
		}
		public function stih_autor($id_author, $pointer){
		$this->load->database('default');
		$s_n[]=$pointer;
		$s_n[]=$id_author;
  		$query=$this->db->query('SELECT Tradition.start_pointer,Tradition.end_pointer,Tradition_i18n.contents FROM Tradition LEFT JOIN Tradition_i18n ON Tradition.id=Tradition_i18n.id WHERE `start_pointer` LIKE ? AND author_id=?',$s_n);
		foreach ($query->result_array() as $row){$rs_book[]=$row;}
		return $rs_book;
		}
   }
?>