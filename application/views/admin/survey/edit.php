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
                                <label> <h3><strong>[Edit] - S u r v e y</strong></h3></label>
                        </div>  

		<form class="ui form" id="questionform" name="formx" method="post" action="<?php echo base_url('/admin/survey/edit_survey');?>" role="form">

			<?php if(count($survs)): ?>
			<div class ="field">
				<div class ="field">
					<div class="ui input"> 
						<input  type="text" name="s_name" maxlength="40" pattern="[a-zA-Z0-9'.,@:?!()$#/\\]+[a-zA-Z0-9'.,@:?!()$#/\\ ]+" title=" Please input atleast two characters or don't input leading white space(s) or special character(s) that are not listed( '.,@:?!()$#/\\ ) on beginning,end or middle/beside the data!" required value="<?php echo $survs->survey_name ?>" placeholder="Survey Title"  />
						<input type="hidden" name="s_id" value="<?php echo $survs->survey_id; ?>"/>	

					</div> 
				</div>
				<?php endif; ?>
			</div>

			<div class="question_main" class="field">
                            <div id ="question_sib" class="questions">             	
				<?php $questions = $this->question_m->get_all_questions($survs->survey_id);   
				if(count($questions)): foreach($questions as $i => $quest): 
				?>      

                                 <div id="question_inner" class="four column row">
                                            <div id="question_inners" >
                                                <div  id ="question_holder" class = "two fields">                               
                                                        <div class="field">
                                                                <label>Q u e s t i o n </label>
                                                                <input type="hidden" name="question[<?php echo $i; ?>][q_id]" value="<?php echo $quest->question_id; ?>"/>
                                                                <input  name ="question[<?php echo $i; ?>][q_data]" type="text" maxlength="200" pattern="[a-zA-Z0-9'.,@:?!()$#/\\%*]+[a-zA-Z0-9'.,@:?!()$#/\\%* ]+" title=" Please input atleast two alpha-numeric or don't input leading white space(s) or special character(s) that are not listed( '.,@:?!()$#/\\%* ) on beginning,end or middle/beside the data!" required value="<?php echo $quest->question_data; ?>" placeholder="Question">
                                                                
                                                        </div>
                                                        <div class="field">
                                                                <label>&nbsp;</label>
                                                                <div>
                                                                        <select class="form-group form-control" name="question[<?php echo $i; ?>][q_type]" required="required">
                                                                                <option value="<?php echo $quest->question_type; ?>"> 
                                                                                <?php if($quest->question_type == 'Single') echo "Single"; if ($quest->question_type == 'Multiple') echo "Multiple";?> 
                                                                                </option>
                                                                                <option value="Single">Single</option>
                                                                                <option value="Multiple">Multiple</option>

                                                                        </select>
                                                                </div>
                                                        </div>                 	

                                                </div>
                                                <div id="choice_main" class="field">
                                                   <label><strong>C h o i c e s:</strong></label>

                                                        <?php $choices = $this->choice_m->get_all_choices($quest->question_id); 
                                                               if(count($choices)): foreach($choices as $x => $cho):
                                                               ?>
                                                               
                                                           <?php if($x != 0 && $x != 1 ){ ?>
                                                         <div id="choice_sub">                                                  
                                                            <div class="two fields">
                                                                <div id ="choice_info" class="field">
                                                                    <input type="hidden" name="question[<?php echo $i; ?>][c_id][]" value="<?php echo $cho->choice_id; ?>"/> 
                                                                    <input  type="text" name="question[<?php echo $i; ?>][choices_item][]" value="<?php echo $cho->choice_data; ?>" class="form-group form-control" maxlength="150"  pattern="[a-zA-Z0-9'.,@:?!()$#/\\%*]+[a-zA-Z0-9'.,@:?!()$#/\\%* ]+" title=" Please input atleast two alpha numeric or don't input leading white space(s) or special character(s) that are not listed( '.,@:?!()$#/\\%* ) on beginning,end or middle/beside the data!" required placeholder="Choice"/> 
                                                                </div>
                                                                <div class="field">
                                                                    <button id="remove_cho" type ="button" class="circular ui red icon button" value="<?php echo $cho->choice_id; ?>" ><i class="trash outline icon"></i></button>
                                                                </div>
                                                            </div>   
                                                                     
                                                           </div>
                                             
                                                   <?php }else{ ?>                                                                                 
                                                  <div id="choice_sub">                                                  
                                                            <div class="two fields ">
                                                                <div id ="choice_info" class="field">
                                                                    <input type="hidden" name="question[<?php echo $i; ?>][c_id][]" value="<?php echo $cho->choice_id; ?>"/> 
                                                                    <input type="text" name="question[<?php echo $i; ?>][choices_item][]" value="<?php echo $cho->choice_data; ?>" class="form-group form-control" maxlength="150"  pattern="[a-zA-Z0-9'.,@:?!()$#/\\%*]+[a-zA-Z0-9'.,@:?!()$#/\\%* ]+" title=" Please input atleast two aplha numeric or don't input leading white space(s) or special character(s) that are not listed( '.,@:?!()$#/\\%* ) on beginning,end or middle/beside the data!" required  placeholder="Choice"> 
                                                                </div>
                                                                <div class="field">
                                                                </div
                                                            </div>   
                                                        </div>
                                                   </div>
                                                           
                                                   <?php }?>
                                                                     
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>    

                                                        <button id="add_choiceItem"class="tiny ui green labeled icon button" type="button"><i class="add square icon"></i>Add Choice</button> 
                                                        <input type="hidden" name="ctr" id="ctr"  value="<?php echo $quest->question_id ?>" />

                                                </div>
                                         <br>   

                                            </div>
                                                <div class="right floated column">
                                                    <button id="remove_quest" type ="button" class="  ui red labeled icon button" value="<?php echo $quest->question_id; ?>" > <i class="trash outline icon"></i>Remove Question </button>
                                                </div>
                                            <br>
                                        </div>

                                            <br>
						<?php endforeach; ?>
						<?php endif; ?>         	
				</div>       
				<br>
			</div>     
                        <br>
			<div class="two fields">           
                            	<div class="left floated column"> 
					      <button id="back" type="button" class="ui labeled icon button" ><i class="chevron left icon" ></i>Back</button>
                                              <button id="add_question" class="ui green labeled icon button" type="button" ><i class="add square icon"></i>Add Question</button>     
				</div>
				<div class="right floated column">
					<div class="row"></div>
					<div class="three wide column"></div>
					<button id="submit_form" type="submit" name="addlist" class=" ui submit blue labeled icon button" ><i class="save icon"></i>Save</button>
				</div>
				<br>
			</div>
		</form>

	</div>
