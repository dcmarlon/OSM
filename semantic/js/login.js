$(document).ready(function() {
			$('#fullpage').fullpage({
				verticalCentered: false				
			}); 
			
			$('#takeSur').on( "click", function() {
			$('#studSurvey').modal({
				closable  : false,
			  })
			  .modal('show');
                  
                        $("#idnum").on("input propertchange", function(){
                                // Remove all non-number character.
                                var validNumber = $("#idnum").val().replace(/[^0-9]/g,"");
                                $("#idnum").val(validNumber);
                              });

		
		}); 
                
                
                
	});