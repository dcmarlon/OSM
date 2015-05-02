<?php
class Student_m extends MY_Model
{
    
    protected $has_many = array(
        'questions', 
        'choices',
        'answers');
    public $validation = array(
        array(
            'field' => 'id', 
            'label' => 'ID Number', 
            'rules' => 'requiredtrim'));

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
                    'taken_date' => $row->take_date,
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
    
    
}