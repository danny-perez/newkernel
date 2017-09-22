<?php 
   //Application/Controllers/Api.php
   class Api extends CI_Controller {  
	    public function index() { 
        $list_api=array(
        '==================================',
        '-------Полный перечень API--------',
        '==================================',
        '/api/ - список всех функций API',
        '/api/page/№ страницы/ - выводит данные статической страницы, без аргумента номера и заголовки страницы',
        '/api/calc/dd.mm.YYYY/ - выводит праздник и чтения, без аргументов или ошибочные аргументы - сегодняшний день',
        '/api/bible/англ.аббревиатура книги/глава/ - выдает текст главы, без аргументов - список книг, англ.аббревиатура книги, число глав, ветхий завет (testament=0) или новый завет',
        '/api/perevod/ возвращает список возможных переводов Библии',        
        '/api/ekzeget/англ.аббревиатура книги/глава/ - выдает список толкователей (экзегетов) конкретной книги и главы, без аргументов - Gen/1',
        '/api/tolk/англ.аббревиатура книги/глава/ - выдает тексты толкований всех авторов по данной главе (st_no - номер стиха), без аргументов - Gen/1',
        '/api/issled/англ.аббревиатура книги/глава/ - выдает тексты исследований всех авторов по данной главе (st_no - номер стиха), без аргументов - Gen/1',
        '/api/parallel/Быт. 1:26-34 Быт. 1:27/ - выдает тексты параллельных мест (необходимо ЧЕТКО передавать параллельные места из выдачи ПУСТОЙ СТРОКИ БЫТЬ НЕ ДОЛЖНО)',
        '/api/povod/ - выдает список поводов для группировки праздников',
        '/api/prazdnik/№ повода/ - выдает список праздников',
        '/api/chten/№ праздника/ - выдает чтения на праздник сокращенно (не забыть сделать расшифровку запроса)',
        '/api/title_chten/отрывок чтения в формате из chten/ - выдает заголовок чтения',
        '/api/chten_load/строка чтений из chten/ - выдает тексты чтений',
        '/api/dict/алиас словаря/ выдает алфавит по названиям статей в словаре, без аргументов - выдает список словарей и алиасов',
        '/api/dict_letter/алиас словаря/буква словаря в ЛЮБОМ регистре/ выдает id статьи и список заголовков',
        '/api/dict_text/id-статьи из функции dict_letter/ выдает заголовок статьи и содержание статьи словаря',
        '/api/ekzeget_all/имя экзегета по русски/ выдает все толкования данного автора, если без аргументов, то список экзегетов с рассказом о них',
        '/api/ekzeget_all_link/имя таблицы из функции ekzeget_all/id записи в таблице/ выдает все толкования данного автора',
        '/api/search/строка поиска/ выдает номера статей и имя таблицы (стих, глава, книга) из Библии',
        '/api/search_encode/имя таблицы из search/ расшифровка названия таблицы для ссылки (глава и книга)',
        '/api/card/№ карты/ выдает координаты на карте (4-угла) и привязку к Библии, без аргументов выдает данные всех карт',
        '/api/admin/ Данные идут методом POST, возвращается status=TRUE/FALSE/НЕ ПОДТВЕРЖДЕН в случае читателч/гостя/не подтвержден e-mail',
        '=============================================================================================================================================================',
        '==== Остались добавить закладку, добавить комментарий, выбрать план чтения, следить за планом чтения, добавить толкование, все добавленные толкования,    ===',
        '==============================================================================================================================================================',
            );
		$this->load->model('json_page');
		$this->json_page->json_echo($list_api);
        }
        public function page($num_page=0){
        $this->load->model('static_page');
		$result_model=$this->static_page->read_static_page($num_page);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function calc($cadate=NULL){
        $this->load->model('calc_calendar');
		$result_model=$this->calc_calendar->data_now($cadate);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function bible($abbreviation=NULL,$chapter=1){
        $this->load->model('bible');
		$result_model=$this->bible->read_book($abbreviation,$chapter);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function perevod(){
        $this->load->model('utils');
		$result_model=$this->utils->translate();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function ekzeget($abbreviation='Gen',$chapter=1){
        $this->load->model('bible');
		$result_model=$this->bible->read_ekzeget($abbreviation,$chapter);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function tolk($abbreviation='Gen',$chapter=1){
        $this->load->model('bible');
		$result_model=$this->bible->read_tolk($abbreviation,$chapter);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function issled($abbreviation='Gen',$chapter=1){
        $this->load->model('bible');
		$result_model=$this->bible->read_issl($abbreviation,$chapter);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function parallel($ptext="Быт. 1:26-34 Быт. 1:27 Быт. 9:6 1 Пар. 1:1 Сир. 17:1 Кол. 3:10"){
        $ptext=urldecode($ptext);
        $this->load->model('utils');
		$result_model=$this->utils->separate($ptext);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function povod(){
        $this->load->model('propovedi');
		$result_model=$this->propovedi->read_povod();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function prazdnik($num_povod=1){
        $this->load->model('propovedi');
		$result_model=$this->propovedi->read_prazdnik($num_povod);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function chten($id_prazdnik=2){
        $this->load->model('propovedi');
		$result_model=$this->propovedi->read_chten($id_prazdnik);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function chten_load($list_chten='deyan1 1 2 3 4 5 6 7 8'){
        $list_chten=urldecode($list_chten);
        $this->load->model('propovedi');
		$result_model=$this->propovedi->list_bible($list_chten);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function propovedi($id_prazdnik=2){
        $this->load->model('propovedi');
		$result_model=$this->propovedi->read_propovedi($id_prazdnik);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function title_chten($list_chten='deyan1 1 2 3 4 5 6 7 8'){
        $list_chten=urldecode($list_chten);
        $this->load->model('propovedi');
		$result_model=$this->propovedi->title_ch($list_chten);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function dict($name_d=NULL){
        $name_d=urldecode($name_d);
        $this->load->model('dictionary');
		$result_model=$this->dictionary->alphabet($name_d);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function dict_letter($lat_dict='Biblejskaya-ehnciklopediya-Brokgauza',$letter='А'){
        preg_match('/[а-яёА-ЯЁa-zA-Z]/',$letter)==0 ? $letter='А' : $letter=$letter;
        $letter=urldecode($letter);
        $letter=strtoupper($letter);
        $big=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я');
        $low=array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я');
        array_search($letter,$low) ? $upletter=$big[array_search($letter,$low)] : $upletter=$letter;
        $this->load->model('dictionary');
		$result_model=$this->dictionary->title_letter($lat_dict, $upletter);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function dict_text($id=19796){
        $this->load->model('dictionary');
		$result_model=$this->dictionary->read_text($id);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function ekzeget_all($name_ekzeget=NULL){
        $name_ekzeget=urldecode($name_ekzeget);
        $this->load->model('ekzeget');
		$result_model=$this->ekzeget->list_ekzeget($name_ekzeget);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function ekzeget_all_link($table_name='tolk_1car1',$id_table='1'){
        $this->load->model('ekzeget');
		$result_model=$this->ekzeget->list_ekzeget_link($table_name,$id_table);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function search($word='Анна'){
        $word=urldecode($word);
        $this->load->model('search');
		$result_model=$this->search->search_fast($word);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function search_encode($table='stih_3car16'){
        $this->load->model('search');
		$result_model=$this->search->search_en($table);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function card($num_card='All'){
        $this->load->model('utils');
		$result_model=$this->utils->card_read($num_card);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function admin(){
        $log = $this->input->post('login');
        $pas = $this->input->post('password');
        $cap = $this->input->post('captcha');
        $this->load->model('admin');
		$result_model=$this->admin->admin_emul($log,$pas,$cap);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
   }
?>