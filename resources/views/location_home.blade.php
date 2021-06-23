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
	<style>
		#btn_contact_agent{
			background-color: white;
			border: 1px solid #2E3F6E;
			color: #2E3F6E;
			font-weight: 700;
		}
		#btn_detail{
			background-color: white;
			border: 1px solid #2E3F6E;
			color: #2E3F6E;
			font-weight: 700;
		}
	</style>
</head>
<body>
	<input type="hidden" id="hidden_location" value="{{ $location }}" name="">
	<nav class="navbar navbar-light bg-light justify-content-between">
		<a href="/"><img src="{{ asset('images/logo-dark.png') }}" style="width: 200px;"></a>
		<button class="btn btn-default" id="btn_contact_agent" data-toggle="modal" data-target="#questionModal">Contact Agent</button>
	</nav>
	<h1 style="text-align: center;font-weight: 800;margin-top: 70px;margin-bottom: 70px;color: #566985;">Homes in {{ $location }}</h1>

	<div class="container" style="max-width: 1700px;">
	    <div class="row mt-1">
	    	@foreach($home_datas as $home_data)
		        <div class="col-sm-12 col-md-6 col-lg-4">
		            <div class="card p-card bg-white p-2 rounded px-3" style="margin-top: 20px;">
		                <div class="card-body">
		                	<div class="row">
		                		<div class="col-md-5">
		                			<h4 class="card-title" style="font-weight: 800;">{{ $home_data->price }}</h4>
		                		</div>
		                		<div class="col-md-7">
		                			<h4 class="card-title" style="margin-top: 5px;">{{ $home_data->beds }}bd | {{ $home_data->baths }}ba | {{ $home_data->area }} sqft</h4>
		                		</div>
		                	</div>
							
							<h5 class="card-text">{{ $home_data->address }}</h5>
							<div class="row">
								<div class="col-md-9">
									<h5 class="card-text" style="margin-top: 10px;"><i class="fa fa-circle" style="color: #fc6203;"></i>  {{ $home_data->statusText }}</h5>
								</div>
								<div class="col-md-3">
									<button class="btn btn-default btn_home_detail" id="btn_detail" style="float: right;" name="{{ $home_data->id }}">Detail</button>
								</div>
							</div>
							
						</div>
						<img class="card-img-bottom" src="{{ $home_data->imgSrc }}" alt="Card image" style="width:100%">
		            </div>
		        </div>
		    @endforeach
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
	<script>
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
        $(".btn_home_detail").click(function(){
        	var id = $(this).attr("name");
        	window.open("/home_detail_view?id="+id, "_blank");
        });
	</script>
</body>
</html>