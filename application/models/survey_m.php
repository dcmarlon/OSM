<?php
    class Survey_m extends MY_Model{
        protected $_table_name = 'survey';
	protected $_primary_key = 'survey_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'created_date desc, id desc';
	public $_rules = array();
	protected $_timestamps = FALSE;
        
        	function __construct ()
	{
		parent::__construct();
	}
        
        public $rules = array(
		'survey_name' => array(
			'field' => 'survey name', 
			'label' => 'Survey Name', 
		//	'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'created_date' => array(
			'field' => 'created date', 
			'label' => 'Created Date', 
		//	'rules' => 'trim|required|exact_length[10]|xss_clean'
		), 
                'issued_date' => array(
			'field' => 'issued date', 
			'label' => 'Issued Date', 
		//	'rules' => 'trim|required|exact_length[10]|callback__unique__issued_date|xss_clean'
		), 
             'status' => array(
			'field' => 'status', 
			'label' => 'Status', 
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
		// Fetch pages without parents
//		$this->db->select('survey_name, title');
//		$this->db->where('parent_id', 0);
		//$pages = parent::get();
		
		// Return key => value pair array
		$array = array(
			'Available' => 'Available',
                        'Active' => 'Active',
                        'Unavaiable' => 'Unavaiable',
		);
//		if (count($pages)) {
//			foreach ($pages as $page) {
//				$array[$page->id] = $page->title;
//			}
//		}
		
		return $array;
	}
        
        public function _survey_archive(){
            
       
            
            //Count all surveys
            $this->db->where('created_date <=', date('Y-m-d'));
            $count = $this->db->count_all_results('survey');
            
            
            //Set up pagination
            $perpage = 10;
            if($count > $perpage){
                $this->load->library('pagination');
                $config['base_url'] = site_url($this->uri->segment(1).'/');
                $config['total_rows'] = $count;
                $config['per_page'] =$perpage;
                $config['uri_segment'] =$perpage;
                $config['full_tag_open'] = '<ul>';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = FALSE;
                $config['last_link'] = FALSE;
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                 $config['prev_tag_open'] = '</li>';
                   $config['prev_tag_close'] = '</li>';
                  $config['cur_tag_open'] = '</li><a href="#">';
                   $config['cur_tag_close'] = '</a></li>';
                   $config['num_tag_open'] = '</li>';
                   $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config);      
                $this->data['pagination'] = $this->pagination->create_links();
                
                $offset = $this->uri->segment(2);
       
            }else{
               
                $this->data['pagination']='';
                $offset = 0;  
            }
            
            //Fetch articles
            $this->db->where('created_date <=', date('Y-m-d'));
            $this->db->limit($perpage, $offset);
            $this->data['survey'] = $this->survey_m->get();
           
            
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