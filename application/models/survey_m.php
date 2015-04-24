<?php
    class Survey_m extends MY_Model{
        
        protected $_table = 'survey';
	protected $primary_key = 'survey_id';
        public $_database = 'osmdb';
	public $_rules = array();    
	protected $_timestamps = FALSE;
        
       public function __construct() {
           parent::__construct();
           $this->_database = $this->db;
       }
        
        public $rules = array(
		'survey_name' => array(
			'field' => 'survey name', 
			'label' => 'Survey Name', 
			'rules' => 'trim|required|xss_clean'
		), 
          
        );
        
        
       public function get_new(){
		$survey = new stdClass();
		$survey->survey_name = '';
		$survey->created_date = date('Y-m-d');
		$survey->issued_date = date('Y-m-d');
                $survey->status = '';
		return $survey;
	}
        

        
            public function get_status ()
	{
		$array = array(
			'Available' => 'Available',
                        'Active' => 'Active',
                        'Unavaiable' => 'Unavaiable',
		);
		return $array;
	}
        
               
        
        
         public function record_count() {
                return $this->db->count_all('survey');
        }
        
        public function fetch_survey($limit, $start) {
             $this->db->limit($limit, $start);
                $query = $this->db->get('survey');
 
            if ($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
             }
             return false;
        }

  }