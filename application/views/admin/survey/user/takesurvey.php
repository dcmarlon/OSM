
<?php $this->load->view('admin/components/takesurvey_head'); ?>
<div class= "sixteen wide column">
            <div class = "ui large fixed inverted menu">
                        <div class="title item">	
                        Today's Carolinian Surveys
                        </div>

                     

            </div>
</div>
	
	<!-- SURVEY BODY -->
<div class="ui three column centered grid">
        <div class="seven wide centered column">
                <div class="row">
                            <form class="ui form" id="takeform" method="post" action="<?php echo base_url('/user/student/answers_add');?>" role="form">
                                    <input type="hidden" name="person"  value="<?php echo $users; ?>" />
                                    <input type="hidden" name="school" value="<?php echo $college; ?>" />

                                            <?php if(count($survs)): ?>
                                                    <br>
                                                    <div class="field">
                                                        <h2 style="color: #ff3333">S U R V E Y : <br> <h2><strong><?php echo $survs->survey_name ?></strong></h3></h2>               
                                                    </div>
                                            <?php endif; ?>
                                    <p>H E L L O, <strong> <?php echo $users;?></strong> </p>
                                                <div class = "row" id = "q_section">
                                                <?php $questions = $this->question_m->get_all_questions($survs->survey_id);   
                                                if(count($questions)): foreach($questions as $i => $quest): 
                                                ?>    
                                                                <div class="grouped fields">
                                                                        <div class="field">
                                                                            <?php $num = 1;
                                                                            ?>
                                                                                <input type="hidden" name="question[<?php echo $i; ?>][q_id]" value="<?php echo $quest->question_id; ?>"/>
                                                                                <h3 name ="question[<?php echo $i; ?>][q_data]" ><label>( <?php echo $i+1;?> )</label> <?php echo $quest->question_data; ?></h3>
                                                                        </div>
                                                                <div class="grouped fields">
                                                                            <?php 

                                                                            if($quest->question_type == 'Single')
                                                                                $qs_type = "radio";
                                                                            else if($quest->question_type == 'Multiple')
                                                                                $qs_type = "checkbox";

                                                                            ?>
                                                                            <div class=" two fields">
                                                                                    <div class="<?php echo $qs_type; ?>">
                                                                                       
                                                                                               
                                                                                                 <br>
                                                                                                           
                                                                                                            <?php $choices = $this->choice_m->get_all_choices($quest->question_id); 
                                                                                                            if(count($choices)): foreach($choices as $x => $cho): 
                                                                                                            ?>

                                                                                                                <input type="hidden" name="question[<?php echo $i; ?>][c_id][]" value="<?php echo $cho->choice_id; ?>"/> 
                                                                                                                <input type="<?php echo $qs_type; ?>" id="choicex"  name="question[<?php echo $i; ?>][choices_item][]" value="<?php echo $cho->choice_id; ?>" >
                                                                                                                <label><?php echo $cho->choice_data; ?></label>


                                                                                                            <?php if(strtoupper($cho->choice_data) == 'OTHERS'):?>

                                                                                                            <input type="text" placeholder="Please Specify" >

                                                                                                            <?php endif;?>
                                                                                                         


                                                                                   <div class="ui divider"></div>   
                                                                                                            <?php endforeach; ?>
                                                                                                            <?php endif; ?>
                                                                                      </div>                       
                                                                                    
                                                                            </div>
                                                                   <?php $num+=1; ?>        
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>


                                                                            <div class="center aligned column">
																			
																			<div class="ui buttons">
                                                                            <button id="back" type="button"  class="ui black button" >Go Back</button>
																			<div class="or"></div>
                                                                            <button id="submit" type="submit" name="addlist"  class=" ui submit green button">Submit Answers</button>
																			</div>

                                                                            </div>
                                                                </div>

                                                                </div>

                                                </div>
                            </form>
                </div>
        </div>
</div>

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
    

        	$(document).on("click","#back", function(){
                    
                    
                         if(confirm("Do you want to go back without submitting?" )){    
                                
                               window.history.back(-1);   
                             
                         }else{
                             // do nothing
                         }  
                    
                });
               
                    $('#submit').click(function(){
                            if ($('#choicex:checked').length <= 0) {

                           var admin_choice = window.confirm('You left some questions unanswered, Do you want to proceed?');
                                                   if(admin_choice==true) {

                                                 

                                                   } else {

                                               return false;                                              }
                        }
                        else {
                            var admin_choice = window.confirm('Are you sure you want to submit your answer(s)?');

                                                    if(admin_choice==true) {

                                                  
                                                      } else {

                                                    return false;                                                  }                                
                        }
                    });  

});

</script>	

</body>

        </html>



		
		

