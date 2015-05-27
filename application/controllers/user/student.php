  <?php

    class Student extends Admin_Controller{
    
        //load all necessary models
        function __construct (){
		parent::__construct();
                $this->load->model('student_m');
                $this->load->model('question_m');
                $this->load->model('choice_m');            
                $this->load->model('survey_m'); 
	}
        
        //user view
        public function index (){   
                $this->load->model('survey_m');
                $stat = '';
                $surveys= $this->survey_m->get_all();   
                            if(count($surveys)){
                                foreach($surveys as $survey){
                                    if(($survey->status =='Active')){
                                                $stat = 'Active'; 
                                        }          
                                    }
                            }
                $data['msg'] = "W E L C O M E";
                $data['check'] = $stat;
		$this->load->view('admin/survey/user/login',  $data);
	}

        //take survey view and question and choices data from db
        public function take ($id = null, $id_post, $coll_post){  
                $row = $this->survey_m->get_survey_active('Active');//get an active survey from db
                $data['sur'] = array(      
                        'id' => $row->survey_id
                ); 
                $id = $data['sur']['id'];
                $this->data['users'] = $id_post;
                $this->data['college'] = $coll_post;
     
                if ($id) {
                    $this->data['survs'] = $this->survey_m->get($id);
                    count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';
                }
                
                $this->load->view('admin/survey/user/takesurvey',$this->data);
      
       }
        
       //view of if user is successfully answered the survey
       public function congrats (){
                $this->load->view('admin/survey/user/congrats');
           
       }
	 //view  of if user is already taken the survey	
       public function taken (){
                $this->load->view('admin/survey/user/taken');
           
       }

       //insert all the answers for the user
       public function answers_add(){
           
           
                if($this->student_m->answers_insert() != false){	
                       
                         $this->congrats();

                }else{
                    
                        $this->taken();
                } 
			 
       }    
       
       //validation for user
       public function takesurvey(){   
           
            if(!empty($this->input->post('idnum'))){
                $idx = $this->input->post('idnum');
                $coll = $this->input->post('coll');         
                $info = array('student_id'=> $idx,
                              'college'=> $coll);  
                $info_id = array('student_id'=> $idx);    

                // Validate the user's credentials
                $result = $this->student_m->log_validate($info_id);
            
                        if($result == false){
                             $this->taken();

                        }else{
                             $this->take($id=null,$idx , $coll);
                        }
            }else{
                $this->index();
            }
       }
       
}