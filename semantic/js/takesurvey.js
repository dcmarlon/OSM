$(document).ready(function() {
			$('#fullpage').fullpage({
				verticalCentered: false				
			}); 
			
			$('#takeSur').on( "click", function() {
			$('#studSurvey').modal({
				closable  : false,
			  })
			  .modal('show');

		
		}); 

		//$('.grouped.fields.radio1').checkbox();
		$('.grouped.fields.cb').checkbox();

		$('.grouped.fields.radio2').checkbox();				
	});s