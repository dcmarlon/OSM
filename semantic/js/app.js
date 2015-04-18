$(document).ready(function(){
    
    $('#datatables').dataTable();
    
         $('.ui.dropdown')
        .dropdown();
        $('.ui.checkbox')
  .checkbox();
    
    
    
});

	


	$(document).ready(function() {
			//$('#button_view_results').on("click", function () {
			//		$('#modal_view_results').modal('show');
			//	})
                    //	;
                    $('#button_view_results').on("click", function () {
                        $('#modal_view_results').modal('setting', 'transition','vertical flip').modal('show')
                        })
                    ;
       
            })
	;