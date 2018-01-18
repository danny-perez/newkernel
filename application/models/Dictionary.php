<?php
//Application/Model/Dictionary.php
   class Dictionary extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function alphabet($name_d){
		    if(!$name_d){
        $this->load->database('default');
        $sql = "SELECT * FROM  `dictionary` LEFT JOIN  `static_page` ON  `dictionary`.`name` LIKE  `static_page`.`title`";
        $query=$this->db->query($sql);
        // $query=$this->db->query('SELECT * FROM dictionary');
        foreach ($query->result_array() as $row){$rs_render[]=$row;}
		    }else{
		$this->load->database('default');
        $query=$this->db->query('SELECT name FROM dictionary WHERE alias LIKE ?',$name_d);
        foreach ($query->result_array() as $row){$rs_name=$row['name'];}
        $this->db->close();
        $this->load->database('pass');
        $query=$this->db->query('SELECT SUBSTRING(statja,1,1) as suu FROM slovari WHERE slovar LIKE ? GROUP BY suu ORDER BY suu',$rs_name);
        foreach ($query->result_array() as $row){$rs_letter[]=$row['suu'];}
        foreach($rs_letter as $str_letter) preg_match('/[а-яёА-ЯЁa-zA-Z]/',$str_letter)==1 ? $rs_render[]=$str_letter : $str_letter=$str_letter;
		            }
        return $rs_render;
		}
        public function alphabet2($name_d){
        $this->load->database('default');
        $sql = "SELECT * FROM  `dictionary` LEFT JOIN  `static_page` ON  `dictionary`.`name` LIKE  `static_page`.`title` WHERE `dictionary`.`alias` LIKE ?";
        $query=$this->db->query($sql,$name_d);
        // $query=$this->db->query('SELECT * FROM dictionary');
        foreach ($query->result_array() as $row){$rs_ren=$row;}
        $query=$this->db->query('SELECT name FROM dictionary WHERE alias LIKE ?',$name_d);
        foreach ($query->result_array() as $row){$rs_name=$row['name'];}
        $this->db->close();
        $this->load->database('pass');
        $query=$this->db->query('SELECT SUBSTRING(statja,1,1) as suu FROM slovari WHERE slovar LIKE ? GROUP BY suu ORDER BY suu',$rs_name);
        foreach ($query->result_array() as $row){$rs_letter[]=$row['suu'];}
        foreach($rs_letter as $str_letter) preg_match('/[а-яёА-ЯЁa-zA-Z]/',$str_letter)==1 ? $rs_render[]=$str_letter : $str_letter=$str_letter;
		$rs_render['description']=$rs_ren['text'];
        return $rs_render;
		}
		
		
		
		public function title_letter($lat_dict, $upletter){
		$this->load->database('default');
        $query=$this->db->query('SELECT name FROM dictionary WHERE alias LIKE ?',$lat_dict);
        foreach ($query->result_array() as $row){$rs_name=$row['name'];}
        $this->db->close();
        $this->load->database('pass');
        $s_n[]=$upletter;
        $s_n[]=$rs_name;
        $query=$this->db->query('SELECT id,statja FROM `slovari` WHERE LEFT(statja,1) LIKE ? AND slovar LIKE ?',$s_n);
        foreach ($query->result_array() as $row){$rs_render[]=$row;}
        return $rs_render;
		}
		public function read_text($id){
        $this->load->database('pass');
        $query=$this->db->query('SELECT statja,text,variant FROM `slovari` WHERE id=?',$id);
        foreach ($query->result_array() as $row){$rs_render[]=$row;}
        return $rs_render;
		}
   }								
?>