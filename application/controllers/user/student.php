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
                $this->load->model('student_m');
                 $this->load->model('survey_m');
                 $this->load->model('question_m');
                 $this->load->model('choice_m');
                 $this->load->model('results_m');
				 $this->load->model('answers_m');
	}
        
       public function index ()
	{   
                // Load our view to be displayed
               // to the user
           $msg ="Hello";
               $this->data['msg'] = $msg;
		$this->load->view('admin/survey/user/login',  $this->data);
       // $this->load->view('admin/survey/user/takesurvey',  $this->data);
	}

<<<<<<< HEAD
        public function take ($id = 5){
=======

      //  public function take ($id = 14){

        public function take ($id = 15){
>>>>>>> origin/revert-1-master
            

                if ($id) {
            $this->data['survs'] = $this->survey_m->get($id);
            count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';
        }

            $this->load->view('admin/components/takesurvey_head');
            $this->load->view('admin/survey/user/takesurvey',$this->data);
            $this->load->view('admin/components/takesurvey_tail');
        }

		
		   public function add_answers(){
             
			/* 
           if($this->answers_m->insert_answer() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			}
                    */
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