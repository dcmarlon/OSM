<div class="ui grid">
    	
        <div class="row"></div>
        <div class="three wide column"></div>
        <div class="ten wide column">
            <h4>Edit Survey Name</h4>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <div class="ui small input"> 
              <input type="text" value="">
          </div>
        
      
      <div class="row"></div>
      <div class="three wide column"></div>
      <div class="tiny ui green button">Add Question</div>

      

      
      
      <form class="ui form">
        <div class="field"> 
        <div class="two fields">
          <div class="field">
            <label>1. </label><input type="text" placeholder="Question">
          </div>
          <div class="field">
            <label>&nbsp;</label>
            <div class="ui selection dropdown">
              <input type="hidden" name="gender">
              <div class="default text">Question Type</div>
              <i class="dropdown icon"></i>
              <div class="menu">
                <div class="item" data-value="single">Single Answer</div>
                <div class="item" data-value="multiple">Multiple Answer</div>
                <div class="item" data-value="combo">Combination</div>
              </div>
            </div>
          </div>
        </div>
        <div class="grouped fields">
          <label>Choices:</label>
          <div class="field">
            <div class="ui radio checkbox">
              <input type="radio" name="fruit" checked="checked">
              <label>Choice <div class="mini ui icon button">
                            <i class="remove icon"></i>
                          </div></label>
            </div>
          </div>
          <div class="field">
            <div class="ui radio checkbox">
              <input type="radio" name="fruit">
              <label>Choice 
                  <div class="mini ui icon button">
                      <i class="remove icon"></i>
                  </div>
              </label>                
            </div>
           </div>

          <div class="field">
            <div class="ui radio checkbox">
              <input type="radio" name="fruit">
              <label>Choice  <div class="mini ui icon button">
                            <i class="remove icon"></i></div>
              </label>                
            </div>
          </div>
          <div class="mini ui button">Add Choice</div> <div class="mini ui button">Clear</div>
        </div>
        </div>
      </form>

      </div>
        </div>

