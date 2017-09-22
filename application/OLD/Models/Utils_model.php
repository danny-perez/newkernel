<?php
//Application/Model/User_model.php
   class Utils_model extends CI_Model {
		Public function __construct(){ 
		parent::__construct(); 
		} 
		public function gif_pointer($pointer){
		$p_l=strlen(trim($pointer));
		$rrr1=substr($pointer,$p_l-3,3);
		$rrr2=substr($pointer,$p_l-6,3);
		switch ($p_l){
		    case 7: $rrr=substr($pointer,0,1);break;
		    case 8: $rrr=substr($pointer,0,2);break;
		    case 9: $rrr=substr($pointer,0,3);break;
		    case 10: $rrr=substr($pointer,0,4);break;
		}
        $s_n[]=(int)$rrr;
        $s_n[]='ru_RU';
        $this->load->database('default');
        $query = $this->db->query('SELECT abbreviation FROM book_i18n WHERE number=? AND locale=?',$s_n);
		foreach ($query->result_array() as $row){$rs_name=$row['abbreviation'];}
		$rs_pointer[]=$rs_name;
		$rs_pointer[]=(int)$rrr2;
		$rs_pointer[]=(int)$rrr1;
		return $rs_pointer;
		}
		public function find($word){
		$s_n='%'.$word.'%';
		$this->load->database('default');
        $query = $this->db->query('SELECT pointer FROM Bible WHERE contents LIKE ?',$s_n);
		foreach ($query->result_array() as $row){$rs_name[]=$row;}
		return $rs_name;
		}
		public function sphinx($query,$locale='ru_RU'){
            $conn = new PDO('mysql:host=127.0.0.1;port=9306;charset=UTF8');
            $stmt = $conn->prepare(
                "
                SELECT * FROM Bible WHERE MATCH(:query) AND locale = :locale;
                SELECT id, locale, author_id FROM Tradition WHERE MATCH(:query) AND locale = :locale;
                "
            );
            $result = [];
            $stmt->execute([
                ':query' => trim($query),
                ':locale' => $app['current_locale'],
            ]);
            $result['Bible'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->nextRowset();
            $result['Tradition'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->render('result', $result);
        }
   }								
?>