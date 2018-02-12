<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$this->load->model('news');
		$result_model=$this->news->news('All');
		$dataPage = compact('activeMenu0','activeMenu1','activeMenu2','activeMenu3','activeMenu4','activeMenu5','activeMenu6','activeMenu7','result_model');
    $this->load->view('header',$dataPage);
    $this->load->view('start_page');
    $this->load->view('footer');
	}
}
