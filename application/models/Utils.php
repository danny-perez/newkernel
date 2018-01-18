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
        
/* ----------------------------------- */
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
/* ----------------- Добавлено ------------------ */        
        public function separate3($ptext){
        setlocale(LC_ALL, 'ru_RU.utf8');
		preg_match_all('/[0-9]?[ ]?\w+\.[ ][0-9]+:[0-9]+-?[0-9]*/u',$ptext,$sep1);
		$this->load->database('default');
		foreach($sep1[0] as $sep2)
		{
		    $sep2=trim($sep2);
		    preg_match('/^[0-9]?[ ]?\w+/u',$sep2,$sep3);
		    preg_match('/([0-9]+):([0-9]+)-?([0-9]*)/',$sep2,$sep4);
	//        var_dump($sep4);
		    $sep4=array_diff($sep4,array('',null));
		    $zs='_';
		    for($i=1;$i<count($sep4);$i++) $zs=$zs.$sep4[$i].'_';
            $sep_f['link']=$sep3[0].$zs;
            
            $name_book = $sep3[0];
            if($name_book==='Руфь') $name_book = 'Руф';
            
            $query=$this->db->query('SELECT abbreviation,testament FROM new_book WHERE abreviation_rus LIKE ?',$name_book);
            $row = $query->row();
            

            $sep_f['abbreviation']=$row->abbreviation;
            $sep_f['testament']=$row->testament;
            $sep_final[]=$sep_f;
        
		}    
        return $sep_final;   
        }        
        public function question($book,$chapter){
        $this->load->database('default');
        $s_n[]=$book;
        $s_n[]=$chapter;
        $query=$this->db->query('SELECT * FROM qestions WHERE book LIKE ? AND chapter=?', $s_n);
        foreach ($query->result_array() as $row){$rs_trans[]=$row;}
        return $rs_trans;    
        }
        public function urle($codeurl){
        preg_match('/[0-9]?[ ]?[А-Яа-я]+/u',$codeurl,$final);
        $norm_book = $final[0];
        if(strlen($norm_book)>5)
        {
        $this->load->database('default');
        $query=$this->db->query('SELECT name,abbreviation FROM new_book WHERE abreviation_rus LIKE ?', $norm_book);
        $row = $query->row();
        return $row;
        }else return 'error code';
        }
   }								
?>