<?php 
   //Application/Controllers/bible.php
   class Commentary extends CI_Controller {  
	    public function index() { 
	    unset($res_model);
        $this->load->model('tolk_author');
        $this->load->model('json_page');
		$res_model=$this->tolk_author->list_author();
        $this->json_page->json_echo($res_model);
        }
        public function author($id_slug='1') { 
        $this->load->model('tolk_author');
        $this->load->model('json_page');
		$res_model=$this->tolk_author->about_author($id_slug);
        $this->json_page->json_echo($res_model);
        }
        public function tolkovanie($id_slug='122') { 
        $this->load->model('json_page');
        $this->load->model('tolk_author');
        $id_slug<44 ? $res_model[]='У автора нет толкований' : $res_model=$this->tolk_author->tolk_author($id_slug);
        $this->json_page->json_echo($res_model);
        }
        public function book($id_author='122', $book_id='1'){
        $rint=(int)$book_id;
        if($rint>9){
        $this->load->model('tolk_author');
        $this->load->model('json_page');
		$res_model=$this->tolk_author->comment_book2($id_author, $book_id);
        $this->json_page->json_echo($res_model);    
        }
        else {
        $this->load->model('tolk_author');
        $this->load->model('json_page');
		$res_model=$this->tolk_author->comment_book($id_author, $book_id);
        $this->json_page->json_echo($res_model);
        }
        }
       public function glava($id_author='47', $book_id='55', $chapter='008') {
        $rint=(int)$book_id;
        if($rint>9){
        $this->load->model('tolk_author');
        $this->load->model('json_page');
		$res_model=$this->tolk_author->glava_autor2($id_author, $book_id, $chapter);
        $this->json_page->json_echo($res_model);    
        }
        else {
        $this->load->model('tolk_author');
        $this->load->model('json_page');
		$res_model=$this->tolk_author->glava_autor($id_author, $book_id, $chapter);
        $this->json_page->json_echo($res_model);
        }
        }
        public function stih($id_author='122',$pointer='1001001'){
        $this->load->model('tolk_author');
        $this->load->model('json_page');
		$res_model=$this->tolk_author->stih_autor($id_author, $pointer);
        $this->json_page->json_echo($res_model);        
        }
    }
?>