<?php
//Application/Model/Media.php
   class Media extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function list_rec($id){
		$this->load->database('default');
		if($id){
                $query = $this->db->query('SELECT * FROM `medialib` WHERE `id` LIKE ?',$id);
                foreach ($query->result() as $row)$rs_media[]=$row;
		}else{
                $query = $this->db->query('SELECT * FROM `medialib`');
                foreach ($query->result() as $row)$rs_media[]=$row;
		       }
		return $rs_media;
		}
		public function media_b($word, $chapter, $type_media){
		if($type_media=='audio') $type_m = 'mp3'; else $type_m = 'youtube';
		$this->load->database('default');
		$query = $this->db->query("SELECT abreviation_rus FROM new_book WHERE abbreviation LIKE ?",$word);
        $row = $query->row('abreviation_rus');
        $word=$row.". $chapter";
		$s_n[]=$word;
		$s_n[]=$type_m;
        $query = $this->db->query('SELECT * FROM medialib LEFT JOIN type_author ON medialib.type_author = type_author.id LEFT JOIN genre_artwork ON medialib.genre_artwork = genre_artwork.id WHERE medialib.link LIKE ? AND medialib.type_media LIKE ?',$s_n);
        foreach ($query->result() as $row)$rs_media[]=$row;
		return $rs_media;
		}
		public function media_s($word){
		$this->load->database('default');
		$s_n='%'.$word.'%';
        $query = $this->db->query('SELECT * FROM `medialib` WHERE CONCAT(`author`,`name`,`description`,`link`) LIKE ?',$s_n);
        foreach ($query->result() as $row)$rs_media[]=$row;
		return $rs_media;
		}
   }
?>