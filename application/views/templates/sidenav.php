          <div class="col-md-3">
            <div class="list-group">
              <a href="" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Navigation Links
              </a>
              <a href="<?php echo base_url()?>home" class="list-group-item <?php if($name == 'Welcome'){ echo 'active active-bg-color'; }?>">
               <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Instructions
              </a>

              <a href="<?php echo base_url()?>locations" class="list-group-item 
			  <?php if($name == 'Locations'){ echo 'active active-bg-color'; }?>">
               <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Locations
              </a>
              <a href="<?php echo base_url()?>radius" class="list-group-item 
              <?php if($name == 'Radius'){ echo 'active active-bg-color'; }?>">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Radius
              </a>
              <a href="<?php echo base_url()?>journey" class="list-group-item
              <?php if($name == 'Journey'){ echo 'active active-bg-color'; }?>">
               <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Journey
              </a>
              <a href="<?php echo base_url()?>events" class="list-group-item
              <?php if($name == 'Events'){ echo 'active active-bg-color'; }?>">
               <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Events
              </a>

              <a href="<?php echo base_url()?>codes" class="list-group-item
              <?php if($name == 'Promo Codes'){ echo 'active active-bg-color'; }?>">
               <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Promo Codes
              </a>
            </div>
		 </div>