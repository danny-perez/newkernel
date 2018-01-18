<?php
//Application/Model/Search.php
   class Search extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function search_fast($word){
		                        $fword='%'.$word.'%';
		                        $this->load->database('stih');
                                $query=$this->db->query('SHOW TABLES FROM stih');
                                foreach ($query->result_array() as $row){$rs_stih[]=$row['Tables_in_stih'];}
                                foreach($rs_stih as $table_name){
                                $this->db->like('st_text', $word);
                                $this->db->select('st_no');
                                $sql=$this->db->get_compiled_select($table_name);
                                $query=$this->db->query($sql);
                                foreach ($query->result_array() as $row){
                                                                        $rs_s=$row;
                                                                        $rs_s['table_name']=$table_name;
                                                                        $rs_search[]=$rs_s;
                                                                        }
                                }
        return $rs_search;
        }
        public function search_en($table){
		                        $this->load->database('pass');
                                $temp1=explode('_',$table);
                                $temp2=$temp1[1]; $temp3='';
                                preg_match('/^[0-9]?[a-z]+/',$temp2,$temp3);
                                $temp4=(int)str_replace($temp3[0],'0',$temp2);
                                $sql='SELECT title FROM books WHERE kn LIKE ?';
                                $query=$this->db->query($sql,$temp3[0]);
                                $row=$query->row('title');
                                $rs_encode=$row.' '.(string)$temp4.':';
        return $rs_encode;
        }
        public function search_list($st_no, $table_name){
		                        $this->load->database('stih');
                                $sql="SELECT * FROM $table_name WHERE st_no LIKE ?";
                                $query=$this->db->query($sql,$st_no);
                                foreach ($query->result_array() as $row) $rs_search_list[]=$row;
                                                                        
        return $rs_search_list;
        }
   }
?>