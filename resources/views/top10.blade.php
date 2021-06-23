@include("components/header1")

<input type="hidden" name="" id="hidden_order" value="{{ $array[3] }}">
<div class="container" style="margin-top: 130px;margin-bottom: 100px;">
	<div class="section-title">
		<h2>TOP 10 CITIES</h2>
		<h4 style="color: #697891;font-size: 14px;font-weight: 700;">Please find Top 10 cities with Hotciti tools!</h4>
	</div>
	<h2 style="color: #697891;font-weight: 700;text-align: left;">Geographical Boundaries</h2>
	<form action="/top10" method="post">
		@csrf
		<div class="row mb-5 mt-4">
			
	        <div class="col-lg-4 col-md-6">
	            <!-- <input type="text" list="custom_box" name="custom_state" id="custom_state" class="form-control no-search-select" placeholder="Enter State" required />
	            <datalist id="custom_box" name="custom_box" ></datalist>  -->
	            <input type="text" list="custom_state_list" id="custom_state" name="custom_state" class=" no-search-select form-control main_search2" placeholder="Select State" value="{{ $array[0] }}"/>
				<datalist id="custom_state_list" name="custom_state_list" >
				  	@if($states ?? '')
	                    @foreach($states as $state)
	                        <option value="{{ $state->State }}">{{ $state->State }}</option>
	                    @endforeach
	                @endif
				</datalist>
	        </div>
	        <div class="col-lg-4 col-md-6">
	            <input type="text" name="custom_city" id="custom_city" class="form-control no-search-select" placeholder="Enter County"  value="{{ $array[1] }}"  />
	            <datalist id="custom_city_list" name="custom_city_list" ></datalist>
	        </div>

	        <div class="col-lg-4 col-md-6">
	            <input type="text" list="custom_region" id="custom_region_list" name="custom_region_list" class=" no-search-select form-control main_search2" placeholder="Select Region" value="{{ $array[2] }}"/>
				<datalist id="custom_region" name="custom_region" >
				  <option value="Midwest">
				  <option value="North East">
				  <option value="South East">
				  <option value="South West">
				  <option value="West">
				</datalist>
	        </div>

	    </div>
	    <h2 style="color: #697891;font-weight: 700;text-align: left;">Your Topics</h2>
	    <div class="row">
	    	
	    	<div class="col-md-6">
	            <select name="custom_select" class="form-control" style="height: 100%;">
	                <option value="commute_timeH">Commute Time (High to Low)</option>
	                <option value="commute_timeL">Commute Time (Low to High)</option>
	                <option value="livingcostH">Cost Of Living (High to Low)</option>
	                <option value="livingcostL">Cost Of Living (Low to High)</option>
	                <option value="high_temperatureH">High Temperature (High to Low)</option>
	                <option value="high_temperatureL">High Temperature (Low to High)</option>
	                <option value="med_homecostH">Med Home Cost (High to Low)</option>
	                <option value="med_homecostL">Med Home Cost (Low to High)</option>
	                <option value="populationH">Population (High to Low)</option>
	                <option value="populationL">Population (Low to High)</option>
	                <option value="registered_democratH">Registered Democrat (High to Low)</option>
	                <option value="registered_democratL">Registered Democrat (Low to High)</option>
	                <option value="registered_republicanH">Registered Republican (High to Low)</option>
	                <option value="registered_republicanL">Registered Republican (Low to High)</option>
	                <option value="snowH">Snow (High to Low)</option>
	                <option value="snowL">Snow (Low to High)</option>
	                <option value="sunny_daysH">Sunny Days (High to Low)</option>
	                <option value="sunny_daysL">Sunny Days (Low to High)</option>
	                <option value="violentcrimeH">Violent Crime (High to Low)</option>
	                <option value="violentcrimeL">Violent Crime (Low to High)</option>
	            </select>
	        </div>
	        <div class="col-md-3">
	        	<div class="listsearch-input-item" style="top: 10px;">
                    <button type="button" id="btn_reset" class="header-search-button color-bg"><i  class="fas fa-sync-alt"></i><span>Reset All</span></button>
                </div>
	        </div>
	        <div class="col-md-3">
	        	<div class="listsearch-input-item" style="top: 10px;">
                    <button class="header-search-button color-bg" name="btn_submit"><i  class="fas fa-undo"></i><span>Update Results</span></button>
                </div>
	        </div>
	    </div>
    </form>
    <h2 style="color: #697891;font-weight: 700;text-align: left;margin-top: 50px;">Your Search Results</h2>
    <div class="mt-4">
    	@foreach($results as $result)
            <div class="listing-item" style="width: 33%; padding: 0px 8px 0px 0px;">
                <article class="geodir-category-listing fl-wrap">
                   
                    <div class="geodir-category-img">
                        <div onclick="myFunction()" class="geodir-js-favorite_btn">
                          <i  class="fal fa-heart"></i>
                          <span>Save</span>
                    	</div>
	                    <a href="singlelisting?ID={{ $result->ID }}"  class="geodir-category-img-wrap fl-wrap">
	                      <img src="{{ $result->Picture_Links }}" alt=""> 
	                    </a>
	                    <div class="listing-avatar"><a href="/singlelisting?ID={{ $result->ID }}"><img src="images/avatar/1.jpg" alt=""></a>
	                        <span class="avatar-tooltip">View Details</strong></span>
	                    </div>
	                    <div class="geodir-category-opt">
	                        <div class="listing-rating-count-wrap">
	                            <div class="review-score">{{ $result->AverageRating }}</div>
		                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $result->AverageRating }}"></div>
		                        <br>
	                			<div class="reviews-count">{{ $result->NumberOf }} reviews</div>
                            </div>
                        </div>
                    </div>
                    <div class="geodir-category-content fl-wrap title-sin_item">
                        <div class="geodir-category-content-title fl-wrap">
                            <div class="geodir-category-content-title-item">
                                <h3 class="title-sin_map"><a href="#">{{ $result->City }}</a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                <div class="geodir-category-location fl-wrap"><a href="#" ><i class="fas fa-map-marker-alt"></i>{{ $result->State }}, USA</a></div>
                            </div>
                        </div>
                        <div class="geodir-category-text fl-wrap">
                            <p class="small-text">
                			To see full details of this city, click on the blue button above.</p>
                            <div class="facilities-list fl-wrap">
                                <div class="facilities-list-title">Tips : </div>
                                <ul class="no-list-style">
                                    <li class="tolt"  data-microtip-position="top" data-tooltip="Population:  {{ $result->Population }}"><i class="fal fa-parking"></i></li>
                                    <li class="tolt"  data-microtip-position="top" data-tooltip="Unemployment: {{ $result->Unemployment_Category }}"><i class="fal fa-shopping-bag"></i></li>
                                    <li class="tolt"  data-microtip-position="top" data-tooltip="Age Category: {{ $result->Median_Age_Category }}"><i class="fal fa-user-plus"></i></li>
                                    <li class="tolt"  data-microtip-position="top" data-tooltip="Income Category: {{ $result->Median_Income_Category }}"><i class="fal fa-wallet"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="geodir-category-footer fl-wrap">
                            <a class="listing-item-category-wrap">
                                <div class="listing-item-category red-bg"><i class="fal fa-home"></i></div>
                                <span>hotciti.com</span>
                            </a>
                            <div class="geodir-opt-list">
                                <ul class="no-list-style">
                                    <li><a href="#" class="show_gcc"></a></li>
                                    
                                    <li>
                                        <div class="dynamic-gal gdop-list-link"></div>
                                    </li>
                                </ul>
                            </div>
                            <div >
                                
                            </div>
                            <div class="geodir-category_contacts">
                                <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                                <ul class="no-list-style">
                                    <li><span><i class="fal fa-phone"></i> Call : </span><a href="#">+38099231212</a></li>
                                    <li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
          @endforeach
    </div>
