 <?php
class Answers_m extends MY_Model{
    
      protected $_table = 'answers';
	protected $primary_key = 'answer_id';
        protected $primary_key_choice = 'choice_id';
        public $_database = 'osmdb';
	public $_rules = array();    
	protected $_timestamps = FALSE;   
    
//     protected $belongs_to = array('user');
//    protected $has_many = array('answers' => array('primary_key' => 'questions_id', 'model' => 'answer_model'));
    
     public function __construct() {
           parent::__construct();
           $this->_database = $this->db;
       }
    
    public $rules = array(
              'answer_data' => array (
                        'field' => 'answer', 
			'label' => 'answer Name', 
			'rules' => 'trim|required|xss_clean'   
                ),  
    );
    
                  
        
 
        
  
     
    
}
