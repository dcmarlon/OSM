<div class="ui grid">
    	
        <div class="row"></div>
        <div class="three wide column"></div>
        <div class="ten wide column">
            
            <div class="row">
			<div class="ui success message">
  <i class="close icon"></i>
  <div class="header">
    If you want to add "Others" as a choice
  </div>
  <p>Input "Others" in the choice field. A text box will appear beside that choice when a student takes the survey</p>
</div>
                <label> <h3><strong>[Create] - S u r v e y</strong></h3></label>
                    </div>  
            
          <form class="ui form" id="questionform" method="post" action="<?php echo base_url('index.php/admin/survey/add_survey_v2');?>" role="form">
              
          
                          <div class="ui input"> 
                            <input type="text" name="s_name" class="required field" maxlength="40" required="required" placeholder="Survey Title" >
                          </div> 

                    <div class="question_main" class="field"> 
                             </br>   
                        <div class="questions">
                                   <div class = "two fields">
                                                                   
                          <div class="field">
   
                           <label><strong>Q u e s t i o n</strong></label><input name ="question[0][q_data]" type="text" required="required" placeholder="Question">
                          </div>
                          <div class="field">
                            <label>&nbsp;</label>
                            <div>
                                  <select class="form-group form-control" name="question[0][q_type]" required="required">
                                    <option value="" disabled default selected class="display-none">Question Type</option>
                                    <option value="Single">Single</option>
                                    <option value="Multiple">Multiple</option>
      
                                </select>

                            </div>
                            

                          </div>
                                  </div>

                      <div id="choice_main" class="field">
                        <label><strong>C h o i c e s :</strong></label>

                        <div id="choice_sub" class="field">
                            
                            
                            <div  id ="choice_in"class="two fields">
                                
                                <div class="field">
                                <input type="text" name="question[0][choices_item][]" class="form-group form-control" required="required" placeholder="Choice">
                                <input type="text" name="question[0][choices_item][]" class="form-group form-control" required="required" placeholder="Choice"><br>
                                </div>
                                
                                <div class="field">
                                  
                                </div>
                                
                                </div>

                        </div>

                      <button id="add_choiceItem"class="mini ui green button" type="button">Add Choice</button> 
                      <input type="hidden" name="ctr" id="ctr" value="0" />
                     
                      
                      </div>
                      
                    </div>
                        </br>
	
                    </div>     

                     <br>
			<div class="two fields">
                            
                            	<div class="left floated column"> 
					      <button id="back" type="button" class="ui button" >Back</button>
                                              <button id="add_question" class="ui green button" type="button" >Add Question</button>     
				</div>
				<div class="right floated column">
					<div class="row"></div>
					<div class="three wide column"></div>
			             
					<button id="submit_form" type="submit" name="addlist" class=" ui submit blue button">Create Survey</button>

				</div>
				</br>
		
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


$('.message .close').on('click', function() {
  $(this).closest('.message').fadeOut();
});
    var q_num =1;


	
	$(document).on("click","#add_question", function(){
		
		var questionItem = field(q_num);
	   	 q_num +=1;
		$('.question_main').append(questionItem);
		
		if($('.question_main > div[class*="questions"]').length == 50)
			$('#add_question').attr("disabled","disabled");	
			
		
	});
	
       
       $(document).on("click", "#add_choiceItem", function(){
           
     
	 var q_ctr = $(this).siblings("#ctr").val();          
		$(this).siblings("#choice_sub").last().append('<div id="heyz" class="two fields"><div class="field"><input type="text" name="question['+q_ctr+'][choices_item][]" class="form-group form-control" required placeholder="Choice"></div><div class="field"><button id="remove_field" type ="button" class=" mini ui red button"> Remove Choice </button></div></div>');
	
//                 if($(this).siblings("#choice_sub").children().length == 5)
//			$(this).attr("disabled","disabled");	
        });
        
        
        
        

             $(document).on("click","#remove_field", function(e){ 
                    e.preventDefault(); 
                                $(this).parent('div').parent().fadeOut(250, function() {
                                                $(this).remove(); 
                                                
//                        if($(this).siblings("#choice_sub").children().length != 5){
//                            $('#add_choiceItem').removeAttr("disabled","disabled");
//                        }
                        
                  });
        
       
                })
    
    
                $(document).on("click","#remove_question", function(e){ 
                    e.preventDefault(); 
                    
                                     $(this).parent().parent('.question_main > div.questions').slideUp(250, function() {
                                                $(this).remove();
                             });
                })
        
        
        	$(document).on("click","#back", function(){
                    
                         if(confirm("Do you want to go back without saving?" )){    
                                
                               window.history.back(-1);   
                             
                         }else{
                             // do nothing
                         }
       
                    
                });
                
                
            $(document).on("submit","form", function(){


                        var admin_choice = window.confirm('Would you like to continue?');

                        if(admin_choice==true) {

                            alert("Saved Changes!")

                            } else {


                        return false;
                        }
             });
        
        


});

function field( i){

	var x =   '<div class="questions">'+
			'<div class = "two fields">'+
                                '<div class="field">'+
                                        '<label>Q u e s t i o n</label> <input name ="question['+i+'][q_data]" type="text"  required="required"placeholder="Question">'+
                                '</div>'+
                                 '<div class="field">'+
                                        '<label>&nbsp;</label>'+
                                        '<div>'+
                                               '<select class="form-group form-control" name="question['+i+'][q_type]" required="required">'+
                                                       '<option value="" disabled default selected class="display-none">Question Type</option>'+
                                                       '<option value="Single">Single</option>'+
                                                       '<option value="Multiple">Multiple</option>'+
                                               '</select>'+     
                                        '</div>'+
                                '</div>'+                	
                        '</div>'+
                        
                '<div id="choice_main" class="field">'+
                            '<label>C h o i c e s :</label>'+
                        '<div id="choice_sub" >'+
                                '<div class=" two fields">'+
                        
                                '<div class="field">'+
                            '<input type="text" name="question['+i+'][choices_item][]" class="form-group form-control" required="required" placeholder="Choice">'+         
                               '<input type="text" name="question['+i+'][choices_item][]" class="form-group form-control" required="required" placeholder="Choice">'+
                                '</div>'+ 
                                
                                '<div class="field">'+
                                '</div>'+
        
                               '</div>'+                   
                        '</div>'+
             

                            '<button id="add_choiceItem" class="mini ui green button" type="button">Add Choice</button> '+
                                 '<input type="hidden" name="counter" id="ctr"  value="'+i+'" />'+
                            '</div>'+
                                  '<div class="right floated column">'+
                                             '<button id="remove_question" type ="button" class="ui red button"> Remove Question </button>'+
                                             '</div>'+
                                             '</br>'+
                                         
                    '</div>'+
                    '<br>';;
	
	return x;
	}
</script>	

</body>

        </html>



		