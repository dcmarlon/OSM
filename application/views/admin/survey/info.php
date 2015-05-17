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
        
           
       
    <div class="row">
        <div class="left floated right aligned six wide column">
                     <?php echo anchor('/admin/survey', '<button class="tiny ui button">Back</button> '); ?>
        </div>
             <div class ="right floated left aligned six wide column">


                         <?php if(($surv['status'] =='Available')):?>          
                              <?php echo btn_editTwo('/admin/survey/edit/' . $surv['id']); ?>                  
                         <?php endif; ?>

                        <?php if(!($check =='Active')):?>

                             <?php if(($surv['status'] =='Available')):?>          
                                <button id="survey_act"  class="tiny ui blue labeled icon button" type="button" value="<?php echo $surv['id']; ?>"  ><i class="unlock alternate icon"></i>Activate Survey</button>       
                             <?php endif; ?>

                         <?php endif; ?>

                         <?php if(($surv['status'] =='Unavailable')):?>
                             <?php echo btn_report('admin/survey/view_results/' . $surv['id']); ?>
                         <?php endif; ?>

                          <?php if(($surv['status'] =='Active')):?>
                             <?php echo btn_report('admin/survey/view_results/' . $surv['id']); ?>
                              <button id="survey_deact" class="tiny ui red labeled icon button " type="button" value="<?php echo $surv['id']; ?>"  ><i class="lock icon"></i>Deactivate Survey</button>
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
                                         idx = this.value;
                                         
                         if(confirm("Do you want to Active this survey?" )){                      		
                             $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url('/admin/survey/act_surveyby_id/')?>/"+idx,
                                    })
                                            
                                          alert('You Successfully Activated the Survey!');
                                                       location.reload();                                              
                           }else{
                            
                                alert("You cancelled!");
                            
                           }
         });
                            
         $(document).on("click","#survey_deact", function(){ 
                                     idx = this.value;

                   if(confirm("Do you want to deactivate the survey?" )){                     

                         $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url('/admin/survey/deact_surveyby_id/')?>/"+idx,
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