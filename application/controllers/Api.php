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
        '/api/list_news/ - выводит новости сайта',
        '/api/list_update/ - выводит обновления сайта',
        '/api/calc/dd.mm.YYYY/ - выводит праздник и чтения, без аргументов или ошибочные аргументы - сегодняшний день',
        '/api/bible_rus_link/Ссылка по русски в формате 1 Тим. 10:11-16/ - возвращает текст библии по указанной ссылке ',
        '/api/bible/англ.аббревиатура книги/глава/ - выдает текст главы, без аргументов - список книг, англ.аббревиатура книги, число глав, ветхий завет (testament=0) или новый завет',
        '/api/urlencode/название книги по русски/ - выдает аббревиатуру пригодную для функции bible',
        '/api/perevod/ возвращает список возможных переводов Библии',
        '/api/ekzeget/англ.аббревиатура книги/глава/ - выдает список толкователей (экзегетов) конкретной книги и главы, без аргументов - Gen/1',
        '/api/tolk/англ.аббревиатура книги/глава/ - выдает тексты толкований всех авторов по данной главе (st_no - номер стиха), без аргументов - Gen/1',
        '/api/tolk_one/английская аббревиатура книги/глава/экзегет по русски/ - текст толкований по главе КОНКРЕТНОГО экзегета',

        '/api/print_tolk/английская аббревиатура книги/глава/экзегет по русски/ - Выдает поле LIST_STIH для вывода стиха или диаппазона стихов, если ПУСТОЕ ПОЛЕ стих НЕ ВЫВОДИТЬ!, затем выдается текст толкований стиха',

        '/api/issled/англ.аббревиатура книги/глава/ - выдает тексты исследований всех авторов по данной главе (st_no - номер стиха), без аргументов - Gen/1',
        '/api/separate/Быт. 1:26-34 Быт. 1:27/ - выдает массив правильно разобранных параллельных местпо одному',
        '/api/parallel/Быт._1_26_34_/ - выдает массив из текста главы и выделенного участка текста из параллельных мест',
        '/api/povod/ - выдает список поводов для группировки праздников',
        '/api/prazdnik/№ повода/ - выдает список праздников',
        '/api/propovedi/№ праздника/ - выдает список проповедей',
        '/api/chten/№ праздника/ - выдает чтения на праздник сокращенно (не забыть сделать расшифровку запроса)',
        '/api/title_chten/отрывок чтения в формате из chten/ - выдает заголовок чтения',
        '/api/chten_load/строка чтений из chten/ - выдает тексты чтений',
        '/api/dict/алиас словаря/ выдает алфавит по названиям статей в словаре, без аргументов - выдает список словарей и алиасов',
        '/api/dict/алиас словаря/ выдает алфавит по названиям статей в словаре и описание словаря НЕ РАБОТАЕТ без алиаса',
        '/api/dict_letter/алиас словаря/буква словаря в ЛЮБОМ регистре/ выдает id статьи и список заголовков',
        '/api/dict_text/id-статьи из функции dict_letter/ выдает заголовок статьи и содержание статьи словаря',
        '/api/ekzeget_all/имя экзегета по русски/ выдает все толкования данного автора, если без аргументов, то список экзегетов с рассказом о них',
        '/api/ekzeget_one/имя экзегета по русски/ выдает все толкования данного автора а так же описание данного экзегета, без аргументов не работает',
        '/api/ekzeget_all_en/имя экзегета по русски/ выдает все толкования данного автора, если без аргументов, то список экзегетов с рассказом о них',
        '/api/ekzeget_all_link/имя таблицы из функции ekzeget_all/id записи в таблице/ выдает все толкования данного автора',
        '/api/search/строка поиска/ выдает номера статей и имя таблицы (стих, глава, книга) из Библии',
        '/api/search_encode/имя таблицы из search/ расшифровка названия таблицы для ссылки (глава и книга)',
        '/api/search_list/номер стиха, имя таблицы из search/ выдает содержимое поиска',
        '/api/card/№ карты/ выдает координаты на карте (4-угла) и привязку к Библии, без аргументов выдает данные всех карт',
        '/api/admin/ Данные идут методом POST, возвращается status=TRUE/FALSE/НЕ ПОДТВЕРЖДЕН в случае читателя/гостя/не подтвержден e-mail',
        '/api/user_id/ИмяЧитателя/ Если имя зарегистрировано - возвращает статус регистрации',
        '/api/get_email/e-mail/ отдает данные пользователя по его e-mail',
        '/api/user_reg/ Регистрирует пользователя - данные передаются методом POST',
        '/api/user_upd/ Обновляются данные регистрации пользователя - данные передаются в той же последовательности как в регистрации методом POST',
        '/api/admin_add_fav/ЛогинЧитателя/Аббревиатура кнги (Gen)/Номер главы/Номер стиха/Пометка/Цвет (#cococo)/ Проверяет наличие читателя в базе и при наличии добавляет в избранное стих',
        '/api/admin_add_note/ЛогинЧитателя/Аббревиатура кнги (Gen)/Номер главы/Номер стиха/Заметка/ Проверяет наличие читателя в базе и при наличии добавляет Заметку',
        '/api/admin_zakladki/ЛогинЧитателя/Аббревиатура кнги (Gen)/Номер главы/Цвет закладки (red,orange,green,blue,fuchsia)/ - Добавляет закладку соответствующего цвета',
        '/api/admin_add_tolk/ЛогинЧитателя/Аббревиатура кнги (Gen)/Номер главы/НомерСтиха/id-толкования/Толкователь_по_русски - Добавляет толкование в избранное',
        '/api/read_note/ЛогинЧитателя/ - Возвращает все заметки читателя и их id',
        '/api/edit_note/id-заметки/Новый текст - Редактирует заметку с номером id',
        '/api/delete_note/id-заметки/ - Удаляет заметку с номером ID',
        '/api/read_fav_stih/ИмяЧитателя/ - Список всех стихов добавленных в избранное у читателя',
        '/api/delete_fav_stih/id-закладки/ - Удаляет стих из избранного у читателя',
        '/api/read_fav_tolk/ИмяЧитателя/ - Список толкований в избранном у читателя',
        '/api/delete_fav_tolk/id-закладки/ - Удаляет толкование из избранного у читателя',
        '/api/read_zakladki/Имя читателя/ - Показывает все закладки',
        '/api/delete_zakladki/Имя читателя/Цвет закладки (red,orange,green,blue,fuchsia)/ - Удаляет у Читателя закладку определенного цвета',
        '/api/read_plane/ - Возвращает все планы чтения',
        '/api/work_plane/Имя плана/ - без параметров возвращает список планов, с именем плана - план чтений',
        '/api/user_read_plane/Имя читателя/ - Возвращает план чтения конкретного читателя',
        '/api/read_bible_user/Имя читателя/ - Возвращает чтения в формате функции chten_load на сегодня',
        '/api/mon_read_user/Имя читателя/ - Добавляет один день |сегодняшний| в прочитанные дни',
        '/api/add_plane_user/Имя читателя/План чтения |nazvan| из read_plane/ - Добавляет план чтения/меняет план чтения у читателя',
        '/api/listen_plane/Имя читателя/ - Возвращает пропущенные дни чтения от выбора плана чтения',
        '/api/group_list/ - список всех библейских групп',
        '/api/group_news/ - список новостей библейских групп',
        '/api/lecture/ - Тексты лектория',
        '/api/media/ID/ - Выводит медиафайл под учетной записью ID, без аргумента выводит все имеющиеся в базе данных медиазаписи',
        '/api/media_bible/Книга./глава/audio или video - Выводит медиафайл соответствующий главе библии например Gen/4/audio',
        '/api/questions/bible/chapter/ - вопросы к главе. Пример Gen/1',
        '/api/media_search/Контекст/ - Поиск контекста во всех медифайлах по всем полям',
        '/api/root_login/Имя суперпользователя/ - Проверяет есть ли у читателя права суперпользователя',
        '/api/root_list/Имя суперпользователя/ - Выдает список всех толкований внесенных суперпользователем',
        '/api/root_add_lolk/ - Через форму админки суперпользователя методом POST вносятся толкования во временную базу данных',
        '/api/root_edit_lolk/Имя суперпользователя/id записи/ - Через админку суперпользователя редактируются толкования во временной базе данных',
        '/api/root_delete_lolk/Имя суперпользователя/id записи/ - Через админку суперпользователя помечаются как удаленные толкования во временной базе данных',
        '/api/root_send_lolk/Имя суперпользователя/id записи/Если исследование=yes/ - Через админку суперпользователя толкование пересылается в рабочую базу данных а во временной базе - помечаются как MOVE',
        '=============================================================================================================================================================',
        '==============================================================================================================================================================',
        );
		$this->load->model('json_page');
		$this->json_page->json_echo($list_api);
        }
        public function page($num_page=0){
        $this->load->model('static_page');
		$result_model=$this->static_page->read_static_page($num_page);
		if($num_page==0){$result_mod=$result_model; goto fin;}
		/************ Decoder micro-makeup ***************************/
		$this->load->model('complex');
		$result_mod=$this->complex->change2($result_model,'text');//<===для формирования массива нужно имя поля
		/************************************************************/
        fin:
        $this->load->model('json_page');
        $this->json_page->json_echo($result_mod);
        }

        public function urlencode($codeurl='1 Пар. 1:1-10'){
        $codeurl=urldecode($codeurl);
        $this->load->model('utils');
		$result_model=$this->utils->urle($codeurl);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }

        public function list_news(){
        $this->load->model('static_page');
		$result_model=$this->static_page->l_news2();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function list_update(){
        $this->load->model('static_page');
		$result_model=$this->static_page->l_upd();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        /*public function calc($cadate=NULL){
        $this->load->model('calc_calendar');
		$result_model=$this->calc_calendar->data_now($cadate);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }*/
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
        public function tolk_one($abbreviation='Gen',$chapter=1,$ekzeget='Василий Великий свт.'){
        $ekzeget=urldecode($ekzeget);
        $this->load->model('bible');
		$result_model=$this->bible->read_tolk_one($abbreviation,$chapter,$ekzeget);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function issled($abbreviation='Gen',$chapter=1){
        $this->load->model('bible');
		$result_model=$this->bible->read_issl($abbreviation,$chapter);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function separate($ptext="Быт. 1:26-34 Исх. 1:27 Быт. 9:6 1 Пар. 1:1 Сир. 17:1 Руфь. 2:13"){
        $ptext=urldecode($ptext);
        $this->load->model('utils');
		$result_model=$this->utils->separate3($ptext);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function parallel($ptext="Быт_1_26_34_,"){
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
		/************ Decoder micro-makeup ***************************/
		$this->load->model('complex');
		$result_mod=$this->complex->change2($result_model,'text');//<===для формирования массива нужно имя поля
		/************************************************************/
        $this->load->model('json_page');
        $this->json_page->json_echo($result_mod);
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
        public function dict_one($name_d='Biblejskaya-ehnciklopediya-arhimandrita-Nikifora'){
        $name_d=urldecode($name_d);
        $this->load->model('dictionary');
		$result_model=$this->dictionary->alphabet2($name_d);
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
		/************ Decoder micro-makeup ***************************/
		$this->load->model('complex');
		$result_mod=$this->complex->change2($result_model,'text');
		/************************************************************/
		$this->load->model('json_page');
        $this->json_page->json_echo($result_mod);
        }

        public function ekzeget_all($name_ekzeget=NULL){
        $name_ekzeget=urldecode($name_ekzeget);
        $this->load->model('ekzeget');
		$result_model=$this->ekzeget->list_ekzeget($name_ekzeget);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function ekzeget_one($name_ekzeget='Аввакум протопоп'){
        $name_ekzeget=urldecode($name_ekzeget);
        $this->load->model('ekzeget');
		$result_model=$this->ekzeget->list_ekzeget2($name_ekzeget);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function ekzeget_all_link($table_name='tolk_1car1',$id_table='1'){
        $this->load->model('ekzeget');
		$result_model=$this->ekzeget->list_ekzeget_link($table_name,$id_table);
		/************ Decoder micro-makeup ***************************/
		$this->load->model('complex');
		$result_mod=$this->complex->change2($result_model,'comments');
		/************************************************************/
		$this->load->model('json_page');
        $this->json_page->json_echo($result_mod);
        }
        public function ekzeget_all_en($name_ekzeget=NULL){
        if($name_ekzeget!==NULL){
        $rus = array(' ','А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
        $lat = array('-','A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
        $name_ekzeget=str_replace($lat, $rus, $name_ekzeget);
        }
        $this->load->model('ekzeget');
		$result_model=$this->ekzeget->list_ekzeget_en($name_ekzeget);
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
        public function search_list($st_no='1', $table_name='stih_sir46'){
        $this->load->model('search');
		$result_model=$this->search->search_list($st_no, $table_name);
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
        public function admin_add_fav($name='Алена', $book='Gen', $glava='1', $stih='1',$tags='Заметка',$color='#cococo'){
        $name=urldecode($name);
        $tags=urldecode($tags);
        $this->load->model('admin');
		$result_model=$this->admin->admin_add_fav($name, $book, $glava, $stih, $tags, $color);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function admin_zakladki($name='Брат Георгий', $book='2Sam', $glava='5', $gamma='red'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->admin_zakladki($name, $book, $glava, $gamma);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function admin_add_note($name='Брат Георгий', $book='Gen', $glava='1', $stih='1',$tags='Заметка так заметка'){
        $name=urldecode($name);
        $tags=urldecode($tags);
        $this->load->model('admin');
		$result_model=$this->admin->admin_note($name, $book, $glava, $stih, $tags);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function admin_add_tolk($name='Брат Георгий', $book='Lev', $glava='23', $stih='10',$id_tolk='1', $ekzeget='Марк Подвижник прп.'){
        $name=urldecode($name);
        $ekzeget=urldecode($ekzeget);
        $this->load->model('admin');
		$result_model=$this->admin->admin_tolk($name, $book, $glava, $stih,$id_tolk, $ekzeget);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function read_note($name='Брат Георгий'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->read_n($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function edit_note($id='2134',$note='Нет это не заметка а СУПЕРзаметка'){
        $note=urldecode($note);
        $this->load->model('admin');
		$result_model=$this->admin->edit_n($id, $note);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function delete_note($id='2137'){
        $this->load->model('admin');
		$result_model=$this->admin->delete_n($id);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function read_fav_stih($name='Брат Георгий'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->read_f_s2($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function delete_fav_stih($id='4240'){
        $this->load->model('admin');
		$result_model=$this->admin->delete_f_s($id);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function read_fav_tolk($name='Брат Георгий'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->read_f_t($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function delete_fav_tolk($id='1389'){
        $this->load->model('admin');
		$result_model=$this->admin->delete_f_t($id);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function read_zakladki($name='Брат Георгий'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->read_z($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function delete_zakladki($name='Брат Георгий',$color='red'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->delete_z($name,$color);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function user_id($login){
        $login=urldecode($login);
        $this->load->model('admin');
		$result_model=$this->admin->read_user_id($login);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
/********************************************************************/
        public function user_reg(){
        $data_form=$_REQUEST;
        // var_dump($data_form); ////////////////
        $this->load->model('admin');
		$result_model=$this->admin->reg_user($data_form);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        // $this->json_page->json_echo($data_form);
        }
        public function user_upd(){
        $data_form=$_REQUEST;
        $this->load->model('admin');
		$result_model=$this->admin->reg_user_upd($data_form);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function get_email($email='myu940.myu940@gmail.com'){
        $this->load->model('admin');
		$result_model=$this->admin->get_data_email($email);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
/********************************************************************/
        public function read_plane(){
        $this->load->model('admin');
		$result_model=$this->admin->read_p();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function user_read_plane($name='Брат Георгий'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->u_read_p($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }

        public function work_plane($name=null){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->load_plane($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }

        public function read_bible_user($name='Брат Георгий'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->r_bible_u($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function mon_read_user($name='Брат Георгий'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->mon_r_u($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function add_plane_user($name='Брат Георгий',$plane='vz'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->add_p_u($name,$plane);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function listen_plane($name='Брат Георгий'){
        $name=urldecode($name);
        $this->load->model('admin');
		$result_model=$this->admin->listen_p_u($name);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function group_list(){
        $this->load->model('group');
		$result_model=$this->group->gr_list();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function group_news(){
        $this->load->model('group');
		$result_model=$this->group->gr_news();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function group_article(){
        $this->load->model('group');
		$result_model=$this->group->gr_art();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function lecture(){
        $this->load->model('lect');
		$result_model=$this->lect->lect_art();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function lecture_up(){
        $this->load->model('lect');
		$result_model=$this->lect->lect_up();
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function media($id=null){
        $this->load->model('media');
		$result_model=$this->media->list_rec($id);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function media_bible($word='Mt', $chapter='1', $type_media='video'){
        $this->load->model('media');
		$result_model=$this->media->media_b($word, $chapter, $type_media);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function media_search($word='2 Тим.'){
        $word=urldecode($word);
        $this->load->model('media');
		$result_model=$this->media->media_s($word);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }

        //Это создает ключ
        public function root_crypt($login='Брат Георгий'){
        $login=urldecode($login);
		$result_model=hash('sha512',$login);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        //Окончание создания ключа

        public function root_login($login='Брат Георгий'){
        $login=urldecode($login);
        $this->load->model('root');
		$result_model=$this->root->root_l($login);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function root_list($login='Брат Георгий'){
        $login=urldecode($login);
        $this->load->model('root');
		$result_model=$this->root->root_lst($login);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function root_add_tolk(){
        $this->load->model('root');
        $in_data=$_REQUEST;
		$result_model=$this->root->root_a($in_data);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function root_edit_tolk($login='Брат Георгий',$id='2'){
        $login=urldecode($login);
        $this->load->model('root');
		$result_model=$this->root->root_e_t($login,$id);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function root_delete_tolk($login='Брат Георгий',$id='2'){
        $login=urldecode($login);
        $this->load->model('root');
		$result_model=$this->root->root_d_t($login,$id);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function root_send_tolk($login='Брат Георгий',$id='1',$issled='NULL'){
        $login=urldecode($login);
        $this->load->model('root');
		$result_model=$this->root->root_send_t($login,$id,$issled);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function calc($data='02.10.2017'){ //Дата начиная с 1000 года до 9999 года
        $this->load->model('calc_calendar');
		$result_pasha=$this->calc_calendar->pasha($data); //Пасха этого и предыдущего года [0]-этого [1]-предыдущего
		$result_mineja=$this->calc_calendar->mineja($data); //Непереходящие праздники
        $result_chten=$this->calc_calendar->chtenija($data,$result_pasha); //Чтения
        $result_model[]=$result_mineja;
        $result_model[]=$result_chten;
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function questions($book='Mk',$chapter='1'){
        $this->load->model('utils');
		$result_model=$this->utils->question($book,$chapter);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function print_tolk($abbreviation='Gen',$chapter=1,$ekzeget='Василий Великий свт.'){
        $ekzeget=urldecode($ekzeget);
        $this->load->model('bible');
		$result_model=$this->bible->read_tolk_one($abbreviation,$chapter,$ekzeget);
		$this->load->model('complex');
		$res_mod=$this->complex->change($result_model);
		$this->load->model('json_page');
        $this->json_page->json_echo($res_mod);
        }
        /*
        public function bible_rus_link($link='1 Тим. 5:1–10'){
        $link=urldecode($link);
        $this->load->model('bible');
		$result_model=$this->bible->rus_link($link);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        */
        public function bible_rus_link($link='1 Тим. 5:23-6:2'){
        $link=urldecode($link);
        $this->load->model('bible');
		$result_model=$this->bible->rus_link2($link);
		$this->load->model('json_page');
        $this->json_page->json_echo($result_model);
        }
        public function read_news($dat)
        {
          $this->load->model('news');
          $result_model=$this->news->news('All');
          $this->load->model('json_page');
          $this->json_page->json_echo($result_model);
        }

   }
?>
