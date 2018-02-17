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
        $dataPage = compact('activeMenu0','activeMenu1','activeMenu2','activeMenu3','activeMenu4','activeMenu5','activeMenu6','activeMenu7');
        $data['indata']=$parallel;
        $this->load->view('header',$dataPage);
        $this->load->view('linkgo',$data);
        $this->load->view('footer');
    }
}
?>
