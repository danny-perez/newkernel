<?php 
   //Application/Controllers/bible.php
   class Bible extends CI_Controller {  
	    public function index() { 
		$this->load->model('bible_read');
		$result_model=$this->bible_read->read_book();
		$this->load->model('json_page');
		$this->json_page->json_echo($result_model);
        }
        public function book($name_book='Gen',$chapter='1') {
        $this->load->model('bible_read');
		$result_model=$this->bible_read->read_chapters($name_book,$chapter);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function verse($name_book='Gen',$chapter='1',$verse='1'){
        $this->load->model('bible_read');
		$result_model=$this->bible_read->read_verse($name_book,$chapter,$verse);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
    }
?>