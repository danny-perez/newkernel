<?php
//Application/Model/User_model.php
   class Dict_list extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function read_dict(){
		$this->load->database('default');
  		$query = $this->db->get('dictionary');
		foreach ($query->result_array() as $row){$ret[]=$row;}
		return $ret;
		}
		public function read_alph($num_slug){
		$this->load->database('default');
		$s_n[]=$num_slug;
  		$query=$this->db->query('SELECT SUBSTRING(word,1,1) AS AB FROM dictionary_word WHERE dictionary_id=? GROUP BY AB ORDER BY AB',$s_n);
		foreach ($query->result_array() as $row){$rs_alphabet[]=$row;}
		return $rs_alphabet;
		}
		public function read_letter($num_slug,$letter){
		$this->load->database('default');
		$s_n[]=$num_slug;
		$s_n[]=$letter;
  		$query=$this->db->query('SELECT id,word FROM dictionary_word WHERE dictionary_id=? AND LEFT(word,1) LIKE ?',$s_n);
		foreach ($query->result_array() as $row){$rs_letter[]=$row;}
		return $rs_letter;
		}
		public function read_word($num_slug,$word){
		$this->load->database('default');
		$s_n[]=$num_slug;
		$s_n[]=$word;
  		$query=$this->db->query('SELECT id,word,article,variant FROM dictionary_word WHERE dictionary_id=? AND word LIKE ?',$s_n);
		foreach ($query->result_array() as $row){$rs_letter[]=$row;}
		return $rs_letter;
		}
		
   }								
?>