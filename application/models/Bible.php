<?php
//Application/Model/Bible.php
   class Bible extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function read_book($abbreviation,$chapter){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        if(!$abbreviation){
        $query=$this->db->query('SELECT name,abbreviation,chapter,testament FROM new_book');
        foreach ($query->result_array() as $row){$rs_book[]=$row;}
        }else{
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('stih');
        $from_name='stih_'.$rs_kn.(string)$chapter;
        $sql="SELECT * FROM $from_name";    
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_book[]=$row;}
            }
        return $rs_book;
		}
		public function read_ekzeget($abbreviation,$chapter){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('tolk');
        $from_name='tolk_'.$rs_kn.(string)$chapter;
        $sql="SELECT DISTINCT(t_name) FROM $from_name";    
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
        return $rs_ekzeget;
		}
		public function read_tolk($abbreviation,$chapter){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('tolk');
        $from_name='tolk_'.$rs_kn.(string)$chapter; //Имя таблицы
        $sql="SELECT t_name, st_no, comments FROM $from_name WHERE NOT issled LIKE 'yes' ORDER BY st_no";    
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
        return $rs_ekzeget;
		}
		public function read_issl($abbreviation,$chapter){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('tolk');
        $from_name='tolk_'.$rs_kn.(string)$chapter; //Имя таблицы
        $sql="SELECT t_name, st_no, comments FROM $from_name WHERE issled LIKE 'yes' ORDER BY st_no";    
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
        return $rs_ekzeget;
		}
   }								
?>