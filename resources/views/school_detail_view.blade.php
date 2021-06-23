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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<div class="container" style="max-width: 1700px;margin-top: 20px;">
	<div class="row">
		<div class="col-lg-6 col-md-12">
			<div class="mapouter">
				<div class="gmap_canvas">
					<iframe style="width: 100%;height: 100%;" id="gmap_canvas" src="https://maps.google.com/maps?q={{ $school_data->infoData[0]->address->streetAddress }},%20{{$school_data->infoData[0]->address->addressLocality}},%20{{ $school_data->infoData[0]->address->addressRegion }}&t=k&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
					<style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style>
					<style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
				</div>
			</div>
			
		</div>

		<div class="col-lg-6 col-md-12">
			<div class="row">
				<div class="col-6">
					<a href="/"><img src="{{ asset('images/logo-dark.png') }}" style="width: 200px;"></a>
				</div>
				<div class="col-6">
					<button class="btn btn-success btn_image" style="float: right;margin-top: 7px;" data-toggle="modal" data-target="#imageModal" id="{{ $school_data->infoData[0]->address->addressRegion }}">View State Stats</button>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-body">
					<h1 style="font-weight: 800;">{{ $school_data->infoData[0]->name }}</h1><br/>
					<h6><i class="far fa-bookmark"></i>&nbsp;{{ $school_data->infoData[0]->address->streetAddress }}, {{ $school_data->infoData[0]->address->addressLocality }}, {{ $school_data->infoData[0]->address->addressRegion }}, {{ $school_data->infoData[0]->address->postalCode }}</h6><br/>
					<h6>{{ str_replace("GreatSchools","Hotciti",$school_data->infoData[0]->description) }}</h6><br/>
					<button class="btn btn-default" style="width: 100%;height: 50px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E;font-weight: 700;" data-toggle="modal" data-target="#questionModal">Contact Agent</button>
				</div>
			</div>
			<br/>
			<div class="card">
				<div style="card-body">
					<table class="table">
						<tr>
							<td>Start Time</td>
							<td>
								@foreach($school_data->fieldsData->OspSchoolInfo->config[0]->data as $ospdata)
									@if($ospdata->response_key == "Start time")
										{{ $ospdata->response_value[0] }}
									@endif
								@endforeach
								
							</td>
						</tr>

						

						<tr>
							<td>End Time</td>
							<td>
								@foreach($school_data->fieldsData->OspSchoolInfo->config[0]->data as $ospdata)
									@if($ospdata->response_key == "Schedule")
										{{ $ospdata->response_value[0] }}
									@endif
								@endforeach
								
							</td>
						</tr>

						<tr>
							<td>Transportation</td>
							<td>
								@foreach($school_data->fieldsData->OspSchoolInfo->config[0]->data as $ospdata)
									@if($ospdata->response_key == "Transportation")
										{{ $ospdata->response_value[0] }}
									@endif
								@endforeach
								
							</td>
						</tr>

						<tr>
							<td>Dress code</td>
							<td>
								@foreach($school_data->fieldsData->OspSchoolInfo->config[0]->data as $ospdata)
									@if($ospdata->response_key == "Dress code")
										{{ $ospdata->response_value[0] }}
									@endif
								@endforeach
								
							</td>
						</tr>

						<tr>
							<td>Boarding school</td>
							<td>
								@foreach($school_data->fieldsData->OspSchoolInfo->config[0]->data as $ospdata)
									@if($ospdata->response_key == "Boarding school")
										{{ $ospdata->response_value[0] }}
									@endif
								@endforeach
								
							</td>
						</tr>

						<tr>
							<td>Type of school</td>
							<td>
								@foreach($school_data->fieldsData->OspSchoolInfo->config[0]->data as $ospdata)
									@if($ospdata->response_key == "Type of school")
										{{ $ospdata->response_value[0] }}
									@endif
								@endforeach
								
							</td>
						</tr>

						<tr>
							<td>Coed</td>
							<td>
								@foreach($school_data->fieldsData->OspSchoolInfo->config[0]->data as $ospdata)
									@if($ospdata->response_key == "Coed")
										{{ $ospdata->response_value[0] }}
									@endif
								@endforeach
								
							</td>
						</tr>
					</table>
				</div>
			</div>
			<br/>
			@if(isset($school_data->fieldsData->DataModule))
			<div class="card">
				<div class="card-header">
					<h5>Test Scores</h5>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<td style="width: 100px;">English</td>
							<td>
								<div class="progress" style="height: 25px;">
									@if($school_data->fieldsData->DataModule->data[3]->title == 'Test scores')
										@if(isset($school_data->fieldsData->DataModule->data[3]))
											@if(!empty($school_data->fieldsData->DataModule->data[3]->data))
												@if(isset($school_data->fieldsData->DataModule->data[3]->data[2]))
													@foreach($school_data->fieldsData->DataModule->data[3]->data[2]->values as $key=>$edu_sys)
														<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{ $edu_sys[0]->score  }}%" aria-valuenow="{{ $edu_sys[0]->score  }}" aria-valuemin="0" aria-valuemax="100">
														
														{{ $edu_sys[0]->score  }}%
													@endforeach
													</div>
												@endif
											@endif
										@endif
									@endif
									
									
								</div>
							</td>
						</tr>

						<tr>
							<td style="width: 100px;">Math</td>
							<td>
								<div class="progress" style="height: 25px;">
									
									@if($school_data->fieldsData->DataModule->data[3]->title == 'Test scores')
										@if(isset($school_data->fieldsData->DataModule->data[3]))
											@if(!empty($school_data->fieldsData->DataModule->data[3]->data))
												@if(isset($school_data->fieldsData->DataModule->data[3]->data[3]))
													@foreach($school_data->fieldsData->DataModule->data[3]->data[3]->values as $key=>$edu_sys)
														<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{ $edu_sys[0]->score  }}%" aria-valuenow="{{ $edu_sys[0]->score  }}" aria-valuemin="0" aria-valuemax="100">
														
														{{ $edu_sys[0]->score  }}%
													@endforeach
													</div>
												@endif
											@endif
										@endif
									@endif
									
								</div>
							</td>
						</tr>

						<tr>
							<td style="width: 100px;">Science</td>
							<td>
								<div class="progress" style="height: 25px;">
									
									@if($school_data->fieldsData->DataModule->data[3]->title == 'Test scores')
										@if(isset($school_data->fieldsData->DataModule->data[3]))
											@if(!empty($school_data->fieldsData->DataModule->data[3]->data))
												@if(isset($school_data->fieldsData->DataModule->data[3]->data[1]))
													@foreach($school_data->fieldsData->DataModule->data[3]->data[1]->values as $key=>$edu_sys)
														<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:{{ $edu_sys[0]->score  }}%" aria-valuenow="{{ $edu_sys[0]->score  }}" aria-valuemin="0" aria-valuemax="100">
														
														{{ $edu_sys[0]->score  }}%
													@endforeach
													</div>
												@endif
											@endif
										@endif
									@endif
									
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<h5>Absent 15 days or more days</h5>
				</div>
				<div class="card-body">
					<table class="table">
						<tr>
							<td style="width: 200px;">
								@if($school_data->fieldsData->DataModule->data[4]->title == 'Discipline & attendance')
									@if(!empty($school_data->fieldsData->DataModule->data[4]->data))
										@if(isset($school_data->fieldsData->DataModule->data[4]->data[0]->values[0]))
											{{ $school_data->fieldsData->DataModule->data[4]->data[0]->values[0]->breakdown  }}
										@endif
									@endif
								@endif
							</td>
							<td>
								@if($school_data->fieldsData->DataModule->data[4]->title == 'Discipline & attendance')
									@if(!empty($school_data->fieldsData->DataModule->data[4]->data))
										@if(isset($school_data->fieldsData->DataModule->data[4]->data[0]->values[0]))
											{{ $school_data->fieldsData->DataModule->data[4]->data[0]->values[0]->score  }}%
										@endif
									@endif
								@endif
							</td>
						</tr>

						<tr>
							<td style="width: 200px;">
								@if($school_data->fieldsData->DataModule->data[4]->title == 'Discipline & attendance')
									@if(!empty($school_data->fieldsData->DataModule->data[4]->data))
										@if(isset($school_data->fieldsData->DataModule->data[4]->data[0]->values[1]))
											{{ $school_data->fieldsData->DataModule->data[4]->data[0]->values[1]->breakdown  }}
										@endif
									@endif
								@endif
							</td>
							<td>
								@if($school_data->fieldsData->DataModule->data[4]->title == 'Discipline & attendance')
									@if(!empty($school_data->fieldsData->DataModule->data[4]->data))
										@if(isset($school_data->fieldsData->DataModule->data[4]->data[0]->values[1]))
											{{ $school_data->fieldsData->DataModule->data[4]->data[0]->values[1]->score  }}%
										@endif
									@endif
								@endif
							</td>
						</tr>

						<tr>
							<td style="width: 200px;">
								@if($school_data->fieldsData->DataModule->data[4]->title == 'Discipline & attendance')
									@if(!empty($school_data->fieldsData->DataModule->data[4]->data))
										@if(isset($school_data->fieldsData->DataModule->data[4]->data[0]->values[2]))
											{{ $school_data->fieldsData->DataModule->data[4]->data[0]->values[2]->breakdown  }}
										@endif
									@endif
								@endif
							</td>
							<td>
								@if($school_data->fieldsData->DataModule->data[4]->title == 'Discipline & attendance')
									@if(!empty($school_data->fieldsData->DataModule->data[4]->data))
										@if(isset($school_data->fieldsData->DataModule->data[4]->data[0]->values[2]))
											{{ $school_data->fieldsData->DataModule->data[4]->data[0]->values[2]->score  }}%
										@endif
									@endif
								@endif
							</td>
						</tr>
					</table>
				</div>
			</div>
			@endif
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
<div class="modal" id="imageModal">
  <div class="modal-dialog" id="iframeModal_dialog" style="max-width: 60%;height: 90%;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <img src="" id="image_show" style="width: 100%;">
      </div> 

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    <script>

		$(".btn_image").click(function(){
			var image_name = $(this).attr("id") + ".png";
			$("#image_show").attr("src", "images/State_School_Reports/"+image_name);
		});
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
    </script>
</body>
</html>