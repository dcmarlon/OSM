
<div class="twelve wide column">
    <div class="row"><h2>Archives of Survey</h2></div>
    			<h4>
    			&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo anchor('admin/survey/add', '<button class="ui green labeled icon button"><i class="add square icon"></i>Add Survey</button> '); ?>
                        </h4> 
<table id ="datatables" cellpadding="0" cellspacing="0" border="0"  width="100%" class="ui red table display" >
    <thead>
  	<tr>
            <th></th>
            <th>No.</th>
            <th>Name</th>
            <th>Created Date</th>
            <th>Issued Date</th>
            <th>Status Code</th>
  	</tr>
    </thead>	
    <tbody>
        <?php if(count($survey)): foreach($survey as $sur): ?>	

                   
                       <?php if(($sur->status =='Active')):?>            
                        <tr class="positive">
                        <td> <?php echo anchor('admin/survey/info_details/'. $sur->survey_id, '<button class=" ui blue labeled icon button" ><i class="file text outline icon"></i>View Survey</button>'); ?></td>                 
                        <td><?php echo $sur->survey_id; ?></td>
                        <td><?php echo $sur->survey_name; ?></td>
                        <td><?php echo date("m - d - Y ", strtotime($sur->created_date)); ?></td>
                        <td><?php if(date("m - d - Y ", strtotime($sur->issued_date)) > "01 - 01 - 2000")
                                    echo date("m - d - Y ", strtotime($sur->issued_date));
                                  else
                                      echo "N/A"; ?>   
                        <td><?php echo $sur->status; ?></td>
                        </tr> 
                        <?php endif; ?>
                        
                        <?php if(($sur->status =='Available')):?>  
                   
                        <tr class="warning">
                        <td> <?php echo anchor('admin/survey/info_details/'. $sur->survey_id, '<button class=" ui blue labeled icon button" ><i class="file text outline icon"></i>View Survey</button>'); ?></td>  
                        <td><?php echo $sur->survey_id; ?></td>
                        <td><?php echo $sur->survey_name; ?></td>
                        <td><?php echo date("m - d - Y ", strtotime($sur->created_date)); ?></td>
                        <td><?php if(date("m - d - Y ", strtotime($sur->issued_date)) > "01 - 01 - 2000")
                                    echo date("m - d - Y ", strtotime($sur->issued_date));
                                  else
                                      echo "N/A"; ?>   
                        <td><?php echo $sur->status; ?></td>
                        </tr> 
                        <?php endif; ?>
                        
                        <?php if(($sur->status =='Unavailable')):?>
                   
                        <tr class="active">
                         <td> <?php echo anchor('admin/survey/info_details/'. $sur->survey_id, '<button class=" ui blue labeled icon button" ><i class="file text outline icon"></i>View Survey</button>'); ?></td>  
                        <td><?php echo $sur->survey_id; ?></td>
                        <td><?php echo $sur->survey_name; ?></td>
                        <td><?php echo date("m - d - Y ", strtotime($sur->created_date)); ?></td>
                        <td><?php if(date("m - d - Y ", strtotime($sur->issued_date)) > "01 - 01 - 2000")
                                    echo date("m - d - Y ", strtotime($sur->issued_date));
                                  else
                                      echo "N/A"; ?>   
                        <td><?php echo $sur->status; ?></td>
                        </tr> 
                        <?php endif; ?>  
         <?php endforeach; ?>
         <?php else: ?>
            <tr>
                    <td colspan="3">We could not find any surveys.</td>
            </tr>
         <?php endif; ?>	
    </tbody>
</table>
    
  </div>
  

	
        <!--Javascript-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/semantic.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/components/modal.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('dtables/media/js/jquery.dataTables.js'); ?>"></script>
                 

        <script>
            $(document).ready(function(){
    
                      var oTable = $('#datatables').dataTable();
                      oTable.fnSort( [ [5,'asc'] ] );

            });

        </script>
        
</body>
        </html>