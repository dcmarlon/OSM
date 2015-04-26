<?php $this->load->view('admin/components/login_head'); ?>

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

	
	<!-- FULL PAGE BODY -->
<div id="fullpage">

	

	<div class="section " id="section0">
		<div class="intro">
			<h1>Welcome to TC Surveys</h1>
			<div class="ui huge red inverted button" id="takeSur">Take Our Survey</div>
		</div>
	</div>
	<div class="section" id="section1">
	
				<h1>Today's CAROLINIAN</h1>
				<h3>The Official Progressive Student Publication of USC</h3>
			</div>

	<div class="section" id="section2">
		
			<h1>Our Commitment Your Paper</h1>
	</div>
		</div>

		
		<!-- MODAL for student login-->
		
		<div class="ui modal" id="studSurvey">
		
		<div class="header">
				Student Verification
			</div>
			
			<div class="content">
			<div class="description">
      <p>Please enter your ID number and select your college</p>
    </div>
			<div class = "ui centered grid">
			<div class ="five wide centered aligned column">
			
				
				
		<form class ="ui form" action='<?php echo base_url();?>login/process' method='post' name='process'>
                          <?php if(! is_null($msg)) echo $msg;?>
				<div class = "required field" id="nm">
				<label>Enter ID Number:</label>
				<input id = "idnum" type="text" class="form-control" placeholder="ID Number" name='idnum' required autofocus><br>
				</div>
				
				
				
				
				<div class = "required field">
				<label>College:</label>
				<select id ="coll" name='coll' class='form-control' required >
								<option value=' '> </option>
								<option value='cas'>College of Arts and Sciences</option>
								<option value='coe'>College of Engineering</option>
								<option value='cafa'>College of Architecture and Fine Arts</option>
								<option value='coed'>College of Education</option>
								<option value='slg'>School of Law and Governance</option>
								<option value='shcp'>School of Health Care Professions</option>
								<option value='sbe'>School of Business and Economics</option>
				</select><br><br>
				</div>
							
			   </form>  	
				
				</div>
				</div>
				</div>
				
				<div class = "actions" >
			
				
				  <div class="ui negative labeled button" >
					Cancel
				  </div>
				 
				  <div class="ui positive labeled button" type="Submit" value="Submit">
					Submit
				  </div>
			
			
			  </div>
                 
			  </div>
		

<?php $this->load->view('admin/components/login_tail'); ?>