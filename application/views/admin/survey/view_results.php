<div class="ten wide column">
   <!-- <h4> <?php echo $surv['name']; ?> </h4>
    
    <div class="ui floating labeled icon dropdown button">
    <i class="filter icon"></i>
    <span class="text">Filter by</span>
    <div class="menu">
      <div class="item">
        All
      </div>
      <div class="item">
        College of Arts and Sciences
      </div>
      <div class="item">
        College of Education
      </div>
      <div class="item">
        School of Business and Accountancy
      </div>
    </div>
  </div> !-->
    
    <select name="filter"> 
    <option selected>
        ALL
    </option>
    <option> 
    CAS
    </option> 
    <option> 
    SBE
    </option> 
    <option> 
    CAFA
    </option> 
    <option> 
    COED 
    </option> 
    <option> 
    SLG
    </option> 
</select> 
    
    <p> 
       <?php foreach ($res as $q): 
           
            echo $q['question_data'];
            echo "<br>";
            foreach ($choices as $c): 
                
                echo $c['choice_data'];
                echo "<br>";
                endforeach;
                
            echo "<br>";
            
                
        endforeach;?>
    
    </p>
</div>