</div>

      <!--Javascript-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.confirm.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function(){
    
$('.message .close').on('click', function() {
  $(this).closest('.message').fadeOut();
});

    var q_num =<?php  echo count($questions); ?>;

	$(document).on("click","#add_question", function(){
	
		var questionItem = field(q_num);
	   	 q_num +=1;
		$('.question_main').append(questionItem);
                
               if($('.question_main > div[class*="questions"]').length != 50)
			$('#add_question').removeAttr("disabled");
		

	});
        
        $(document).on("click", "#add2_choiceItem", function(){
         
		 var q_ctrs = $(this).siblings("#sctr2").val();
		$(this).siblings("#choice_sub").last().append('<div class="two fields"><div class="field"><input type="text" name="question_two['+q_ctrs+'][choices2_item][]" class="form-group form-control" pattern="[a-zA-Z0-9\'\.\,\@\:\?\!\(\)\$\#\/\\\\]+[a-zA-Z0-9\'\.\,\%\*\@\:\?\!\(\)\$\#\/\\\\ ]+" title=" Please input atleast two alpha-numeric or dont input leading white space(s) or special character(s) that are not listed(\'.,@:?!()$#/\\%* ) on beginning,end or middle/beside the data!" required placeholder="Choice" maxlength="150" ></div><div class="field"><button id="remove_field" type ="button" class=" circular ui red icon button"><i class="remove icon"></i></button></div></div>');
 
        });
	
	$(document).on("click", "#add_choiceItem", function(){

	 var q_ctr = $(this).siblings("#ctr").val();          
		$(this).siblings("#choice_sub").last().append('<div class="two fields"><div class="field"><input type="text" name="question_three['+q_ctr+'][choices3_item][]" class="form-group form-control" pattern="[a-zA-Z0-9\'\.\,\@\:\?\!\(\)\$\#\/\\\\]+[a-zA-Z0-9\'\.\,\%\*\@\:\?\!\(\)\$\#\/\\\\ ]+" title=" Please input atleast two alpha-numeric or dont input leading white space(s) or special character(s) that are not listed(\'.,@:?!()$#/\\%* ) on beginning,end or middle/beside the data!" required placeholder="Choice" maxlength="150"></div><div class="field"><button id="remove_field" type ="button" class="circular ui red icon button"> <i class="remove icon"></i></button></div></div>');
	});
        


            // remove scripts choice and question
                $(document).on("click","#remove_field", function(e){ 
                    e.preventDefault(); 
                                $(this).parent('div').parent().fadeOut(250, function() {
                                                $(this).remove();
                  });
        
       
                })
                      $(document).on("click","#remove_quest_two", function(e){ 
                    e.preventDefault(); 
                    
                                     $(this).parent().parent('.question_main > div.questions').slideUp(250, function() {
                                                $(this).remove();
                             });
                })


              
                 $(document).on("click","#remove_quest", function(){ 
		var parent = $(this).parent();
                   id = this.value;  
                   
                    if(confirm("Do you want to delete this question?" )){    

                                $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url('/admin/survey/delete_questions/')?>/"+id,

                                    }).done(function(msg){
                                                if(msg=="success"){
                                                }

                                });
                                
                                parent.slideUp(300,function() {
					parent.parent().remove();
                            });
                            }else{
                                 alert("Cancelled");    
                            }
              
                 });

            
            $(document).on("click","#remove_cho", function(){ 
                                         id = this.value;
                        if(confirm("Do you want to delete this choice?" )){    
                             $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url('/admin/survey/delete_choiceby_id/')?>/"+id,

                                    }).done(function(msg){
                                                if(msg=="success"){
                                                }

                                });
                                
                                 alert("Successfully deleted!");
                                                              $(this).parent().parent().fadeOut("slow", function() {
                                                $(this).remove();
                  });
                    }else{
                        
                                alert("Cancelled");
                       }

                });
                
                
            $(document).on("click","#back", function(){
                    
                         if(confirm("Do you want to go back without saving?" )){    
                                
                               window.history.back();   
                             
                         }else{
                             // do nothing
                         }
       
                    
                });
                
                 $(document).on("submit","form", function(){


                        var admin_choice = window.confirm('Do you want to save?');

                        if(admin_choice==true) {

                            alert("Successfully Saved!")

                            } else {


                        return false;
                        }
             });
                

 
  });


