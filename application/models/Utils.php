<?php
//Application/Model/Utils.php
   class Utils extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function separate($ptext)
		{
		    $ptext=rtrim($ptext,'_');
		    $nnz=explode('_',$ptext);
		    $this->load->database('pass');
            $query=$this->db->query('SELECT kn FROM books WHERE sokr LIKE ?',$nnz[0]);
            $row=$query->row('kn');
            $stih='stih_'.$row.(string)$nnz[1];
            $this->db->close();
            $this->load->database('stih');
            $sql="SELECT * FROM $stih";
            $query=$this->db->query($sql);
            foreach ($query->result_array() as $row){$rs_stih[]=$row;}
            $rs_res['bold']=$nnz[2];
            if (isset($nnz[3])) $rs_res['bold2']=$nnz[3];
            $rs_res['stih']=$rs_stih;
            return $rs_res;
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
        
/* ----------------- Добавлено ------------------ */
        public function separate2($ptext){
        setlocale(LC_ALL, 'ru_RU.utf8');
		preg_match_all('/[0-9]?[ ]?\w+\.[ ][0-9]+:[0-9]+-?[0-9]*/u',$ptext,$sep1);
		foreach($sep1[0] as $sep2)
		{
		    $sep2=trim($sep2);
		    preg_match('/^[0-9]?[ ]?\w+/u',$sep2,$sep3);
		    preg_match('/([0-9]+):([0-9]+)-?([0-9]*)/',$sep2,$sep4);
		    $sep4=array_diff($sep4,array('',null));
		    $zs='_';
		    for($i=1;$i<count($sep4);$i++) $zs=$zs.$sep4[$i].'_';
            $sep_final[]=$sep3[0].$zs;
		}    
        return $sep_final;   
        }
   }								
?>