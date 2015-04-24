<h3><?php echo empty($survey->id) ? 'Add a new survey' : 'Edit survey ' . $survey->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">

		<td>Survey Name</td>
		<td><?php echo form_input('survey_name', set_value('survey_name ', $survey->survey_name)); ?></td>
	</tr>
		<tr>
		<td>Publication date</td>
		<td><?php echo form_input('created_date', set_value('created_date', $survey->created_date), 'class="datepicker"'); ?></td>
	</tr>
	<tr>
		<td>Issued date</td>
		<td><?php echo form_input('issued_date', set_value('issued_date', $survey->issued_date), 'class="datepicker"'); ?></td>
	</tr>
        
     	<tr>
		<td>Status</td>
		<td><?php echo form_dropdown('status', $status, $survey->status); ?></td>
	</tr>
	<tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
