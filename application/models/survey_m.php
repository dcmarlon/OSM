<?php
    class Survey_m extends MY_Model{

        protected $_table = 'survey';
        protected $primary_key = 'survey_id';
        public $_database = 'osmdb'; 
        
       public function __construct() {
           parent::__construct();
           $this->_database = $this->db;
       }
       
       //get survey which has 'active' status
       public function get_survey_active($status){
           $this->db->where('status',$status);
           $this->db->from('survey');
           $query = $this->db->get();
           
           return $query->row();
           
       }

       
        //insert all survey and question with choices
       public function add_survey_m(){  
        //  $this->load->library('form_validation');
           $query1 = false;
                $data = array(
			'survey_name' => $this->input->post('s_name')
		);
                
//           $this->form_validation->set_rules(
//                's_name', 
//                'Survey Title', 
//                'trima|is_unique[survey.survey_name]');
           
           
	//	if ($this->form_validation->run() == TRUE){
           
           
                $query1 = $this->db->insert('survey',$data);
                $survey_id = $this->db->insert_id();	
                $question= $this->input->post('question');
			foreach($question as $index => $quest){
				$data = array(
					'survey_id' => $survey_id,
					'question_data' => $quest['q_data'],
					'question_type' => $quest['q_type']
				
				);
				
				$this->db->insert('questions',$data);
				$question_id = $this->db->insert_id();
                                        foreach($quest['choices_item'] as $choice){


                                                $data = array(
                                                                        'question_id' => $question_id,
                                                                        'choice_data' => $choice
                                                );

                                                $this->db->insert('choices',$data);

                                        }	
			 }
         //       }

			if($query1){
				return true;	
			}else
				return false;
                    
                      
       }
       
       //edit or update an existing survey and insert new question with choices
                
      public function edit_survey_m() { 
             $data = array(    
		     'survey_name' => $this->input->post('s_name')
	     ); 

             
             $this->db->where('survey_id', $this->input->post('s_id'));
             $query1 = $this->db->update('survey',$data);
                     if($this->input->post('question')){
                        $question =  $this->input->post('question');
                                foreach($question as $index => $quest){
                                        $data = array(
                                                               'question_data' => $quest['q_data'],
                                                               'question_type' => $quest['q_type']

                                        );
                                        $this->db->where('question_id',$quest['q_id']);
                                        $this->db->update('questions',$data);
                                                $ctr=0;
                                                foreach($quest['c_id'] as $choice){
                                                        if($quest['c_id']!=0){
                                                             $data = array(
                                                                             'choice_data' => $quest['choices_item'][$ctr]
                                                             );
                                                             $this->db->where('choice_id', $choice);
                                                             $query1 = $this->db->update('choices',$data);
                                                             $ctr++;
                                                        }

                                               }          

                               }
   
                   if($this->input->post('question_three')){
                              $question_cho = $this->input->post('question_three');
                               foreach($question_cho  as $index => $cho){
                                                   foreach($cho['choices3_item'] as $items){
                                                                $data = array(
                                                                        'question_id' => $index,
                                                                        'choice_data' => $items

                                                                );
                                                            $this->db->insert('choices',$data);
                                                   }
                                }
                  }

             }   
            if($this->input->post('question_two')){
                     $question_two= $this->input->post('question_two');
                                 foreach($question_two as $quest_two => $quest2){
                                         $data = array(
                                                 'survey_id' => $this->input->post('s_id'),
                                                 'question_data' => $quest2['q2_data'],
                                                 'question_type' => $quest2['q2_type']

                                         );
                                         $this->db->insert('questions',$data);
                                         $question_id = $this->db->insert_id();
                                             foreach($quest2['choices2_item'] as $choice){
                                                     $data = array(
                                                                             'question_id' => $question_id,
                                                                             'choice_data' => $choice
                                                     );
                                                     $this->db->insert('choices',$data);

                                             }
                                 } 
            }
        
 
                        	if($query1){
				return true;			
                                }else
				return false;
}  
      
      //delete question in edit survey
      public function delete_question_choices($id){
            $this->db->where('question_id',$id);
            $this->db->delete('choices');
            $this->db->where('question_id',$id);	
            $this->db->delete('questions');
		
		if($this->db->affected_rows()>0){
			return true;
		}else{ return false;}

      }
        //delete question in edit survey
      public function delete_choice_id($id){
            $this->db->where('choice_id',$id);
            $this->db->delete('choices');
		
		if($this->db->affected_rows()>0){
			return true;
		}else{ return false;}

      }
      
      	public function check_surveyTitle($title){
		$this->db->where('survey_name',$title);
		$query = $this->db->get('survey');
		if($query->num_rows()>0){
			return 1;
		}
		else{
			return 0;
		}
	}
        
      //activate survey and update data info
     public function insert_activate($id){   
	    $this->load->helper('date');
            $stat = 'Active';             
                        $data = array(
                                   'status' => $stat,		
            );
            $this->db->set('issued_date', date('Y-m-d',time()));
            $this->db->where('survey_id',$id);        
            $this->db->update('survey',$data);
                
                if($this->db->affected_rows()>0){
                         return true;
                }else{ 
                         return false;
                }

      }
         //deactivate survey and update data info
      public function insert_deactivate($id){
               $stat = 'Unavailable';              
               $data = array(
                       'status' => $stat,			
		);                      
                $this->db->where('survey_id',$id);                       
                $this->db->update('survey',$data);
                $this->db->set('status', 0);
                $this->db->update('students');
                
                        if($this->db->affected_rows()>0){
                                        return true;
                        }else{ 
                                    return false;
                        }

        }
        
  }