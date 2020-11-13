          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Create journey</h3>
              </div>
              <div class="panel-body">
                <button class="btn btn-default pull-right main-color-bg" data-toggle="modal" data-target="#createJou">
                   Create Journey
                </button>
                
				<br><br><br>
                <table class="table table-striped table-hover" id="journey">
                      <tr>
                        <th>Radius</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Rate</th>
                      </tr>
					  <tbody>
                      </tbody>	
                    </table>
            </div>
		</div>
        
          <!-- Create promo code -->
  <div class="modal fade" id="createJou" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>journey/create" id="createJourney" method="post">
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
          <label>Rate (UGX)</label>
          <input type="number" name="rate" required class="form-control">
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

