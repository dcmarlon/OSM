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
    
         
                    <?php if($surv['status'] =='Available'):?>
                    <?php echo btn_editTwo('admin/survey/edit/' . $surv['id']); ?>
                    <?php endif; ?>
                     
                     <?php if(($surv['status'] =='Unavailable')|| ($surv['status'] =='Active')):?>
                         <?php echo btn_report('admin/viewResults/view_results/' . $surv['id']); ?>
                     <?php endif; ?>

    </div>
     </div>  
            
</div> 

</body>
        </html>