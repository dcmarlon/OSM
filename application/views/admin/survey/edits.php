<div class="ui grid">
    	
        <div class="row"></div>
        <div class="three wide column"></div>
        <div class="ten wide column">
          

          <form class="ui form" id="questionform" method="post" action="<?php echo base_url('index.php/admin/survey/edit_survey');?>" role="form">
              
                <h4>Create Survey
                    
		<?php if(count($survs)): ?>
		
		<div class ="two fields">
                    
		<div class ="field">
                          <div class="ui input"> 
                            <input type="text" name="s_name" value="<?php echo $survs->survey_name ?>" required="required" placeholder="Survey Title" >
                            <input type="hidden" name="s_id" value="<?php echo $survs->survey_id; ?>"/>            
                          </div>   
		</div>
                            <!--                            SASD-->
<!--                            <input type="hidden" name="s_issued" value="(onCurrentDate)" />	 	 
                                 <input type="hidden" name="s_stat" value="Active" />
                            -->
						<div class="field">
							<div id="activate_survey" class=" ui blue button">Activate Survey</div>
						</div>
	
        </div>
		<?php endif; ?>
                    
               </h4> 



      <div class="question_main" class="field"> 
          
          <?php echo $survs->survey_id; ?>
					
                    <?php $questions = $this->question_m->get_all_questions($survs->survey_id); 
              
                        $q_num = 0; if(count($questions)): foreach($questions as $quest): $q_num+=1
                       
                            ?>
          
             <div class="questions">							
                     <div class = "two fields">
                          <div class="field">
                              
                              <input type="hidden" name="q_id<?php echo $q_num;?>" value="<?php echo $quest->question_id; ?>"/>
                           <label>Q U E S T I O N </label><input name ="q_data<?php echo $q_num ?>" value="<?php echo $quest->question_data; ?>" type="text" required="required" placeholder="Question">
                          </div>
                          <div class="field">
                            <label>&nbsp;</label>
                            <div>
                                  <select class="form-group form-control" name="q_type<?php echo $q_num;?>" required="required">
                                      <option value="<?php echo $quest->question_type; ?>" disabled default selected class="display-none">
                                          <?php if($quest->question_type == 'Single') echo "Single"; elseif ($quest->question_type == 'Multiple') echo "Multiple"; else echo "Combination";?>                          
                                      </option>
                                    <option value="Single">Single</option>
                                    <option value="Multiple">Multiple</option>
                                    <option value="Combination">Combination</option>
                                  </select>

                            </div>

                          </div>
                      </div>

                      <div id="choice_main" class="grouped fields">
                          
                          <?php echo $quest->question_id ?>
                           <label>Choices:</label>
                          
                                    <?php $choices = $this->choice_m->get_all_choices($quest->question_id); 

                                      $c_num = 0; if(count($choices)): foreach($choices as $cho): $c_num+=1

                                            ?>
                                       

                                        <div id="choice_sub" class="two fields">
                                                
                                           <?php echo print_r($cho->choice_data) ?>
<!--                                           <input type="hidden" name="c_id<?php echo $c_num;?>" value="<?php echo $cho->choice_id; ?>"/>         -->
                                          <input type="text" name="choices_item<?php echo $c_num ?>" value="<?php echo $cho->choice_data; ?>" class="form-group form-control" required="required" placeholder="Choice"/>    

                                        </div>

                                         <?php endforeach; ?>
                                            <?php endif; ?> 

                      <div id="add_choiceItem"class="mini ui button" type="button">Add Choice</div> 
                      <div id="rmv_choiceItem"class="mini ui red button" type="button">Remove Choice</div>
                      
                      </div>
                 
                 </br>
                 
                    </div>
                        
                          
                           <?php endforeach; ?>
                            <?php endif; ?> 
                        </br>
                      

                    </div>     

	
                      <div class="four column row">
                        <div class="right floated column">
                                        <div class="row"></div>
                            <div class="three wide column"></div>
                            <div id="add_question" class="tiny ui green button">Add Question</div>
                                        <div id="remove_question" class="tiny ui red button">Remove Question</div>
                            <button id="submit_form" type="submit" name="addlist" class="ui submit button" onclick="myFunction()">Save</button>
                          <div class="ui button">Clear All</div>
                        </div>
                                </br>
                        <div class="left floated column"> 
                           <?php echo anchor('/admin/survey', '<button class="ui button">Back</button> '); ?>
                        </div>
                      </div>
          
            </form>
                  
       </div>
</div>



<!--hidden field-->

    <div id="question_hid" class="field" hidden="hidden"> 
        
        <div class="questions">
			<div class = "two fields">
          <div class="field">
            <label>Q U E S T I O N </label><input name ="q_data[]" type="text" required="required"placeholder="Question">
          </div>
          <div class="field">
            <label>&nbsp;</label>
            <div>
                  <select class="form-group form-control" name="q_type[]" required="required">
                    <option value="" disabled default selected class="display-none">Question Type</option>
                    <option value="Single">Single</option>
                    <option value="Multiple">Multiple</option>
                    <option value="Combination">Combination</option>
		</select>
                
            </div>

          </div>
		  </div>
     
      <div id="choice_main" class="grouped fields">
        <label>Choices:</label>
        
        <div id="choice_sub" class="two fields">
            
            
		<div>
          <input type="text" name="choices_item[]" class="form-group form-control" required="required" placeholder="Choice">    
            
        
		</div>
            
            
        </div>

      <div id="add_choiceItem"class="mini ui button" type="button">Add Choice</div> 
      <div id="rmv_choiceItem"class="mini ui red button" type="button">Remove choice</div>
      </div>
     </div>
       </br>
    </div> 
	








		