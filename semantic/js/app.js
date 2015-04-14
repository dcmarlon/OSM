$(document).ready(function(){
    
    $('#datatables').dataTable();
    
         $('.ui.dropdown')
        .dropdown();
        $('.ui.checkbox')
  .checkbox();
    
    
    
});

	$(document).ready(function() {
			$('#fullpage').fullpage({
				verticalCentered: false				
			});
			
		$('#takeSur').on( "click", function() {
		$('#studSurvey').modal({
			closable  : false,
			onApprove : function() {
				
			  
			   
			  
			}
		  })
		  .modal('show');

	
	}); 
			
		});