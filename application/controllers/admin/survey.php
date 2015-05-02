<?php

    class Survey extends Admin_Controller{
        
        function __construct ()
	{
		parent::__construct();
                 $this->load->model('survey_m');
                 $this->load->model('question_m');
                 $this->load->model('choice_m');
                 $this->load->model('results_m');
                  
	}
        
       public function index ()
	{

		$this->data['survey'] = $this->survey_m->get_all(); //get all the survey names
		$this->data['subview'] = 'admin/survey/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
        
        
        public function watch($id=null){

                $row = $this->results_m->get_survey($id);
                $data['res'] = $this->results_m->get_questions($id);
                //$data['choices'] = $this->results_m->get_choices($id);
                //$data['ans'] = $this->results_m->get_answers($id); 
            
                //row into array
                $data['surv'] = array(
				'id' => $row->survey_id,
				'name' => $row->survey_name,
				'date_created' => $row->created_date,
				'date_issued' => $row->issued_date,
				'status' =>$row->status
			);
                
             
                $data['subview'] = 'admin/survey/info';
		$this->load->view('admin/_layout_main', $data); 
            
        }
        
       
               
        public function add(){        
                   
            $this->data['subview']='admin/survey/create' ;
            $this->load->view('admin/_layout_main',$this->data);

              //  redirect('admin/view_hearing');                
           }

           
   	  public function add_v2(){        
                   
            $this->data['subview']='admin/survey/create_v2' ;
            $this->load->view('admin/_layout_v2',$this->data);
            

              //  redirect('admin/view_hearing');                
           }
           
//             public function edit_v2(){        
//                   
//            $this->data['subview']='admin/survey/edit_v2' ;
//            $this->load->view('admin/_layout_v2',$this->data);
//             }

              //  redirect('admin/view_hearing');                
         
  	    public function add_survey_v2(){
			/*add validation rules to each of the input pwede ra wala */
			//insert code here
			
			if($this->survey_m->insert_survey_v2() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			}
			
			 
			 
		}    
                
                
                public function edit_survey_v2(){
                    
                    	if($this->survey_m->edit_survey_v() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			}
                    
                }
   
        public function add_survey(){
            
          
            
            	//$this->data['survey'] = $this->survey_m->get_new();
                $survey_info = array(
			'survey_name' => $this->input->post('s_name')
                       );

		$id = $this->survey_m->insert_survey($survey_info);

		 if($this->input->post('q_data'))
		{
			foreach($this->input->post('q_data') as $quest => $q_num) 
			{
						 $question_info = array(
				'survey_id' => $id,
				'question_data' => $this->input->post("q_data")[$quest],
				'question_type' => $this->input->post("q_type")[$quest]);

				$question_id[$quest] =$this->question_m->insert_question($question_info);
                                    

                                        $questid = array();
                                        $questid = $question_id[$quest]; 
                                                           
                                        
                                        
                       if($this->input->post('choices_item'))
                        {
                        
                    
                            
                            foreach($this->input->post('choices_item') as $choice => $c_num) 
                            {

                                    $choices_info = array(
                                                            'question_id' =>  $questid,
                                                            'choice_data' => $this->input->post("choices_item")[$choice]);

                                    $this->choice_m->insert_choice($choices_info);
                            }  
                                
                      }
           
                                        
			}
		}
                
    
                 redirect('/admin/survey', 'location', 301); 
        }

        
       	public function edit ($id = NULL)
	{
            
         
		if ($id) {
			$this->data['survs'] = $this->survey_m->get($id);
                       // $this->data['survey'] = $this->survey_m->get_all();
//                        $this->data['question'] = $this->question_m->get_all_question($id);
                      //  $this->data['choices'] = $this->choice_m->get_all_choices($this->data['question']->question_id);
			count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';
                                    //$this->data['surveyID'] = $id;
		}
		//$this->data['max_q']= $this->question_m->get_max_q();
	           $this->data['subview']='admin/survey/edit_v2' ;
                     $this->load->view('admin/_layout_v2',$this->data);
        }
        
//        
//        public function editUserInfo(){
//		
//		$this->load->model('survey_m');
//		
//		if($this->survey_m->edit_user()){
//					echo "success";
//					
//		}else{
//			echo $this->input->post('uiD');
//			echo "error";
//		}	
//	}
        
        
//            public function edit_survey(){
//                
//		$sid = $this->input->post("s_id");
//		$qctr = $this->input->post("q_num");
//                $cctr = $this->input->post("c_num");
//		$sur = array('survey_name' => $this->input->post('s_name'),
//					//'issued_date' => $this->input->post("issued_d"),
//					//'status' => $this->input->post("stat_ac")
//                                        );
//
//		$this->survey_m->update_survey($sur,$sid);
//                
//                
//            	for($i=1;$i<=$qctr;$i++){
//			$qsid = $this->input->post("q_id".$i);
//			$qur = array('survey_id' => $sid,
//						'question_data' => $this->input->post("q_data".$i),
//						'question_type' => $this->input->post("q_type".$i),
//						);
//
//			$this->question_m->update_question($qur,$qsid);
//                        
//                        for($y=1;$y<$cctr; $y++){
//                                
//                            $csid = $this->input->post("c_id".$y);
//                                $cur = array('choice_id' => $csid,
//						'choice_data' => $this->input->post("choices_item".$y)
//						);
//                                
//                               $this->question_m->update_question($cur,$csid);
//           
//                        }
//                        
//		}
//                
//                if($this->input->post('q_data'))
//		{
//			foreach($this->input->post('q_data') as $quest => $q_num) 
//			{
//				$question_info = array(
//				'survey_id' => $sid,
//				'question_data' => $this->input->post("q_data")[$quest],
//				'question_type' => $this->input->post("q_type")[$quest]);
//
//				$question_id[$quest] =$this->question_m->insert_question($question_info);
//                                    
//                                    $questid = array();
//                                        $questid = $question_id[$quest]; 
//							
//                                          if($this->input->post('choices_item'))
//					{
//						foreach($this->input->post('choices_item') as $choice => $c_num) 
//						{
//							$choices_info = array(
//										'question_id' => $questid,
//										'choice_data' => $this->input->post("choices_item")[$choice]
//									);
//
//							$this->choice_m->insert_choice($choices_info);
//
//						}
//					}
//			}
//		}
//                
//            }
//            
//           public function delete_question_with_choices ($id,$id2)
//	{
//                 $this->choice_m->delete_many($id);
//		$this->question_m->delete($id);
//                
//		redirect('admin/article/edit/$id2');
//	}
        
        
        public function deleteQuestion($id){
		$this->load->model('survey_m');
		if($this->survey_m->deleteUserFromDB($id)){
			
				echo "success";
		}else{
			echo "invalid";
		}	
	}
        
           public function deleteChoices($id){
		$this->load->model('survey_m');
		if($this->survey_m->deleteUserFromDBs($id)){
			
				echo "success";
		}else{
			echo "invalid id";
		}	
	}
        
           public function delete_choiceby_id($id){
		$this->load->model('survey_m');
		if($this->survey_m->delete_choice_id($id)){
			
				echo "success";
		}else{
			echo "invalid id";
		}	
	}
        
        
        
        
    }