          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Events</h3>
              </div>
              <div class="panel-body">
                <button class="btn btn-default pull-right main-color-bg" data-toggle="modal" data-target="#createEve">
                   Create Event
                </button>
                
				<br><br><br>
                <table class="table table-striped table-hover" id="events">
                      <tr>
                        <th>Location</th>
                        <th>Event</th>
                        <th>Date</th>
                      </tr>
					  <tbody>
                      </tbody>	
                    </table>
            </div>
		</div>
        
          <!-- Create promo code -->
  <div class="modal fade" id="createEve" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>event/create" id="creatEvent" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Event</h4>
      </div>
      <div class="modal-body">
        <div class="message"></div>
        <div class="form-group">
          <label>location </label>
 		  <select name="locationID" class="form-control" required>
            <option value=""> -- Select location --</option>
            <?php foreach($locations as $location ){ ?>
          	<option value="<?php echo $location->id; ?>"><?php echo $location->name ;?></option>
            <?php } ?>
          </select>	
        </div>
        <div class="form-group">
          <label>Event</label>
          <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
          <label>Date</label>
          <div class="input-append date form_datetime">
            <input type="text" class="form-control" name="happen_on" required readonly>
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

