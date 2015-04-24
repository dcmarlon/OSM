    <html>
    <head>
        <title>Create Elements Dynamically using JQuery</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <link href="<?php echo base_url('semantic/css/semantic.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('semantic/js/semantic.js'); ?>"></script>


    </head>


    <body>
<section id="contact-page" class="container">
	<div class="container">
		<div class="col-sm-12">
			
			<div class="status alert alert-success display-none"></div>
			<form method="post" action="<?php echo base_url();?>incidentreport/add" role="form">
				<div class="row clearfix">
					
					<div class="col-md-6 column">

			<h3>Add Survey</h3>
				<div class="form-group">
							<span>Survey Name</span>
							<input type="text" name="survey_name" class="form-control" required="required">
				</div>                    
		</div>

			<div class="col-md-6 column">
		<div id="summonedcon">
			<h3>Summoned</h3>
							<br>
							<h5>Enter valid Summoned info. 1:</h5>
			
							<input type="text" name="question_name" class="form-group form-control" required="required" placeholder="Question">
					
							<select class="form-group form-control" name="question_status" required="required">
								<option value="" disabled default selected class="display-none">Question Type</option>
								<option value="Single">Single</option>
								<option value="Multiple">Multiple</option>
								<option value="Combination">Combination</option>
							</select>
								
					<div id="summonedchoi">

						<h5>Choices:</h5>

						<div class="summonchoi_try">	
                                                    <div>
							<input type="text" name="choice_data[]" class="form-group form-control" required="required" placeholder="Choice">
                                                    </div>    
						</div>

                                           <div>				
					   <button id="add_summonedchoi" type="button"  class="btn btn-info">Add</button>
					   <button id="rmv_summonedchoi" type="button"  class="btn btn-info">Clear</button>
                                           <div>
					
					</div>				


					
				   <button id="add_summoned" type="button"  class="btn btn-info">Add</button>
				   <button id="rmv_summoned" type="button"  class="btn btn-info">Remove</button>
				</div>

			<div class="row clearfix">
			<button type="submit" name="addlist" class="btn btn-lg submit-button">Submit Form</button>
			</div>
		</div>
		
	</form>                   
		 </div>
		</div>
</section>
    </body>

<script type="text/javascript">
      ctr =1;   
  $(document).ready(function(){
    
               var max_fieldsone      = 5; //maximum input boxes allowed
                //        var wrapper         = $(".input_fields_wrap");    //Fields wrapper
                //    	var add_button      = $(".add_field_button"); //	Add button ID
                                //on add input button click 
        
                var i = 1; //initlal text box count
	    $("#add_summonedchoi").click(function(){ 
              
	      //  e.preventDefault();
                   
	        if(i < max_fieldsone){ //max input box allowed
	             i++; //text box increment
	            $(".summonchoi_try").append(
	            '<div id="cc'+ i +'">'
	            +'<input id = "ci'+ i +'" type="text" name="choice_data[]" class="form-group form-control" required="required" placeholder="Choice"/>'
	            +'<a href="#" id="remove_field"> X </a></div>'); //add input box
                   
	        }
	    });
	    
	    $(".summonchoi_try").on("click","#remove_field", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); i--;
	    });
            
            
            
            $("#rmv_summonedchoi").click (function(){
                
                            if(i!=1){
                          $("#cc" + i).empty();
                          $("#ci" + i).remove();
//                        $("#remove_field" + i).remove();
                        i -= 1;
                  }
                  i=1;
            });

        
        
        




          // var x=1;
	$("#add_summoned").click(function(){
               // e.prevenDefault();
                              ctr+=1;
	  $("#summonedcon").append(
		'<br id="sb'+ ctr +'"><h5 id="st'+ ctr +'">Enter valid Summoned info. '+ ctr +':</h5>'
		+ '<input id="sn'+ ctr +'" type="text" name="aquestion_name[]" class="form-group form-control" required="required" placeholder="Question Name">'
		+ '<select id="sg'+ ctr +'" class="form-group form-control" name="aquestion_type[]" required="required">'
		+ '<option value="" disabled default selected class="display-none">Question Type</option>'
		+ '<option value="Single">Single</option>'
		+ '<option value="Multiple">Multiple</option>'
		+ '<option value="Combination">Combination</option>'
		+'</select>'
                +'<div id="summonchoi_two'+ ctr +'">'
                +'<h5 id="in_h'+ ctr +'">Choices</h5>'
                +'<div id="in_d'+ ctr +'">'
                +'<input type="text" name="choice_data[]" class="form-group form-control" required="required" placeholder="Choice"></div>'
                +'<button id="add_summonedchoi_two'+ ctr +'" type="button"  class="btn btn-info">Add Choice</button>'
                +'<button id="rmv_summonedchoi_two'+ ctr +'" type="button"  class="btn btn-info">Clear</button>'
                +'</div>'				  
		)
                    
                    num = ctr;

	});
        
        
        
        	var max_fields      = 5; //maximum input boxes allowed   
                  var x = 1; //initlal text box count                
         
	    $("#add_summonedchoi_two" +  num).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $("#in_d" +  num).append(
	            '<div id="cc'+ x +'">'
	            +'<input id = "ci'+ x +'" type="text" name="choice_data_two[] class="form-group form-control" required="required" placeholder="Choice"/>'
	            +'<a href="#" id="remove_field_two"> X </a>'+'</div>'); //add input box

	        }
	    });
            
	    $("#in_d" +  num).on("click","#remove_field_two", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); x--;
	    });
        
        
        
        

	$("#rmv_summoned").click(function(){
	  if(ctr!=1){
		$("#sb" + ctr).remove();
		$("#st" + ctr).remove();
		$("#sn" + ctr).remove();
		$("#sg" + ctr).remove();
                $("#summonchoi_two" + ctr).remove();
                $("#in_h" + ctr).remove();
                $("#in_d" + ctr).remove();
                $("#in_e" + ctr).remove();
                
                
                
                
//		$("#ct" + ctr).remove();
//		$("#cc" + ctr).remove();
//		$("#ci" + ctr).remove();
		ctr -= 1;
	  }
	});
  });


</script>

    </html>

