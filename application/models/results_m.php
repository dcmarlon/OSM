<?php
class Results_m extends CI_Model {
    


        //get survey by id from db
      public function get_survey($id){
            $this->db->where('survey_id',$id);
            $this->db->from('survey');
            $query = $this->db->get();	
            return  $query->row();  
      }
    
      //get all question  based on the survey
      public function get_questions($id){
            $query_str = "SELECT * FROM questions WHERE survey_id=$id ORDER BY question_id";
            $query = $this->db->query($query_str);
                    if( $query->num_rows() > 0 ){
                        return $query->result_array();
                    } else {
                        return false;
                    }
      }
    
        //get all answers according to colleges  or all
      public function get_answers($c_id, $college){
                if(!empty($c_id)){
                   if(strcmp($college, "ALL") == 0){
                       $this->db->select('*');
                       $this->db->from('answers');
                       $this->db->join('questions', 'answers.question_id = questions.question_id');
                       $this->db->where_in('questions.question_id', $c_id);

                       $query = $this->db->get();   
                   }else{
                        $this->db->select('*');
                        $this->db->where('college =', $college);
                        $this->db->from('students');
                        $this->db->join('answers', 'answers.student_id = students.student_id');
                        $this->db->join('questions', 'answers.question_id = questions.question_id');
                        $this->db->where_in('questions.question_id', $c_id);
                        $query = $this->db->get(); 

                   }
                    if( $query->num_rows() > 0 ){
                            return $query->result_array();
                    }else
                        return false;
                }else{
                 return false;     
                }   
      }
    
        //get total answers per question
      public function get_total_per_q($q_id){
                $query_str = "SELECT choice_id FROM choices WHERE question_id=$q_id";
                $queryc = $this->db->query($query_str);
                $querycs = $queryc->result_array();
                print_r($querycs);    
      }

        //get all choices based on the questions
      public function get_choices($q_id){
                if(!empty($q_id)){
                    $query_str = "SELECT * FROM choices WHERE question_id IN(".implode(',',$q_id).") ORDER BY question_id";
                    $query = $this->db->query($query_str);
                    if( $query->num_rows() > 0 ){
                            return $query->result_array();
                    }else
                       return false;
               }else{
                     return false;
               }   
      }
}