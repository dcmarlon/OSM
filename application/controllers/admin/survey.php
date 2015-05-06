<?php

    class Survey extends Admin_Controller{
        
        function __construct ()
	{
		parent::__construct();
                 $this->load->model('survey_m');
                 $this->load->model('question_m');
    
                 $this->load->model('results_m');
                  
	}
        
       public function index ()
	{

		$this->data['survey'] = $this->survey_m->get_all(); //get all the survey names
		$this->data['subview'] = 'admin/survey/index';
		$this->load->view('admin/_layout_v2', $this->data);
	}
        
        
        
        public function watch($id=null){
            $stat = '';
            $this->load->model('survey_m');

                $row = $this->results_m->get_survey($id);
            //    $data['res'] = $this->results_m->get_questions($id);
                $data['surv'] = array(
				'id' => $row->survey_id,
				'name' => $row->survey_name,
				'date_created' => $row->created_date,
				'date_issued' => $row->issued_date,
				'status' =>$row->status
			);
                
                
         $surveys= $this->survey_m->get_all();   
                if(count($surveys)){
                    foreach($surveys as $survey){
                        if(($survey->status =='Active')){
                                    $stat = 'Active'; 
                            }          
                        }
                }
                
                $data['check'] = $stat;

                $data['subview'] = 'admin/survey/info';
		$this->load->view('admin/_layout_v2', $data); 
            
        }

        public function add(){        
                   
            $this->data['subview']='admin/survey/create_v2' ;
            $this->load->view('admin/_layout_v2',$this->data);           
           }


  	    public function add_survey_v2(){
			
			if($this->survey_m->insert_survey_v2() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			} 
			 
		}    
		
		//not final function
		
                
                
                public function edit_survey_v2(){
                    
                    	if($this->survey_m->edit_survey_v() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			}
                    
                }

        
       	public function edit ($id = NULL)
	{
                 $this->load->model('choice_m');
         
		if ($id) {
			$this->data['survs'] = $this->survey_m->get($id);
			count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';

		}

	           $this->data['subview']='admin/survey/edit_v2' ;
                     $this->load->view('admin/_layout_v2',$this->data);
        }
        
        
        public function delete_questions($id){
            $id = $this->uri->segment(4);
		$this->load->model('survey_m');
		if($this->survey_m->delete_question_choices($id)){                 
                    echo "success";
                    
		}else{
                    
			echo "invalid";
		}	
	}
        
       public function act_surveyby_id($id){
            $id = $this->uri->segment(4);
		$this->load->model('survey_m');
		if($this->survey_m->insert_activate($id)){                 
                    echo "success";
                    
		}else{
                    
			echo "invalid";
		}	
	}
        
               public function deact_surveyby_id($id){
            $id = $this->uri->segment(4);
		$this->load->model('survey_m');
		if($this->survey_m->insert_deactivate($id)){                 
                    echo "success";
                    
		}else{
                    
			echo "invalid";
		}	
	}
        
//           public function deleteChoices($id){
//		$this->load->model('survey_m');
//		if($this->survey_m->deleteUserFromDBs($id)){
//			
//				echo "success";
//		}else{
//			echo "invalid id";
//		}	
//	}
        
           public function delete_choiceby_id($id){
		$this->load->model('survey_m');
		if($this->survey_m->delete_choice_id($id)){
			
				echo "success";
		}else{
			echo "invalid id";
		}	
	}
        
        
        
        
    }