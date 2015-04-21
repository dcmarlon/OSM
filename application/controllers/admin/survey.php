<?php

    class Survey extends Admin_Controller{
        
        function __construct ()
	{
		parent::__construct();
                 $this->load->model('survey_m');
                  $this->load->library("pagination");
	}
        
       public function index ()
	{

		$this->data['survey'] = $this->survey_m->get();
		$this->data['subview'] = 'admin/survey/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
        public function watch($id=null){

                $this->data['survs'] = $this->survey_m->get($id, TRUE);      
                $this->data['subview'] = 'admin/survey/info';
		$this->load->view('admin/_layout_main', $this->data);
            
        }
       	public function edit ($id = NULL)
	{
		if ($id) {
			$this->data['survey'] = $this->survey_m->get($id);
			count($this->data['survey']) || $this->data['errors'][] = 'survey could not be found';
		}
		else {
			$this->data['survey'] = $this->survey_m->get_new();
		}
		
                
                // Status for dropdown
		$this->data['status'] = $this->survey_m->get_status();
                
                //Set up the form
                $rules = $this->survey_m->rules;
		$this->form_validation->set_rules($rules);
                
	
	
		if ($this->form_validation->run() == TRUE) {
			$data = $this->survey_m->array_from_post(array(
				'survey_name', 
				'created_date', 
				//'issued_date', 
				'status'
			));
			$this->survey_m->save($data, $id);
			redirect('admin/survey');
		}
		
		$this->data['subview'] = 'admin/survey/create';
		$this->load->view('admin/_layout_main', $this->data);
        }
        
        
    }