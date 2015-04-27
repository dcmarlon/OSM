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
<div class="ui grid">
	<div class="twelve wide column">
	

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