          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Instructions</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                  	<h5>Installation</h5>
                    <ol>	
                    	<li>Unzip the folder to www root for wamp or htdocs for xampp.</li>
                        <li>Create a database and the run .sql file. Navigate to "project_folder/application/config/database.php" to 
                         configure the database name, username and password.</li>
                        <li>Navigate to "project_folder/application/config/config.php line 29. Change the base_url to the one you prefer.</li> 						<li>installation is done. System will up and running.</li>
                    </ol>
                    <b>NB: it is important to enter some data following the navigation menu before testing the promo code validity 
</b>
                    <h5>Testing the API on postman</h5>
                    <ol>
                    	<li>Set headers to gain authourization.<br>
                             Open postman application
                             <ul>
                             	<li> Create a basic request & navigate to the headers tab</li>
                                <li>
                                   Enter 3 parameters with there values
                                   <ol>
                                   		<li>Client-Service: frontend-client</li>
                                        <li>Auth-Key: aggrey</li>
                                        <li>Content-Type: application/x-www-form-urlencoded</li>
                                   </ol>
                                </li>
                                <li>Navigate to the body tab & send data as raw(Json).</li>
                             </ul>
                        </li>
                        <li>Request URLs for location module.<br>
                            <ul>
                            	<li>Creating Location<br>
                                    <ol>
                                        <li>method: POST</li>
                                        <li>url: http://yourdomain/location/create</li>
                                        <li>data: { 
                                                    "name": "nakulabye" 
                                                  }
                                        </li>
                                        <li>response: status: 201(Success) and status:200(Failure)</li>
                                    </ol>                                                   
                                </li>
                                <li>Return Locations<br>
                                    <ol>
                                        <li>method: GET</li>
                                        <li>url: http://yourdomain/location/all</li>
                                        <li>response: [
                                            {
                                                "id": "1",
                                                "name": "Nakulabye"
                                            }
                                        ]</li>
                                    </ol>                                                   
                                </li>
                            </ul>
                        </li>
                        <li>Request URLs for radius module.<br>
                            <ul>
                            	<li>Creating Radius<br>
                                    <ol>
                                        <li>method: POST</li>
                                        <li>url: http://yourdomain/radius/create</li>
                                        <li>data: { 
                                                    "name": "kampala" 
                                                  }
                                        </li>
                                        <li>response: status: 201(Success) and status:200(Failure)</li>
                                    </ol>                                                   
                                </li>
                                <li>Return Radius<br>
                                    <ol>
                                        <li>method: GET</li>
                                        <li>url: http://yourdomain/radius/all</li>
                                        <li>response: [
                                            {
                                                "id": "1",
                                                "name": "kampala"
                                            }
                                        ]</li>
                                    </ol>                                                   
                                </li>
                            </ul>
                        </li>
                        <li>Request URLs for Journey module.<br>
                            <ul>
                            	<li>Creating Journey<br>
                                    <ol>
                                        <li>method: POST</li>
                                        <li>url: http://yourdomain/journey/create</li>
                                        <li>data: { 
                                                      "radiusID": 2,
                                                      "origin": 2,
                                                      "destination": 3,
                                                      "rate": 3000
                                                  }
                                        </li>
                                        <li>response: status: 201(Success) and status:200(Failure)</li>
                                    </ol>                                                   
                                </li>
                                <li>Return Journey<br>
                                    <ol>
                                        <li>method: GET</li>
                                        <li>url: http://yourdomain/journey/all</li>
                                        <li>response: [
                                            {
                                                "id": "1",
                                                "radius_name": "Wakiso",
                                                "origin": "Kagoma",
                                                "destination": "Lugogo",
                                                "rate": "3000"
                                            }
                                        ]</li>
                                    </ol>                                                   
                                </li>
                            </ul>
                        </li>

                        <li>Request URLs for event module.<br>
                            <ul>
                            	<li>Creating event<br>
                                    <ol>
                                        <li>method: POST</li>
                                        <li>url: http://yourdomain/event/create</li>
                                        <li>data: { 
                                                    "locationID": 3,
                                                    "name": "Safety 101",
                                                    "date": "2020-11-19 15:05:29" 
                                                  }
                                        </li>
                                        <li>response: status: 201(Success) and status:200(Failure)</li>
                                    </ol>                                                   
                                </li>
                                <li>Return events<br>
                                    <ol>
                                        <li>method: GET</li>
                                        <li>url: http://yourdomain/event/all</li>
                                        <li>response: [
                                            {
                                                "id": "1",
                                                "location": "Lugogo",
                                                "event_name": "Safety 101",
                                                "date": "2020-11-12 15:57:16"
                                            }
                                        ]</li>
                                    </ol>                                                   
                                </li>
                            </ul>
                        </li>
 
                        <li>Request URLs for promo code module.<br>
                            <ul>
                            	<li>Creating a promo code<br>
                                    <ol>
                                        <li>method: POST</li>
                                        <li>url: http://yourdomain/promocode/create</li>
                                        <li>data: { 
                                                   "radiusID": 1,
                                                   "eventID": 1,
                                                   "code": "Kasajja",
                                                   "status": 1,
                                                   "amount": "50", 
                                                   "expire_at": "2020-11-19 15:05:29"
                                                  }
                                        </li>
                                        <li>response: status: 201(Success) and status:200(Failure)</li>
                                    </ol>                                                   
                                </li>
                                <li>Return promo codes<br>
                                    <ol>
                                        <li>method: GET</li>
                                        <li>url: http://yourdomain/promocode/all</li>
                                        <li>response: [
                                            {
                                                "id": "1",
                                                "radius_name": "Kampala",
                                                "event_name": "Safety 101",
                                                "code": "Kasajja",
                                                "status": "1",
                                                "create_at": "2020-11-12 15:10:12",
                                                "expire_at": "2020-11-19 15:05:29"
                                            }
                                        ]</li>
                                    </ol>                                                   
                                </li>

                                <li>Return promo codes by status(Active or Inactive)<br>
                                    <ol>
                                        <li>method: GET</li>
                                        <li>url: http://yourdomain/promocode/status/1 (Active promo codes)</li>
                                        <li>url: http://yourdomain/promocode/status/0 (Inactive promo codes)</li>
                                        <li>url: http://yourdomain/promocode/1 (Returns single promo code)</li>
                                        <li>response: [
                                            {
                                                "id": "1",
                                                "radius_name": "Kampala",
                                                "event_name": "Safety 101",
                                                "code": "Kasajja",
                                                "status": "1",
                                                "create_at": "2020-11-12 15:10:12",
                                                "expire_at": "2020-11-19 15:05:29"
                                            }
                                        ]</li>
                                    </ol>                                                   
                                </li>

                                <li>Activating & Deactivating promo code<br>
                                    <ol>
                                        <li>method: POST</li>
                                        <li>url: http://yourdomain/promocode/change/status</li>
                                        <li>data: { 
                                                    "id": 1,
                                                    "status": 0
                                                  }
                                        </li>
                                        <li>response: status: 201(Success) and status:200(Failure)</li>
                                    </ol>                                                   
                                </li>

                                <li>Testing promo code<br>
                                    <ol>
                                        <li>method: POST</li>
                                        <li>url: http://yourdomain/promocode/run/code</li>
                                        <li>data: { 
                                                   "origin": 1,
                                                   "destination": 3,
                                                   "code": "Kasajja" 
                                                  }
                                        </li>
                                        <li>response: status: 201(Success) and status:200(Failure)</li>
                                    </ol>                                                   
                                </li>

                            </ul>
                        </li>
                        
                    </ol>
                  </div>	
                </div>
                <br>
              </div>
          </div>