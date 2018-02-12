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
    $book = $_GET['book'] ?? '';
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
    $dataPage = compact('activeMenu0','activeMenu1','activeMenu2','activeMenu3','activeMenu4','activeMenu5','activeMenu6','activeMenu7');
    $this->load->view('header',$dataPage);
    // $this->load->view('biblii_page',$testament);
    $this->load->view('footer');
  }
}
?>