function field(i){

	var x =   '<div class="questions">'+
			'<div class = "two fields">'+
                                '<div class="field">'+
                                        '<label>Q u e s t i o n</label>'+
                            '<input name ="question_two['+i+'][q2_data]" type="text" maxlength="200" pattern="[a-zA-Z0-9\'\.\,\@\:\?\!\(\)\$\#\/\\\\]+[a-zA-Z0-9\'\.\,\%\*\@\:\?\!\(\)\$\#\/\\\\ ]+" title=" Please input atleast two alpha-numeric or dont input leading white space(s) or special character(s) that are not listed(\'.,@:?!()$#/\\%* ) on beginning,end or middle/beside the data!" required placeholder="Question">'+
                                '</div>'+
                                 '<div class="field">'+
                                        '<label>&nbsp;</label>'+
                                        '<div>'+
                                               '<select class="form-group form-control" name="question_two['+i+'][q2_type]" required="required">'+
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
                            '<input type="text" name="question_two['+i+'][choices2_item][]" class="form-group form-control" pattern="[a-zA-Z0-9\'\.\,\@\:\?\!\(\)\$\#\/\\\\]+[a-zA-Z0-9\'\.\,\@\%\*\:\?\!\(\)\$\#\/\\\\ ]+" title=" Please input atleast two alpha-numeric or dont input leading white space(s) or special character(s) that are not listed(\'.,@:?!()$#/\\%* ) on beginning,end or middle/beside the data!" required maxlength="150" placeholder="Choice">'+  
                               '<input type="text" name="question_two['+i+'][choices2_item][]" class="form-group form-control" pattern="[a-zA-Z0-9\'\.\,\@\:\?\!\(\)\$\#\/\\\\]+[a-zA-Z0-9\'\.\,\@\%\*\:\?\!\(\)\$\#\/\\\\ ]+" title=" Please input atleast two alpha-numeric or dont input leading white space(s) or special character(s) that are not listed(\'.,@:?!()$#/\\%* ) on beginning,end or middle/beside the data!" required maxlength="150" placeholder="Choice">'+
                                '</div>'+  
                                
                                 '<div class="field">'+
                                '</div>'+
        
                               '</div>'+                   
                        '</div>'+
             

                            '<button id="add2_choiceItem" class="tiny ui green labeled icon button" type="button"><i class="add square icon"></i>Add Choice</button> '+
                                 '<input type="hidden" name="sctr2" id="sctr2"  value="'+i+'" />'+
                            '</div>'+
                                  '<div class="right floated column">'+
                                             '<button id="remove_quest_two" type ="button" class="ui red labeled icon button" ><i class="remove icon"></i>Remove Question </button>'+
                                             '</div>'+
                                             '</br>'+
                                         
                    '</div>'+
                    '<br>';
	
	return x;
	}

</script>	


</body>
        </html>



		