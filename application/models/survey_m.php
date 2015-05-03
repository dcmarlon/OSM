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
				
				
				
			}

			if($query1){
				return true;
				
			}else
				return false;
                    
                      
		}
                
                
                
                function edit_survey_v() {
                    
             //          echo count($this->input->post('question'))  ;
//                
//                        print_r($this->input->post('question'));
//                          echo "<br>";
//                          print_r($this->input->post('question_two'));
//                           echo "<br>";
//                           
                      $data = array(
                            
				'survey_name' => $this->input->post('s_name')
			);

                      $this->db->where('survey_id', $this->input->post('s_id'));
                      $query1 = $this->db->update('survey',$data);
            
                  //     print_r($this->input->post('question'));
//			$question= $this->input->post('question');
//                        foreach($question as $index => $quest){
//                            print_r($quest);
//                            echo "<br>";
//                            
//                            
//                        }
                 
                      if($this->input->post('question')){
                        $question =  $this->input->post('question');
			foreach($question as $index => $quest){
                            
                            // if($index <= $this->input->post('edit_q_count') ){
				
                                    $data = array(
                                                'question_data' => $quest['q_data'],
                                                'question_type' => $quest['q_type']

                                        );


                                         $this->db->where('question_id',$quest['q_id']);
                                        $query1 = $this->db->update('questions',$data);




                                //	print_r($quest['c_id']);
                                        
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
                                        
                                                     //$tmp = array_filter($quest['c_id']);
                                               else if($this->input->post('question_three')){
                                                         $question_cho = $this->input->post('question_three');
                                                        $quest_ctr = $this->input->post('#ctr2');
                                                        // $sctr = 0;
                                                           foreach($question_cho  as $cho){
                                                         $data = array(
                                                                 'question_id' => $quest_ctr,
                                                                 'choice_data' => $cho['choices3_item']

                                                         );
                    				
                                                                $this->db->insert('choices',$data);
                                                      // $sctr++;
                                                   }
                                                 } 
                                           
//                                         
                              }
//                                       
//	
                              }
//                                 
//                                 else
//                                 {
//                                    
//                                    $dataInsert = array(
//                                                        'question_data' => $quest['q_data'],
//                                                        'question_type' => $quest['q_type'],
//                                                        'survey_id' => $this->input->post('s_id') );
//                                    
//                                    $this->db->insert('questions',$dataInsert);
//                                    $question_id = $this->db->insert_id();
//                                    
//                                    //inserting choices to the new question
//                                    
//                                        $ctr=0;
//                                    	foreach($quest['c_id'] as $choice){
//					$data = array(
//								'question_id' => $question_id,
//								'choice_data' => $quest['choices_item'][$ctr]
//					);
//					
//					$this->db->insert('choices',$data);
//                                        $ctr++;
//                                        }
//                                 }
                      //   }
     
 }   
//       if($this->input->post('question_two')){
//
//			
//			$question_two= $this->input->post('question_two');
//			foreach($question_two as $quest_two => $quest2){
//				$data = array(
//					'survey_id' => $this->input->post('s_id'),
//					'question_data' => $quest2['q2_data'],
//					'question_type' => $quest2['q2_type']
//				
//				);
//				
//				$this->db->insert('questions',$data);
//				$question_id = $this->db->insert_id();
//                                
//				foreach($quest2['choices2_item'] as $choice){
//					$data = array(
//								'question_id' => $question_id,
//								'choice_data' => $choice
//					);
//					
//					$this->db->insert('choices',$data);
//					
//				}
//       
//                        } 
//                        
//       }
 
                        	if($query1){
				return true;			
                                }else
				return false;
                  
                  
                  
          
      }        
       	public function deleteUserFromDB($id){
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
                
                   
        
            function update_survey($sdata,$sid)
            {
		
                        $this->db->set($sdata);
			$this->db->where($this->primary_key, $sid);
			$this->db->update($this->_table);
            }
        
        

  }