<?php 
   //Application/Controllers/Propovedi.php
   class Propovedi extends CI_Controller {  
	    public function index() { 
        $this->load->model('propoved_read');
		$result_model=$this->propoved_read->read_povod();
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
        public function fete($id_event='11') { 
        $this->load->model('propoved_read');
		$result_model=$this->propoved_read->read_fete($id_event);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
        public function fchten($id_event='71',$version_id='1') { 
        $this->load->model('propoved_read');
        $this->load->model('json_page');
		$result_model=$this->propoved_read->read_list($id_event);
		foreach($result_model as $from_to){
		$result_model=$this->propoved_read->list_bible($from_to,$version_id);
        $final_r[]=$result_model;
		}
		$this->json_page->json_echo($final_r);
        }
        public function rmenu($id_event='2') { 
        $this->load->model('propoved_read');
		$result_model=$this->propoved_read->read_catalog($id_event);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
        public function rtext($id_sermon='606') { 
        $this->load->model('propoved_read');
		$result_model=$this->propoved_read->read_sermon($id_sermon);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
   }
?>