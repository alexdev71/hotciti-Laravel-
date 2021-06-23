<!DOCTYPE html>
<html>
<head>
	<title>Hotciti</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container" style="max-width: 1700px;margin-top: 20px;">
	<div class="row">
		<div class="col-lg-6 col-md-12">
			<img src="{{ $hotel_details[0]->photo1 }}" style="width: 100%;">
			<div class="row mt-4">

				<div class="col-md-6 mt-4">
					<img src="{{ $hotel_details[0]->photo2 }}" style="width: 100%;">
				</div>
				<div class="col-md-6 mt-4">
					<img src="{{ $hotel_details[0]->photo3 }}" style="width: 100%;">
				</div>
				<div class="col-md-6 mt-4">
					<img src="{{ $hotel_details[0]->photo4 }}" style="width: 100%;">
				</div>
				<div class="col-md-6 mt-4">
					<img src="{{ $hotel_details[0]->photo5 }}" style="width: 100%;">
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-12">
			<div class="row">
				<div class="col-6">
					<a href="/"><img src="{{ asset('images/logo-dark.png') }}" style="width: 200px;"></a>
				</div>
				<div class="col-6">
					<button class="btn btn-primary" style="float: right;" type="button" id="btn_mortgage_cal" style="position: relative;" data-toggle="modal" data-target="#iframeModal">Mortgage Caculator</button>
				</div>
			</div>
			
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-9">
							<h1 style="font-weight: 900;">{{ $hotel_details[0]->hotel_name }}</h1>
						</div>
						<div class="col-md-3">
							<h4 style="margin-top: 10px;">{{ $hotel_details[0]->accommodation_type }}</h4>
						</div>
					</div><br/>
					<h5>{{ $hotel_details[0]->addressline1 }} {{ $hotel_details[0]->city }} {{ $hotel_details[0]->state }} {{ $hotel_details[0]->zipcode }}</h5><br/>
					<div class="row">
						<div class="col-6">
							<button class="btn btn-default" style="width: 100%;height: 50px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E;font-weight: 700;" data-toggle="modal" data-target="#questionModal">Contact Agent</button>
						</div>
						<div class="col-6">
							<button class="btn btn-default btn_booking" id="https://www.agoda.com/partners/partnersearch.aspx?pcs=1&cid=1896864&hl=en-us&hid={{ $hotel_details[0]->hotel_id }}" style="width: 100%;height: 50px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E;font-weight: 700;">Book a Room</button>
						</div>
					</div>
					
				</div>
			</div>
			<br/><br/>
			<div class="card">
				<div class="card-body">
					<center><h2>More about this Hotel</h2></center><br />
					<h6>{{ $hotel_details[0]->overview }}</h6>
					<br />
					
					<div class="row">
						<div class="col-md-6">
							<label><strong>CheckIn:</strong>  &nbsp;&nbsp;&nbsp;{{ $hotel_details[0]->checkin }}</label>
						</div>
						<div class="col-md-6">
							<label><strong>CheckOut:</strong> &nbsp;&nbsp;&nbsp; {{ $hotel_details[0]->checkout }}</label>
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-6">
							<label><strong>Number of Rooms:</strong> &nbsp;&nbsp;&nbsp; {{ $hotel_details[0]->numberrooms }}</label>
						</div>
						<div class="col-md-6">
							<label><strong>Number of Floors:</strong>  &nbsp;&nbsp;&nbsp;{{ $hotel_details[0]->numberfloors }}</label>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-6">
							<label><strong>Year Opened:</strong>&nbsp;&nbsp;&nbsp;{{ $hotel_details[0]->yearopened }}</label>
						</div>
						<div class="col-md-6">
							<label><strong>Price:</strong>&nbsp;&nbsp;&nbsp;${{ $hotel_details[0]->rates_from_exclusive }}</label>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</div>
</div>




