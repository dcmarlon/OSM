<?php
    class Survey_m extends MY_Model{
        
    protected $_table = 'survey';
	protected $primary_key = 'survey_id';
    public $_database = 'osmdb';
	public $_rules = array();    
	protected $_timestamps = FALSE;
        
       public function __construct() {
           parent::__construct();
           $this->_database = $this->db;
       }
       
       public function get_survey_active($status){
           
           
           $this->db->where('status',$status);
           $this->db->from('survey');
           $query = $this->db->get();
           
           return $query->row();
           
       }

				function insert_survey_v2()	/* insert survey data to db */
		{
			/*
                    print_r($this->input->post('question'));
			echo "<br>";
			$bq= $this->input->post('question');
			
			foreach($bq as $index => $quest)
			{
				foreach($quest['choices_item'] as $choice){
					echo  $choice." ";
					
				}
				echo "<br>";
			}
                         * */
                      
		$data = array(
				'survey_name' => $this->input->post('s_name')
			);
			
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


                                          if($quest['q_type']=='Combination'){
                                        
                                        $data = array(
								'question_id' => $question_id,
								'choice_data' => 'OTHERS'
					);
					
					$this->db->insert('choices',$data);
                                        
                                    }
				
				
				
			}

			if($query1){
				return true;
				
			}else
				return false;
                    
                      
		}
                
                  public function others_call($q){
                        $this->db->where('question_id',$q);
                        $this->db->from('questions');
                        $query = $this->db->get();

                        return  $query->row(); 

                  }
                
                function edit_survey_v() { /* edit survey, insert new survey */
                    
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
                                    
                                    
                                   $row = $this->others_call($quest['q_id']); 
                                   
                                   if ($row->question_type == 'Combination' && ($quest['q_type'] == 'Single' || $quest['q_type'] == 'Multiple') ){
                                       $this->db->where('question_id', $quest['q_id']);
                                       $this->db->where('choice_data =', 'OTHERS');
                                       $this->db->delete('choices');
                                   } else if ( ($row->question_type == 'Single' || $row->question_type == 'Multiple') &&  $quest['q_type'] == 'Combination' ) {
                                       
                                       $cdata = array(
								'question_id' => $quest['q_id'],
								'choice_data' => 'OTHERS'
					);
					
					$this->db->insert('choices',$cdata);
                                   }else{
                                       //do nothing? 
                                   }

                                        $this->db->where('question_id',$quest['q_id']);   
                                        $query1 = $this->db->update('questions',$data);

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
       	public function delete_question_choices($id){
		$this->db->where('question_id',$id);
                $this->db->delete('choices');
                $this->db->where('question_id',$id);
		
		 $this->db->delete('questions');
		
		if($this->db->affected_rows()>0){
			return true;
		}else{ return false;}

	}
        
//               	public function deleteUserFromDBs($id){
//		$this->db->where('question_id',$id);
//                $this->db->delete('choices');
//		
//		if($this->db->affected_rows()>0){
//			return true;
//		}else{ return false;}
//
//	}
        
        
         public function delete_choice_id($id){
		$this->db->where('choice_id',$id);
                $this->db->delete('choices');
		
		if($this->db->affected_rows()>0){
			return true;
		}else{ return false;}

	}
        
         public function insert_activate($id){
             
	       $this->load->helper('date');
             

//             
//                        $time = time();
//
//                      $date =  mdate($datestring, $time);

              //  $date_time = ;
               $stat = 'Active';
//                
                        $data = array(
                                //   'created_date' => '',
                          //        'issued_date' =>  date('Y-m-d H:i:s') ,
                                   'status' => $stat,
				
		);
                        
                    //    print_r($data).
                        
                 $this->db->set('issued_date', date('Y-m-d',time()));
              //  $this->db->set('status', $stat);
                $this->db->where('survey_id',$id);        
                $this->db->update('survey',$data);
                
	if($this->db->affected_rows()>0){
			return true;
		}else{ 
                    return false;
                    
                }

	}
        
                 public function insert_deactivate($id){

               $stat = 'Unavailable';              
                        $data = array(

                                   'status' => $stat,
				
		);
                        
                $this->db->where('survey_id',$id);        
                $this->db->update('survey',$data);
                
	if($this->db->affected_rows()>0){
			return true;
		}else{ 
                    return false;
                    
                }

	}
        
        
        
      
        
        
        
                

  }