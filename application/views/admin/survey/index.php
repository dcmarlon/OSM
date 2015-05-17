
<div class="twelve wide column">
    <div class="row"><h2>Archives of Survey</h2></div>
    			<h4><?php echo $meta_title; ?>
    			&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo anchor('admin/survey/add', '<button class="tiny ui green button">Add Survey</button> '); ?>
                        </h4> 

<table id ="datatables" class="ui very basic table">
    <thead>
  	<tr>
            <th></th>
            <th>No.</th>
            <th>Name</th>
            <th>Created</th>
            <th>Issued</th>
            <th>Status Code</th>
  	</tr>
    </thead>	
    <tbody>
        <?php if(count($survey)): foreach($survey as $sur): ?>	
            <tr>
                   
                     <td><?php echo btn_editThree('admin/survey/info_details/' . $sur->survey_id); ?></td>
                   
                    <td><?php echo $sur->survey_id; ?></td>
                    <td><?php echo $sur->survey_name; ?></td>
                    <td><?php echo date("m - d - Y ", strtotime($sur->created_date)); ?></td>
                    <td><?php if(date("m - d - Y ", strtotime($sur->issued_date)) > "01 - 01 - 2000")
                                echo date("m - d - Y ", strtotime($sur->issued_date));
                              else
                                  echo "N/A"; ?>    
                    </td>
                    <td><?php echo $sur->status; ?></td>
            </tr>    
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
	<script type="text/javascript" src="<?php echo base_url('semantic/js/app.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/testing.js'); ?>"></script> 
                 

        <script>
            $(document).ready(function(){
    
                      var oTable = $('#datatables').dataTable();
                      oTable.fnSort( [ [5,'asc'] ] );

            });

        </script>
        
</body>
        </html>