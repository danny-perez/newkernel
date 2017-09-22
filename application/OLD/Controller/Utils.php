<?php 
   //Application/Controllers/bible.php
   class Utils extends CI_Controller {  
	    public function index() { 
        }
        public function pointer($pointer='1001002') {
        $this->load->model('utils_model');
		$result_model=$this->utils_model->gif_pointer($pointer);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function search($word='Иисус'){
        $word=urldecode($word);
        $this->load->model('utils_model');
		$result_model=$this->utils_model->find($word);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);    
        }
        public function sphinx($word='Иисус'){
        $query=urldecode($word);
        $this->load->model('utils_model');
		$result_model=$this->utils_model->find($query);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);        
        }
    }
?>