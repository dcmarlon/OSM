<?php
class Results_model extends CI_Model {
    
    
      public function get_survey($id)
        {
            $this->db->where('survey_id',$id);
            $this->db->from('survey');
            $query = $this->db->get();
		
            return  $query->row();
        }
    
}
