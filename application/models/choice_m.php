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
        
        
//        public function get_question($id){
//               
//            $this->db->where($this->primary_key_survey,$id);
//            $this->db-from($this->_table);
//            $query = $this->db->get();
//            
//            if($query->num_rows() >0 ){
//                
//                return $query->result_array();
//                
//            }else{
//                
//                return false;
//      
//       }     
//                  
//                              }
        
//        
//         public function get_choices($q_id){
//                if(!empty($q_id)){
//                    $query_str = "SELECT * FROM questions WHERE survey_id = $q_id ";
//                    $query = $this->db->query($query_str);
//
//                    if( $query->num_rows() > 0 ){
//                            return $query->result_array();
//                    } 
//                    else
//                        return false;
//                }   
//                 else {
//                     return false;
//                 }   
//            }
            
//            public function get_question($id){
//                
//                
//                        $filter = $this->primary_key;
//			$id = $filter($id);
//			$this->db->set($data);
//			$this->db->where($this->primary_key, $id);
//			$this->db->update($this->_table);    
//            
//            
//            }
            
            
            
    
}
