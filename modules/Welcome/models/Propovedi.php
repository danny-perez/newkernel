<?php
//Application/Model/Propovedi.php
   class Propovedi extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function read_povod(){
        $this->load->database('default');
        $query=$this->db->query('SELECT type,name FROM new_propoved WHERE type<10');
        foreach ($query->result_array() as $row){$rs_povod[]=$row;}
        return $rs_povod;
		}
		public function read_prazdnik($num_povod){
        $this->load->database('default');
        $s_n=$num_povod*11;
        $query=$this->db->query('SELECT id,name FROM new_propoved WHERE type=?',$s_n);
        foreach ($query->result_array() as $row){$rs_prazdnik[]=$row;}
        return $rs_prazdnik;
		}
		public function read_chten($id_prazdnik){
        $this->load->database('default');
        $query=$this->db->query('SELECT name FROM new_propoved WHERE id=?',$id_prazdnik);
        foreach ($query->result_array() as $row){$rs_name_prazdnik=$row['name'];}
        $this->db->close();
        $this->load->database('pass');
        $query=$this->db->query('SELECT ssilka FROM propovedi WHERE povod LIKE ?',$rs_name_prazdnik);
        foreach ($query->result_array() as $row) $rs_ssilki[]=$row;
        foreach($rs_ssilki as $one_link){ 
                    $toto=$one_link['ssilka'];
                    $llkk=trim($toto);
                    $llkk1=preg_replace('/[^0-9a-z\s]/',' ',$llkk);
                    $llkk2=preg_replace('/\s+/',' ',$llkk1);
                    $llkk3[]=trim($llkk2);
                                        }
            $fin_m=array_unique($llkk3);
            foreach($fin_m as $ddd){
            $f=preg_match_all('/[0-9]?[a-z]+[0-9]?[0-9]?(\s[0-9]?[0-9]?)+/', $ddd,$fin_s);
            foreach($fin_s as $vvv) {
                foreach($vvv as $k99){
                                if(strlen($k99)>8) $zx[]=trim($k99);
                                        }
                                    }
                                }
            $silka=array_unique($zx);
            return $silka;
		}
		public function read_propovedi($id_prazdnik){
        $this->load->database('default');
        $query=$this->db->query('SELECT name FROM new_propoved WHERE id=?',$id_prazdnik);
        foreach ($query->result_array() as $row){$rs_name_prazdnik=$row['name'];}
        $this->db->close();
        $this->load->database('pass');
        $query=$this->db->query('SELECT povod,autor,tema,text FROM propovedi WHERE povod LIKE ?',$rs_name_prazdnik);
        foreach ($query->result_array() as $row) $rs_all_propovedi[]=$row;
        return $rs_all_propovedi;
		}
		public function list_bible($list_chten){
        $this->load->database('stih');
        $st1=explode(' ',$list_chten);
        $from_stih='stih_'.$st1[0];
        $max=$st1[1];$min=$st1[1];
        for($i=2;$i<count($st1);$i++){
                        if($st1[$i]>$max) $max=$st1[$i];
                        if($st1[$i]<$min) $min=$st1[$i];
                                    }
        $sql="SELECT * FROM $from_stih WHERE st_no BETWEEN $min AND $max";
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row) $rs_chten[]=$row;
        return $rs_chten;
		}
		public function title_ch($list_chten){
        $this->load->database('pass');
        $st1=explode(' ',$list_chten);
        $st0=$st1[0];
        $sql='SELECT kn,title FROM books';
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row) $rs_title[]=$row;
        foreach($rs_title as $kuku){$kn[]=$kuku['kn']; $tit[]=$kuku['title'];}
        $ki=0;$flg=true;
        foreach($kn as $pp){
                        if(strcmp($pp,$st0)==0){$bis=$tit[$ki]; $flg=false;}
                        $ki++;
                            }
        if($flg){
        preg_match('/[0-9]?[a-z]+/',$st0,$st0_new);
        $st0=$st0_new[0];
        $ki=0;
        foreach($kn as $pp){
                        $yy=strcmp($pp,$st0);
                        if($yy==0) $bis=$tit[$ki];
                        $ki++;
                            }
        }
        return $bis;
		}
   }								
?>