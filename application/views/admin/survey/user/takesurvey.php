<?php $this->load->view('admin/components/takesurvey_head'); ?>

<!-- MENU HEADER -->
<div class= "sixteen wide column">
		<div class = "ui large fixed inverted menu">
		<div class="title item">	
			TC Surveys
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
	<h3>Survey Title</h3>
		<div class="column">

		<form>
			<div class = "column" id = "q_section">
				<p>1. Sample Question asdf asdf asdf asdf asdf ?</p>
					<fieldset>
					<div class="grouped fields radio1" >
				    
				     
				        <input type="radio" name="fruit">
				        <label>Apples</label>
				      
				    
				        <input type="radio" name="fruit">
				        <label>Oranges</label>
				      
				    
				      
				        <input type="radio" name="fruit">
				        <label>Pears</label>s
				      
				   
				      
				        <input type="radio" name="fruit">
				        <label>Grapefruit</label>
				      
				    </div>
					</fieldset>
				  </div>
			

			<div class = "column" id = "q_section">
				<p>2. Cause tonight is the night when two become?</p>
					<fieldset>
					<div class="grouped fields cb" id="cb1">
				    <div class="field">
				      <div class="checkbox">
				        <input type="checkbox" name="fruit">
				        <label>one</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="checkbox">
				        <input type="checkbox" name="fruit">
				        <label>three</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="checkbox">
				        <input type="checkbox" name="fruit">
				        <label>four</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="checkbox">
				        <input type="checkbox" name="fruit">
				        <label>one</label>
				      </div>
				    </div>
				  </div>
				  </fieldset>
			</div>

			<div class = "column" id = "q_section">
				<p>3. I'm not a girl, not yet a?</p>
					<fieldset>
					<div class="grouped fields radio2" id="rd1">
				    <div class="field">
				      <div class="radio">
				        <input type="radio" name="fruit">
				        <label>woman</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="radio">
				        <input type="radio" name="fruit">
				        <label>man</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="radio">
				        <input type="radio" name="fruit">
				        <label>lesbian</label>
				      </div>
				    </div>
				    <div class="field">
				      <div class="radio">
				        <input type="radio" name="fruit">
				        <label>other</label>
				        <input type="text" id="otherchoice">
				      </div>
				    </div>
				  </div>
				  </fieldset>
			</div>
			<div class="center aligned column">
			<input class="huge ui green button" type="submit" value = "Submit Answers" id='subsurvey'>	
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
		

<?php $this->load->view('admin/components/takesurvey_tail'); ?>