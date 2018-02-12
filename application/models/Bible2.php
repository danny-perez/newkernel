<?php
//Application/Model/Bible.php
   class Bible2 extends CI_Model {
		Public function __construct(){
		parent::__construct();
		}
		public function read_book($testament){ //Формат 01.01.2010 по 2299 год
        $this->load->database('ekzeget');
        $query=$this->db->query('SELECT `name`,`kn` FROM `new_book` WHERE `testament`=?',$testament);
        foreach ($query->result_array() as $row){$list_book[]=$row;}
        return $list_book;
		}
   }
?>
