<?php

    class Survey extends Admin_Controller{
        
        //load all necessary models
        function __construct (){

             parent::__construct();
             $this->load->model('survey_m');
             $this->load->model('results_m');
             $this->load->model('question_m');
             $this->load->model('choice_m');    
             
	}
        
        //show all survey in admin panel
       public function index (){
           
            $this->data['survey'] = $this->survey_m->get_all();
            $this->data['subview'] = 'admin/survey/index';
            $this->load->view('admin/_layout', $this->data);
            
       }

        //function for survey details
       public function info_details($id=null){
            
            $stat = '';
            $this->load->model('survey_m');
            $row = $this->results_m->get_survey($id);
                
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
            $this->load->view('admin/_layout', $data); 
            
        }
        
        //create view
      public function add(){        
                   
            $this->data['subview']='admin/survey/create' ;
            $this->load->view('admin/_layout',$this->data);           
      }

      //insert all data from create view
      public function add_survey(){
          
            
            if($this->survey_m->add_survey_m() != false){	     
                    redirect('/admin/survey');
            }else{
   //               echo "<script>alert('This survey is already been created!');</script>";
//			echo "<meta http-equiv=Refresh content=0;url=../survey/add>";
                        
                         redirect('/admin/survey');
            }		 
      }
      
      
            //edit view
      public function edit ($id = NULL){
          
           if ($id){           
                $this->data['survs'] = $this->survey_m->get($id);
                count($this->data['survs']) || $this->data['errors'][] = 'survey could not be found';
           }
           if($this->data['survs']->status == 'Available'){
                $this->data['subview']='admin/survey/edit' ;
                $this->load->view('admin/_layout',$this->data);  
           }else{                   
                    $this->info_details($id);
           }
	           
      }
		
      //create or update new data from edit view
      public function edit_survey(){
          
           if($this->survey_m->edit_survey_m() != false){	                          
                    redirect('/admin/survey'); 
                 
	   }else{
                    redirect('/admin/survey'); 
	   }
                    
      }


      //delete q question from edit
     public function delete_questions($id){
            $id = $this->uri->segment(4);
            $this->load->model('survey_m');
            
		if($this->survey_m->delete_question_choices($id)){                 
                         echo "success";                
		}else{
                        echo "invalid";
		}	
     }
     
     //activate a survey
    public function act_surveyby_id($id){    
            $id = $this->uri->segment(4);
            $this->load->model('survey_m');         
		if($this->survey_m->insert_activate($id)){                 
                        echo "success";               
		}else{         
			echo "invalid";
		}	           
    }
        
    //deactivate a survey
    public function deact_surveyby_id($id){
            $id = $this->uri->segment(4);
            $this->load->model('survey_m');
		if($this->survey_m->insert_deactivate($id)){                 
                        echo "success";          
		}else{                
			echo "invalid";
		}	
    }
        
    //delete a choice from edit
    public function delete_choiceby_id($id){
            $this->load->model('survey_m');
		if($this->survey_m->delete_choice_id($id)){			
			echo "success";
		}else{
			echo "invalid";
		}	
    }

        
    //view results view and retrievals
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
                        }else{
                            $data['college'] = $this->input->post('filter');
                        }

                       //get answers  
                         $totalc=count($data['choices']);
                         $data['ans'] = $this->results_m->get_answers($q_id, $data['college']);
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
                     $data['totalq'] = $total;
                     $data['totalc'] = $totalc; 
                     $data['totala'] = $total_a;
                     $data['subview'] = 'admin/survey/results';
                     $this->load->view('admin/_layout', $data); 
                
              }else{
                    $this->info_details($data['surv']['id']);
              }
               
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

   
}