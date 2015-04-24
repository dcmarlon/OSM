
<div class="ui grid">
        <div class="row"></div>
        <div class="three wide column">      </div>
       
        <div class="ten wide column">
          <h4>Survey Title
          &nbsp;&nbsp;&nbsp;&nbsp;
          <div class="ui big input">
            <?php      
                    $data_survey = array(
                            'type' => 'text',
                            'name' => 'survey_name',
                            'id' => 'survey_id',
                            'class' => 'input_box',
                            'placeholder' => 'Please Enter Email',
                            'required' => 'required'
                        );
                
                
                echo form_input($data_survey, set_value('survey_name ', $survey->survey_name)); 
            
            
            ?>


        </h4>
            <div class ="row"><?php if($survey->status == 'Available'): ?>
                           <button class=" ui blue button" id="button_view_results" value="vertical flip">Activate Result</button>
                     <?php endif; ?>
               </div>
            
            
            </br>
          <div class="row"></div>
      <div class="three wide column"></div>
      <div class="tiny ui green button">Add Question</div>

      

      
          
      <form class="ui form">
        <div class="field"> 
                  <?php if(count($question)): foreach($question as $quest): ?>
              </br>
        <div class="two fields">     
          <div class="field">
                    <label><?php echo $quest->question_id ?></label>
                    <?php


                            $data_question = array(
                                    'type' => 'text',
                                    'name' => 'question_data',
                                    'id' => 'question_id',
                                    'class' => 'ui form',
                                    'placeholder' => 'Please Enter Question',
                                    'required' => 'required'
                                );


                            echo form_input($data_question, set_value('question_data', $quest->question_data)); ?>
                  </div>
                  <div class="field">
                     <div class="default text">Question Type</div>
                     <?php  

                             echo form_dropdown('types', $types, $quest->question_type); 

                            ?>
                    </div>
            
            
        </div>
                  </br>
        <div class="grouped fields">
          <label>Choices:</label>
          
           
          <div class="field">
              <?php $choices = $this->choice_m->get_all_choices($quest->question_id); ?>
               <?php  if(count($choices)): foreach($choices as $choice):?>	
              <label>    </label>
                  
                  <?php 
              
                   //echo $choice->choice_id;
//              print_r($choices);
               $data_choice = array(
                            'type' => 'text',
                            'name' => 'choice_data',
                            'id' => 'choice_id',
                             'class' => 'ui form',
                            'placeholder' => 'Please Enter Question',
                            'required' => 'required'
                        );
                
                
                    echo form_input($data_choice, set_value('choice_data', $choice->choice_data));
          ?>
                      
           
             <?php endforeach; ?>
                   <?php endif; ?>
          </div>
        </div>
                 
          <div class="mini ui button">Add Choice</div> <div class="mini ui button">Clear</div>
                   </br>

        <?php endforeach; ?>
                   
                      <?php else: ?>
                    <p>We could not find any questions..</p>

         <?php endif; ?>	
         
        </div>       
      </form>
      
            
      </br>
      <div class="four column row">
        <div class="right floated column">
          <div class="ui submit button">Submit</div> 
          <div class="ui button">Clear All</div>
        </div>
        <div class="left floated column"> 
            <?php echo anchor('admin/survey', '<button class="ui button">Back</button> '); ?>
        </div>
      </div>

 
</div>
  
</div>
