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
                
                $this->load->model('results_model');
                $row = $this->results_model->get_survey($id);
                $data['res'] = $this->results_model->get_questions($id);
                $data['choices'] = $this->results_model->get_choices($id);
                $data['ans'] = $this->results_model->get_answers($id);
            
                //row into array
                $data['surv'] = array(
				'id' => $row->survey_id,
				'name' => $row->survey_name,
				'date_created' => $row->created_date,
				'date_issued' => $row->issued_date,
				'status' =>$row->status
			);
                
                //print_r($data['res']);
                //echo $data['res'][0]['question_id'];
               /*if($data['res']!=false){
                
                    $total=count($data['res']);
                    $q_id = array();
                    //echo $total;
                    for($n=0;$n<$total;$n++){
                        $q_id[$n] = $data['res'][$n]['question_id'];
                    }  
                    $data['choices'] = $this->results_model->get_choices($q_id);
                }*/
                
                //echo $row->survey_name; */
                
                $total_q = count($data['res']); //count the number of questions in the entire survey
                $total_a = count($data['ans']); //count the number of answers in the entire survey
                $tot_ansque = array(); //temporary array for the total number of answers for that question
                $idkey = array(); //temporary array to hold question_id
                
                //loop for getting the total number of answers in each question
                for($n=0;$n<$total_q; $n++){
                    $idkey[$n] = $data['res'][$n]['question_id'];  //put question_id into $idkey array
                    $tot_ansque[$n] = $this->get_total_ans_per_q($idkey[$n],$data['ans'],$total_a); //put total answers for a questions into $tot_ansque
                }
                
                $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value 
                
                //print_r($data['ansque']);

                $data['subview'] = 'admin/survey/info';
		$this->load->view('admin/_layout_main', $data);
            
        }
        
        //function for getting the total number of answers for a given question
        public function get_total_ans_per_q($q,$a,$sum){
            $tot = 0;
   
            for($n=0;$n<$sum;$n++){
                if ($a[$n]['question_id'] == $q)
                    $tot++;      
            }
            return $tot;
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