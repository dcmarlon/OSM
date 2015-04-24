<?php $this->load->view('admin/components/page_head'); ?>
    <div class="ui grid">
        
      
        <div class="row"></div>
    		<div class="three wide column"></div>
    		<div class="ten wide column" style="background-color: #BDBDB8">
    			<h3 class="ui header">Today's <b style="color:red">Carolinian</b>
    				<div class="sub header">Administration Area</div>
    			</h3>
                </div>
                
   
  
             <div class="ui centered grid" id="main">
                    <?php $this->load->view($subview); ?>
             </div>
                

                     <div class="row"></div>
                      <div class="three wide column"></div>
                      <div class="ten wide column" style="background-color: #37d249">
                          <footer><p>(c) Copyright 2015</p></footer>
                          
                      </div>  
            
       </div>       



<?php $this->load->view('admin/components/page_tail'); ?>