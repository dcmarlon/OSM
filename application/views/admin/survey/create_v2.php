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
   
                           <label>Q U E S T I O N </label><input name ="question[0][q_data]" type="text" required="required" placeholder="Question">
                          </div>
                          <div class="field">
                            <label>&nbsp;</label>
                            <div>
                                  <select class="form-group form-control" name="question[0][q_type]" required="required">
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

                          <input type="text" name="question[0][choices_item][]" class="form-group form-control" required="required" placeholder="Choice">    
								
                        </div>

                      <button id="add_choiceItem"class="mini ui button" type="button">Add Choice</button> 
                      <button id="rmv_choiceItem"class="mini ui red button" type="button">Remove Choice</button>
                      <input type="hidden" name="ctr" id="ctr" value="0" />
                     
                      
                      </div>
                      
                    </div>
                        </br>
	
                    </div>     

	
                      <div class="four column row">
                        <div class="right floated column">
                                        <div class="row"></div>
                            <div class="three wide column"></div>
                            <button id="add_question" class="tiny ui green button" type="button" >Add Question</button>
                                        <button id="remove_question" type="button" class="tiny ui red button">Remove Question</button>
                            <button id="submit_form" type="submit" name="addlist" class="ui submit button" onclick="myFunction()">Submit Form</button>
                        </div>
                                </br>
                    
                      </div>
          
            </form>
                <div class="left floated column"> 
                           <?php echo anchor('admin/survey', '<button class="ui button">Back</button> '); ?>
                        </div>
                  
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
    var q_num =1, c_num = 1, minq =1,max=50;

	if( $('.question_main > div[class*="questions"]').length == 1)
		$('#remove_question').attr("disabled","disabled");
		
	$('#remove_choiceItem').attr("disabled","disabled");
	
	$('#rr').click(function(){
		alert($('.cnt > div[id*="re"]').length);
	});
	
	$(document).on("click","#remove_question", function(){
		q_num-=1;
		if($('.question_main > div[class*="questions"]').length == 50)
			$('#add_question').removeAttr("disabled");
		
		
		$('.question_main > div.questions').last().remove();
		if( $('.question_main > div[class*="questions"]').length == 1)
		    $('#remove_question').attr("disabled","disabled");
		
		
	});
	
	$(document).on("click","#add_question", function(){
	

	
	
		if($('.question_main > div[class*="questions"]').length == 1)
			$('#remove_question').removeAttr("disabled");
		
		var questionItem = field(q_num);
	   	 q_num +=1;
		$('.question_main').append(questionItem);
		
		if($('.question_main > div[class*="questions"]').length == 50)
			$('#add_question').attr("disabled","disabled");	
			
		
	});
	
	$(document).on("click", "#add_choiceItem", function(){
       
		
		 if($(this).siblings("#choice_sub").children().length == 1)
			$(this).siblings('#rmv_choiceItem').removeAttr("disabled");
		 var q_ctr = $(this).siblings("#ctr").val();
		$(this).siblings("#choice_sub").append(' <input type="text" name="question['+q_ctr+'][choices_item][]" class="form-group form-control" required placeholder="Choice">');
		
			 if($(this).siblings("#choice_sub").children().length == 5)
			$(this).attr("disabled","disabled");	
	});
	$(document).on("click","#rmv_choiceItem", function(){
       
	    if($(this).siblings("#choice_sub").children().length == 5)
			$(this).siblings('#add_choiceItem').removeAttr("disabled");
		
		$(this).siblings("#choice_sub").children().last().remove();
		if($(this).siblings("#choice_sub").children().length == 1)
		$(this).attr("disabled","disabled");	
	});
	
		function myFunction() {
			confirm("Press OK to submit the Survey Form!");
		}
   

});

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



		