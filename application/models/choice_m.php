 <?php
class Choice_m extends MY_Model{ 
        protected $_table = 'choices';
	protected $primary_key = 'choice_id';
        protected $primary_key_question = 'question_id';
        public $_database = 'osmdb';
	public $_rules = array();    
	protected $_timestamps = FALSE;   
    
     public function __construct() {
           parent::__construct();
           $this->_database = $this->db;
       }

}
