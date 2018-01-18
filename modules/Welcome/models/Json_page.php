<?php
//Application/Model/User_model.php
   class Json_page extends CI_Model {
		Public function __construct(){ 
									parent::__construct(); 
									} 
		public function json_code($json_data){
                        $result=json_encode($json_data);
		                header('Content-Type:application/json;charset=utf-8');
                		echo $result;
						}
        public function json_echo($response) {
        if($response){
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
        }else{
            $response[0]='Error 204';
            $this->output
                ->set_status_header(204)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
            }
        }
   }								
?>