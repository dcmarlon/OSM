 <?php
class Question_m extends MY_Model{
    
        protected $_table = 'questions';
        protected $primary_key = 'question_id';
        protected $primary_key_survey = 'survey_id';
        public $_database = 'osmdb';
        public $_rules = array();    
        protected $_timestamps = FALSE;   

    
     public function __construct() {
           parent::__construct();
           $this->_database = $this->db;
       }
    
    
//        public function insert_question($var1)	/* insert survey data to db */
//	{
//		$this->db->insert('questions',$var1);
//		return $this->db->insert_id();
//	}
        
}
