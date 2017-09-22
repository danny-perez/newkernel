<?php 
   //Application/Controllers/Propovedi.php
   class Ekzeget extends CI_Controller {  
	    public function index() { 
        $this->load->model('ekzeget_model');
		$result_model=$this->ekzeget_model->ekzeget_list();
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
        public function about($author='1') {
        $this->load->model('ekzeget_model');
		$result_model=$this->ekzeget_model->ekzeget_author($author);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
        public function workauthor($id_slug='122'){
        $this->load->model('ekzeget_model');
		$result_model=$this->ekzeget_model->tolk_author($id_slug);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
   }
?>