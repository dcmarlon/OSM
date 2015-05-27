<?php $this->load->view('admin/components/login_head'); ?>

<!-- MENU HEADER -->
<div class= "sixteen wide column">
            <div class = "ui large fixed inverted menu">
                        <div class="title item">	
                        Today's Carolinian Surveys
                        </div>

                        <div class="right menu" >
                        <a class="item" href="http://todayscarolinian.net/contact-us/">
                            
                        Contact Us
                        </a>
                            
                        <a class="item" href="http://todayscarolinian.net/">
                        TC Website
                        </a>
                            
                        <a class="item" href="https://www.facebook.com/todayscarolinian">
                        Facebook
                        </a>
                            
                       <a class="item" href="https://twitter.com/todaysusc">
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

                                <?php if(!($check =='Active')):?>

                                        <div class="ui huge red inverted button disabled"   id="takeSur">Take Our Survey</div>

                                        <?php else: ?>          
                                        <div class="ui huge red inverted button"  id="takeSur">Take Our Survey</div>
                                <?php endif; ?>
                        </div>
                </div>
                <div class="section" id="section1">
                        <h2>CAROLINIANS! Be a part of change</h2>
                        <h3>Our surveys won't take much of your time</h3>
                </div>

                <div class="section" id="section2">
                        <h1>Today's CAROLINIAN</h1>
                        <h2>Our Commitment Your Paper</h2>
                </div>
</div>

		
		<!-- MODAL for student login-->
		
<div class="ui basic modal" id="studSurvey">
                <i class="close icon"></i>
                <div class="header">
                Student Verification
                </div>

                    <div class="content">
                                    <div class = "ui centered grid">
                                                <div class ="ten wide centered aligned column">
                                                            <form class ="ui inverted form" action='<?php echo base_url('/user/student/takesurvey');?>' method='post'>
                                                                            <?php if(! is_null($msg)) echo $msg;?>
                                                                            <div class = "required field" id="nm">
                                                                                        <label>Enter ID Number:</label>
                                                                                        <input id = "idnum" type="tel"  minlength ="8" maxlength="8" pattern=".{8,}" required title="Only 8 numbers accepted!" class="form-control" placeholder="ID Number" name='idnum' required autofocus required><br>
                                                                            </div>
                                                                            <div class = "required field">
                                                                                        <label>College:</label>
                                                                                                <select id ="coll" name='coll' class='form-control'  required="required">
                                                                                                            <option value="" disabled default selected class="display-none">-Select your college- </option>
                                                                                                            <option value='cas'>College of Arts and Sciences</option>
                                                                                                            <option value='coe'>College of Engineering</option>
                                                                                                            <option value='cafa'>College of Architecture and Fine Arts</option>
                                                                                                            <option value='coed'>College of Education</option>
                                                                                                            <option value='slg'>School of Law and Governance</option>
                                                                                                            <option value='shcp'>School of Health Care Professions</option>
                                                                                                            <option value='sbe'>School of Business and Economics</option>
                                                                                                </select><br><br>
                                                                            </div>

                                                                            <div class="two fluid ui inverted buttons">
                                                                            <div class="ui inverted red basic button close icon" >

                                                                            Cancel
                                                                            </div>

                                                                            <input  type="Submit" class="ui inverted green basic button" value="Submit"/>

                                                                            </div>

                                                            </form> 
                                                </div>

                                    </div>
                    </div>

</div> 


<?php $this->load->view('admin/components/login_tail'); ?>