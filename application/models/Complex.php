<?php
//Application/Model/Complex.php
   class Complex extends CI_Model 
   {
		Public function __construct()
		{ 
		    parent::__construct(); 
		} 
		public function change($result_model)
		{
		    foreach($result_model as $rres)
		    {
		        $rm=$rres['comments'];
                $res=PREG_REPLACE('/(\r\n)/m','<br>',$rm);
                $res1=PREG_REPLACE('/\|\|\| (.*?) \|\|\|/ixs','<b>$1</b>',$res);
                $res2=PREG_REPLACE('#/// (.*?) ///#ixs','<i>$1</i>',$res1);
                $res3=PREG_REPLACE('/{{{ (.*?) }}}/ixs','<a href="/bible/$1">$1</a>',$res2);
                $res4=PREG_REPLACE('/\+\+\+ (.*?) \+\+/ixs','<br>ИСТОЧНИК<hr> $1',$res3);
                $res5=PREG_REPLACE('/@([0-9])/','<sup><a href="#e${1}">[${1}]</a></sup>',$res4);
                $res6=PREG_REPLACE('/=== (.*?) ==/ixs','<br>ПРИМЕЧАНИЕ<hr> $1',$res5);
                $res7=PREG_REPLACE('/\*([0-9])/','<span id="e${1}">${1}</span>',$res6);
                if(PREG_MATCH('/SHORTCODE_GROUP-([0-9]+-[0-9]+)/',$res7,$res_flag)) $list=$res_flag[1]; else $list=$rres['st_no'];
                if(PREG_MATCH('/SHORTCODE_SSIL-([0-9]+)/',$res7)) $list='';
                $res8=PREG_REPLACE('/SHORTCODE_GROUP-([0-9]+-[0-9]+)/',' ',$res7);
                $result=PREG_REPLACE('/SHORTCODE_SSIL-[0-9]+/',' ',$res8);
                
                $n_r['list_stih']=$list;
                $n_r['comments']=$result; 
                $n_r['t_name']=$rres['t_name']; 
                $n_r['st_no']=$rres['st_no'];

                $new_result[]=$n_r;
		    }
                // echo '<pre>';
                // print_r($new_result);
                // echo '</pre>';
                return $new_result;
		}
		public function change2($result_model,$field_name)
		{
		    foreach($result_model as $rres)
		    {
		        $rm=$rres[$field_name];
                $res=PREG_REPLACE('/(\r\n)/m','<br>',$rm);
                $res1=PREG_REPLACE('/\|\|\| (.*?) \|\|\|/ixs','<b>$1</b>',$res);
                $res2=PREG_REPLACE('#/// (.*?) ///#ixs','<i>$1</i>',$res1);
                $res3=PREG_REPLACE('/{{{ (.*?) }}}/ixs','<a href="/bible/$1">$1</a>',$res2);
                $res4=PREG_REPLACE('/\+\+\+ (.*?) \+\+/ixs','<br>ИСТОЧНИК<hr> $1',$res3);
                $res5=PREG_REPLACE('/@([0-9])/','<sup><a href="#e${1}">[${1}]</a></sup>',$res4);
                $res6=PREG_REPLACE('/=== (.*?) ==/ixs','<br>ПРИМЕЧАНИЕ<hr> $1',$res5);
                $res7=PREG_REPLACE('/\*([0-9])/','<span id="e${1}">${1}</span>',$res6);
                foreach($rres as $key=>$value)
                {
                    $n_t[$key] = $rres[$key];
                    if($key == $field_name) $n_t[$key] = $res7;
                }
                $new_result[]=$n_t;
		    }
                // echo '<pre>';
                // print_r($new_result);
                // echo '</pre>';
                
                return $new_result;
		}
		public function change3($result_model,$field_name)
		{
		    foreach($result_model as $rres)
		    {
		        $rm=$rres[$field_name];
                $res=PREG_REPLACE('/(\r\n)/m','<br>',$rm);
                $res1=PREG_REPLACE('/\|\|\| (.*?) \|\|\|/ixs','<b>$1</b>',$res);
                $res2=PREG_REPLACE('#/// (.*?) ///#ixs','<i>$1</i>',$res1);
                $res3=PREG_REPLACE('/{{{ (.*?) }}}/ixs','<a href="/bible/$1">$1</a>',$res2);
                $res4=PREG_REPLACE('/\+\+\+ (.*?) \+\+/ixs','<br>ИСТОЧНИК<hr> $1',$res3);
                $res5=PREG_REPLACE('/@([0-9])/','<sup><a href="#e${1}">[${1}]</a></sup>',$res4);
                $res6=PREG_REPLACE('/=== (.*?) ==/ixs','<br>ПРИМЕЧАНИЕ<hr> $1',$res5);
                $res7=PREG_REPLACE('/\*([0-9])/','<span id="e${1}">${1}</span>',$res6);
                foreach($rres as $key=>$value)
                {
                    $n_t[$key] = $rres[$key];
                    if($key == $field_name) $n_t[$key] = $res7;
                }
                $new_result[]=$n_t;
		    }
                // echo '<pre>';
                // print_r($new_result);
                // echo '</pre>';
                
                return $new_result;
		}
   }								
?>