  <?php

    class Student extends Admin_Controller{
        
        function __construct ()
	{
		parent::__construct();
                  
                $this->load->library('form_validation');
		//$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
                $this->load->model('survey_m');
                $this->load->model('question_m');
                $this->load->model('survey_m');
                $this->load->model('choice_m');
				$this->load->model('answers_m');
	}
        
       public function index ()
	{   
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
                $data['msg'] = "Welcome";
                $data['check'] = $stat;
		$this->load->view('admin/survey/user/login',  $data);
       // $this->load->view('admin/survey/user/takesurvey',  $this->data);
	}


        public function take ($id = null){
            
            $this->load->model('survey_m');
            
                $row = $this->survey_m->get_survey_active('Active');
                
                
                    $data['sur'] = array(
                        
                        'id' => $row->survey_id
                    );
                
                $id = $data['sur']['id'];
            
                if ($id) {
            $this->data['survs'] = $this->survey_m->get($id);
            count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';
        }

            $this->load->view('admin/components/takesurvey_head');
            $this->load->view('admin/survey/user/takesurvey',$this->data);
            $this->load->view('admin/components/takesurvey_tail');
        }

		
		   /*public function add_answers(){
             
			/* 
           if($this->answers_m->insert_answer() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			}
                    
	$survs = $this->input->post('s_id');
	$questions = $this->question_m->get_all_questions($survs);
		
		foreach($questions as $i => $quest){
			$var = $this->input->post('question[$i]');
			
				if (is_array($var)){
				foreach((array)$var as $cho){
				
					$data ['ans']= array(
						'ans_id' => $quest,
						'choice_id' => $cho['choice_id']		
					);
				}
					$this->db->insert('answers',$data);	
				}
			}	
	}
          
   */
   
   public function add_answers(){
            /* 
           if($this->answers_m->insert_answer() != false){	
                                 redirect('/admin/survey', 'location', 301); 
			}else{
				echo "error";
			}
             */
		$survs_id = $this->input->post('s_id');
		$questions = $this->question_m->get_all_questions($survs_id);
		
		if(count($questions)){
			foreach($questions as $i => $quest){
				//$var = $this->input->post('question[$i]');
				$choices = $this->choice_m->get_all_choices($quest->question_id);
				
					foreach($choices as $cho){  
					
					$ans = $this->input->post('${question[<?php echo $i; ?>][c_id][]}');
					if (is_array($ans)){
					 if($this->input->post('${question[<?php echo $i; ?>][c_id][]}')){

						 $data = array(
									'student_id' => 11100222,
									'choice_id' => $cho['choice_id'],
									
									);
									$this->db->insert('answers',$data);
						}
						else{
					echo "error";
				}
					
                                             
                }else{
					echo "error";
				}
					
			}	
			
			}
		}
				
	}
          
        
         public function process(){
            $id = $this->input->post('idnum');
            $coll = $this->input->post('coll');

            echo $id."<br>";
            echo $coll."<br>";

           
       }
	   
	   
        
        public function login ()
        {
        // redirect if already logged in
        if ($this->ion_auth->logged_in() == TRUE) {
            redirect('take survey');
        }
        
        // Validate the form
        $this->form_validation->set_rules($this->student_m->validation);
        if ($this->form_validation->run() == true) {
            
            // Try to log in
            if ($this->ion_auth->login($this->input->post('student_id')) == TRUE) {
                redirect('questions/listing');
            }
            else {
                $this->data['error'] = 'We could not log you in';
            }
        }
        
             // Set subview & Load layout
             $this->load_view('users/login');
        }
        
        public function login_validate(){
            $id = $this->input->post('idnum');
            $coll = $this->input->post('coll');
            
            $info = array('student_id'=> $id,
                          'college'=> $coll);

          
              $this->load->model('student_m');
            // Validate the user's credentials
            $result = $this->student_m->log_validate($info);
            



            if(count($result))
            {

                redirect('/admin/survey/user/home');
               
            }
            
            else //error ni ses
            {
               
                redirect('/user/student/take');
            }
            
           
            
        }

    }