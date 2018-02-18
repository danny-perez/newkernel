<?php

/**
 * Created by PhpStorm.
 * User: yuriy
 * Date: 12.02.2018
 * Time: 11:37
 */
class Golink extends CI_Controller{
    public function index()
    {
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
        $parallel = $_GET['val1'];
        $parallel = urldecode($parallel);
        $dataPage = compact('activeMenu0','activeMenu1','activeMenu2','activeMenu3','activeMenu4','activeMenu5','activeMenu6','activeMenu7');
        $this->load->model('bible2');
        $complex_array=$this->bible2->parallel_convert($parallel);
        $link_query = "?book={$complex_array['kn']}&chapter={$complex_array['chapter']}";
        if($complex_array['testament']==0) $link_query = '/oldtestament'.$link_query;
        else $link_query = '/newtestament'.$link_query;
        session_start();
        $_SESSION['allocation_verse'] = $complex_array['verse'];
        session_write_close();
        header("Location: $link_query");
    }
}
?>
