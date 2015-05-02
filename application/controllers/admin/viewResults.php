<?php

    class ViewResults extends Admin_Controller{ 
    
        
    function __construct ()
	{
		parent::__construct();
                 $this->load->model('results_m');        
	}
        
    public function view_results($id=null){
        
           
                
                $row = $this->results_m->get_survey($id);
                $data['res'] = $this->results_m->get_questions($id);

                    //row into array
                    $data['surv'] = array(
                                    'id' => $row->survey_id,
                                    'name' => $row->survey_name,
                                    'date_created' => $row->created_date,
                                    'date_issued' => $row->issued_date,
                                    'status' =>$row->status
                            );

                   //get choices 
                    if($data['res']!=false){

                        $total=count($data['res']);
                        $q_id = array();
                        //echo $total;
                        for($n=0;$n<$total;$n++){
                            $q_id[$n] = $data['res'][$n]['question_id'];
                        }  
                        $data['choices'] = $this->results_m->get_choices($q_id);
                    }

                    
                   if(empty($this->input->post('filter'))){
                       $data['college'] = "ALL";
                   }
                   else {
                       $data['college'] = $this->input->post('filter');
                   }
                    
                  //get answers  
                    if($data['choices']!= false){
                        $totalc=count($data['choices']);
                        $q_id = array();
                        //echo $total;
                        for($n=0;$n<$totalc;$n++){
                            $c_id[$n] = $data['choices'][$n]['choice_id'];
                        }  
                        $data['ans'] = $this->results_m->get_answers($c_id, $data['college']);
                    }



                    
                    $total_a = count($data['ans']); //count the number of answers in the entire survey
                    $tot_ansque = array(); //temporary array for the total number of answers for that question
                    $idkey = array(); //temporary array to hold question_id

                    //loop for getting the total number of answers in each question
                    for($n=0;$n<$total; $n++){
                        $idkey[$n] = $data['res'][$n]['question_id'];  //put question_id into $idkey array
                        $tot_ansque[$n] = $this->get_total_ans_per_q($idkey[$n],$data['ans'],$total_a); //put total answers for a questions into $tot_ansque
                    }
                //echo $college;
                $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value   $data['ansque'] = array_combine($idkey,$tot_ansque); //make questiion_id as associative array key and tot_ansque as value    
                /*print_r($data['ansque']);
                echo "<br>";
                echo "choices :   ";
                print_r($data['choices']);
                echo "<br>";
                 print_r($data['ans']);*/
                $data['totalq'] = $total;
                $data['totalc'] = $totalc; 
                $data['totala'] = $total_a;
                //$this->load->view('admin/survey/viewresults2, $data');
                $data['subview'] = 'admin/survey/viewresults2';
                $this->load->view('admin/_layout_main', $data); 
            }

            //function for getting the total number of answers for a given question		
            //function for getting the total number of answers for a given question
            public function get_total_ans_per_q($q,$a,$sum){
                $tot = 0;

                for($n=0;$n<$sum;$n++){
                    if ($a[$n]['question_id'] == $q)
                        $tot++;      
                }
                return $tot;
            }
    }