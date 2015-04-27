<div class="ui grid">
    	
        <div class="row"></div>
        <div class="three wide column"></div>
        <div class="ten wide column">
            
            <div class="row">
                <label> <h2>S U R V E Y - C R E A T I O N</h2>   </label>
                    </div>  
            
          <form class="ui form" id="questionform" method="post" action="<?php echo base_url('index.php/admin/survey/add_survey_v2');?>" role="form">
              
               
                          <div class="ui input"> 
                            <input type="text" name="s_name" class="required field" placeholder="Survey Title" >
                          </div> 

                    <div class="question_main" class="field"> 
                             </br>   
                        <div class="questions">
                                   <div class = "two fields">
                                                                   
                          <div class="field">
   
                           <label>Q U E S T I O N </label><input name ="q_data[]" type="text" required="required" placeholder="Question">
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

                          <input type="text" name="choices_item[]" class="form-group form-control" required="required" placeholder="Choice">    

                        </div>

                      <div id="add_choiceItem"class="mini ui button" type="button">Add Choice</div> 
                      <div id="rmv_choiceItem"class="mini ui red button" type="button">Remove Choice</div>
                      
                      </div>
                    </div>
                        </br>

                    </div>     

	
                      <div class="four column row">
                        <div class="right floated column">
                                        <div class="row"></div>
                            <div class="three wide column"></div>
                            <div id="add_question" class="tiny ui green button">Add Question</div>
                                        <div id="remove_question" class="tiny ui red button">Remove Question</div>
                            <button id="submit_form" type="submit" name="addlist" class="ui submit button" onclick="myFunction()">Submit Form</button>
                          <div class="ui button">Clear All</div>
                        </div>
                                </br>
                        <div class="left floated column"> 
                           <?php echo anchor('admin/survey', '<button class="ui button">Back</button> '); ?>
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
	








		