</div>

<script>
	$(document).ready(function(){
		if($("#custom_state").val() != ""){
			$("#custom_region_list").attr("disabled", true);
			$("#custom_region_list").val("");
		}
		if($("#custom_city").val() != ""){
			$("#custom_region_list").attr("disabled", true);
			$("#custom_region_list").val("");
		}
		if($("#custom_region_list").val() != ""){
			$("#custom_city").attr("disabled", true);
			$("#custom_state").attr("disabled", true);
			$("#custom_city").val("");
			$("#custom_state").val("");
		}
		$("#custom_state").change(function(){
			$("#custom_region_list").attr("disabled", true);
			$("#custom_region_list").val("");
		});

		$("#custom_city").keyup(function(){
			$("#custom_region_list").attr("disabled", true);
			$("#custom_region_list").val("");
		});

		$("#custom_region_list").change(function(){
			$("#custom_city").attr("disabled", true);
			$("#custom_state").attr("disabled", true);
			$("#custom_city").val("");
			$("#custom_state").val("");
		});

		$("#btn_reset").click(function(){
			$("#custom_city").attr("disabled", false);
			$("#custom_state").attr("disabled", false);
			$("#custom_region_list").attr("disabled", false);
			$("#custom_city").val("");
			$("#custom_state").val("");
			$("#custom_region_list").val("");
		});
		var order = $("#hidden_order").val();
		$("option[value="+order+"]").attr("selected", true);
		// $('#custom_city').keyup(function(){  
		// 	var query = $('#custom_city').val();  
		// 	$.ajax({  
		// 		url:"/getcountylist",  
		// 		method:"POST",
		// 		headers: {
		// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		// 		},  
		// 		data:{query:query},  
		// 		beforeSend: function(){
		// 			$("#custom_city").css("background","#FFF url(images/ajax-loader.gif) no-repeat 100px");
		// 		},
		// 		success:function(data)  
		// 		{    
		// 			$('#custom_city_list').html(data); 
		// 			$("#custom_city").css("background","#FFF");
		// 		}  
		// 	});  
		// });  
		// $("#custom_city").bind('change', function () {
		// 	$('#custom_city').blur();  
		// }); 


	
	});
</script>
@include("components/footer")