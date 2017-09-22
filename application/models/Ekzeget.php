<?php
//Application/Model/Ekzeget.php
   class Ekzeget extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function list_ekzeget($name_ekzeget){
		    if(!$name_ekzeget){
                            $this->load->database('pass');
                            $query=$this->db->query('SELECT * FROM tolks ORDER BY name');
                            foreach ($query->result_array() as $row){$rs_render[]=$row;}
		                    }else{
		                        $this->load->database('tolk');
                                $query=$this->db->query('SHOW TABLES FROM tolk');
                                foreach ($query->result_array() as $row){$rs_table[]=$row['Tables_in_tolk'];}  
                                foreach($rs_table as $name_table){
                                                                $sql="SELECT id,st_no FROM $name_table WHERE t_name LIKE ? ORDER BY st_no";
                                                                $query=$this->db->query($sql,$name_ekzeget);
                                                                foreach ($query->result_array() as $row){
                                                                                                        $row['table_name']=$name_table;
                                                                                                        $rs_occurrence[]=$row;
                                                                                                        }     
                                                                }
                            //rs_occurence - все места id в таблице st_no номер стиха table_name имя таблицы
                            $this->db->close();
                            $this->load->database('pass');
                            foreach($rs_occurrence as $b_massiv){
                                                                $ser_t=explode('_',$b_massiv['table_name']);
                                                                preg_match('/[0-9]?[a-z]+/',$ser_t[1],$tname_1);
                                                                $tname_2=preg_replace('/[0-9]?[a-z]+/','', $ser_t[1]);
                                                                $name_book=$tname_1[0];
                                                                $query=$this->db->query('SELECT sokr,id FROM books WHERE kn LIKE ?',$name_book);
                                                                foreach ($query->result_array() as $row){$r_book=$row;}
                                                                $number_chapter=(int)$tname_2;
                                                                $number_verse=$b_massiv['st_no'];
                                                                $vid['face']=$r_book['sokr'].'.'.(string)$number_chapter.':'.$number_verse;
                                                                $vid['id_book']=$r_book['id'];
                                                                $vid['tabe_name']=$b_massiv['table_name'];
                                                                $vid['id']=$b_massiv['id'];
                                                                $rs_render[]=$vid;
                                                                }
                                                        }
       return $rs_render;
		}
		public function list_ekzeget_link($table_name,$id_table){
		                        $this->load->database('tolk');
		                        $sql="SELECT * FROM $table_name WHERE id = ?";
                                $query=$this->db->query($sql,$id_table);
                                foreach ($query->result_array() as $row){$rs_render[]=$row;}  
       return $rs_render;
		}
   }								
?>