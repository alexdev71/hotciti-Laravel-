@include('components/header1')

<div id="wrapper">
  
    <div class="content">
        <div class="map-container column-map right-pos-map fix-map hid-mob-map">
            <div id="map"></div>
            <div id="map-main"></div>
            <ul class="mapnavigation no-list-style">
                <li><a href="#" class="prevmap-nav mapnavbtn"><span><i class="fas fa-caret-left"></i></span></a></li>
                <li><a href="#" class="nextmap-nav mapnavbtn"><span><i class="fas fa-caret-right"></i></span></a></li>
            </ul>
            <div class="scrollContorl mapnavbtn tolt"   data-microtip-position="top-left" data-tooltip="Enable Scrolling"><span><i class="fal fa-unlock"></i></span></div>
            <div class="location-btn geoLocation tolt" data-microtip-position="top-left" data-tooltip="Your location"><span><i class="fal fa-loc ation"></i></span></div>
            <div class="map-close"><i class="fas fa-times"></i></div>
        </div>
        <div class="col-list-wrap novis_to-top">
            <div class="list-main-wrap-header fl-wrap fixed-listing-header">
                <div class="container">
                    

                  @csrf
                  <div class="grid-opt" style="float: right;">
                      <ul class="no-list-style">
                          <li class="grid-opt_act"><span class="two-col-grid tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="fal fa-th"></i></span></li>
                          <li class="grid-opt_act"><span class="one-col-grid tolt act-grid-opt" data-microtip-position="bottom" data-tooltip="List View"><i class="fal fa-list"></i></span></li>
                      </ul>
                  </div>
                </div>
                <a class="custom-scroll-link back-to-filters clbtg" href="#lisfw"><i class="fal fa-search"></i></a>
            </div>
            <div class="clearfix"></div>
            <div class="container">
                <div class="mob-nav-content-btn mncb_half color2-bg show-list-wrap-search fl-wrap"><i class="fal fa-filter"></i>  Results</div>
                <div class="mob-nav-content-btn mncb_half color2-bg schm  fl-wrap"><i class="fal fa-map-marker-alt"></i>  View on map</div>
            </div>
            <div class="listsearch-input-wrap_contrl fl-wrap" style="padding-top: 100px;">
                <div class="container">
                    <ul class="tabs-menu fl-wrap no-list-style">
                      <li class="current" >
                        <div class="row">
                          
                              <input type="hidden" id="hidden_city" value="{{ $location[0] }}" name="">
                              <input type="hidden" id="hidden_state" value="{{ $location[1] }}" name="">
                          <form action="/street_view" method="get" style="width: 100%;" id="street_view_form">
                            <div class="col-lg-6 col-md-12">
                              <input type="text" class="form-control" id="location" name="location" placeholder="Enter a Location">
                            </div>
                          <form>

                          <div class="col-lg-6 col-md-12">
                            <button type="button" class="btn btn-default" style="width: 100%;height: 45px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E !important;font-weight: 700 !important;" data-toggle="modal" data-target="#questionModal">Contact Agent</button>
                          </div>
                        </div>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="listing-item-container init-grid-items fl-wrap">
              <table>
              @foreach($results as $result)
                <div class="listing-item has_one_column">
                  <article class="geodir-category-listing fl-wrap">
                    <div class="geodir-category-img">
                      <input type="hidden" id="hidden_id_{{ $result->ID }}" value="{{ $result->ID }}" name="">
                      <div id="{{ $result->ID }}" class="geodir-js-favorite_btn" onclick="save_location({{ $result->ID }})">
                        <i  class="fal fa-heart"></i><span>Save</span>
                      </div>
                      <a href="singlelisting?ID={{ $result->ID }}"  class="geodir-category-img-wrap fl-wrap" target="_blank">
                        <img src="{{ $result->Picture_Links }}" alt="">
                      </a>
                      <div class="listing-avatar">
                        <a href="/singlelisting?ID={{ $result->ID }}">
                          <img src="images/avatar/1.jpg" alt="">
                        </a><span class="avatar-tooltip"><strong>View Details</strong></span>
                      </div>
                      <div class="geodir_status_date gsd_open">
                        <i class="fal fa-car"></i>
                        <a href="" id="compare_city_{{ $result->ID }}" class="{{ $result->City_State_Combined }}" onclick="compare_modal_value({{ $result->ID }})" data-toggle="modal" data-target="#compareModal">Compare</a>
                      </div>
                      <!-- <div class="geodir_status_date gsd_open" style="margin-top: 40px;">
                        <p class="view_city_map" id="{{ $result->ID }}" onclick="view_city_map({{ $result->ID }})" style="cursor: pointer;color: #007bff;margin-bottom: 0px;"><i class="fas fa-map-marker-alt"></i>View On Map</p>
                      </div>
                      <div class="geodir_status_date gsd_open" style="margin-top: 80px;">
                        <p class="view_city_map" id="{{ $result->ID }}" onclick="show_street('{{ $result->City }}','{{ $result->State }}')" style="cursor: pointer;color: #007bff;margin-bottom: 0px;"><i class="fas fa-map-marker-alt"></i>Street View</p>
                      </div> -->
                      <div class="geodir-category-opt">
                        <div class="listing-rating-count-wrap">
                          <div class="review-score">{{ $result->AverageRating }}</div>
                          <div class="listing-rating card-popup-rainingvis" data-starrating2="'+ response[i].AverageRating +'"></div><br>
                          <div class="reviews-count">{{ $result->NumberOf }} reviews</div>
                        </div>
                      </div>
                    </div>
                    <div class="geodir-category-content fl-wrap title-sin_item">
                      <div class="geodir-category-content-title fl-wrap">
                        <div class="geodir-category-content-title-item">
                          <h3 class="title-sin_map"><a href="#">{{ $result->City }}</a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                          <div class="geodir-category-location fl-wrap">
                            <a href="#" ><i class="fas fa-map-marker-alt"></i>{{ $result->State }}, USA</a>
                          </div>
                        </div>
                      </div>
                      <div class="geodir-category-text fl-wrap">
                        <p class="small-text">To see full details of this city, click on the blue button above.</p>
                        <div class="facilities-list fl-wrap">
                          <div class="facilities-list-title">Tips : </div>
                          <ul class="no-list-style">
                            <li class="tolt"  data-microtip-position="top" data-tooltip="Population:  {{ $result->Population }}">
                              <i class="fal fa-parking"></i>
                            </li>
                            <li class="tolt"  data-microtip-position="top" data-tooltip="Unemployment: {{ $result->Unemployment_Category }}">
                              <i class="fal fa-shopping-bag"></i>
                            </li>
                            <li class="tolt"  data-microtip-position="top" data-tooltip="Age Category: {{ $result->Median_Age_Category }}">
                              <i class="fal fa-user-plus"></i>
                            </li>
                            <li class="tolt"  data-microtip-position="top" data-tooltip="Income Category: {{ $result->Median_Income_Category }}">
                              <i class="fal fa-wallet"></i>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="geodir-category-footer fl-wrap">
                        <a href="/location_home?location={{ $result->State_Abbreviated }} {{ $result->City }}" class="listing-item-category-wrap" target="_blank">
                          <div class="listing-item-category red-bg">
                            <i class="fal fa-home"></i>
                          </div>
                          <span>Homes</span>
                        </a>
                        <a href="/find_schools?location={{ $result->City }} {{ $result->State }}" class="listing-item-category-wrap" style="margin-left: 10px;" target="_blank">
                          <div class="listing-item-category red-bg">
                            <i class="fal fa-school"></i>
                          </div>
                          <span>Schools</span>
                        </a>
                        <div class="geodir-opt-list">
                          <ul class="no-list-style">
                            <li>
                              <a href="#" class="show_gcc"></a>
                            </li>
                            <li>
                              <div class="dynamic-gal gdop-list-link"></div>
                            </li>
                          </ul>
                        </div>
                        <div></div>
                        <div class="geodir-category_contacts">
                          <div class="close_gcc"><i class="fal fa-times-circle"></i>
                          </div>
                          <ul class="no-list-style">
                            <li><span><i class="fal fa-phone"></i> Call : </span>
                              <a href="#">+38099231212</a></li><li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </article>
                </div>
                @endforeach
              </table>                                                                             
                            
            </div>
        </div>
        <div class="limit-box fl-wrap"></div>
    </div>
