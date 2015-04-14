
<div class="ten wide column">
    			<h4><?php echo $meta_title; ?>
    			&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo anchor('admin/survey/edit', '<button class="tiny ui green button">Add Survey</button> '); ?>
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
                    <td><?php echo btn_editThree('admin/survey/watch/' . $sur->survey_id); ?></td>
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
                    <td colspan="3">We could not find any users.</td>
            </tr>
         <?php endif; ?>	
    </tbody>
</table>
    
  </div>