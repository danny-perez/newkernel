<?php
//Application/Model/User_model.php
   class Propoved_read extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		}
		public function read_povod(){
		$this->load->database('admin_ekzeget');
        $query = $this->db->query('SELECT type, name FROM new_event_i18n');
		foreach ($query->result_array() as $row){$rs_povod[]=$row;}
		return $rs_povod;
		}
		public function read_fete($id_event){
		$this->load->database('admin_ekzeget');
        $query = $this->db->query('SELECT id_p,name FROM new_event WHERE type=? ORDER BY id_links ASC',$id_event);
		foreach ($query->result_array() as $row){$rs_fete[]=$row;}
		return $rs_fete;
		}
		public function read_list($id_event){
		$this->load->database('admin_ekzeget');
        $query = $this->db->query('SELECT `point_f`,`point_to` FROM new_event_bible WHERE event_id=?',$id_event);
		foreach ($query->result_array() as $row){$rs_list[]=$row;}
		return $rs_list;
		}
		public function list_bible($from_to,$version_id){
		$this->load->database('admin_ekzeget');
		$s_n[]=$version_id;
		$s_n[]=$from_to['point_f'];
		$s_n[]=$from_to['point_to'];
		$query = $this->db->query('SELECT name FROM new_book WHERE number=LEFT(?,2)',$s_n[1]);
		foreach ($query->result_array() as $row){$rs_text[]=$row;}
        $query = $this->db->query('SELECT contents FROM bible WHERE version_id=? AND pointer BETWEEN ? AND ?',$s_n);
		foreach ($query->result_array() as $row){$rs_text[]=$row;}
		return $rs_text;
		}
		public function read_sermon($id_sermon){
		$this->load->database('admin_ekzeget');
        $query = $this->db->query('SELECT tema,text FROM propovedi WHERE id=?',$id_sermon);
		foreach ($query->result_array() as $row){$rs_ser[]=$row;}
		return $rs_ser;
		}
   }								
?>