</div>
<!-- <script src="{{ asset('js/map-listing-school.js') }}"></script> -->
<script>
  let panorama;
  function show_street(city,state) {
    city = city.replace(" township", "");
    var address = city + " " + state;
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: address }, (results, status) => {
      if (status === "OK") {
        var latlong = JSON.parse(JSON.stringify(results[0].geometry.location));
        console.log(latlong);
        var lat = latlong.lat;
        var long = latlong.lng;
        lat = parseFloat(lat.toFixed(4));
        long = parseFloat(long.toFixed(4));
        console.log(lat + "," + long);
        panorama = new google.maps.StreetViewPanorama(
          document.getElementById("map-main"),
          {
            position: { lat: lat, lng: long },
            pov: { heading: 165, pitch: 0 },
            zoom: 1,
          }
        );
      } else {
        alert(
          "Geocode was not successful for the following reason: " + status
        );
      }
    });
    
  }
  $(document).ready(function(){
    var city = $("#hidden_city").val();
    var state = $("#hidden_state").val();
    show_street(city, state);

    $( "#location" ).autocomplete({
      source: function(request, response){
        $.ajax({  
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:$( "#location" ).val()},  
          beforeSend: function(){
            $("#location").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
            $("#location").css("background","#FFF");
            response(JSON.parse(data));
          }
        });  
      }
    });

    $( "#location" ).autocomplete({
      select: function(event, ui){
        setTimeout(function(){
          $("#street_view_form").submit();
        },2000);
      }
    });

    if(screen.width < 800){
      var elements = document.querySelectorAll("#wrapper > div > div.col-list-wrap.novis_to-top > div.listing-item-container.init-grid-items.fl-wrap > div");
      for(var i = 0; i < elements.length; i++){
        var element = elements[i];
        element.classList.remove("has_one_column");
        element.classList.add("has_two_column");
        element.setAttribute("style", "height: 404px;");
      }
    }
    $(".see_school_members").click(function(){
      var search_key = $(this).attr("id");
      var search_key_array = search_key.split("-");
      var district = search_key_array[0];
      var state = search_key_array[1];
      state = state.toUpperCase();
      if(district != ""){
        if(district.includes(" School District")){
          district = district.replace(" School District", "");
        }
      }
      else{
        Swal.fire("Error", "Data not available!", "error");
        $("#iframeModal").modal("hide");
        return;
      }
      district = district.replace(/ /g, "-");
      var search_link = "https://xqsuperschool.org/school-board-lookup?district="+district+"-"+state;
      // alert(search_link);
      window.open(search_link);
      
    });
  });
</script>
@include('components/footer')