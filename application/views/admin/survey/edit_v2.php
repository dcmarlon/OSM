<div class="ui grid">
    	
        <div class="row"></div>
        <div class="three wide column"></div>
        <div class="ten wide column">
            
            <div class="row">
                <label> <h2>S U R V E Y - C R E A T I O N</h2>   </label>
                    </div>  
            
          <form class="ui form" id="questionform" method="post" action="<?php echo base_url('index.php/admin/survey/edit_survey_v2');?>" role="form">

          			<?php if(count($survs)): ?>
              
              <div class ="two fields">
                    
				<div class ="field">
          
                          <div class="ui input"> 
                            <input type="text" name="s_name" class="required field" value="<?php echo $survs->survey_name ?>" placeholder="Survey Title" >
                            <input type="hidden" name="s_id" value="<?php echo $survs->survey_id; ?>"/>	

                          </div> 
                </div>

                <div class="field">
                        <div id="activate_survey" class=" ui blue button">Activate Survey</div>
				</div>
					<?php endif; ?>
			</div>

                    <div class="question_main" class="field"> 
                             </br> 
                             
                       <?php echo $survs->survey_id; ?>
					
                    <?php $questions = $this->question_m->get_all_questions($survs->survey_id); 
              
                        $q_num = 0; if(count($questions)): foreach($questions as $quest): $q_num+=1
                       
                            ?>     
                             
    
                               
                        <div class="questions">

                        	 <input type="hidden" name="q_id" value="<?php echo $quest->question_id; ?>"/>

                                   <div class = "three fields">                               
                          <div class="field">
                           <label>Q U E S T I O N </label><input name ="question[0][q_data]" type="text" required="required" value="<?php echo $quest->question_data; ?>" placeholder="Question">
                          </div>
                          <div class="field">
                            <label>&nbsp;</label>
                            <div>
                                  <select class="form-group form-control" name="question[0][q_type]" required="required">
                                    <option value="<?php echo $quest->question_type; ?>" disabled default selected class="display-none"> 

                                    <?php if($quest->question_type == 'Single') echo "Single"; elseif ($quest->question_type == 'Multiple') echo "Multiple"; else echo "Combination";?> 

                                     </option>
                                    <option value="Single">Single</option>
                                    <option value="Multiple">Multiple</option>
                                    <option value="Combination">Combination</option>
                                </select>

                            </div>

                          </div>

                          	
                      <div class="field">
                            <button id="remove_quest" type ="button" class=" ui red button" value="<?php echo $quest->question_id; ?>" > x </button>
                       </div>

                                  </div>

                      <div id="choice_main" class="grouped fields">
                      	<?php echo $quest->question_id; ?>
                        <label>Choices:</label>

                        	<?php $choices = $this->choice_m->get_all_choices($quest->question_id); 

                                      $c_num = 0; if(count($choices)): foreach($choices as $cho):

                                            ?>



                        <div id="choice_sub" class="two fields">
                        	
                        	<input type="hidden" name="c_id" value="<?php echo $cho->choice_id; ?>"/> 


                          <input type="text" name="question[0][choices_item][]" value="<?php echo $cho->choice_data; ?>" class="form-group form-control" required="required" placeholder="Choice"> 
                          
                          <?php endforeach; ?>
                             <?php endif; ?>    
								
                        </div>

                      <div id="add_choiceItem"class="mini ui button" type="button">Add Choice</div> 
                      <button id="rmv_choiceItem" value="<?php echo $quest->question_id; ?>"  class="mini ui red button" type="button">Remove Choice</button>
                      <input type="hidden" name="ctr" id="ctr" value="0" />
                     
                      
                      </div>
                      
                    </div>

                    <?php endforeach; ?>
                            <?php endif; ?> 
                        </br>
	
                    </div>     

	
                      <div class="four column row">
                        <div class="right floated column">
                                        <div class="row"></div>
                            <div class="three wide column"></div>
                            <div id="add_question" class="tiny ui green button" >Add Question</div>
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

   
      
   
 
	

      <!--Javascript-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/semantic.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/components/modal.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('dtables/media/js/jquery.dataTables.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('semantic/js/app.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/testing.js'); ?>"></script> 


<script type="text/javascript">
$(document).ready(function(){
    var q_num =1, c_num = 1;

	if( $('.question_main > div[class*="questions"]').length == 1)
		$('#remove_question').attr("disabled","disabled");
		
	$('#remove_choiceItem').attr("disabled","disabled");
	
	$('#rr').click(function(){
		alert($('.cnt > div[id*="re"]').length);
	});
	
	$(document).on("click","#remove_question", function(){
		q_num-=1;
		if($('.question_main > div[class*="questions"]').length === 50)
			$('#add_question').removeAttr("disabled");
		
		
		$('.question_main > div.questions').last().remove();
		if( $('.question_main > div[class*="questions"]').length === 1)
		    $('#remove_question').attr("disabled","disabled");
		
		
	});
	
	$(document).on("click","#add_question", function(){
	

	
	
		if($('.question_main > div[class*="questions"]').length === 1)
			$('#remove_question').removeAttr("disabled");
		
		var questionItem = field(q_num);
	   	 q_num +=1;
		$('.question_main').append(questionItem);
		
		if($('.question_main > div[class*="questions"]').length === 50)
			$('#add_question').attr("disabled","disabled");	
			
		
	});
	
	$(document).on("click", "#add_choiceItem", function(){
       
		
		 if($(this).siblings("#choice_sub").children().length == 1)
			$(this).siblings('#rmv_choiceItem').removeAttr("disabled");
		 var q_ctr = $(this).siblings("#ctr").val();
		$(this).siblings("#choice_sub").append(' <input type="text" name="question['+q_ctr+'][choices_item][]" class="form-group form-control" required placeholder="Choice">');
		
			 if($(this).siblings("#choice_sub").children().length === 5)
			$(this).attr("disabled","disabled");	
	});
//	$(document).on("click","#rmv_choiceItem", function(){
//       
//	    if($(this).siblings("#choice_sub").children().length === 5)
//			$(this).siblings('#add_choiceItem').removeAttr("disabled");
//		
//		$(this).siblings("#choice_sub").children().last().remove();
//		if($(this).siblings("#choice_sub").children().length === 1)
//		$(this).attr("disabled","disabled");	
//	});
        
        
        
      $(document).on("click","#rmv_choiceItem", function(){

             alert(this.value);

   $.ajax({
		type: "POST",
		url: "<?php echo base_url('index.php/admin/survey/deleteChoices/')?>/"+id,
			
	}).done(function(msg){
		if(msg=="success"){
                     
             if($(this).siblings("#choice_sub").children().length == 5)
                $(this).siblings('#add_choiceItem').removeAttr("disabled");
		
		$(this).siblings("#choice_sub").children().last().remove();
		if($(this).siblings("#choice_sub").children().length == 1)
		$(this).attr("disabled","disabled");
		}
				
	});
       
       
  });
  
            
	
		function myFunction() {
			confirm("Press OK to submit the Survey Form!");
		}
   
   
                   $(document).on("click","#remove_quest", function(){
                       alert(this.value);



                   $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('index.php/admin/survey/deleteQuestion/')?>/"+id,

                        }).done(function(msg){
                                if(msg=="success"){
                                     $(this).parents('.questions').remove();
                                }

                        });


                  });

});


