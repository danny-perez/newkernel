<?php
//Application/Model/Bible.php
   class Bible2 extends CI_Model {
		Public function __construct(){
		parent::__construct();
		}
	public function read_book($testament){
        $this->load->database('ekzeget');
        $query=$this->db->query('SELECT `name`,`kn` FROM `new_book` WHERE `testament`=?',$testament);
        $this->db->close();
        foreach ($query->result_array() as $row){$list_book[]=$row;}
        return $list_book;
		}
       public function kn_to_title($kn){
           $this->load->database('ekzeget');
           $query=$this->db->query('SELECT `name` FROM `new_book` WHERE `kn`=?',$kn);
           $this->db->close();
           foreach ($query->result_array() as $row){$kn_title=$row['name'];}
           return $kn_title;
       }
    public function read_chapters($kn){
        $this->load->database('ekzeget');
        $query=$this->db->query('SELECT `chapter` FROM `new_book` WHERE `kn` LIKE ?',$kn);
        $this->db->close();
        foreach ($query->result_array() as $row){$lot_chapters=$row['chapter'];}
        return $lot_chapters;
    }
    public function text_book($kn, $chapter=1)
    {
        $from = 'stih_'.$kn.$chapter;
        $sql = "SELECT * FROM $from WHERE 1";
        $this->load->database('stih');
        $query=$this->db->query($sql);
        $this->db->close();
        foreach ($query->result_array() as $row){$text_book[]=$row;}
        return $text_book;
    }
       public function read_translate()
       {
           $sql = "SELECT `perevod`,`select` FROM `perevody`";
           $this->load->database('pass');
           $query=$this->db->query($sql);
           $this->db->close();
           foreach ($query->result_array() as $row){$select_translate[]=$row;}
           return $select_translate;
       }
       public function perevod_to_select($trans)
       {
           $this->load->database('pass');
           $query=$this->db->query("SELECT `title` FROM `perevody` WHERE `perevod` LIKE ?",$trans);
           $this->db->close();
           foreach ($query->result_array() as $row){$per_to_sel=$row['title'];}
           return $per_to_sel;
       }
   }
?>
