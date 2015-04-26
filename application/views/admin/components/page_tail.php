	
        <!--Javascript-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/semantic.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/components/modal.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('dtables/media/js/jquery.dataTables.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('semantic/js/app.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('semantic/js/testing.js'); ?>"></script> 
                 


        
</body>

<script type="text/javascript">
$(document).ready(function(){
    var q_num =1, c_num = 1;

	if( $('.question_main > div[class*="questions"]').length == 1)
		$('#remove_question').attr("disabled","disabled");
		
	$('#remove_choiceItem').attr("disabled","disabled");
	
	$('#rr').click(function(){
		alert($('.cnt > div[id*="re"]').length);
	});
	
	$(document).on("click","#remove_question", function(){
		q_num-=1;
		if($('.question_main > div[class*="questions"]').length == 50)
			$('#add_question').removeAttr("disabled");
		
		
		$('.question_main > div.questions').last().remove();
		if( $('.question_main > div[class*="questions"]').length == 1)
		    $('#remove_question').attr("disabled","disabled");
		
		
	});
	
	$(document).on("click","#add_question", function(){
            q_num +=1;
		if($('.question_main > div[class*="questions"]').length == 1)
			$('#remove_question').removeAttr("disabled");
		
		var questionItem = $("#question_hid").html();
		$('.question_main').append(questionItem);
		
		if($('.question_main > div[class*="questions"]').length == 50)
			$('#add_question').attr("disabled","disabled");	
	});
	
	$(document).on("click","#add_choiceItem", function(){
                    c_num += 1;
		 if($(this).siblings("#choice_sub").children().length == 1)
			$(this).siblings('#rmv_choiceItem').removeAttr("disabled");
		
		$(this).siblings("#choice_sub").append(' <input type="text" name="choices_item[]" class="form-group form-control" required placeholder="Choice">');
			
			 if($(this).siblings("#choice_sub").children().length == 5)
			$(this).attr("disabled","disabled");	
	});
	$(document).on("click","#rmv_choiceItem", function(){
            c_num -= 1;
	    if($(this).siblings("#choice_sub").children().length == 5)
			$(this).siblings('#add_choiceItem').removeAttr("disabled");
		
		$(this).siblings("#choice_sub").children().last().remove();
		if($(this).siblings("#choice_sub").children().length == 1)
		$(this).attr("disabled","disabled");	
	});
	
		function myFunction() {
			confirm("Press OK to submit the Survey Form!");
		}
   

});
</script>	


        </html>