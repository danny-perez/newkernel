<?php
//Application/Model/Utils.php
   class Utils extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function separate($ptext){
        $this->load->database('pass');
        $query=$this->db->query('SELECT sokr,kn FROM books');
        foreach ($query->result_array() as $row){$all_book[]=$row;}
        for($i=0;$i<count($all_book);$i++){
            $zn=$all_book[$i]; 
            $st_zn='/'.$zn['sokr'].'/';
            $ish=preg_match_all($st_zn, $ptext,$massiv,PREG_OFFSET_CAPTURE,0); 
            if($massiv[0]) $kk[]=$massiv[0];
                                            }
        foreach($kk as $pipi){
                            foreach($pipi as $mimi) $resultat[]=$mimi[1];
                            }
        $resultat[]=strlen($ptext);
        $ii=count($resultat);
        for($i=0;$i<$ii-1;$i++){
                                        $res_pitek=substr($ptext,$resultat[$i],($resultat[$i+1]-$resultat[$i]));
                                        $ann=explode('.',$res_pitek);
                                        foreach($all_book as $one_m){
                                                if((strcmp($one_m['sokr'],$ann[0]))==0) $ann[]=$one_m['kn'];
                                                                    }
                                        $kann[]=$ann;
                                        }
        foreach($kann as $zap){
                $z1=trim($zap[1]);
                $z11=explode(':',$z1);
                $from_zapros='stih_'.$zap[2].(string)$z11[0];
                $z111=explode('-',$z11[1]);
                if(count($z111)<2) $z111[]=$z111[0];
                $st_no_low=$z111[0];
                $st_no_hight=$z111[1];
                $this->db->close();
                $this->load->database('stih');
                $sql="SELECT * FROM $from_zapros WHERE st_no BETWEEN $st_no_low AND $st_no_hight";
                $query=$this->db->query($sql);
                foreach ($query->result_array() as $row){$parallel_point[]=$row;}
                                }
                return $parallel_point;
		}
		public function card_read($num_card){
		if($num_card==='All'){
        $this->load->database('default');
        $query=$this->db->query('SELECT * FROM card_east');
        foreach ($query->result_array() as $row){$rs_card[]=$row;}
		}else{
		$this->load->database('default');
        $query=$this->db->query('SELECT * FROM card_east WHERE id_card=?',$num_card);
        foreach ($query->result_array() as $row){$rs_card[]=$row;}    
		}
        return $rs_card;    
        }
        public function translate(){
        $this->load->database('pass');
        $query=$this->db->query('SELECT * FROM perevody');
        foreach ($query->result_array() as $row){$rs_trans[]=$row;}
        return $rs_trans;    
        }
   }								
?>