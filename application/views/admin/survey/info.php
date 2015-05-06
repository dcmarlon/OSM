<div class="ten wide column">
    			<h2>Survey Information
    			&nbsp;&nbsp;&nbsp;&nbsp;
           
                        </h2> 
<table class="ui very basic table">
	<tr>
		<td><strong>No.</strong></td>
		<td><?php echo $surv['id']; ?></td>
	</tr>
	<tr>
		<td><strong>Survey Name :</strong></td>
		<td><?php echo  $surv['name']; ?></td>
	</tr>
	<tr>
		<td><strong>Created Date :</strong></td>
		<td><?php echo date("m - d - Y ", strtotime($surv['date_created'])); ?></td>
	</tr>
	<tr>
		<td><strong>Issued Date :</strong></td>
		<td><?php if(date("m - d - Y ", strtotime($surv['date_issued'])) > "01 - 01 - 2000")
                                echo date("m - d - Y ", strtotime($surv['date_issued']));
                              else
                                  echo "N/A"; ?>  </td>
	</tr>
	<tr>
		<td><strong>Status Code :</strong></td>
		<td><?php echo $surv['status'] ?></td>
	</tr>
</table>
        
           
       
           
    <div class ="row">   
   
          <?php echo anchor('admin/survey', '<button class="tiny ui button">Back</button> '); ?>
        
        
        
                     <?php if(($surv['status'] =='Available')):?>          
                          <?php echo btn_editTwo('admin/survey/edit/' . $surv['id']); ?>                  
                     <?php endif; ?>
        
                    <?php if(!($check =='Active')):?>
                             
                        <?php if(($surv['status'] =='Available')):?>          
                            <button id="survey_act"  class="tiny ui blue button" type="button" value="<?php echo $surv['id']; ?>"  >Activate Survey</button>       
                     <?php endif; ?>
                    
                  <?php endif; ?>
                            
                            
             
                            
                            
                     <?php if(($surv['status'] =='Unavailable')):?>
                         <?php echo btn_report('admin/viewResults/view_results/' . $surv['id']); ?>
                     <?php endif; ?>
        
                      <?php if(($surv['status'] =='Active')):?>
                         <?php echo btn_report('admin/viewResults/view_results/' . $surv['id']); ?>
                          <button id="survey_deact" class="tiny ui red button" type="button" value="<?php echo $surv['id']; ?>"  >Deactivate Survey</button>
                     <?php endif; ?>
                    
      
    </div>
     </div>  
            
</div> 

     <!--Javascript-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.confirm.js'); ?>"></script>

<script>
    $(document).ready(function(){

       $(document).on("click","#survey_act", function(){ 

                                 //  alert(this.value);
                                         idx = this.value;
                                         
                         if(confirm("Do you want to Active this survey?" )){                      		

                             $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url('index.php/admin/survey/act_surveyby_id/')?>/"+idx,
                                           //   data: $(this).serialize(),

                                    })
                                            
                                          alert('You Successfully Activated the Survey!');
                                                       location.reload();
                                                  
                           }else{
                            
                                alert("You cancelled!");
                            
                           }
                            });
                            
         $(document).on("click","#survey_deact", function(){ 

                             //  alert(this.value);
                                     idx = this.value;

                   if(confirm("Do you want to deactivate the survey?" )){                     

                         $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url('index.php/admin/survey/deact_surveyby_id/')?>/"+idx,
                                       //   data: $(this).serialize(),

                                })

                                      alert('You Successfully Deactivated the Survey!');
                                                   location.reload();


                  
                        
                       }else{
                        
                                alert("You cancelled!");
                       }
                        
                         });     
                    
                            
    
    
      });
    
    
    
</script>









</body>
        </html>