<!-- Contact Form Modal Start -->
<div class="modal" id="questionModal">
        <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div id="mc_embed_signup" style="text-align: left;">
                                    
                    <div id="mc_embed_signup_scroll">
                        <h2 style="color: #697891;font-weight: 700;">Contact Agent</h2>
                        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                        <div class="mc-field-group">
                            <label for="question_email">Email Address  <span class="asterisk">*</span>
                            </label>
                            <input type="email" value="" name="question_email" class="required email" id="question_email">
                        </div>
                        <div class="mc-field-group">
                            <label for="question_name">Full Name <span class="asterisk">*</span></label>
                            <input type="text" value="" name="question_name" class="" id="question_name">
                        </div>
                        <div class="mc-field-group">
                            <label for="question_phone">Phone Number <span class="asterisk">*</span></label>
                            <input type="text" value="" name="question_phone" class="" id="question_phone">
                        </div>
                        
                        <div class="mc-field-group">
                            <label for="message">Message <span class="asterisk">*</span></label>
                            <textarea class="form-control" name="question_message" id="question_message"></textarea>
                        </div>
                        
                        <div class="clear">
                            <input type="button" value="Send" name="subscribe" id="question_submit" class="button" style="width: 100%;height: 50px;border-radius: 30px;background-color: #425998;">
                        </div>
                    </div>
                    
                </div>
              </div> 

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
        </div>
    </div>
    <!-- Contact Form Modal End -->

    <!-- Appointment Modal Start -->

    <div class="modal" id="appointmentModal">
        <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div id="mc_embed_signup" style="text-align: left;">
                                    
                    <div id="mc_embed_signup_scroll">
                        <h2 style="color: #697891;font-weight: 700;text-align: center;">Tour With a Buyer's Agent</h2>
                        <p style="text-align: left;">We'll connect you with a local agent who can give you a personalized tour of the home in-person or via video chat.</p>
                        <br/>
                        <div class="form-group">
                        	<label for="appointment_name"><strong>Name:</strong></label>
                        	<input type="text" name="appointment_name" id="appointment_name" class="form-control">
                        </div>
                        <br/>
                        <div class="form-group">
                        	<label for="email"><strong>Email:</strong></label>
                        	<input type="email" name="appointment_email" id="appointment_email" class="form-control">
                        </div>
                        <br/>
                        <div class="form-group">
                        	<label for="phone_number"><strong>Phone Number:</strong></label>
                        	<input type="text" name="phone_number" id="phone_number" class="form-control">
                        </div>
                        <br/>
                        <div class="form-group">
                        	<input type="hidden" id="hidden_appointment_type" name="hidden_appointment_type">
                            <label for="appointment_type"><strong><span>Select an appointment type</span></strong></label><br>
                            <div class="btn-group" style="width: 100%;" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-default btn_appointment_type" style="width: 50%;height: 50px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E;font-weight: 700;" id="In-Person">In-person</button>
								<button type="button" class="btn btn-default btn_appointment_type" style="width: 50%; height: 50px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E;font-weight: 700;" id="Video-Chat">Video Chat</button>
							</div>
                        </div>
                        <br/>
                        <div class="form-group">
                        	<label for="appointment_date"><strong><span>Select a date</span></strong></label><br>
                        	<input name="appointment_date" id="appointment_date" class="form-control" placeholder="Select a date" /><br>
                        	<input id="appointment_time" name="appointment_date" class="form-control" placeholder="Select time" />
                        </div>
                        <br>
                        <div class="clear">
                            <input type="button" value="Request This Time" name="subscribe" id="request_submit" class="button" style="width: 100%;height: 50px;border-radius: 30px;background-color: #425998;">
                        </div>
                    </div>
                    
                </div>
              </div> 

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

            </div>
        </div>
    </div>

    <!-- Appointment Modal End -->
<div class="modal" id="iframeModal">
  <div class="modal-dialog" id="iframeModal_dialog" style="max-width: 80%;height: 90%;">
    <div class="modal-content" style="height: 100%;">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <iframe src="" name="site_frame" id="site_frame" style="height: 100%;width: 100%;"></iframe>
      </div> 

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    <script>
    	$("#btn_mortgage_cal").click(function(){
        	$("#site_frame").attr("src", "/mortgage_calculator");
        });
		$("#question_submit").click(function(){
            if($("#question_email").val() == "" || $("#question_name").val() == "" || $("#question_phone").val() == "" || $("#question_message").val() == ""){
                Swal.fire("Error", "All fields are required!", "error");
                return;
            }
            
            $.ajax({
                url: "/save_questions",
                method: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    question_email: $("#question_email").val(),
                    question_name: $("#question_name").val(),
                    question_phone: $("#question_phone").val(),
                    question_message: $("#question_message").val(),
                },
                success:function(data){
                    Swal.fire("success", "Successfully Submitted!", "success");
                    $("#questionModal").close();
                }
            });
        });
        $(".btn_booking").click(function(){
        	var src = $(this).attr("id");
        	window.open(src);
        });
    </script>
</body>
</html>