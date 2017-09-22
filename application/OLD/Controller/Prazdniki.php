<?php 
   //Application/Controllers/bible.php
   class Prazdniki extends CI_Controller {  
	    public function index() { 
		$this->load->model('json_page');
		$this->load->model('data_now');
		$result_model=$this->data_now->now_prazdnik();
		$this->json_page->json_echo($result_model);
        }
        public function segodnya($date_holiday){
        $this->load->model('data_now');
		$result_model=$this->data_now->now_prazdnik($date_holiday);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
        public function now_date() { 
		$this->load->model('json_page');
		$this->load->model('data_now');
		$result_model[]=$this->data_now->data_top();
		$this->json_page->json_echo($result_model);
        }
    }
?>