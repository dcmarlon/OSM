<?php $this->load->view('admin/components/page_head'); ?>
    <div class="ui grid">
        
      <div class= "sixteen wide column">
		<div class = "ui large menu" id="menutext">
		<div class="title item" id="menutext1">	
			Today's CAROLINIAN Surveys
		</div>
		
		
		
		<div class="right menu" >
		<div class="title item" id="menutext1">
		<i class="browser icon"></i>
			Administration Panel
		 </div>
		</div>
		
		</div>
	</div>
  
   
  
             <div class="ui centered grid" id="main">
                    <?php $this->load->view($subview); ?>
             </div>
                

<!--                     <div class="row"></div>
                      <div class="three wide column"></div>
                      <div class="sixteen wide centered column" style="background-color: #000000">
                          <footer id="foot"><p style="centered">(c) Copyright 2015</p></footer>
                          
                      </div>  -->
            
       </div>       



<?php $this->load->view('admin/components/page_tail'); ?>