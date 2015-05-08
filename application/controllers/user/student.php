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
                    $this->load->model('choice_m');
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
                $data['msg'] = "W E L C O M E";
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

		
		 public function answers_add(){
                     
                                     $this->load->model('student_m');
			
			if($this->student_m->answers_insert() != false){	
                            
                                // redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
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