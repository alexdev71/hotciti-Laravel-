@include("components/header1")

<input type="hidden" id="hidden_gun_state" name="" value="{{ $state }}">
<div class="big-container" style="margin-top: 150px;">
	<div class="section-title">
		<h1>Gun Laws in <strong>{{ $state }}</strong></h1>
	</div>
	<div class="container" style="width: 60%;">
		<form method="get" id="gun_law_form" action="/gun_laws">
			<div class="col-lg-8 col-md-12">

				<select class="form-control" id="gun_law_state" name="state">
					@foreach($gun_states as $state)
						<option id="{{ $state->state }}">{{ $state->state }}</option>
					@endforeach
				</select>
			</div>
		</form>
		<div class="col-lg-4 col-md-12">
			<button class="btn btn-default" style="width: 100%;height: 45px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E !important;font-weight: 700 !important;" data-toggle="modal" data-target="#questionModal">Contact Agent</button>
		</div>
		
	</div>
	<br/>
	<br/>
	<div>
		<table class="table">
			<thead>
				<tr>
					<td>Subject</td>
					<td>Hand Guns</td>
					<td>Long Guns</td>
					<td>Notes</td>
				</tr>
			</thead>
			<tbody>
				@foreach($results as $result)
					<tr>
						<td>{{ $result->subject }}</td>
						<td>{{ $result->handguns }}</td>
						<td>{{ $result->longguns }}</td>
						<td>{{ $result->notes }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<br/><br/>
<script>
	$(document).ready(function(){
		$( "#gun_law_state" ).autocomplete({
	      source: function(request, response){
	      $.ajax({  
	        url:"/getstatelist",  
	        method:"POST",
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        data:{query:$( "#gun_law_state" ).val()},  
	        beforeSend: function(){
	          $("#gun_law_state").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
	        },
	        success:function(data)  
	        {    
	          $("#gun_law_state").css("background","#FFF");
	          response(JSON.parse(data));
	        }
	      });  
	      }
	    });

	 var hidden_gun_state = $("#hidden_gun_state").val();
	 $("#"+hidden_gun_state).attr("selected", true);

	 $("#gun_law_state").change(function(){
	 	$("#gun_law_form").submit();
	 });

	    $( "#gun_law_state" ).autocomplete({
	      select: function(event, ui){
	        setTimeout(function(){
	          $("#gun_law_form").submit();
	        }, 1000);
	      }
	    });
	});
</script>
@include("components/footer")