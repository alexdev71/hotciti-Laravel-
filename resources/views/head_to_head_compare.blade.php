@include("components/header1")

<div id="head_compare_container" style="text-align: left;">
	<h1 style="color: #697891;font-weight: 800;text-align: center;">HEAD TO HEAD RESULTS</h1>
	<div class="row" style="margin-top: 50px;">
		<div class="col-lg-5" style="display: block;">
			<label style="font-size: 22px; color: #697891;font-weight: 600;">Location One: {{ $array1['City_State_Combined'] }}</label>
			<div id="city1_badge" style="font-size: 80px;color: #4DB7FE;position: absolute;margin-left: 80%;top: -30px;"><i class="fas fa-check"></i></div>
			<a href="singlelisting?ID={{ $array1['ID'] }}"><img src="{{ $array1['Picture_Links'] }}" style="width: 100%;height: 320px;"></a><br/><br/><br/>
			<label style="font-size: 18px; color: #697891;font-weight: 600;">{{ $array1['City_State_Combined'] }} Has:</label><br/>
			<ul style="list-style: inside;text-align: left;font-size: 14px;" id="city1_advs">
				@if($array1['Unemployment_Rate'] < $array2['Unemployment_Rate'])
					<li>Lower Unemployment Rate</li>
				@endif
				@if($array1['Property_Crime'] < $array2['Property_Crime'])
					<li>Less Property Crime</li>
				@endif
				@if($array1['Violent_Crime'] < $array2['Violent_Crime'])
					<li>Less Violent Crime</li>
				@endif
				@if($array1['Sunny_days'] > $array2['Sunny_days'])
					<li>More Sunny Days</li>
				@endif
				@if($array1['Sales_Taxes'] < $array2['Sales_Taxes'])
					<li>Lower Sales Tax</li>
				@endif
				@if($array1['Income_Taxes'] < $array2['Income_Taxes'])
					<li>Lower Income Tax</li>
				@endif
				@if($array1['Property_Tax_Rate'] < $array2['Property_Tax_Rate'])
					<li>Lower Property Tax</li>
				@endif
				@if($array1['High_School_Grads_'] > $array2['High_School_Grads_'])
					<li>More Educated</li>
				@endif
			</ul>
		</div>
		<div class="col-lg-2"><h1 style="color: #697891;font-weight: 800;margin-top: 20px;text-align: center;" id="result_simbol">VS</h1></div>
		<div class="col-lg-5" style="display: block;">
			<label style="font-size: 22px; color: #697891;font-weight: 600;">Location Two: {{ $array2['City_State_Combined'] }}</label>
			<div id="city2_badge" style="font-size: 80px;color: #4DB7FE;position: absolute;margin-left: 80%;top: -30px;"><i class="fas fa-check"></i></div>
			<a href="/singlelisting?ID={{ $array2['ID'] }}"><img src="{{ $array2['Picture_Links'] }}" style="width: 100%;height: 320px;"></a><br/><br/><br/>
			<label style="font-size: 18px; color: #697891;font-weight: 600;">{{ $array2['City_State_Combined'] }} Has:</label>
			<ul style="list-style: inside;text-align: left;font-size: 14px;" id="city2_advs">
				@if($array1['Unemployment_Rate'] > $array2['Unemployment_Rate'])
					<li>Lower Unemployment Rate</li>
				@endif
				@if($array1['Property_Crime'] > $array2['Property_Crime'])
					<li>Less Property Crime</li>
				@endif
				@if($array1['Violent_Crime'] > $array2['Violent_Crime'])
					<li>Less Violent Crime</li>
				@endif
				@if($array1['Sunny_days'] < $array2['Sunny_days'])
					<li>More Sunny Days</li>
				@endif
				@if($array1['Sales_Taxes'] > $array2['Sales_Taxes'])
					<li>Lower Sales Tax</li>
				@endif
				@if($array1['Income_Taxes'] > $array2['Income_Taxes'])
					<li>Lower Income Tax</li>
				@endif
				@if($array1['Property_Tax_Rate'] > $array2['Property_Tax_Rate'])
					<li>Lower Property Tax</li>
				@endif
				@if($array1['High_School_Grads_'] < $array2['High_School_Grads_'])
					<li>More Educated</li>
				@endif
			</ul>
		</div>
	</div>
	<div class="row" style="margin-top: 50px;">
		<div class="col-lg-4">
			<button class="header-search-button color-bg" style="left: 0;" onclick="window.location='/head_to_head'"><i class="fas fa-sync-alt"></i><span>Back</span></button>
		</div>
	</div>
</div>


<script>
	$(document).ready(function(){
		var city1 = $("#city1_advs li").length;
		var city2 = $("#city2_advs li").length;
		if(city1 == city2){
			$("#result_simbol").html("TIE");
			document.getElementById("result_simbol").style.color = 'red';	
			$("#city2_badge").attr("style", "display: none");
			$("#city1_badge").attr("style", "display: none");
		}
		if (city1 > city2) {
			$("#city2_badge").attr("style", "display: none");
		}else if(city1 < city2){
			$("#city1_badge").attr("style", "display: none");
		}
	});
</script>
@include("components/footer")