<!DOCTYPE html>
<html lang="en">
  <head>
<!--      <link href="semantic/components/table.css" rel="stylesheet"/>-->
      
   <link href="<?php echo base_url('semantic/components/table.css'); ?>" rel="stylesheet/less">
   
   
<!--      <link href="semantic/components/form.css" rel="stylesheet"/>-->
      
         <link href="<?php echo base_url('semantic/components/form.css'); ?>" rel="stylesheet/less">
         
<!--         
      <link href="semantic/components/grid.css" rel="stylesheet"/>-->
      
          <link href="<?php echo base_url('semantic/components/grid.css'); ?>" rel="stylesheet/less">
          
<!--          
      <link href="semantic/components/dropdown.css" rel="stylesheet"/>-->
       
          <link href="<?php echo base_url('semantic/components/dropdown.css'); ?>" rel="stylesheet/less">
          
<!--      <link href="semantic/css/semantic.css" rel="stylesheet"/>-->
      
         <link href="<?php echo base_url('semantic/css/semantic.css'); ?>" rel="stylesheet/less">
      <!-- REQUIRED: jquery, lodash, dust-linkedin -->
    <!-- build:js js/libs.min.js -->
<!--    <script src="semantic/js/libs.min.js"></script>-->
    
        <script type="text/javascript" src="<?php echo base_url('semantic/js/libs.min.js'); ?>"></script>
    <!-- endbuild -->

    <!-- build:js js/formbuilder.min.js -->
<!--    <script src="semantic/js/formbuilder.js"></script>-->
    
        <script type="text/javascript" src="<?php echo base_url('semantic/js/formbuilder.js'); ?>"></script>
    <!-- endbuild -->
<!--    <link href="semantic/css/formbuilder.css" media="screen" rel="stylesheet" />-->
                    
          <link href="<?php echo base_url('semantic/css/formbuilder.css'); ?>" rel="stylesheet/less">
    

    <!--<script type="text/javascript" src="dist/jquery.js"></script>-->
<!--    <script type="text/javascript" src="semantic/js/semantic.js"></script>-->
    
    
    <script type="text/javascript" src="<?php echo base_url('semantic/js/semantic.js'); ?>"></script>
     <script type="text/javascript">
     $(document).ready(function(){
     $('.ui.dropdown')
        .dropdown();
        $('.ui.checkbox')
  .checkbox();
     });
      </script>
      <script>

      // On document ready
      $(function(){
          $.getJSON( 'fake-form-db-vals.json', function(resp){
                   var myForm = new formbuilder({
                    targets: $('.formbuilder'),
                    save: function(formData){
                      console.log(formData);
                    }
                    });
                });
      });
      </script>

    <title>Admin Panel</title>
    
  </head>
  
    <body>

      

      <div class="ui grid">
        <div class="row"></div>
        <div class="three wide column"></div>
        <div class="ten wide column" style="background-color: #BDBDB8">
          <h3 class="ui header">Today's <b style="color:red">Carolinian</b>
            <div class="sub header">Administration Area</div>
          </h3>
        </div>
        <div class="row"></div>
        <div class="three wide column"></div>
        <div class="ten wide column">
          <h4>Create Survey
          &nbsp;&nbsp;&nbsp;&nbsp;
          <div class="ui small input"> 
            <input type="text" placeholder="Add Survey Title">
          </div>
        </h4> 
      
      <div class="row"></div>
      <div class="three wide column"></div>
     

      
      <div class="formbuilder"></div>
      
  
      </div>
      
      </div>


      </body>
     

</html>