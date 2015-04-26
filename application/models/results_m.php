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
        $this->db->where('survey_id',$id);
            $this->db->from('questions');
            $query = $this->db->get();
		
            if( $query->num_rows() > 0 ){
		return $query->result_array();
            } else {
		return false;
	}
    }
    
    public function get_answers($id)
    {
        $this->db->where('survey_id',$id);
            $this->db->from('answers');
            $query = $this->db->get();
		
            if( $query->num_rows() > 0 ){
		return $query->result_array();
            } else {
		return false;
	}
    }
    
    public function get_choices($q_id){
        if(!empty($q_id)){
            $query_str = "SELECT * FROM choices WHERE question_id IN(".implode(',',$q_id).")";
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
    
    public function get_results($id){
            $this->db->query('SELECT questions.questions_id, choices.choices_id, choices.choice_data
                            FROM questions
                            INNER JOIN choices
                            ON Orders.CustomerID=Customers.CustomerID
                            WHERE
                            questions.survey_id = $id');  
            return  $query->result_array();
    }
    
    
        
}