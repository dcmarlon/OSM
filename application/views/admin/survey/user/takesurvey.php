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

		<form class="ui form" id="takeform" method="post" action="<?php echo base_url('/user/student/answers_add');?>" role="form">
           
                    
                          <input type="hidden" name="person"  value="<?php echo $users; ?>" />
                          <input type="hidden" name="school" value="<?php echo $college; ?>" />
 
			<?php if(count($survs)): ?>
                    <br>
                    <div class="field">
			<h2 style="color: black">S U R V E Y : <?php echo $survs->survey_name ?></h2>
                    </div>

			<?php endif; ?>
                    <p>Hello, <strong> <?php echo $users;?></strong> </p>
                    
                    
			<div class = "row" id = "q_section">
                            
				<?php $questions = $this->question_m->get_all_questions($survs->survey_id);   
				if(count($questions)): foreach($questions as $i => $quest): 
				?>    
                            
                            
				<div class="grouped fields">
                                    
					<div class="field">
					<label>Q U E S T I O N </label>
                                        <br>
                                        
                                        <input type="hidden" name="question[<?php echo $i; ?>][q_id]" value="<?php echo $quest->question_id; ?>"/>
					<p name ="question[<?php echo $i; ?>][q_data]" ><?php echo $quest->question_data; ?></p>
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
                                                 
						<label>C h o i c e s:</label>
                                                <br>
                                                <br>
                                                
                                                    <?php $choices = $this->choice_m->get_all_choices($quest->question_id); 
							if(count($choices)): foreach($choices as $x => $cho): 
							?>
                                                
						<input type="hidden" name="question[<?php echo $i; ?>][c_id][]" value="<?php echo $cho->choice_id; ?>"/> 
						<input type="<?php echo $qs_type; ?>" name="question[<?php echo $i; ?>][choices_item][]" value="<?php echo $cho->choice_id; ?>" >
                                                <label><?php echo $cho->choice_data; ?></label>
                                                
                                                
                                                     <?php if(strtoupper($cho->choice_data) == 'OTHERS'):?>
                                                
                                                        <input type="text" placeholder="Please Specify" >
                                                
                                                     <?php endif;?>
                                                
                                           
							</div>
                                                        
						<?php endforeach; ?>
							<?php endif; ?>
					
							</div>
					<div class="ui divider"></div>
					<?php endforeach; ?>
						<?php endif; ?>
						
						
			<div class="center aligned column">
                        <button id="submit_forms" type="submit"  class=" ui submit green button" onclick="return confirm('Do you want to submit?'); return false; ">Submit Survey</button>	
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
		
