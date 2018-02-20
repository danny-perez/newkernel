<?php
/**
 * Created by PhpStorm.
 * User: yuriy
 * Date: 12.02.2018
 * Time: 11:37
 */
class Exegesis extends CI_Controller
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
    $AddresStringUrl = $_REQUEST;

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
    $this->load->model('bible2');
    $book = $_REQUEST['book'];
    $kn = $this->bible2->kn_to_title($book);
    $chapter = $_REQUEST['chapter'];
    $exegesis = $_REQUEST['exegesis'];
    $read_text = $this->bible2->read_stih_tolk($book,$chapter,$exegesis);
    $data['kn'] = $kn;
    $data['chapter'] = $chapter;
    $data['exegesis'] = $exegesis;
    $data['read_result'] = $read_text;
    $this->load->view('header',$dataPage);
    $this->load->view('exegesis_page',$data);
    $this->load->view('footer');
  }
}
?>