function  confirmDeleteFunc(id){
    alert(id);


}

function field( i){

	var x =   '<div class="questions">'+
			'<div class = "two fields">'+
          '<div class="field">'+
          ' <label>Q U E S T I O N </label><input name ="question['+i+'][q_data]" type="text" required="required"placeholder="Question">'+
       '   </div>'+
         ' <div class="field">'+
           ' <label>&nbsp;</label>'+
          '  <div>'+
                 ' <select class="form-group form-control" name="question['+i+'][q_type]" required="required">'+
                '    <option value="" disabled default selected class="display-none">Question Type</option>'+
                  '  <option value="Single">Single</option>'+
                  '  <option value="Multiple">Multiple</option>'+
                   '+ <option value="Combination">Combination</option>'+
	'	</select>'+
          
           ' </div>'+

        '  </div>'+
		 ' </div>'+
     
    '  <div id="choice_main" class="grouped fields">	'+
      '  <label>Choices:</label>'+
        
      '  <div id="choice_sub" class="two fields">'+
            
         
        '  <input type="text" name="question['+i+'][choices_item][]" class="form-group form-control" required="required" placeholder="Choice">'+    
            
        
	
            
            
       ' </div>'+

    '  <div id="add_choiceItem"class="mini ui button" type="button">Add Choice</div> '+
     ' <div id="rmv_choiceItem"class="mini ui red button" type="button">Remove choice</div>'+
	 '<input type="hidden" name="ctr" id="ctr" value="'+i+'" />'+
    '  </div>'+
    ' </div>'+
    '   </br>';
	
	return x;
	}
</script>	



        </html>



		