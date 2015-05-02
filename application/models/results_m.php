<?php
class Results_m extends CI_Model {
    
    
      public function get_survey($id)
        {
            $this->db->where('survey_id',$id);
            $this->db->from('survey');
            $query = $this->db->get();
		
            return  $query->row();
        }
    
    public function get_questions($id)  
    {
        //$this->db->where('survey_id',$id);
            //$this->db->from('questions');
            //$query = $this->db->get();
            $query_str = "SELECT * FROM questions WHERE survey_id=$id ORDER BY question_id";
            $query = $this->db->query($query_str);
            if( $query->num_rows() > 0 ){
		return $query->result_array();
            } else {
		return false;
	}
    }
    
    public function get_answers($c_id, $college){
        if(!empty($c_id)){
           if(strcmp($college, "ALL") == 0){
               $query_str = "SELECT * FROM answers WHERE choice_id IN(".implode(',',$c_id).") ORDER BY choice_id";
               $query = $this->db->query($query_str);
               
           }
           else {
               //$query_str = "SELECT * FROM answers WHERE choice_id IN(".implode(',',$c_id).") && student_id = (SELECT student_id FROM students WHERE college = $college )ORDER BY choice_id";
               $this->db->select('*');
               $this->db->where('college =', $college);
               $this->db->from('students');
               $this->db->join('answers', 'answers.student_id = students.student_id');
               $this->db->join('choices', 'answers.choice_id = choices.choice_id');

               $query = $this->db->get(); 
               
           }
            if( $query->num_rows() > 0 ){
                    return $query->result_array();
            } 
            else
                return false;
        }   
         else {
             return false;     
        }   
    }
    
    public function get_total_per_q($q_id){
        //$query=mysql_query("SELECT answers.answer_id, COUNT(*) as votes FROM answers, choices WHERE answers.choice_id=choices.choice_id AND answers.choice_id IN(SELECT choice_id FROM choices WHERE choice_id='$q_id') GROUP BY answers.choice_id"); 
        //$query_str = "SELECT * FROM answers WHERE choice_id IN(".implode(',',$c_id).") ORDER BY choice_id";
       
        $query_str = "SELECT choice_id FROM choices WHERE question_id=$q_id";
        $queryc = $this->db->query($query_str);
        $querycs = $queryc->result_array();
        print_r($querycs);
        
    }
    
   /* public function get_answers($id)
    {
        $this->db->where('survey_id',$id);
            $this->db->from('answers');
            $query = $this->db->get();
		
            if( $query->num_rows() > 0 ){
		return $query->result_array();
            } else {
		return false;
	}
    }*/
    
    public function get_choices($q_id){
        if(!empty($q_id)){
            $query_str = "SELECT * FROM choices WHERE question_id IN(".implode(',',$q_id).") ORDER BY question_id";
            $query = $this->db->query($query_str);
            if( $query->num_rows() > 0 ){
                    return $query->result_array();
            } 
            else
                return false;
        }   
         else {
             return false;
         }   
    }
    
   /* public function get_choices($id){
         $this->db->where('survey_id',$id);
            $this->db->from('choices');
            $query = $this->db->get();
		
            if( $query->num_rows() > 0 ){
		return $query->result_array();
            } else {
		return false;
	}
    }*/
    
    /*public function get_results($id){
            $this->db->query('SELECT questions.questions_id, choices.choices_id, choices.choice_data
                            FROM questions
                            INNER JOIN choices
                            ON Orders.CustomerID=Customers.CustomerID
                            WHERE
                            questions.survey_id = $id');  
            return  $query->result_array();
    }*/
    
    
        
}