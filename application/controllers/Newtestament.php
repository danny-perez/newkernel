<?php

/**
 * Created by PhpStorm.
 * User: yuriy
 * Date: 12.02.2018
 * Time: 11:37
 */
class Newtestament extends CI_Controller
{
  public function index()
  {
    $book = $_REQUEST['book'] ?? '';
    $chapter = $_REQUEST['chapter'] ?? '1';
    $activeMenu0='';
    $activeMenu1='';
    $activeMenu2='';
    $activeMenu3='';
    $activeMenu4='';
    $activeMenu5='';
    $activeMenu6='';
    $activeMenu7='';
    $activeMenu8='';
    $activeMenu9='';
    $activeMenu10='';
    $activeMenu1 = 'class="active"';
    $this->load->model('bible2');
    $number_chapters=$this->bible2->read_chapters($book);
    $data['kn'] = $book;
    $data['chapter'] = $chapter;
    $data['num_chap']=$number_chapters;
    $this->load->model('bible2');
    $text_book=$this->bible2->text_book($book,$chapter);
    $data['text_book']=$text_book;
    $dataPage = compact('activeMenu0','activeMenu1','activeMenu2','activeMenu3','activeMenu4','activeMenu5','activeMenu6','activeMenu7');
    $this->load->view('header',$dataPage);
    $this->load->view('newtestament_page',$data);
    $this->load->view('footer');
  }
}
?>
