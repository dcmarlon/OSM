<?php
class Student_m extends MY_Model
{
    
        //validate user data
    public function log_validate($info){        
            $this->db->select('*');
            $this->db->where($info); 
            $query = $this->db->get('students');
            $row = $query->row();
 
            if(!($row)){
                return true;
            }else if($row->status == 1){
                return false;
            }else{
                return true;
            }
    }
    
    
    
            //insert users answer based on the activated survey
     public function answers_insert(){
        $query = false;
       
        $this->db->select('*');
        $this->db->where('student_id',$this->input->post('person') ); 
        $querys = $this->db->get('students');
        $row = $querys->row();
        
        if(!($row) || $row->status == 0){
         
               $collegex = strtoupper($this->input->post('school'));             
               $data = array(
                    'student_id' => $this->input->post('person'),
                    'college' => $collegex ,
                    'status' => 1
                ); 

             $sql = $this->db->insert_string('students', $data) . " ON DUPLICATE KEY UPDATE status = 1, college = '$collegex'";
            $this->db->query($sql);
            $this->db->insert_id();
                          if($this->input->post('question')){                     
                           $question= $this->input->post('question');  
                                   foreach($question as $index => $quest){
                                           if(isset($quest['choices_item'])){
                                                   foreach($quest['choices_item'] as  $choice){


                                                               $data = array(
                                                                       'student_id' => $this->input->post('person'),
                                                                       'question_id' =>$quest['q_id'],
                                                                       'choice_id'=> $choice			
                                                                   );
                                                                      // echo $choice['choices_item'];
                                                                   $this->db->insert('answers',$data);
                                                            } 

                                          }

                                   }
                                   $query = true;
                           }

        }
          return $query;  
    }
           
    
            
}