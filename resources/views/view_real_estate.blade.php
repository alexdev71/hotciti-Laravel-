@include("components/header1")

<div id="real_estate_container">
	<h1 style="color: #697891; font-weight: 700;margin-bottom: 50px;">Real Estate in <a href="/singlelisting?ID={{ $row->ID }}" style="color:#697891; ">{{ $row->City }}, {{ $row->State }}</a></h1>
	<div class="row">
		<div class="col-lg-7 col-md-12">
			<div id="real_estate" class="container"><br>
	            <div class="row">

	                <div class="col-md-4">
	                    <div class="card">
	                        <div class="card_header_icon"><a href="https://www.realtor.com/realestateandhomes-search/{{ $row->City }}_{{ $row->{'State_Abbreviated'} }}" target="_blank" ><i class="fas fa-home"></i></a></div>
	                        <div class="card-body">
	                            <h5 class="card-title mt-4 mb-4" style="color: #697891;">Realtor.com</h5>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-4">
	                    <div class="card">
	                        <div class="card_header_icon"><a href="https://www.zillow.com/homes/{{ $row->City }},-{{ $row->{'State_Abbreviated'} }}_rb/" target="_blank" ><i class="fas fa-home"></i></a></div>
	                        <div class="card-body">
	                            <h5 class="card-title mt-4 mb-4" style="color: #697891;">Zillow</h5>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-4">
	                    <div class="card">
	                        <div class="card_header_icon"><a href="https://www.trulia.com/{{ $row->{'State_Abbreviated'} }}/{{ $row->City }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-home"></i></a></div>
	                        <div class="card-body">
	                            <h5 class="card-title mt-4 mb-4" style="color: #697891;">Trulia</h5>
	                        </div>
	                    </div>
	                </div>


	            </div>

	            <div class="row" style="margin-top: 10px;">

	                <div class="col-md-4">
	                    <div class="card">
	                        <div class="card_header_icon"><a href="https://www.showcase.com/{{ $row->{'State_Abbreviated'} }}/{{ $row->City }}/retail-space/for-rent/" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="far fa-store"></i></a></div>
	                        <div class="card-body">
	                            <h5 class="card-title mt-4 mb-4" style="color: #697891;">Commercial Property</h5>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-4">
	                    <div class="card">
	                        <div class="card_header_icon"><a href="https://www.forrent.com/find/{{ $row->{'State_Abbreviated'} }}/{{ $row->City }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="far fa-building"></i></a></div>
	                        <div class="card-body">
	                            <h5 class="card-title mt-4 mb-4" style="color: #697891;">Apartments For Rent</h5>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-4">
	                    <div class="card">
	                        <div class="card_header_icon"><a href="https://www.homeaway.com/search/keywords:{{ $row->City_State_Combined }}-united-states?CID=a_ph_6&amp;k_clickid=1100l8mGg64T&amp;utm_campaign=hometogo_1101l251&amp;utm_content=0&amp;utm_medium=partner&amp;utm_source=aff_ph&amp;adultsCount=2" target="_blank" ><i class="fas fa-island-tropical"></i></a></div>
	                        <div class="card-body">
	                            <h5 class="card-title mt-4 mb-4" style="color: #697891;">Vacation Rentals</h5>
	                        </div>
	                    </div>
	                </div>


	            </div>

	            <div class="row" style="margin-top: 10px;">

	                <div class="col-md-4">
	                    <div class="card">
	                        <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Contractors&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-file-signature"></i></a></div>
	                        <div class="card-body">
	                            <h5 class="card-title mt-4 mb-4" style="color: #697891;">Contractors</h5>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-4">
	                	<div class="card">
	                        <div class="card_header_icon"><a href="https://www.foreclosure.com/listing/search?q={{ $row->City }}%2C+{{ $row->{'State_Abbreviated'} }}" target="_blank" ><i class="fas fa-home"></i></a></div>
	                        <div class="card-body">
	                            <h5 class="card-title mt-4 mb-4" style="color: #697891;">Foreclosure</h5>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
		<div class="col-lg-1 d-lg-block d-md-none"></div>
		<div class="col-lg-4 col-md-12">
			<div class="box-widget-item fl-wrap block_box" style="padding: 20px;">
				<form action="/view_real_estate" method="get" id="city_home_form">
					<h4 style="color: #697891;font-weight: 700;">Try Another Location</h4>
	                <input type="text" list="search1" name="city_home_search" id="city_home_search" class="no-search-select form-control" placeholder="Enter New City or Zip Code" style="margin-top: 5%;" />
	                <datalist id="search1" name="search1" ></datalist>
	                

	            </form>
	        </div>
			<div class="box-widget-item fl-wrap block_box" style="margin-top: 17px;">
                <div class="box-widget opening-hours fl-wrap">
                    <div class="box-widget-content">
                        <div id="mc_embed_signup" style="text-align: left;">
                            
                            <div id="mc_embed_signup_scroll">
                                <h2 style="color: #697891;font-weight: 700;">MORE ABOUT THIS LOCATION</h2>
                                <input type="hidden" name="form_location" id="form_location" value="{{ $row->City_State_Combined }}">
                                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                <div class="mc-field-group">
                                    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                    </label>
                                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-FNAME">Full Name <span class="asterisk">*</span></label>
                                    <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-phone">Phone Number <span class="asterisk">*</span></label>
                                    <input type="text" value="" name="PHONE" class="" id="mce-phone">
                                </div>
                                <div class="mc-field-group">
                                    <label for=""></label>
                                    <input type="text" placeholder="I am interested in {{ $row->City }}, {{ $row->State_Abbreviated }}" disabled="true" style="margin-top: 20px;">
                                </div>
                                <div class="mc-field-group">
                                    <input type="checkbox" name="contact_me_check" style="width: 10%;float: left;margin-top: 2px;" id="contact_me_check">
                                    <label for="contact_me_check">I would like an agent to contact me.</label>
                                </div>
                                
                                <div class="clear">
                                    <input type="button" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="width: 100%;height: 50px;border-radius: 30px;background-color: #425998;">
                                    <p style="line-height: 1.75;color: #697891;">By proceeding, you consent to receive calls and texts at the number you provided, including marketing by autodialer and prerecorded and artificial voice and email, from hotciti.com and others about your inquiry and other home-related matters, but not as a condition of any purchase; this applies regardless of whether you check, or leave un-checked the box above.</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$(".to_iframe").click(function(){
	        var href = $(this).attr("href");
	        document.getElementById("site_frame").src = href;
	    });
	    $("#mc-embedded-subscribe").click(function(){
	    	if($("#mce-EMAIL").val() == "" && $("#mce-FNAME").val() == "" && $("#mce-phone").val() == ""){
	    		Swal.fire("Error", "All fields are required!", "error");
	    		return;
	    	}
	        var content = "";
	        if($("#contact_me_check").prop("checked") == true){
	            content = "I would like an agent to contact me";
	        }
	        $.ajax({
	            url: "/town_report_form",
	            method: "post",
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            data: {
	                EMAIL: $("#mce-EMAIL").val(),
	                FNAME: $("#mce-FNAME").val(),
	                phone: $("#mce-phone").val(),
	                MMERGE5: content,
	                form_location: $("#form_location").val(),
	            },
	            success:function(data){
	                Swal.fire("success", "Successfully Submitted!", "success");
	                $("#mce-EMAIL").val("");
	                $("#mce-FNAME").val("");
	                $("#mce-phone").val("");
	                $("#contact_me_check").prop("checked", false);
	            }
	        });
	    });
	});
</script>
@include("components/footer")