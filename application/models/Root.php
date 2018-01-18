<?php
//Application/Model/Root.php
   class Root extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function root_l($login){
		$this->load->database('pass');
        $query = $this->db->query('SELECT `name` FROM `super_user` WHERE `name` LIKE ?',$login);
        if($query->row('name')) $exitt[]='REGISTER'; else $exitt[]='NOT SUPERUSER';
		return $exitt;
		}
		public function root_lst($login){
		$this->load->database('default');
		if($login=='Сергей Жидков'){
                $query = $this->db->query('SELECT * FROM `add_tolk` ORDER BY `data_add`',$login);
                foreach ($query->result() as $row)$rs_tolk[]=$row;
		}else{
                $query = $this->db->query('SELECT * FROM `add_tolk` WHERE `author` LIKE ? ORDER BY `data_add`',$login);
                foreach ($query->result() as $row)$rs_tolk[]=$row;
		      }
		return $rs_tolk;
		}
		public function root_a($in_data){
		$login=$in_data['author'];
		$this->load->database('pass');
        $query = $this->db->query('SELECT `name` FROM `super_user` WHERE `name` LIKE ?',$login);
        if($query->row('name')) $superuser=$login;else $superuser=null;
        $this->db->close();
        $this->load->database('default');
        
        $tday=strtotime("now");
        $difday=date('d.m.Y',$tday);
        $s_n[]=$difday;
        foreach($in_data as $dan)$s_n[]=$dan;
        $s_n[]=$superuser;
        $query = $this->db->query('INSERT INTO `add_tolk`(`data_add`, `author`, `kn`, `glava`, `stih`, `ekzeget`, `article`,`superuser`) VALUES (?,?,?,?,?,?,?,?)',$s_n);
         if(!$query) $rs_r[]='Not_update'; else $rs_r[]='Successful';
		return $rs_r;
		}		
		public function root_e_t($login,$id){
		$this->load->database('default');
		if($login==='Сергей Жидков'){
        $query = $this->db->query('SELECT * FROM `add_tolk` WHERE `id` = ?',$id);
		foreach ($query->result() as $row)$rs_resent[]=$row;    
		                            }else{
		$s_n[]=$id;
		$s_n[]=$login;
        $query = $this->db->query('SELECT * FROM `add_tolk` WHERE `id` = ? AND `author` LIKE ?',$s_n);
        if(!$query->result()){
                            $rs_resent[]='NOT EQUAL LOGIN AND ID';
                            }else{
                                    foreach ($query->result() as $row)$rs_resent[]=$row;
                                    }
		                                }
		return $rs_resent;
		}
		public function root_d_t($login,$id){
		$this->load->database('default');
		if($login==='Сергей Жидков'){
		                            $query = $this->db->query("UPDATE `add_tolk` SET `deleting`='ADM_DEL' WHERE `id`=?",$id);
		                            if(!$query) $rs_r[]='Error id/login. Not_update'; else $rs_r[]='Successful';
		                            }else{
		                                    $s_n[]=$id;
		                                    $s_n[]=$login;
                                            $query = $this->db->query('SELECT * FROM `add_tolk` WHERE `id` = ? AND `author` LIKE ?',$s_n);
                                            if(!($query->row('article')))$rs_r[]='NOT DELETE RECORD'; else{
                                                                        $query = $this->db->query("UPDATE `add_tolk` SET `deleting`='DELETE' WHERE `id`=? AND `author` LIKE ?",$s_n);
                                                                        if(!$query) $rs_r[]='Error id/login. Not_update'; else $rs_r[]='Successful';
                                                                                                        }
		                                    }
        return $rs_r;
		}
		public function root_send_t($login,$id,$issled){
		$this->load->database('pass');
        $query = $this->db->query('SELECT `name` FROM `super_user` WHERE `name` LIKE ?',$login);
        if($query->row('name')){
                               $this->db->close(); 
                               $this->load->database('default');
                               $query = $this->db->query('SELECT * FROM `add_tolk` WHERE `id` = ?',$id);
                               if($query->row('article'))$rs_r=$query->row(); else{$rs_res[]='Error REC'; goto f_l;}
                               $this->db->close();
                               $this->load->database('tolk');
                               $tab_name='tolk_'.$rs_r->kn.$rs_r->glava;
                               $ekzeget=$rs_r->ekzeget;
                               $stih=$rs_r->stih;
                               $article=$rs_r->article;
                               $author=$rs_r->author;
                               $s_n[]=(string)$tab_name;
                               $s_n[]=(string)$ekzeget;
                               $s_n[]=(string)$stih;
                               $s_n[]=(string)$article;
                               $s_n[]=(string)$author;
                               $s_n[]=(string)$issled;
                               $sql="INSERT INTO `$tab_name`(`t_name`, `st_no`, `comments`, `user`, `issled`) VALUES ('$ekzeget',$stih,'$article','$author','$issled')";
                               $query = $this->db->query($sql);
                               if(!$query) $rs_res[]='Not_update';
                               $tday=strtotime("now");
                               $difday=date('d.m.Y',$tday);
                               $k_n[]=$difday;
                               $k_n[]='MOVE';
                               $k_n[]=$id;
                               $this->db->close();
                               $this->load->database('default');
                               $query = $this->db->query('UPDATE `add_tolk` SET `checked_date`=?,`deleting`=? WHERE `id`=?',$k_n);
                               if(!$query) $rs_res[]='Not_update'; else $rs_res[]='Successful';
                                }else $rs_res[]='NOT SEND. DON`T SUPERUSER';
        f_l:
        return $rs_res;
		}		
   }
?>