<?php print_r($choices)?>
<div class="ten wide column">
    <h4> <?php echo $surv['name']; ?> </h4>
   
<form method="post" accept-charset="utf-8" action="<?php echo base_url('index.php/admin/viewResults/view_results/'.$surv['id'].'');?>"> 
<select id="filter" name="filter" onchange="this.form.submit()"> 
    <option value="ALL" <?php if (strcmp($college, "ALL")== 0) echo "selected"; ?>>
        ALL
    </option>
    <option value ="cas" <?php if (strcmp($college, "cas")== 0) echo "selected"; ?>> 
    College of Arts and Sciences
    </option>
    <option value="cafa" <?php if (strcmp($college, "cafa")== 0) echo "selected"; ?>> 
    College of Architecture and Fine Arts
    </option>
    <option value="coed" <?php if (strcmp($college, "coed")== 0) echo "selected"; ?>> 
    College of Education 
    </option> 
    <option value="coe" <?php if (strcmp($college, "coe")== 0) echo "selected"; ?>> 
    College of Engineering
    </option>
    <option value="sbe" <?php if (strcmp($college, "sbe")== 0) echo "selected"; ?>> 
    School of Business and Economics
    </option> 
    <option value="shcp" <?php if (strcmp($college, "shcp")== 0) echo "selected"; ?>> 
    School of Health Care Professions
    </option> 
    <option value="slg" <?php if (strcmp($college, "slg")== 0) echo "selected"; ?>> 
    School of Law and Governance
    </option> 
     
</select> 
</form>
    
  <ol type="1">  
    <?php 
        $ind=0;
         if($res == NULL){
                            echo '<div class="ui inverted segment">
                                    <p>No results availabe yet</p>
                                  </div>';
                        }
         else{
            foreach($res as $q):
                    echo "<li>".$q['question_data']."</li>";

                    echo "<ol type='a'>";
                    
                    if($choices== NULL){
                        
                    }
                    else{
                        foreach ($choices as $c):

                            if($c['question_id'] == $q['question_id']){
                                $tot=$per=0;
                                
                                if($ans!==false){
                                    foreach($ans as $a):
                                       if($a['choice_id'] == $c['choice_id']){
                                            $tot++;
                                        }   
                                        $per = round($tot/$ansque[$q['question_id']] *100);
                                    endforeach;
                                }

                                echo "<li>".$per."%".$c['choice_data']."</li>";

                            }

                        endforeach;
                    }
                    echo '</ol>';
            endforeach;
        }
    ?>
  </ol>

</div>