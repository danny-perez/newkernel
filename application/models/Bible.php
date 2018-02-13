<?php
//Application/Model/Bible.php
   class Bible extends CI_Model {
		Public function __construct(){
		parent::__construct();
		}
		public function read_book($abbreviation,$chapter){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        if(!$abbreviation){
        $query=$this->db->query('SELECT name,abbreviation,chapter,testament FROM new_book');
        foreach ($query->result_array() as $row){$rs_book[]=$row;}
        }else{
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('stih');
        $from_name='stih_'.$rs_kn.(string)$chapter;
        $sql="SELECT * FROM $from_name";
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_book[]=$row;}
            }
        return $rs_book;
		}
    public function api_book($kn){ //Формат 01.01.2010 по 2299 год
        $this->load->database('ekzeget');
        $query=$this->db->query('SELECT chapter FROM new_book WHERE kn LIKE ?',$kn);
        $row = $query->row('chapter');
        $this->db->close();
        return $row;
    }
		public function read_ekzeget($abbreviation,$chapter){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('tolk');
        $from_name='tolk_'.$rs_kn.(string)$chapter;
        $sql="SELECT DISTINCT(t_name) FROM $from_name";
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
        return $rs_ekzeget;
		}
		public function read_tolk($abbreviation,$chapter){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('tolk');
        $from_name='tolk_'.$rs_kn.(string)$chapter; //Имя таблицы
        $sql="SELECT t_name, st_no, comments FROM $from_name WHERE NOT issled LIKE 'yes' ORDER BY st_no";
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
        return $rs_ekzeget;
		}
		public function read_tolk_one($abbreviation,$chapter,$ekzeget){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('tolk');
        $from_name='tolk_'.$rs_kn.(string)$chapter; //Имя таблицы
        $sql="SELECT t_name, st_no, comments FROM $from_name WHERE (t_name LIKE '$ekzeget')AND(NOT issled LIKE 'yes') ORDER BY st_no";
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
        return $rs_ekzeget;
		}
		public function read_issl($abbreviation,$chapter){ //Формат 01.01.2010 по 2299 год
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abbreviation LIKE ?',$abbreviation);
        foreach ($query->result_array() as $row){$rs_kn=$row['kn'];}
        $this->db->close();
        $this->load->database('tolk');
        $from_name='tolk_'.$rs_kn.(string)$chapter; //Имя таблицы
        $sql="SELECT t_name, st_no, comments FROM $from_name WHERE issled LIKE 'yes' ORDER BY st_no";
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
        return $rs_ekzeget;
		}
	    public function rus_link($link)
        {
        $pp = explode('.',$link); //Гал. 5:22-6:2
        $book = $pp[0]; //Гал
        $ch = $pp[1]; //_5:22-6:2
        $rr = explode(':',$ch);
        $chapter = trim($rr[0]); //5
        $kk = $rr[1]; // 22-6
        /* $ver = explode('-',$kk);*/
        preg_match_all('/[0-9]+/',$kk,$vver);
        $ver = $vver[0];
        $verse1 = $ver[0];
        if(isset($ver[1])) $verse2=$ver[1]; else $verse2 = $verse1;
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abreviation_rus LIKE ?',$book);
        $row = $query->row('kn');
        $kn = trim($row);
        $this->db->close();
        $this->load->database('stih');
        $from_name='stih_'.$row.(string)$chapter; //Имя таблицы
        $sql="SELECT * FROM $from_name WHERE st_no BETWEEN $verse1 AND $verse2";
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
//        var_dump($rs_ekzeget);
        return $rs_ekzeget;
		}
	    public function rus_link2($link)
        {
        //1 Пар. 5:22-6:2
        preg_match('/[0-9]?[ ]?[А-Яа-я]+/u',$link,$book_link);
        $no_book = preg_replace('/[0-9]?[ ]?[А-Яа-я]+[.]?/u','',$link);
        preg_match_all('/([0-9]+[:][0-9]+)/u',$link,$new_chap);
        $new_ch = $new_chap[0];

        if(count($new_ch)==1)
        {
            //ссылка типа 1 Тим. 5:1-10 главы в $no_book
        $book = $book_link[0];
        $this->load->database('default');
        $query=$this->db->query('SELECT kn FROM new_book WHERE abreviation_rus LIKE ?',$book);
        $row = $query->row('kn');
        $kn = trim($row);
        $this->db->close();
        $chap = explode(':',$no_book); // chap[0]<-5 = 1-10->chap[1]
        $chapter = trim($chap[0]); // Глава 5
        preg_match_all('/([0-9]+)/',$chap[1],$vver); // vver[0][0]<-1 = 10 ->vver[0][1]
        $verse1 = trim($vver[0][0]); //Начало чтений 1
        if(empty($vver[0][1])) $verse2=$verse1;
        else $verse2 = trim($vver[0][1]); //Конец чтений 10

        $this->load->database('stih');
        $from_name='stih_'.$row.(string)$chapter; //Имя таблицы
        $sql="SELECT * FROM $from_name WHERE st_no BETWEEN $verse1 AND $verse2";
        $query=$this->db->query($sql);
        foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}
        }else
        {
            //ссылка типа 1 Тим. 5:11-6:1 главы в $new_ch
            $book = $book_link[0];
            $this->load->database('default');
            $query=$this->db->query('SELECT kn FROM new_book WHERE abreviation_rus LIKE ?',$book);
            $row = $query->row('kn');
            $kn = trim($row);
            $this->db->close();

            $chap1 = explode(':',$new_ch[0]); // chap[0]<-5 = 23->chap[1]
            $chapter1 = trim($chap1[0]); // Глава 5
            preg_match_all('/([0-9]+)/',$chap1[1],$vver1); // vver[0][0]<- 23
            $verse11 = trim($vver1[0][0]); //Начало чтений 23
            $verse12 = 151;
            $this->load->database('stih');
            $from_name1='stih_'.$row.(string)$chapter1; //Имя таблицы
            $sql="SELECT * FROM $from_name1 WHERE st_no BETWEEN $verse11 AND $verse12";
            $query=$this->db->query($sql);
            foreach ($query->result_array() as $row){$rs_ekzeget[]=$row;}

            $chap2 = explode(':',$new_ch[1]); // chap[1]<-6 = 2->chap[1]
            $chapter2 = trim($chap2[0]); // Глава 6
            preg_match_all('/([0-9]+)/',$chap2[1],$vver2); // vver[0][0]<-1 = 10 ->vver[0][1]
            $verse22 = trim($vver2[0][0]); //Конец чтений 2
            $verse21 = 1;
            $this->load->database('stih');
            $from_name2='stih_'.$kn.(string)$chapter2; //Имя таблицы
            $sql2="SELECT * FROM $from_name2 WHERE st_no BETWEEN $verse21 AND $verse22";
            $query2=$this->db->query($sql2);
            foreach ($query2->result_array() as $row){$rs_ekzeget[]=$row;}
        }
        return $rs_ekzeget;
		}
   }
?>
