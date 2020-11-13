          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">All Locations</h3>
              </div>
              <div class="panel-body">
                <button class="btn btn-default pull-right main-color-bg" data-toggle="modal" data-target="#createLocation">
                   Create location
                </button>
                
				<br><br><br>
                <table class="table table-striped table-hover" id="locations">
                      <tr>
                        <th>Location ID</th>
                        <th>Name</th>
                      </tr>
					  <tbody>
                      </tbody>	
                </table>
            </div>
          </div>
  <!-- Create promo code -->
  <div class="modal fade" id="createLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>location/create" id="createLocations" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Radius</h4>
      </div>
      <div class="modal-body">
        <div class="message"></div>
        <div class="form-group">
          <label>Location Name</label>
          <input type="text" name="name" required class="form-control">
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
