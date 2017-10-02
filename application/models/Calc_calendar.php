<?php
//Application/Model/User_model.php
   class Calc_calendar extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function data_now($cadate){ //Формат 01.01.2010 по 2299 год
		/************************************************************************************/
strtotime($cadate) ? $tday=strtotime($cadate) : $tday=strtotime("now"); //Либо считает дату, либо сегодня
$today_y = date("Y", $tday); 
$today_d=date("d.m.Y", $tday);
$today_reserv=$today_d;
/**************************************************************************************************************/
$tday2=strtotime("-1 day",$tday);
$seg2=date("d.m.Y",$tday2);
$rs['befor']=$seg2;
$tday3=strtotime("+1 day",$tday);
$seg3=date("d.m.Y",$tday3);
$rs['next']=$seg3;
/*************************************************************************************************************/
$this->load->database('default');
$query=$this->db->query('SELECT * FROM pasha WHERE py LIKE ?',$today_y);
foreach ($query->result_array() as $row){$rs_pasha=$row;}
$datem=$rs_pasha['dp']; //Пасха в этом году
$segodnya=strtotime($today_d); $pasha=strtotime($datem);
$dopashi=strtotime("-70 day",$pasha); //Пасха -70 дней в этом году
//if($segodnya<$dopashi){$rs[]='Допасхальные чтения';}
//if($segodnya>=$pasha){$rs[]='Постпасхальные чтения';}
if(($segodnya<=$pasha)&&($segodnya>=$dopashi)){
//--------------------------------Постные чтения
$this->db->close();
$day_read=$pasha-$segodnya;    
$this->load->database('pass');
date('z', $day_read) ? $dni=date('z', $day_read): $dni=0;
$query=$this->db->query('SELECT * FROM post_chten WHERE dni=?',$dni);
foreach ($query->result_array() as $row){$rs[]=$row;}
} 
else {//-------------Апостольские чтения
$day_read=$segodnya-$pasha;
if($day_read<0){
                $l_today_y=$today_y-1; 
                $this->db->close();
                $this->load->database('default');
                $query=$this->db->query('SELECT * FROM pasha WHERE py LIKE ?', $l_today_y); 
                foreach ($query->result_array() as $row){$rs_row=$row;}
                $l_pasha=strtotime($rs_row['dp']); 
                $day_read=$segodnya-$l_pasha;
                }
                $dni=date("d.m.Y",$day_read);
                $dni=date('z', $day_read);
                $this->db->close();
                $this->load->database('pass');
                $query=$this->db->query('SELECT * FROM apostol_chten WHERE dni=?', $dni);
                foreach ($query->result_array() as $row){$rs[]=$row;} //Если не попали в Пост
                }
        /**************************************************************************************************************/
                $segodnya_t=date("d.m.",$tday);
                $query=$this->db->query('SELECT nazvan FROM mineja WHERE den LIKE ?', $segodnya_t); 
                foreach ($query->result_array() as $row){$rs[]=$row;}
        /**************************************************************************************************************/
		return $rs;
		}
		public function pasha($data){ //Формат 01.01.2010 по 2299 год
		/************************************************************************************/
                        $tday=strtotime($data);
                        $tyear=date("Y",$tday);
                        $a=$tyear%19;
                        $be=$tyear%4;
                        $ve=$tyear%7;
                        $g=(19*$a+15)%30;
                        $de=(2*$be+4*$ve+6*$g+6)%7;
                        $result_day=$g+$de;
                        if($result_day<9) {$dp=$result_day+22; $tpasha=(string)$dp.'.03.'.$tyear;}
                                        else{$dp=$result_day-9; $tpasha=(string)$dp.'.04.'.$tyear;}
                        $tpa2=strtotime($tpasha);
                        $tpa=strtotime("+13 day",$tpa2);
                        $newpasha[]=date("d.m.Y",$tpa);
/*************************************************************************************************************/
                        $tday1=strtotime("-1 year",$tday);
                        $tyear=date("Y",$tday1);
                        $a=$tyear%19;
                        $be=$tyear%4;
                        $ve=$tyear%7;
                        $g=(19*$a+15)%30;
                        $de=(2*$be+4*$ve+6*$g+6)%7;
                        $result_day=$g+$de;
                        if($result_day<9) {$dp=$result_day+22; $tpasha=(string)$dp.'.03.'.$tyear;}
                                        else{$dp=$result_day-9; $tpasha=(string)$dp.'.04.'.$tyear;}
                        $tpa2=strtotime($tpasha);
                        $tpa=strtotime("+13 day",$tpa2);
                        $newpasha[]=date("d.m.Y",$tpa);
/*************************************************************************************************************/
                        return $newpasha;
        }
		public function mineja($data){ //Формат 01.01.2010 по 2299 год
                        $tday=strtotime($data);
                        $tmin=date("d.m.",$tday);
                        $this->load->database('pass');                        
                        $query=$this->db->query('SELECT * FROM `mineja` WHERE `den` LIKE ?', $tmin);
                        $row = $query->row();
		                return $row;
		/************************************************************************************/
		}  
		public function chtenija($data,$result_pasha){ //Формат 01.01.2010 по 2299 год
                        $tday=strtotime($data);
                        /*****************************************************************/                
                        $nowpasha=strtotime($result_pasha[0]); //Пасха этого года
                        $lastpasha=strtotime($result_pasha[1]); //Пасха прошлого года
                        $dopasha=strtotime("-70 day",$nowpasha); //70 дней до пасхи -ПОСТ
                        /*****************************************************************/                
                        if ($tday<$dopasha)
                        {
                            $date1 = DateTime::createFromFormat('U',$tday);
                            $date2 = DateTime::createFromFormat('U',$lastpasha);
                            $interval=$date1->diff($date2);
                            $numd=$interval->format('%a');
                            goto fin;
                        }
                        if(($tday>=$dopasha)AND($tday<$nowpasha))
                        {
                            $date1 = DateTime::createFromFormat('U',$nowpasha);
                            $date2 = DateTime::createFromFormat('U',$tday);
                            $interval=$date1->diff($date2);
                            $numd=$interval->format('-%a');
                            goto fin;
                        }
                        if($tday>$nowpasha)
                        {
                            $date1 = DateTime::createFromFormat('U',$tday);
                            $date2 = DateTime::createFromFormat('U',$nowpasha);
                            $interval=$date1->diff($date2);
                            $numd=$interval->format('%a');
                            goto fin;
                            
                        } else $numd=0;
                        
                        fin :
                        //$numd - количество дней
                        $this->load->database('pass');
                        if($numd==0){$rs_chten['nazvan']='Пасха'; $rs_chten['apostol']='Деян. 1:1-8'; $rs_chten['evang']='Ин. 1:1-17'; $rs_chten['vz']='Ин. 20:19-25';}
                        if($numd>0)
                        {
                            $query=$this->db->query('SELECT * FROM `apostol_chten` WHERE `dni` = ?', $numd);
                            $row = $query->row();
                            $rs_chten['apostol']=$row;
                            $query=$this->db->query('SELECT * FROM `evang_chten` WHERE `dni` = ?', $numd);
                            $row = $query->row();
                            $rs_chten['evang']=$row;
                        }elseif($numd<0){
                            $query=$this->db->query('SELECT * FROM `post_chten` WHERE `dni` = ?', abs($numd));
                            $row = $query->row();
                            $rs_chten['postniy']=$row;
                        }
		                return $rs_chten;
		}
   }
   
?>