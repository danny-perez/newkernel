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
       public function parallel_parse($parallel)
       {
           preg_match_all('/[0-9]?[ ]?[А-Яа-я]+/u',$parallel,$array_parallel);
           var_dump($array_parallel);
           return 8;
       }
       public function parallel_convert($parallel_link)
       {
           $parse = explode('.',$parallel_link);
           $book_parallel = trim($parse[0]);
           $chapter_verse = trim($parse[1]);
           $this->load->database('ekzeget');
           $query=$this->db->query('SELECT `kn`,`testament` FROM `new_book` WHERE `abreviation_rus` LIKE ?',$book_parallel);
           $this->db->close();
           foreach ($query->result_array() as $row){$kn_arr=$row;}
           $complex_get['kn'] = $kn_arr['kn'];
           $chap_ver_array = explode(':',$chapter_verse);
           $complex_get['chapter'] = trim($chap_ver_array[0]);
           $complex_get['verse'] = trim($chap_ver_array[1]);
           $complex_get['testament'] = $kn_arr['testament'];
           return $complex_get;
       }
   }
?>
