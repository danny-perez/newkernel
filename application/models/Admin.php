<?php
//Application/Model/Admin.php
   class Admin extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function admin_emul($log,$pas,$cap){
        $cap==='  ' ? $flag=true:$flag=false;
        $sql='';
        $s_n[]=$log;
        $s_n[]=$pas;
        $row['status']='FALSE';
        $this->load->database('pass');
        $query = $this->db->query('SELECT * FROM user WHERE login LIKE ? AND passw LIKE sha1(?)',$s_n);
		foreach ($query->result_array() as $row){$rs_read[]=$row; $row['status']='TRUE';}
	//	var_dump($rs_read);
		if($row['status']==='FALSE'){
		$query = $this->db->query('SELECT login,email FROM user_vrem WHERE login LIKE ?',$s_n[0]);
		foreach ($query->result_array() as $row){$rs_read[]=$row; $row['status']='НЕ ПОДТВЕРЖДЕН';}
		}
		$this->db->close();
		return $row; 
		}
		public function admin_add_fav($name, $book, $glava, $stih,$tags,$color){
        $this->load->database('default');
        $query = $this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$book);
        $kn = $query->row('kn');
        $this->db->close();
        $this->load->database('pass');
        $query = $this->db->query('SELECT login,email FROM user WHERE login LIKE ?',$name);
        if(!$query->row()){$result[]='Error users'; goto label_stop;}
        $email = $query->row('login'); //Идентификация по login и e-mail в оригинале только login
        $s_n[]=$kn;
        $s_n[]=$glava;
        $s_n[]=$stih;
        $s_n[]=$color;
        $s_n[]=$tags;
        $s_n[]=$email;
        $query = $this->db->query('INSERT INTO `favorite`(`kn`, `gl`, `st`, `color`, `tags`, `name_user`) VALUES (?,?,?,?,?,?)',$s_n);
        if(!$query)$result[]='Error record'; else $result[]='Sucsessful';
		label_stop:
		return $result;
		}
		
		public function admin_zakladki($name, $book, $glava, $gamma){
        $this->load->database('default');
        $query = $this->db->query('SELECT abreviation_rus FROM new_book WHERE abbreviation LIKE ?',$book);
        $arus = $query->row('abreviation_rus'); //Аббревиатура книги
        $this->db->close();
        
        $this->load->database('pass');
        $query = $this->db->query('SELECT login,email FROM user WHERE login LIKE ?',$name);
        if(!$query->row()){$result[]='Error users'; goto label_stop;}
        $login = $query->row('login'); //Идентификация по login и e-mail в оригинале только login
        
        $query = $this->db->query('SELECT * FROM zakladki WHERE name LIKE ?',$login);
        if(!$query->row())
            {
            /*добавить запись INSERT*/
            $s_n[]=$gamma;
            $s_n[]=$login;
            $s_n[]=$arus.'. '.$glava;
            $query = $this->db->query('INSERT INTO zakladki(name, ?) VALUES (?,?)',$s_n);
            }
                else
                    {
                        /*добавить запись Update*/
                        $komplex=$arus.'. '.$glava;
                        $sql="UPDATE `zakladki` SET `$gamma`='$komplex' WHERE `name` LIKE '$login'";
                        $query = $this->db->query($sql);    
                    }
        if(!$query)$result[]='Error record'; else $result[]='Sucsessful';
		label_stop:
		return $result;
		}
		public function admin_note($name, $book, $glava, $stih,$tags){
        $this->load->database('default');
        $query = $this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$book);
        $kn = $query->row('kn');
        $this->db->close();
        $this->load->database('pass');
        $query = $this->db->query('SELECT login,email FROM user WHERE login LIKE ?',$name);
        if(!$query->row()){$result[]='Error users'; goto label_stop;}
        $login = $query->row('login'); //Идентификация по login и e-mail в оригинале только login
        $s_n[]=$kn;
        $s_n[]=$glava;
        $s_n[]=$stih;
        $s_n[]=$login;
        $s_n[]=$tags;
        
        $query = $this->db->query('INSERT INTO `zametki`(`kn`, `gl`, `st`, `user`, `text`) VALUES (?,?,?,?,?)',$s_n);
        if(!$query)$result[]='Error record'; else $result[]='Sucsessful';
		label_stop:
		return $result;
		}
		public function admin_tolk($name, $book, $glava, $stih,$id_tolk, $ekzeget){
        $this->load->database('default');
        $query = $this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$book);
        $kn = $query->row('kn');
        $this->db->close();
        $this->load->database('pass');
        $query = $this->db->query('SELECT login,email FROM user WHERE login LIKE ?',$name);
        if(!$query->row()){$result[]='Error users'; goto label_stop;}
        $login = $query->row('login'); //Идентификация по login и e-mail в оригинале только login
        $s_n[]=$login;
        $s_n[]=$kn;
        $s_n[]=$glava;
        $s_n[]=$stih;
        $s_n[]=$id_tolk;
        $s_n[]=$ekzeget;
        
        $query = $this->db->query('INSERT INTO `tolk_fav`(`name_user`, `kn`, `gl`, `st`, `id_tolk`, `tolk`) VALUES (?,?,?,?,?,?)',$s_n);
        if(!$query)$result[]='Error record'; else $result[]='Sucsessful';
		label_stop:
		return $result;
		}
		public function read_n($name){
        $this->load->database('pass');
        $query = $this->db->query('SELECT login FROM user WHERE login LIKE ?',$name);
        if(!$query->row()){$rs_r[]='Error users'; goto label_stop;}
        $login = $query->row('login'); //Идентификация по login и e-mail в оригинале только login
        $query = $this->db->query('SELECT * FROM `zametki` WHERE `user` LIKE ?',$login);
        if(empty($query))$rs_r[]='Not_note'; else {foreach ($query->result() as $row)$rs_r[]=$row;}
		label_stop:
		return $rs_r;
		}
		public function edit_n($id, $note){
		$this->load->database('pass');    
    	$s_n[]=$id;
        $s_n[]=$note;
        $s_n[]=$id;
        $this->load->database('pass');
        $query = $this->db->query('UPDATE `zametki` SET `id`=?,`text`=? WHERE id=?',$s_n);
        if(!$query) $rs_r[]='Not_update'; else $rs_r[]='Successful';
		return $rs_r;
		}
		public function delete_n($id){
		$this->load->database('pass');    
		$query = $this->db->query('DELETE FROM `zametki` WHERE `id`=?',$id);
        if(!$query)$result[]='Error DELETE'; else $result[]='Sucsessful DELETE';
        return $result;
		}
		public function read_f_s($name){
        $this->load->database('pass');
        $query = $this->db->query('SELECT * FROM `favorite` WHERE `name_user` LIKE ?',$name);
        foreach ($query->result() as $row)$rs_r[]=$row;
		return $rs_r;
		}
		public function read_f_s2($name){
        $this->load->database('pass');
        $query = $this->db->query('SELECT * FROM `pass`.`favorite` LEFT JOIN `ekzeget`.`new_book` ON `pass`.`favorite`.`kn` LIKE `ekzeget`.`new_book`.`kn` WHERE `pass`.`favorite`.`name_user` LIKE ?',$name);
        foreach ($query->result() as $row)$rs_r[]=$row;
		return $rs_r;
		}		
		
		public function delete_f_s($id){
        $this->load->database('pass');
        $query = $this->db->query('DELETE FROM `favorite` WHERE `id`=?',$id);
        if(!$query)$result[]='Error DELETE'; else $result[]='Sucsessful DELETE';
		return $result;
		}
		public function read_f_t($name){
		$this->load->database('pass');
        $query = $this->db->query('SELECT * FROM `tolk_fav` WHERE `name_user` LIKE ?',$name);
        foreach ($query->result() as $row)$rs_r[]=$row;
		return $rs_r;
		}
		public function delete_f_t($id){
		$this->load->database('pass');
        $query = $this->db->query('DELETE FROM `tolk_fav` WHERE `id`=?',$id);
        if(!$query)$result[]='Error DELETE'; else $result[]='Sucsessful DELETE';
		return $result;
		}
		public function read_z($name){
		$this->load->database('pass');
        $query = $this->db->query('SELECT * FROM `zakladki` WHERE `name` LIKE ?',$name);
        foreach ($query->result() as $row)$rs_r[]=$row;
		return $rs_r;
		}
		public function delete_z($name,$color){
		   switch ($color){
		case 'red' : $color='red'; break;
        case 'orange' : $color='orange'; break;
        case 'green' : $color='green'; break;
        case 'blue' : $color='blue'; break;
        default : $color='fuchsia'; break;
		   }
        $this->load->database('pass');
        $sql="UPDATE `zakladki` SET `$color`='' WHERE `name` LIKE '$name'";
        $query = $this->db->query($sql);
        if($query) $res[]='Sucsessful DELETE'; else $res[]='Error DELETE';
		return $res;
		}
		public function read_user_id($login){
        $this->load->database('pass');
        $row['status']='FALSE';
        $query = $this->db->query('SELECT login,email,country,sity,o_sebe,data,last_data FROM user WHERE login LIKE ?',$login);
		foreach ($query->result_array() as $row){$rs_read[]=$row; $row['status']='REGISTERED';}
		if($row['status']==='FALSE'){
		$query = $this->db->query('SELECT login,email FROM user_vrem WHERE login LIKE ?',$login);
		foreach ($query->result_array() as $row){$rs_read[]=$row; $row['status']='NotConfirmed';}
		}
		$this->db->close();
		return $row; 
		}
		public function read_p(){
		$this->load->database('default');
        $query = $this->db->query('SELECT * FROM `plan_chteniya`');
        foreach ($query->result() as $row)$rs_r[]=$row;
		return $rs_r;
		}
		public function u_read_p($name){
		$this->load->database('pass');
        $query = $this->db->query('SELECT * FROM `plan` WHERE `name` LIKE ?', $name);
        foreach ($query->result() as $row)$rs_r[]=$row;
		return $rs_r;
		}
		public function r_bible_u($name){
		$this->load->database('pass');
        $query = $this->db->query('SELECT * FROM `plan` WHERE `name` LIKE ?', $name);
        foreach ($query->result() as $row)$rs_r[]=$row;
        $res_t=$rs_r[0];
        $name_plan=$res_t->nazvan;
        $start_plane=$res_t->nachalo;
        $this->db->close();
        $this->load->database('default');
        $query = $this->db->query('SELECT plan FROM `plan_chteniya` WHERE `nazvan` LIKE ?',$name_plan);
        $row = $query->row('plan');
        $pl=explode(',',$row);
        foreach($pl as $tt){
                            $tt=trim($tt);
                            $query = $this->db->query('SELECT * FROM `chteniya` WHERE `title` LIKE ?',$tt);
                            $row = $query->row('plan');
                            $rr=preg_replace('/"?,?/','',$row);
                            $rr=trim($rr);
                            $s=explode(' ',$rr);
                            $mchten[]=$s;
                            }
        $tday=strtotime("now");
        $doday=strtotime($start_plane);
        $difday=date('z',$tday)-date('z',$doday); //Разница в днях
        
        foreach($mchten as $dd){
        $day=$dd[$difday];
        $sti=array(' ',' ',' ');
        $n1=explode(':',$day); $sti[2]=$n1[0];
        if(count($n1)>1){$sti=explode('-',$n1[1]); $sti[]=$n1[0];} else {$sti[0]=0; $sti[1]=0;}
        $rs_f[]=$sti[2].' '.$sti[0].' '.$sti[1];
        }
		//var_dump($mchten);
		return $rs_f;
		}
		
		
		public function load_plane($name)
		{
		    if($name)
		    { 
                $this->load->database('default');
                $query = $this->db->query('SELECT * FROM chteniya WHERE title LIKE ?',$name);
		        $row = $query->row('plan');
		        $rr=preg_replace('/"?,?/','',$row);
                $rr=trim($rr); //строка с планом чтений
                $plan = explode(' ',$rr);
                foreach($plan as $b)
                {
                    $entry = substr($b,0,2);
                    $ddd = '%'.$entry.'%';
                    $query = $this->db->query('SELECT abreviation_rus FROM new_book WHERE kn LIKE ?',$ddd);
		            $row = $query->row('abreviation_rus');
		            $num = preg_replace('/[0-9]?[a-z]+/','',$b);
		            $chap = (int)$num;
		            $chten = $row.'.'.$chap;
		            $rs_r[] = $chten;
                }
		    } 
		    else{
		            $this->load->database('default');
                    $query = $this->db->query('SELECT id,title FROM chteniya');
                    foreach ($query->result() as $row)$rs_r[]=$row; //Список чтения в аббревиауре
		        }
			return $rs_r;
		}
		
		
		
		public function mon_r_u($name){
		$this->load->database('pass');
        $query = $this->db->query('SELECT `prochitano`,`nachalo` FROM `plan` WHERE `name` LIKE ?', $name);
        $row = $query->row('prochitano');
        $start_day = $query->row('nachalo');
        
        
        $tday=strtotime("now");
        $doday=strtotime($start_day);
        $difday=date('z',$tday)-date('z',$doday); //Текущий день
        
        $fin=explode(' ',$row);
        if(array_pop($fin)!=$difday){
                                $row=$row.' '.(string)$difday;
                                $s_n[]=$row;
                                $s_n[]=$name;
                                $query = $this->db->query('UPDATE `plan` SET `prochitano`=? WHERE `name` LIKE ?', $s_n);
                                if(!$query) $rs_r[]='Not_update'; else $rs_r[]='Successful';
                                    }else $rs_r[]='Dublicate record';
		return $rs_r;
		}
		public function add_p_u($name,$plane){
		$this->load->database('pass');
        $s_n[]=$plane;
        $s_n[]=$name;
        $query = $this->db->query('UPDATE `plan` SET `nazvan`=? WHERE `name`=?', $s_n);
        if(!$query) $rs_r[]='Not_update'; else $rs_r[]='Successful';
		return $rs_r;
		}
		
		public function listen_p_u($name){
		$this->load->database('pass');		    
        $query = $this->db->query('SELECT `prochitano`,`nachalo` FROM `plan` WHERE `name` LIKE ?', $name);
        $row = $query->row('prochitano');
        $start_day = $query->row('nachalo');
        $origin=explode(' ',$row);

        $tday=strtotime("now");
        $doday=strtotime($start_day);
        $difday=date('z',$tday)-date('z',$doday); //Текущий день
        for($i=1;$i<=$difday;$i++)$etalon[]=$i;
        $dif=array_diff($etalon,$origin);
        foreach($dif as $vv)$rs_r[]=$vv;
		return $rs_r;
		}
		public function reg_user($data_form){
		    unset($data_form['captcha']);
		    unset($data_form['enter']);
		    foreach($data_form as $rt)$s_n[]=$rt;
		    $tod=strtotime("now");
		    $s_n[]=date('d.m.Y',$tod);
		    $s_n[]='no';
		    $s_n[]=date('d.m.Y',$tod);
		$this->load->database('pass');
        // var_dump($s_n);
    //echo json_encode($_SERVER);
     // var_dump('`login`, `passw`, `email`, `country`, `sity`, `o_sebe`, `data`, `see_email`, `last_data`');
        $query = $this->db->query('INSERT INTO `user`(`login`, `passw`, `email`, `country`, `sity`, `o_sebe`, `data`, `see_email`, `last_data`) VALUES (?,sha1(?),?,?,?,?,?,?,?)', $s_n);
     //$query=true;
        if(!$query) $rs_r[]='Not_update'; else $rs_r[]='Successful';
		return $rs_r;
		}
		public function reg_user_upd($data_form){
		    $s_n[]=$data_form['password'];
		    $s_n[]=$data_form['email'];
		    $s_n[]=$data_form['country'];
		    $s_n[]=$data_form['city'];
		    $s_n[]=$data_form['about'];
		    $tod=strtotime("now");
		    $s_n[]='no';
		    $s_n[]=date('d.m.Y',$tod);
		    $s_n[]=$data_form['login'];
		$this->load->database('pass');
        $query = $this->db->query('UPDATE `user` SET `passw`=?,`email`=?,`country`=?,`sity`=?,`o_sebe`=?,`see_email`=?,`last_data`=? WHERE `login` LIKE ?', $s_n);
        if(!$query) $rs_r[]='Not_update'; else $rs_r[]='Successful';
		return $rs_r;
		}
		public function get_data_email($email){
		$this->load->database('pass');
        $query = $this->db->query('SELECT login,country,sity,o_sebe,data,see_email,last_data FROM user WHERE email LIKE ?',$email);
		foreach ($query->result_array() as $row){$rs_read[]=$row;}
		return $rs_read;
		}
   }								
?>