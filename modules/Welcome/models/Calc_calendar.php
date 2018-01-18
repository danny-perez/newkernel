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
   }								
?>