 <?php
class Choice_m extends MY_Model{
    
      protected $_table = 'choices';
	protected $primary_key = 'choice_id';
        protected $primary_key_question = 'question_id';
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
              'choice_data' => array (
                        'field' => 'choice', 
			'label' => 'choice Name', 
			'rules' => 'trim|required|xss_clean'   
                ),  
    );
    
           public function get_new_choice(){
		$question = new stdClass();
		$question->choice_data = '';
		return $question;
	}
        
        
 
        
                     public function insert_choice($var1)	/* insert survey data to db */
	{
		$this->db->insert('choices',$var1);
	}
        
            
            
            
    
}
