 <?php
class Question_m extends MY_Model{
    
      protected $_table = 'questions';
	protected $primary_key = 'question_id';
        protected $primary_key_survey = 'survey_id';
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
              'question_data' => array (
                        'field' => 'question', 
			'label' => 'Question Name', 
			'rules' => 'trim|required|xss_clean'   
                ),  
                  'question_type' => array (
                        'field' => 'question', 
			'label' => 'Question Name', 
			'rules' => 'required'   
                ),
    );
    
           public function get_newQuestion(){
		$question = new stdClass();
		$question->question_data = '';
                $question->question_type = '';
		return $question;
	}
        
                
        public function get_types(){
            
            $array = array(
			'Single' => 'Single',
                        'Multiple' => 'Multiple',
                        'Combination' => 'Combination',
		);
            return $array;
        }
        
             
        public function insert_question($var1)	/* insert survey data to db */
	{
		$this->db->insert('questions',$var1);
		return $this->db->insert_id();
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
        
        
         public function get_choices($q_id){
                if(!empty($q_id)){
                    $query_str = "SELECT * FROM questions WHERE survey_id = $q_id ";
                    $query = $this->db->query($query_str);

                    if( $query->num_rows() > 0 ){
                            return $query->result_array();
                    } 
                    else
                        return false;
                }   
                 else {
                     return false;
                 }   
            }
            
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
            
           public function get_max_q(){
               
               $this->db->select_max('question_id');
               $query = $this->db->get('questions');
               
               return $query->row();;
           } 
            
    
}
