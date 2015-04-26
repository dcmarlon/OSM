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
        
        
	function insert_survey($data)	/* insert survey data to db */
	{
            
                        !isset($data[$this->primary_key]) || $data[$this->primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table);
			return $this->db->insert_id();
	}
        
//            public function insert_question($var1)	/* insert survey data to db */
//	{
//		$this->db->insert('questions',$var1);
//		return $this->db->insert_id();
//	}
        
            function update_survey($sdata,$sid)
            {
		
                        $this->db->set($sdata);
			$this->db->where($this->primary_key, $sid);
			$this->db->update($this->_table);
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