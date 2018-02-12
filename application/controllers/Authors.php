<?php

/**
 * Created by PhpStorm.
 * User: yuriy
 * Date: 12.02.2018
 * Time: 11:37
 */
class Authors extends CI_Controller
{
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
    $AddresStringUrl = $_SERVER['REQUEST_URI'];
    switch ($AddresStringUrl) {
      case '/':
          $activeMenu0 = 'class="active"';
        break;
        case '/bible':
            $activeMenu1 = 'class="active"';
          break;
          case '/sermon':
              $activeMenu2 = 'class="active"';
            break;
            case '/exegesis':
                $activeMenu3 = 'class="active"';
              break;
              case '/dictionaries':
                  $activeMenu4 = 'class="active"';
                break;
                case '/maps':
                    $activeMenu5 = 'class="active"';
                  break;
                  case '/medialib':
                      $activeMenu6 = 'class="active"';
                    break;
                    default:
                        $activeMenu7 = 'active';
    }
    $dataPage = compact('activeMenu0','activeMenu1','activeMenu2','activeMenu3','activeMenu4','activeMenu5','activeMenu6','activeMenu7');
    $this->load->view('header',$dataPage);
    $this->load->view('start_page');
    $this->load->view('footer');
  }
}
?>
