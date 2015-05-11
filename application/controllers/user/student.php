  <?php

    class Student extends Admin_Controller{
        
        function __construct ()
	{
		parent::__construct();
                  
                $this->load->library('form_validation');
                // $this->load->library('session');
		//$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
                $this->load->model('student_m');

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


        public function take ($id = null,$idnum,$coll){
            
              $this->load->model('question_m');
                $this->load->model('choice_m');            
            $this->load->model('survey_m');
            
                $row = $this->survey_m->get_survey_active('Active');
                
                
                    $data['sur'] = array(
                        
                        'id' => $row->survey_id
                    );
                
                $id = $data['sur']['id'];
                
                $this->data['users'] = $idnum;
                $this->data['college'] = $coll;
                
            
                if ($id) {
            $this->data['survs'] = $this->survey_m->get($id);
           // $this->data['user'] = $info;
            count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';
        }

         
            $this->load->view('admin/survey/user/takesurvey',$this->data);
      
        }
        
                public function congrats (){
    
        
            $this->load->view('admin/survey/user/congrats');
           
        }

		
		 public function answers_add(){		
			if($this->student_m->answers_insert() != false){	
                           
                                 $this->congrats();
                 
			}else{
				$this->congrats();
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
        
        public function takesurvey(){
            
            $this->load->library('form_validation');
            
//            $this->form_validation->set_rules('idnum','IDNumber','required|trim|exact_length[8]');
//            $this->form_validation->set_rules('coll','College','required|trim|');
            

            $id = $this->input->post('idnum');
            $coll = $this->input->post('coll');
            
            $info = array('student_id'=> $id,
                          'college'=> $coll);
            
            $infoid = array('student_id'=> $id
                          );    
      //      $this->session->set_userdata($info);

          
             
            // Validate the user's credentials
            $result = $this->student_m->log_validate($infoid);
            

            echo count($result);

            if(count($result))
            {

                 $this->congrats();
               
            }
            
            else //error ni ses
            {
                $id = null;
               //  redirect('/user/student/take' + $info);
                
                        $this->take($id,$this->input->post('idnum'),$this->input->post('coll'));

                 
                 
                 
            }
        }

    }