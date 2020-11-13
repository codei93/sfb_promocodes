       </div>
     </div>
  </section> 
  <footer id="footer">
    <p>Copyright Mutagaywa Aggrey, &copy; <?php echo date('Y'); ?></p>
  </footer>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/loadingoverlap/loadingoverlay.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/loadingoverlap/loadingoverlay_progress.min.js"></script>

<script type="text/javascript">
  var Client_Service = 'frontend-client';
  var Auth_Key = 'aggrey';
   
  //date time picker  		 
  $(".form_datetime").datetimepicker({
     format: "yyyy-mm-dd hh:ii:ss",
     autoclose: true,
     pickerPosition: "bottom-right"
  });

  //date time picker  		 
  $(".happen_on").datetimepicker({
     format: "yyyy-mm-dd hh:ii:ss",
     autoclose: true,
     pickerPosition: "bottom-right"
  });

  /**************Locations******************************/
  //creating locations
  $("#createLocations").submit('on',function(e){
    e.preventDefault();//prevent page referesh
    var form = $(this);//getting the submitting form
    $("#createLocations").LoadingOverlay("show"); //show loader
		
    //converting data into a json raw data
	var serialized = form.serializeArray();
    var s = '';
    var data = {};
    for(s in serialized){
      data[serialized[s]['name']] = serialized[s]['value']
    }
	
	//console.log(data);
	//submiting form with ajax	
	$.ajax({ 
	
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : form.attr('action'),	 
	  type: form.attr('method'),
	  data: JSON.stringify(data),
	  dataType: 'json',
	  success: function(apiResponse){
      	setTimeout(function() {
 		  $("#createLocations").LoadingOverlay("hide"); //hide loader	
 	    }, 1000);
		
		if(apiResponse.status == 201){
		  setTimeout(function() {	
			  $(".message").html('<div class="alert alert-success" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}else{
		 setTimeout(function() {	 	
			  $(".message").html('<div class="alert alert-danger" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}
	  }
	});//ajax  
  })//submit form
  
  //return Locations
  $.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : '<?php echo base_url()?>location/all',	 
	  type: 'GET',
	  dataType: 'json',
	  success: function(apiResponse){
		//apiResponse = $.parseJSON(apiResponse);
		var tr = '';
		var status = '';
		var btn = '';
		$.each(apiResponse, function (idx, obj) { 
		      
		      tr += '<tr>'+
		             '<td>'+obj.id+'</td>'+
					 '<td>'+obj.name+'</td>'+
			  '</tr>'	
		});
			      	
	    $("#locations tbody tr:last").after(tr)//attach to the table
	  }
  });//ajax  

  /**************Locations******************************/

  /**************Radius******************************/
  //creating Radius
  $("#createRadius").submit('on',function(e){
    e.preventDefault();//prevent page referesh
    var form = $(this);//getting the submitting form
    $("#createRadius").LoadingOverlay("show"); //show loader
		
    //converting data into a json raw data
	var serialized = form.serializeArray();
    var s = '';
    var data = {};
    for(s in serialized){
      data[serialized[s]['name']] = serialized[s]['value']
    }
	
	//console.log(data);
	//submiting form with ajax	
	$.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : form.attr('action'),	 
	  type: form.attr('method'),
	  data: JSON.stringify(data),
	  dataType: 'json',
	  success: function(apiResponse){
      	setTimeout(function() {
 		  $("#createRadius").LoadingOverlay("hide"); //hide loader	
 	    }, 1000);
		
		if(apiResponse.status == 201){
		  setTimeout(function() {	
			  $(".message").html('<div class="alert alert-success" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}else{
		 setTimeout(function() {	 	
			  $(".message").html('<div class="alert alert-danger" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}
	  }
	});//ajax  
  })//submit form
  
  //return Radius
  $.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : '<?php echo base_url()?>radius/all',	 
	  type: 'GET',
	  dataType: 'json',
	  success: function(apiResponse){
		//apiResponse = $.parseJSON(apiResponse);
		var tr = '';
		var status = '';
		var btn = '';
		$.each(apiResponse, function (idx, obj) { 
		      
		      tr += '<tr>'+
		             '<td>'+obj.id+'</td>'+
					 '<td>'+obj.name+'</td>'+
			  '</tr>'	
		});
			      	
	    $("#radius tbody tr:last").after(tr)//attach to the table
	  }
  });//ajax  

  /**************Radius******************************/

  /**************Journey******************************/
  //creating 
  $("#createJourney").submit('on',function(e){
    e.preventDefault();//prevent page referesh
    var form = $(this);//getting the submitting form
    $("#createJourney").LoadingOverlay("show"); //show loader
		
    //converting data into a json raw data
	var serialized = form.serializeArray();
    var s = '';
    var data = {};
    for(s in serialized){
      data[serialized[s]['name']] = serialized[s]['value']
    }
	
	//console.log(data);
	//submiting form with ajax	
	$.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : form.attr('action'),	 
	  type: form.attr('method'),
	  data: JSON.stringify(data),
	  dataType: 'json',
	  success: function(apiResponse){
      	setTimeout(function() {
 		  $("#createJourney").LoadingOverlay("hide"); //hide loader	
 	    }, 1000);
		
		if(apiResponse.status == 201){
		  setTimeout(function() {	
			  $(".message").html('<div class="alert alert-success" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}else{
		 setTimeout(function() {	 	
			  $(".message").html('<div class="alert alert-danger" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}
	  }
	});//ajax  
  })//submit form
  
  //return Journey
  $.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : '<?php echo base_url()?>journey/all',	 
	  type: 'GET',
	  dataType: 'json',
	  success: function(apiResponse){
		//apiResponse = $.parseJSON(apiResponse);
		var tr = '';
		$.each(apiResponse, function (idx, obj) { 
		      
		      tr += '<tr>'+
		             '<td>'+obj.radius_name+'</td>'+
					 '<td>'+obj.origin+'</td>'+
					 '<td>'+obj.destination+'</td>'+
					 '<td>'+obj.rate+'</td>'+
			  '</tr>'	
		});
			      	
	    $("#journey tbody tr:last").after(tr)//attach to the table
	  }
  });//ajax  

 /**************Journey******************************/
 
   /**************event******************************/
  //creating event
  $("#creatEvent").submit('on',function(e){
    e.preventDefault();//prevent page referesh
    var form = $(this);//getting the submitting form
    $("#creatEvent").LoadingOverlay("show"); //show loader
		
    //converting data into a json raw data
	var serialized = form.serializeArray();
    var s = '';
    var data = {};
    for(s in serialized){
      data[serialized[s]['name']] = serialized[s]['value']
    }
	
	//console.log(data);
	//submiting form with ajax	
	$.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : form.attr('action'),	 
	  type: form.attr('method'),
	  data: JSON.stringify(data),
	  dataType: 'json',
	  success: function(apiResponse){
      	setTimeout(function() {
 		  $("#creatEvent").LoadingOverlay("hide"); //hide loader	
 	    }, 1000);
		
		if(apiResponse.status == 201){
		  setTimeout(function() {	
			  $(".message").html('<div class="alert alert-success" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}else{
		 setTimeout(function() {	 	
			  $(".message").html('<div class="alert alert-danger" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}
	  }
	});//ajax  
  })//submit form
  
  //return Radius
  $.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : '<?php echo base_url()?>event/all',	 
	  type: 'GET',
	  dataType: 'json',
	  success: function(apiResponse){
		//apiResponse = $.parseJSON(apiResponse);
		var tr = '';
		var status = '';
		var btn = '';
		$.each(apiResponse, function (idx, obj) { 
		      
		      tr += '<tr>'+
					 '<td>'+obj.location+'</td>'+
					 '<td>'+obj.event_name+'</td>'+
					 '<td>'+obj.date+'</td>'+
			  '</tr>'	
		});
			      	
	    $("#events tbody tr:last").after(tr)//attach to the table
	  }
  });//ajax  

  /**************event******************************/


  /**************Promo code ******************************/
  //creating promo code
  $("#createCode").submit('on',function(e){
    e.preventDefault();//prevent page referesh
    var form = $(this);//getting the submitting form
    $("#createCode").LoadingOverlay("show"); //show loader
		
    //converting data into a json raw data
	var serialized = form.serializeArray();
    var s = '';
    var data = {};
    for(s in serialized){
      data[serialized[s]['name']] = serialized[s]['value']
    }
	
	//console.log(data);
	//submiting form with ajax	
	$.ajax({ 
	
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : form.attr('action'),	 
	  type: form.attr('method'),
	  data: JSON.stringify(data),
	  dataType: 'json',
	  success: function(apiResponse){
      	setTimeout(function() {
 		  $("#createCode").LoadingOverlay("hide"); //hide loader	
 	    }, 1000);
		
		if(apiResponse.status == 201){
		  setTimeout(function() {	
			  $(".message").html('<div class="alert alert-success" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}else{
		 setTimeout(function() {	 	
			  $(".message").html('<div class="alert alert-danger" role="alert">'+
				  apiResponse.message
			  +'</div>');
		  }, 2000);	
		}
	  }
	});//ajax  
  })//submit form
  
  //test promo code
  $("#testCode").submit('on',function(e){
    e.preventDefault();//prevent page referesh
    var form = $(this);//getting the submitting form
    $("#testCode").LoadingOverlay("show"); //show loader
		
    //converting data into a json raw data
	var serialized = form.serializeArray();
    var s = '';
    var data = {};
    for(s in serialized){
      data[serialized[s]['name']] = serialized[s]['value']
    }
	
	//console.log(data);
	//submiting form with ajax	
	$.ajax({ 
	
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : form.attr('action'),	 
	  type: form.attr('method'),
	  data: JSON.stringify(data),
	  dataType: 'json',
	  success: function(apiResponse){
      	
		setTimeout(function() {
 		  $("#testCode").LoadingOverlay("hide"); //hide loader	
 	    }, 1000);
		//console.log(apiResponse);
		
		if(apiResponse.status == 200){
		  setTimeout(function() {	
			  $(".message").fadeIn("slow").html('<div class="alert alert-danger" role="alert">'+
				  apiResponse.message
			  +'</div>');
			  $("#out_put").fadeOut("slow");
		  }, 2000);	
		
		}else{
		
		  setTimeout(function() {	
		       var c_status;
			   if(apiResponse.codeStatus == 1){
			   	   c_status = 'Active';	
			   }
			  $(".message").fadeOut("slow");
			  $("#out_put").fadeIn("slow").html('<table class="table">'+
				'<tr><th>Event</th><td>'+apiResponse.event_name+'</td></tr>'+
				'<tr><th>Location</th><td>'+apiResponse.location+'</td></tr>'+
				'<tr><th>Radius</th><td>'+apiResponse.radius+'</td></tr>'+ 
				'<tr><th>Promo Code Status</th><td>'+c_status+'</td></tr>'+ 
				'<tr><th>Created at</th><td>'+apiResponse.create_at+'</td></tr>'+
				'<tr><th>Expire at</th><td>'+apiResponse.expire_at+'</td></tr>'+ 
				'<tr><th>Percentage</th><td>'+apiResponse.amount+'%</td></tr>'+ 
				'<tr><th>Journey Price</th><td>'+apiResponse.rate+'</td></tr>'+
				'<tr><th>Payment Price</th><td>'+apiResponse.total+'</td></tr>'+   
			  +'</table>');
			  
		  }, 2000);	

	      //console.log(apiResponse);
		}
	  }
	});//ajax  
  })//submit form

  //return promo codes	
  $.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : '<?php echo base_url()?>promocode/all',	 
	  type: 'GET',
	  dataType: 'json',
	  success: function(apiResponse){
		//apiResponse = $.parseJSON(apiResponse);
		var tr = '';
		var status = '';
		var btn = '';
		$.each(apiResponse, function (idx, obj) { 
		      
			  if(obj.status == 1){
			  	status = '<span class="text-success">Active</span>';
				btn = '<button class="btn btn-danger btn-sm" onclick="change_status('+obj.id+','+obj.status+')" data-toggle="modal" data-target="#changeStatus">Deactivate</button>';	
			  }else{
			  	status = '<span class="text-danger">Inactive</span>';
				btn = '<button class="btn btn-success btn-sm" onclick="change_status('+obj.id+','+obj.status+')" data-toggle="modal" data-target="#changeStatus">Activate</button>';
			  }
		      tr += '<tr>'+
		             '<td>'+obj.code+'</td>'+
					 '<td>'+obj.radius_name+'</td>'+
					 '<td>'+obj.event_name+'</td>'+
					 '<td>'+obj.percentage+'%'+'</td>'+
					 '<td>'+obj.create_at+'</td>'+
					 '<td>'+obj.expire_at+'</td>'+
					 '<td>'+status+'</td>'+
					 '<td>'+btn+'</td>'+
			  '</tr>'	
		});
			      	
	    $("#promocode tbody tr:last").after(tr)
	  }
  });//ajax  

  //return Active codes	
  $.ajax({ 
	  //authenticating the request  
	  headers: {
	    'Client-Service': Client_Service,
		'Auth-Key': Auth_Key,
		'Content-Type':'application/x-www-form-urlencoded'
      },
	  url : '<?php echo base_url()?>promocode/status/1',	 
	  type: 'GET',
	  dataType: 'json',
	  success: function(apiResponse){
		//apiResponse = $.parseJSON(apiResponse);
		var tr = '';
		var status = '';
		var btn = '';
		$.each(apiResponse, function (idx, obj) { 
		      
			  if(obj.status == 1){
			  	status = '<span class="text-success">Active</span>';
			  }else{
			  	status = '<span class="text-danger">Inactive</span>';
			  }
		      tr += '<tr>'+
		             '<td>'+obj.code+'</td>'+
					 '<td>'+obj.radius_name+'</td>'+
					 '<td>'+obj.event_name+'</td>'+
					 '<td>'+obj.percentage+'%'+'</td>'+
					 '<td>'+obj.create_at+'</td>'+
					 '<td>'+obj.expire_at+'</td>'+
					 '<td>'+status+'</td>'+
			  '</tr>'	
		});
			      	
	    $("#activeCodes tbody tr:last").after(tr)
	  }
  });//ajax  
  
  function change_status(id, status){
	$('#codeID').val(id);
	
	if(status == 1){
	  $('.modal-title').text('Deactivate Promo Code'); 
	  $('.lead').text('Are you sure you want to proceed with this action'); 
	  $('#status').val(0);
    }else{
	  $('.modal-title').text('Activate Promo Code');
	  $('.lead').text('Are you sure you want to proceed with this action'); 
	  $('#status').val(1);		
	}
	
	//creating promo code
	$("#changing_status").submit('on',function(e){
		e.preventDefault();//prevent page referesh
		var form = $(this);//getting the submitting form
		$("#changing_status").LoadingOverlay("show"); //show loader
			
		//converting data into a json raw data
		var serialized = form.serializeArray();
		var s = '';
		var data = {};
		for(s in serialized){
		  data[serialized[s]['name']] = serialized[s]['value']
		}
		
		//console.log(data);
		//submiting form with ajax	
		$.ajax({ 
		
		  //authenticating the request  
		  headers: {
			'Client-Service': Client_Service,
			'Auth-Key': Auth_Key,
			'Content-Type':'application/x-www-form-urlencoded'
		  },
		  url : form.attr('action'),	 
		  type: form.attr('method'),
		  data: JSON.stringify(data),
		  dataType: 'json',
		  success: function(apiResponse){
			
			setTimeout(function() {
			  $("#changing_status").LoadingOverlay("hide"); //hide loader	
			}, 1000);
			
			if(apiResponse.status == 201){
			  setTimeout(function() {	
				  $(".msg").fadeIn("slow").html('<div class="alert alert-success" role="alert">'+
					 'Action has been performed'
				  +'</div>');
			  }, 2000);	
			  
			  setTimeout(function() {	
				 location.reload();
			  }, 4000);	
			
			}else{
			
			  setTimeout(function() {	
				  $(".msg").fadeIn("slow").html('<div class="alert alert-danger" role="alert">'+
					  apiResponse.message
				  +'</div>');				  
			  }, 2000);	
	
			  //console.log(apiResponse);
			}
		  }
		});//ajax  
	  })//submit form
  }
/**************Promo code ******************************/ 
  
</script>        
<body>
</body>
</html>