<div class ="ui grid">

<div class="three wide column"></div>
<div class="ten wide column">
    <h2> <?php echo $surv['name']; ?> </h2>
    
	<div>
  <?php echo anchor('admin/survey', '<button class="tiny ui labeled icon button"> <i class="chevron left icon"></i>Back</button> '); ?>
  </div>
    <br>
<form method="post" accept-charset="utf-8" action="<?php echo base_url('/admin/survey/view_results/'.$surv['id'].'');?>"> 

<div>
<select class="form-group form-control" id="filter" name="filter" onchange="this.form.submit()"> 
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
</div>

</form>
    
  <!--<ol type="1">  
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
  </ol> !-->
  <div class="ui divided items">
                        <?php
                        if($res == NULL){
                            echo '<div class="ui inverted segment">
                                    <p>No results availabe yet</p>
                                  </div>';
                        }
                        else{
                            echo "<ol type='1'>";
                            foreach ($res as $q): ?>                
                                <div class="item">
                                  <div class="content">
                                    <p class="header"><h3> <li><?php echo $q['question_data']; ?> </li> </h3></p>
                                    <div class="meta">
                                      <span class="cinema"></span>
                                    </div>
                                    <div class="description">  
                                        <ul type="">
                                            <?php foreach ($choices as $c): 
                                                $tot=$per=0;
                                               if($q['question_id'] == $c['question_id']){
                                                   if($ans!==false){
                                                   foreach($ans as $a):
                                                   if($a['choice_id'] == $c['choice_id']){
                                                       $tot++;
                                                   }
                                                   if($ansque[$q['question_id']]!=0)
                                                   $per = round($tot/$ansque[$q['question_id']] *100);
                                                   endforeach; 
                                                }
                                            ?>
                                                   
                                        <table class="ui table">
                                                <tr>
                                                    <td style="color:red; width: 65px"><?php echo $per; ?> %</td>
                                                    <td><?php  echo "<li>".$c['choice_data']."</li>"; ?></td>
                                                </tr>
                                                </table>
                                               <?php } endforeach ?>  
                                        </ul>
                                    </div>
                                  </div>    
                                </div>
                        <?php endforeach; echo "</ol>";} ?>           
                  </div>
</div>


</div>
</body>

</html>