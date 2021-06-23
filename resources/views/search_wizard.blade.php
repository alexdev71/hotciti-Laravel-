@include("components/header1")
<div class="container" id="search_new_wrap">
	<div class="section-title">
		<h2 id="header_text3">Where should you be living?</h2>
	</div>
	<div class="main-search-wrap row">
	  <div class="col-lg-6">
	    <h4 style="text-align: left;">I know exactly where I want to live, take me there!</h4>
	  </div>
	  <div class="col-lg-6">
	    <form action="/singlelisting" method="get">
	      <input type="text" list="search1" name="map-search1" id="main_search1" class="no-search-select form-control" placeholder="Enter City or Zip Code"/>
	      <datalist id="search1" name="search1" ></datalist>
	      <button type="submit" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
	    </form>
	  </div>
	</div>

	<div class="main-search-wrap row">
	  <div class="col-lg-6">
	    <h4 style="text-align: left;">I have an idea where I want to live, help me refine it!</h4>
	  </div>
	  <div class="col-lg-6">
	    <form action="/new_result" method="post">
	      @csrf
	      <div class="row">
	        <div class="col-md-8">
	          <div class="row" style="width: 348px;margin-left: 0px;margin-bottom: 10px;">
	            <div class="col-md-5 main_search2_wrap">
	             <!--  <input type="text" list="search1" name="main_search2_region" id="main_search2_region" class="no-search-select form-control main_search2" placeholder="Select a region"/> -->
	              <input type="text" list="box1" id="main_search2_region" name="main_search2_region" class=" no-search-select form-control main_search2" placeholder="Select Region" value=""/>
	              <datalist id="box1" name="box1" >
	                  <option value="Midwest">
	                  <option value="North East">
	                  <option value="South East">
	                  <option value="South West">
	                  <option value="West">
	              </datalist>
	            </div>
	            <div class="col-md-3 main_search2_wrap">
	               <input type="text" list="state_box" name="main_search2_state" id="main_search2_state" class="no-search-select form-control main_search2" placeholder="or State"/>
	               <datalist id="state_box" name="state_box" >
	                 @if($states ?? '')
	                      @foreach($states as $state)
	                          <option value="{{ $state->State }}">{{ $state->State }}</option>
	                      @endforeach
	                  @endif
	               </datalist>
	            </div>
	            <div class="col-md-4 main_search2_wrap">
	               <input type="text" list="county_box" name="main_search2_county" id="main_search2_county" class="no-search-select form-control main_search2" placeholder="or County"/>
	               <datalist id="county_box" name="county_box" ></datalist>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-3">
	          <button type="submit" class="btn btn-default" style="background: #384F95;" id="btn_submit_second">Let's Do This<i class="far fa-search"></i></button>
	        </div>
	      </div>
	    </form>
	  </div>
	</div>

	<div class="main-search-wrap row">
	  <div class="col-lg-6">
	    <h4 style="text-align: left;">I have no clue, tell me where I should be living!</h4>
	  </div>
	  <div class="col-lg-6">
	    <form action="/new_result" method="post">
	      @csrf
	      <input type="text" list="search1" name="main_search3" id="main_search3" class="no-search-select form-control main_search3" placeholder="We are really good at this" disabled="true" />
	      <button type="submit" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
	    </form>
	  </div>
	</div>
</div>

@include("components/footer")