@include("components/header1")

<div id="head_to_head_container">
	<div class="section-title">
		<h2>HEAD TO HEAD</h2>
		<h4>Head to head location comparison</h4>
	</div>
	<div class="row pb-lg-5 pb-md-5 pb-sm-5">
		<form action="/head_to_head_compare" method="post" style="width: 100%;">
			@csrf
			<div class="col-lg-5 col-md-5 col-sm-12">
				<label style="float: left;font-size: 14px; color: #697891;font-weight: 600;">LOCATION ONE</label>
				<input type="text" list="head_compare_list1" name="head_compare1" id="head_compare1" class="no-search-select form-control" placeholder="Enter City or Zip Code"/>
	            <datalist id="head_compare_list1" name="head_compare_list1" ></datalist>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12">
				<h1 style="color: #697891;font-weight: 800;margin-top: 20px;">VS</h1>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-12">
				<label style="float: left;font-size: 14px; color: #697891;font-weight: 600;">LOCATION TWO</label>
				<input type="text" list="head_compare_list2" name="head_compare2" id="head_compare2" class="no-search-select form-control" placeholder="Enter City or Zip Code"/>
	            <datalist id="head_compare_list2" name="head_compare_list2" ></datalist>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 d-lg-block d-md-none"></div>
			<div class="col-lg-3 col-md-6  col-sm-6">
				<button class="header-search-button color-bg" style="left: 0;" type="submit"><i class="fas fa-share"></i><span>GO!</span></button>
			</div>
			<div class="col-lg-3 col-md-6  col-sm-6">
				<button class="header-search-button color-bg" id="reset_button" style="left: 0" type="button"><i class="fas fa-sync-alt"></i><span>Reset Page</span></button>
			</div>
			<div class="col-lg-3 d-md-none"></div>
		</div>
	</form>
</div>

<script>
	$(document).ready(function(){
		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	    

	    $( "#head_compare1" ).autocomplete({
	      source: function(request, response){
	        $.ajax({  
	          url:"/getsearchlist",  
	          method:"POST",
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          },
	          data:{query:$( "#head_compare1" ).val()},  
	          beforeSend: function(){
	            $("#head_compare1").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
	          },
	          success:function(data)  
	          {    
	            $("#head_compare1").css("background","#FFF");
	            response(JSON.parse(data));
	          }
	        });  
	      }
	    });

	    $( "#head_compare2" ).autocomplete({
	      source: function(request, response){
	        $.ajax({  
	          url:"/getsearchlist",  
	          method:"POST",
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          },
	          data:{query:$( "#head_compare2" ).val()},  
	          beforeSend: function(){
	            $("#head_compare2").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
	          },
	          success:function(data)  
	          {    
	            $("#head_compare2").css("background","#FFF");
	            response(JSON.parse(data));
	          }
	        });  
	      }
	    });
	      

	     $("#reset_button").click(function(){
	     	$("#head_compare1").val("");
	     	$("#head_compare2").val("");
	     });
	});
</script>
@include("components/footer")