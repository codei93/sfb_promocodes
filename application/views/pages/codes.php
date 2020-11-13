          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">All Promo codes</h3>
              </div>
              <div class="panel-body">
                <button class="btn btn-default pull-right" data-toggle="modal" data-target="#createPromoCode">
                   Create Promo Code
                </button>
                
                <button class="btn btn-default pull-right main-color-bg" data-toggle="modal" data-target="#testPromoCode">
                  Test Promo Code
                </button>  
				<br><br><br>
                <table class="table table-striped table-hover" id="promocode">
                      <tr>
                        <th>Code</th>
                        <th>Radius</th>
                        <th>Event</th>
                        <th>Percentage</th>
                        <th>Create Date</th>
                        <th>Expire Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
					  <tbody>
                      </tbody>	
                    </table>
            </div>

            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Activate Promo Codes</h3>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-hover" id="activeCodes">
                      <tr>
                        <th>Code</th>
                        <th>Radius</th>
                        <th>Event</th>
                        <th>Percentage</th>
                        <th>Create Date</th>
                        <th>Expire Date</th>
                        <th>Status</th>
                      </tr>
					  <tbody>
                      </tbody>	
                    </table>
              </div>
          </div>
          
  <!-- Create promo code -->
  <div class="modal fade" id="createPromoCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>promocode/create" id="createCode" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Promo Code</h4>
      </div>
      <div class="modal-body">
        <div class="message"></div>
        <div class="form-group">
          <label>Radius</label>
 		  <select name="radiusID" class="form-control" required>
            <option value=""> -- Select Radius --</option>
            <?php foreach($radius as $ra ){ ?>
          	<option value="<?php echo $ra->id?>"><?php echo $ra->name ;?></option>
            <?php } ?>
          </select>	
        </div>
        <div class="form-group">
          <label>Event</label>
 		  <select name="eventID" class="form-control" required>
            <option value=""> -- Select Event --</option>
            <?php foreach($events as $ev ){ ?>
          	  <option value="<?php echo $ev->id?>"><?php echo $ev->name ;?></option>
            <?php } ?>
          </select>	
        </div>
        <div class="form-group">
          <label>Promo Code</label>
          <input type="text" name="code" required class="form-control">
        </div>
        <div class="form-group">
          <label>Promo Code</label>
 		  <select name="status" class="form-control" required>
            <option value="">-- Select Status --</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>	
        </div>
        <div class="form-group">
          <label>Percentage (% deduct from the journey price)</label>
          <input type="number" name="amount" min="1" max="100" required class="form-control">
        </div>
        <div class="form-group">
          <label>Expiry Date</label>
          <div class="input-append date form_datetime">
            <input type="text" class="form-control" name="expire_at" required readonly>
            <span class="add-on"><i class="icon-th"></i></span>
          </div>  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default main-color-bg">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>


  <!-- test promo code -->
  <div class="modal fade" id="testPromoCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>promocode/run/code" id="testCode" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Test Promo Code</h4>
      </div>
      <div class="modal-body">
        <div class="message"></div>
        <div class="form-group">
          <label>Origin</label>
 		  <select name="origin" class="form-control" required>
            <option value=""> -- Select Origin --</option>
            <?php foreach($locations as $origin ){ ?>
          	<option value="<?php echo $origin->id; ?>"><?php echo $origin->name ;?></option>
            <?php } ?>
          </select>	
        </div>
        <div class="form-group">
          <label>Destination</label>
 		  <select name="destination" class="form-control" required>
            <option value=""> -- Select Destination --</option>
            <?php foreach($locations as $destination ){ ?>
          	  <option value="<?php echo $destination->id; ?>"><?php echo $destination->name ;?></option>
            <?php } ?>
          </select>	
        </div>
        <div class="form-group">
          <label>Promo Code</label>
 		  <select name="code" class="form-control" required>
            <option value=""> -- Select Promo Code --</option>
            <?php foreach($promocodes as $code ){ ?>
          	  <option value="<?php echo $code->code; ?>"><?php echo $code->code ;?></option>
            <?php } ?>
          </select>	
        </div>
      <div id="out_put"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default main-color-bg">Test</button>
      </div>
    </form>
    </div>
    
  </div>
</div>


  <!-- change status -->
 <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>promocode/change/status" id="changing_status" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="msg"></div>
        <p class="lead"></p>
        <input name="id"  hidden="hidden" id="codeID">
        <input name="status" hidden="hidden" id="status">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default main-color-bg">Yes</button>
      </div>
    </form>
    </div>
    
  </div>
</div>
