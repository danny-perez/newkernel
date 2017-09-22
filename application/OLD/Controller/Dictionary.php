<?php 
   //Application/Controllers/bible.php
   class Dictionary extends CI_Controller {  
	    public function index() { 
        $this->load->model('dict_list');
		$result_model=$this->dict_list->read_dict();
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
        public function alphabet($num_slug='1'){
        $this->load->model('dict_list');
		$result_model=$this->dict_list->read_alph($num_slug);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);    
        }
        public function letter($num_slug='1',$letter='А'){
        $letter=urldecode($letter);
        $this->load->model('dict_list');
		$result_model=$this->dict_list->read_letter($num_slug,$letter);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);   
        }
        public function word($num_slug='2',$word='Аарон'){
        $word=urldecode($word);
        $this->load->model('dict_list');
		$result_model=$this->dict_list->read_word($num_slug,$word);
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);   
        }
    }
?>