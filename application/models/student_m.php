<?php
class Student_m extends MY_Model
{
    
    public function __construct ()
    {
        parent::__construct();
        $this->_database = $this->db;
    }
    
    public function Login(){
        
        if(!$this->required(array('student_id','college')))
                return false;  
    }
    
     public function validate(){
        // grab user input
        $idnumber = $this->security->xss_clean($this->input->post('idnum'));
        $college = $this->security->xss_clean($this->input->post('coll'));
        
        // Prep the query
        $this->db->where('idnum', $idnumber);
        $this->db->where('coll', $college);
        
        // Run the query
        $query = $this->db->get('students');
        // Let's check if there are any results
        
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'student_id' => $row->userid,
                    'college' => $row->fname,
                    'survey_id' => $row->survey_id,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    
    public function log_validate($info){
        
        $this->db->select('*');
        $this->db->where($info); 
        $query = $this->db->get('students');

        return $query->result();
    }
    
     function answers_insert(){
   
//                print_r($this->input->post('question'));
         
         $collegex = strtoupper($this->input->post('school'));
         
         

                        
                        
                
                
			
                if($this->input->post('question')){
                    
                       $data = array(
				'student_id' => $this->input->post('person'),
                                'college' => $collegex 
			);
			
			$query = $this->db->insert('students',$data);
                    
                    
                    	$question= $this->input->post('question');  
			foreach($question as $index => $quest){
                        
				foreach($quest['choices_item'] as  $choice){
                            
                                            $data = array(
                                                    'student_id' => $this->input->post('person'),
                                                    'question_id' =>$quest['q_id'],
                                                    'choice_id'=> $choice			
                                                );
                                                   // echo $choice['choices_item'];
                                          $query =  $this->db->insert('answers',$data);
                                         }              	
			}
                    
		
                }else{
                    
                        $query = false;
                  
                }
                     
                
                        if($query){
                            
                            return true;    
                        }else{
                            return false;
                        }
                        
            }
		
            
    
    

}