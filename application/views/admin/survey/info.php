<div class="ten wide column">
	<h2>Information </h2>

<table class="ui very basic table">
	<tr>
		<td>No</td>
		<td><?php echo $survs->survey_id; ?></td>
	</tr>
	<tr>
		<td>Survey Name</td>
		<td><?php echo  $survs->survey_name; ?></td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td><?php echo date("m - d - Y ", strtotime($survs->created_date)); ?></td>
	</tr>
	<tr>
		<td>Issued Date</td>
		<td><?php if(date("m - d - Y ", strtotime($survs->issued_date)) > "01 - 01 - 2000")
                                echo date("m - d - Y ", strtotime($survs->issued_date));
                              else
                                  echo "N/A"; ?>  </td>
	</tr>
	<tr>
		<td>Status </td>
		<td><?php echo $survs->status; ?></td>
	</tr>
</table>
       
             <div class="pull-right">
                <tr>
               
                    <td><?php echo btn_editTwo('admin/survey/edit/' . $survs->survey_id); ?></td>
               <td><?php echo btn_report('admin/survey/edit/'. $survs->survey_id); ?> </td
                </tr>
            </div>              
</div>