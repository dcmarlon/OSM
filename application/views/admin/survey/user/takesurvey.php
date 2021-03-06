<div class= "sixteen wide column">
		<div class = "ui large fixed inverted menu">
		<div class="title item">	
			Today's Carolinian Surveys
		</div>
		
		
		
		<div class="right menu" >
		<a class="item">
			Contact Us
		 </a>
		 
		 <a class="item">
			TC Website
		 </a>
		 
		 <a class="item">
			Facebook
		 </a>
		 
		 <a class="item">
			Twitter
		 </a>
		</div>
		
		</div>
	</div>
	
	<!-- SURVEY BODY -->
<div class="ui three column centered grid">
	<div class="seven wide centered column">
	
		<div class="row">

		<form class="ui form" id="takeform" method="post" action="<?php echo base_url('index.php/user/student/answers_add');?>" role="form">
           
			<?php if(count($survs)): ?>
			<h2 style="color: black">Survey Title: <p name="s_name"><?php echo $survs->survey_name ?></p></h2>
			<input type="hidden" name="s_id" value="<?php echo $survs->survey_id; ?>"/>	

			<?php endif; ?>
			<div class = "row" id = "q_section">
                            
				 <?php echo $survs->survey_id; ?>
                            
				<?php $questions = $this->question_m->get_all_questions($survs->survey_id);   
				if(count($questions)): foreach($questions as $i => $quest): 
				?>    
                            
                            
				<div class="grouped fields">
                                    
					<div class="field">
					<label>Q U E S T I O N </label>
                                        
                                        <input type="hidden" name="question[<?php echo $i; ?>][q_id]" value="<?php echo $quest->question_id; ?>"/>
					<p name ="question[<?php echo $i; ?>][q_data]" ><?php echo $quest->question_data; ?></p>
					</div>
					<div class="grouped fields">
						<?php 
		
							if($quest->question_type == 'Single')
								$qs_type = "radio";
							else if($quest->question_type == 'Multiple' || $quest->question_type == 'Combination')
								$qs_type = "checkbox";
							
						?>
						<div class=" two fields">
                                                    
				      		<div class="field">
                                                 
						<label>Choices:</label>
                                                
                                                    <?php $choices = $this->choice_m->get_all_choices($quest->question_id); 
							$ctr =0; if(count($choices)): foreach($choices as $cho): 
							?>
                                                
						<input type="hidden" name="question[<?php echo $i; ?>][c_id][]" value="<?php echo $cho->choice_id; ?>"/> 
						<input type="<?php echo $qs_type; ?>" name="question[<?php echo $i; ?>][choices_item][]" >
                                                <label><?php echo $cho->choice_data; ?></label>
                                                
                                           
							</div>
                                                        
						<?php endforeach; ?>
							<?php endif; ?>
							<?php
								if($quest->question_type == 'Combination'):
							?>  
							<label>Others: </label>
							<input type='text' name="question[<?php echo $i; ?>][others]">
							<?php endif; ?>  
							</div>
					<div class="ui divider"></div>
					<?php endforeach; ?>
						<?php endif; ?>
						
						
			<div class="center aligned column">
                        <button id="submit_forms" type="submit"  class="tiny ui submit blue button" >Submit Survey</button>	
			</div>
					</div>
					
				</div>
			
				  </div>
			

			
			
			
		</form>
		
	</div>
</div>
</div>
		
		<!-- MODAL for student login-->
		
		<div class="ui modal" id="studSurvey">
		
		<div class="header">
				Student Verification
			</div>
			
			<div class="content">
			<div class="description">
      <p>You are about to submit your survey</p>
    </div>
			<div class = "ui centered grid">
			<div class ="ten wide centered aligned column">
			
				<h3>Once your answers are submitted, you can no longer take the same survey</h3>
		
				
				</div>
				</div>
				</div>
				
				<div class = "actions" >
			
				
				  <div class="ui negative labeled button" >
					Go Back To Survey
				  </div>
				 
				  <div class="ui positive labeled button" type="Submit" value="Submit">
					Submit
				  </div>
			
			
			  </div>
                 
			  </div>
		
