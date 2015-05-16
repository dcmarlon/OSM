<?php

    class Survey extends Admin_Controller{
        
        function __construct ()
	{
		parent::__construct();
                 $this->load->model('survey_m');
                 $this->load->model('results_m');
                   $this->load->model('question_m');
                 $this->load->model('choice_m');

                  
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
//                            echo "<script type='text/javascript'>";
//                            echo "alert('Submitted Successfully');";
//                            echo "window.location.href='../survey'";
//                            echo "</script>";
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			} 
			 
		}    
		
		//not final function
		
                
                
                public function edit_survey_v2(){
                    
                    	if($this->survey_m->edit_survey() != false){	
                            
                                 redirect('/admin/survey', 'location', 301); 
                 
			}else{
				echo "error";
			}
                    
                }

        
            public function edit ($id = NULL)
	{
               //  $this->load->model('choice_m');
         
		if ($id) {
			$this->data['survs'] = $this->survey_m->get($id);
			count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';

		}
 
                if($this->data['survs']->status == 'Available'){
                    $this->data['subview']='admin/survey/edit_v2' ;
                    $this->load->view('admin/_layout_v2',$this->data);  
                }
                else {
                    
                    $this->watch($id);
                }

	           
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
        
           public function delete_choiceby_id($id){
		$this->load->model('survey_m');
		if($this->survey_m->delete_choice_id($id)){
			
				echo "success";
		}else{
			echo "invalid id";
		}	
	}
        
        public function view_results($id=null){

                $row = $this->results_m->get_survey($id);
                $data['res'] = $this->results_m->get_questions($id);

                    //row into array
                    $data['surv'] = array(
                                    'id' => $row->survey_id,
                                    'name' => $row->survey_name,
                                    'date_created' => $row->created_date,
                                    'date_issued' => $row->issued_date,
                                    'status' =>$row->status
                            );
                    
                if($data['surv']['status']!='Available'){
                    //get choices 
                     if($data['res']!=false){

                         $total=count($data['res']);
                         $q_id = array();
                         //echo $total;
                         for($n=0;$n<$total;$n++){
                             $q_id[$n] = $data['res'][$n]['question_id'];
                         }  
                         $data['choices'] = $this->results_m->get_choices($q_id);
                     }


                    if(empty($this->input->post('filter'))){
                        $data['college'] = "ALL";
                    }
                    else {
                        $data['college'] = $this->input->post('filter');
                    }

                   //get answers  
                     //if($data['choices']!= false){
                         $totalc=count($data['choices']);
                         //$q_id = array();
                         //echo $total;
                         //for($n=0;$n<$totalc;$n++){
                           //  $c_id[$n] = $data['choices'][$n]['choice_id'];
                         //}  
                         $data['ans'] = $this->results_m->get_answers($q_id, $data['college']);
                    // }




                     $total_a = count($data['ans']); //count the number of answers in the entire survey
                     $tot_ansque = array(); //temporary array for the total number of answers for that question
                     $idkey = array(); //temporary array to hold question_id

                     //loop for getting the total number of answers in each question
                     for($n=0;$n<$total; $n++){
                         $idkey[$n] = $data['res'][$n]['question_id'];  //put question_id into $idkey array
                         $tot_ansque[$n] = $this->get_total_ans_per_q($idkey[$n],$data['ans'],$total_a); //put total answers for a questions into $tot_ansque
                     }
                 //echo $college;
                 $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value   $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value    
                 /*print_r($data['ansque']);
                 echo "<br>";
                 echo "choices :   ";
                 print_r($data['choices']);
                 echo "<br>";
                  print_r($data['ans']);*/
                 $data['totalq'] = $total;
                 $data['totalc'] = $totalc; 
                 $data['totala'] = $total_a;
                 //$this->load->view('admin/survey/viewresults2, $data');
                 $data['subview'] = 'admin/survey/viewresults2';
                 $this->load->view('admin/_layout_v2', $data); 
            }
            else{
                $this->watch($data['surv']['id']);
            }
        }

            //function for getting the total number of answers for a given question		
            //function for getting the total number of answers for a given question
            public function get_total_ans_per_q($q,$a,$sum){
                $tot = 0;

                for($n=0;$n<$sum;$n++){
                    if ($a[$n]['question_id'] == $q)
                        $tot++;      
                }
                return $tot;
            }
        
        
        
         public function view_results($id=null){
        
           
                
                $row = $this->results_m->get_survey($id);
                $data['res'] = $this->results_m->get_questions($id);

                    //row into array
                    $data['surv'] = array(
                                    'id' => $row->survey_id,
                                    'name' => $row->survey_name,
                                    'date_created' => $row->created_date,
                                    'date_issued' => $row->issued_date,
                                    'status' =>$row->status
                            );
                    
                    if($data['surv']['status']!= 'Available'){

                        //get choices 
                         if($data['res']!=false){

                             $total=count($data['res']);
                             $q_id = array();
                             //echo $total;
                             for($n=0;$n<$total;$n++){
                                 $q_id[$n] = $data['res'][$n]['question_id'];
                             }  
                             $data['choices'] = $this->results_m->get_choices($q_id);
                         }


                        if(empty($this->input->post('filter'))){
                            $data['college'] = "ALL";
                        }
                        else {
                            $data['college'] = $this->input->post('filter');
                        }

                       //get answers  
                         //if($data['choices']!= false){
                             $totalc=count($data['choices']);
                             //$q_id = array();
                             //echo $total;
                             //for($n=0;$n<$totalc;$n++){
                               //  $c_id[$n] = $data['choices'][$n]['choice_id'];
                             //}  
                             $data['ans'] = $this->results_m->get_answers($q_id, $data['college']);
                        // }




                         $total_a = count($data['ans']); //count the number of answers in the entire survey
                         $tot_ansque = array(); //temporary array for the total number of answers for that question
                         $idkey = array(); //temporary array to hold question_id

                         //loop for getting the total number of answers in each question
                         for($n=0;$n<$total; $n++){
                             $idkey[$n] = $data['res'][$n]['question_id'];  //put question_id into $idkey array
                             $tot_ansque[$n] = $this->get_total_ans_per_q($idkey[$n],$data['ans'],$total_a); //put total answers for a questions into $tot_ansque
                         }
                     //echo $college;
                     $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value   $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value    
                     /*print_r($data['ansque']);
                     echo "<br>";
                     echo "choices :   ";
                     print_r($data['choices']);
                     echo "<br>";
                      print_r($data['ans']);*/
                     $data['totalq'] = $total;
                     $data['totalc'] = $totalc; 
                     $data['totala'] = $total_a;
                     //$this->load->view('admin/survey/viewresults2, $data');
                     $data['subview'] = 'admin/survey/viewresults2';
                     $this->load->view('admin/_layout_v2', $data); 
                
                }else{
                    $this->watch($data['surv']['id']);
                }
               
            }

            //function for getting the total number of answers for a given question		
            //function for getting the total number of answers for a given question
            public function get_total_ans_per_q($q,$a,$sum){
                $tot = 0;

                for($n=0;$n<$sum;$n++){
                    if ($a[$n]['question_id'] == $q)
                        $tot++;      
                }
                return $tot;
            }
        
        
        
         public function view_results($id=null){
        
           
                
                $row = $this->results_m->get_survey($id);
                $data['res'] = $this->results_m->get_questions($id);

                    //row into array
                    $data['surv'] = array(
                                    'id' => $row->survey_id,
                                    'name' => $row->survey_name,
                                    'date_created' => $row->created_date,
                                    'date_issued' => $row->issued_date,
                                    'status' =>$row->status
                            );
                    
                    if($data['surv']['status']!= 'Available'){

                        //get choices 
                         if($data['res']!=false){

                             $total=count($data['res']);
                             $q_id = array();
                             //echo $total;
                             for($n=0;$n<$total;$n++){
                                 $q_id[$n] = $data['res'][$n]['question_id'];
                             }  
                             $data['choices'] = $this->results_m->get_choices($q_id);
                         }


                        if(empty($this->input->post('filter'))){
                            $data['college'] = "ALL";
                        }
                        else {
                            $data['college'] = $this->input->post('filter');
                        }

                       //get answers  
                         //if($data['choices']!= false){
                             $totalc=count($data['choices']);
                             //$q_id = array();
                             //echo $total;
                             //for($n=0;$n<$totalc;$n++){
                               //  $c_id[$n] = $data['choices'][$n]['choice_id'];
                             //}  
                             $data['ans'] = $this->results_m->get_answers($q_id, $data['college']);
                        // }




                         $total_a = count($data['ans']); //count the number of answers in the entire survey
                         $tot_ansque = array(); //temporary array for the total number of answers for that question
                         $idkey = array(); //temporary array to hold question_id

                         //loop for getting the total number of answers in each question
                         for($n=0;$n<$total; $n++){
                             $idkey[$n] = $data['res'][$n]['question_id'];  //put question_id into $idkey array
                             $tot_ansque[$n] = $this->get_total_ans_per_q($idkey[$n],$data['ans'],$total_a); //put total answers for a questions into $tot_ansque
                         }
                     //echo $college;
                     $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value   $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value    
                     /*print_r($data['ansque']);
                     echo "<br>";
                     echo "choices :   ";
                     print_r($data['choices']);
                     echo "<br>";
                      print_r($data['ans']);*/
                     $data['totalq'] = $total;
                     $data['totalc'] = $totalc; 
                     $data['totala'] = $total_a;
                     //$this->load->view('admin/survey/viewresults2, $data');
                     $data['subview'] = 'admin/survey/viewresults2';
                     $this->load->view('admin/_layout_v2', $data); 
                
                }else{
                    $this->watch($data['surv']['id']);
                }
               
            }

            //function for getting the total number of answers for a given question		
            //function for getting the total number of answers for a given question
            public function get_total_ans_per_q($q,$a,$sum){
                $tot = 0;

                for($n=0;$n<$sum;$n++){
                    if ($a[$n]['question_id'] == $q)
                        $tot++;      
                }
                return $tot;
            }
        
        
        
        
    }