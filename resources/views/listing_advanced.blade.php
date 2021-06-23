@include("components/header1")

<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!-- Map -->
        <div class="map-container column-map right-pos-map fix-map hid-mob-map">
            <div id="map"></div>
            <div id="map-main"></div>
            <ul class="mapnavigation no-list-style">
                <li><a href="#" class="prevmap-nav mapnavbtn"><span><i class="fas fa-caret-left"></i></span></a></li>
                <li><a href="#" class="nextmap-nav mapnavbtn"><span><i class="fas fa-caret-right"></i></span></a></li>
            </ul>
            <div class="scrollContorl mapnavbtn tolt"   data-microtip-position="top-left" data-tooltip="Enable Scrolling"><span><i class="fal fa-unlock"></i></span></div>
            <div class="location-btn geoLocation tolt" data-microtip-position="top-left" data-tooltip="Your location"><span><i class="fal fa-location"></i></span></div>
            <div class="map-close"><i class="fas fa-times"></i></div>
        </div>
        <!-- Map end -->
        <div class="col-list-wrap novis_to-top">
            <!-- list-main-wrap-header-->
            <div class="list-main-wrap-header fl-wrap fixed-listing-header">
                <div class="container">
                    <!-- list-main-wrap-title-->
                    
                    <!-- list-main-wrap-title end-->
                    <!-- list-main-wrap-opt-->
                      <input type="hidden" id ="hidden_submit">
                    <div class="list-main-wrap-opt">
                        <!-- price-opt-->
                        <div class="price-opt">
                            <span class="price-opt-title">Sort   by:</span>
                            <div class="listsearch-input-item">
                              <select class="chosen-select no-search-select" name="sortt" id="sortt">
                                <option value="default">Default</option>
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
                        </div>
                        <!-- price-opt end-->
                        <!-- price-opt-->
                        <div class="grid-opt">
                            <ul class="no-list-style">
                                <li class="grid-opt_act"><span class="two-col-grid tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="fal fa-th"></i></span></li>
                                <li class="grid-opt_act"><span class="one-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="fal fa-list"></i></span></li>
                            </ul>
                        </div>
                        <!-- price-opt end-->
                    </div>
                    <!-- list-main-wrap-opt end-->                    
                </div>
                <a class="custom-scroll-link back-to-filters clbtg" href="#lisfw"><i class="fal fa-search"></i></a>
            </div>
            <!-- list-main-wrap-header end-->  
            <div class="clearfix"></div>
            <div class="container">
                <div class="mob-nav-content-btn mncb_half color2-bg show-list-wrap-search fl-wrap"><i class="fal fa-filter"></i>  Tools</div>
                <div class="mob-nav-content-btn mncb_half color2-bg schm  fl-wrap"><i class="fal fa-map-marker-alt"></i>  View on map</div>
            </div>
            <div class="clearfix"></div>
            <!-- listsearch-input-wrap-->
            <div class="listsearch-input-wrap lws_mobile fl-wrap tabs-act" id="lisfw">
                <div class="listsearch-input-wrap_contrl fl-wrap" id="sticky_result_wrap">
                    <div class="container">
                        <ul class="tabs-menu fl-wrap no-list-style">
                          <li class="current" >
                            <a href="#" style="text-decoration: none;">
                              <div class="row">
                                <div class="col-md-5">
                                  
                                    <h1 id="counter_listing" name="counter_listing" style="text-align: left;padding-left: 30px;"></h1>
                                  
                                </div>
                                <div class="col-md-7">
                                  <div class="row" style="margin-right: 0px;">
                                    <div class="col-md-4" id="video_view_wrap">
                                      <div class="listsearch-input-item">
                                        <button class="header-search-button color-bg" id="btn_to_distance_search" type="button" style="margin-top: 15px;"><span>Distance Search</span></button>
                                      </div>
                                    </div>
                                    <div class="col-md-4" id="download_wrap">
                                      <div class="listsearch-input-item">
                                          <button type="button" class="header-search-button color-bg" id="btn_to_advanced_search" style="margin-top: 15px;"><span>Advanced Search</span></button>
                                      </div>
                                    </div>

                                    <div class="col-md-4">
                                      <div class="listsearch-input-item">
                                          <button class="header-search-button color-bg" id="btn_reset_search" type="button" style="margin-top: 15px;"><i class="fas fa-sync-alt" style="color: white !important;padding-right: 0px;margin-right: 0px;"></i><span>Reset Search</span></button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </a>
                            
                          </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- listsearch-input-wrap end-->
            <!-- listing-item-container -->
            <div id="search_wizard">
              <input type="hidden" id="hidden_multi_state" name="">
              <div class="row" style="width: 90%;margin: auto;">
                <div class="col-12">
                  <select id="multi-select" class="selectpicker" multiple data-live-search="true"></select>
                </div>

                <div class="col-lg-3 col-md-6" style="text-align:left;margin-top: 20px;">
                  <label style="font-weight: 800;font-size: 14px;">AREA TYPE:</label>
                  <br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_pop" id="check_city" />
                    <div class="state p-primary">
                        <label>City</label>
                    </div>
                  </div><br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_pop" id="check_city_neighbour"  />
                    <div class="state p-primary">
                        <label>City Neighbourhood</label>
                    </div>
                  </div><br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_pop" id="check_suburbs"  />
                    <div class="state p-primary">
                        <label>Suburbs</label>
                    </div>
                  </div><br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_pop" id="check_towns"  />
                    <div class="state p-primary">
                        <label>Towns</label>
                    </div>
                  </div><br/><br/>
                </div>

                <div class="col-lg-6 col-md-6" style="margin-top: 20px;">
                  <div>
                    <label style="font-weight: 800;font-size: 14px;">COST OF LIVING:</label>
                    <br/><br/>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-default btn_search_cost_living btn_selections" id="btn_cost_living_1">$</button>
                      <button type="button" class="btn btn-default btn_search_cost_living btn_selections" id="btn_cost_living_2">$$</button>
                      <button type="button" class="btn btn-default btn_search_cost_living btn_selections" id="btn_cost_living_3">$$$</button>
                      <button type="button" class="btn btn-default btn_search_cost_living btn_selections" id="btn_cost_living_4">$$$$</button>
                    </div>
                  </div>

                  <div style="margin-top: 25px;">
                    <label style="font-weight: 800;font-size: 14px;">CRIME AND SAFETY GRADE:</label>
                    <br/>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-default btn_search_crime_grade btn_selections" id="btn_crime_1">A</button>
                      <button type="button" class="btn btn-default btn_search_crime_grade btn_selections" id="btn_crime_2">B</button>
                      <button type="button" class="btn btn-default btn_search_crime_grade btn_selections" id="btn_crime_3">C</button>
                      <button type="button" class="btn btn-default btn_search_crime_grade btn_selections" id="btn_crime_4">D</button>
                    </div>
                  </div>

                  <div style="margin-top: 25px;">
                    <label style="font-weight: 800;font-size: 14px;">HOME COST:</label>
                    <br/>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-default btn_search_home_cost btn_selections" id="btn_home_cost_1">$</button>
                      <button type="button" class="btn btn-default btn_search_home_cost btn_selections" id="btn_home_cost_2">$$</button>
                      <button type="button" class="btn btn-default btn_search_home_cost btn_selections" id="btn_home_cost_3">$$$</button>
                      <button type="button" class="btn btn-default btn_search_home_cost btn_selections" id="btn_home_cost_4">$$$$</button>
                    </div>
                  </div>
                  
                </div>

                <div class="col-lg-3 col-md-6" style="text-align:left;margin-top: 20px;">
                  <label style="font-weight: 800;font-size: 14px;">POLITICS:</label>
                  <br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_politics" id="check_very_conservative" />
                    <div class="state p-primary">
                        <label>Very Conservative</label>
                    </div>
                  </div><br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_politics" id="check_conservative"  />
                    <div class="state p-primary">
                        <label>Conservative</label>
                    </div>
                  </div><br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_politics" id="check_balanced"  />
                    <div class="state p-primary">
                        <label>Balanced</label>
                    </div>
                  </div><br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_politics" id="check_liberal"  />
                    <div class="state p-primary">
                        <label>Liberal</label>
                    </div>
                  </div><br/><br/>
                  <div class="pretty p-default">
                    <input type="checkbox" class="search_checks_politics" id="check_very_liberal"  />
                    <div class="state p-primary">
                        <label>Very Liberal</label>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-6" style="margin-top: 40px;">
                  
                  <div class="col-lg-4">
                    <input type="hidden" id="hidden_male_female_ratio">
                    <label style="font-weight: 800;font-size: 14px;">MALE / FEMALE RATIO:</label>
                    <div class="d-flex justify-content-center my-4">
                      <span class="font-weight-bold indigo-text mr-2" style="font-size: 25px;margin-top: -12px;"><i class="fas fa-female"></i></span>
                      <form class="range-field">
                        <input class="border-0" type="range" min="45" max="85" step="1" id="male_female_slider" />
                      </form>
                      <span class="font-weight-bold indigo-text ml-2" style="font-size: 25px;margin-top: -12px;"><i class="fas fa-male"></i></span>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <input type="hidden" id="hidden_weather">
                    <label style="font-weight: 800;font-size: 14px;">WEATHER:</label>
                    <div class="d-flex justify-content-center my-4">
                      <span class="font-weight-bold indigo-text mr-2" style="font-size: 25px;margin-top: -12px;"><i class="fas fa-cloud-rain"></i></span>
                      <form class="range-field">
                        <input class="border-0" type="range" min="0" max="100" step="1" id="weather_slider" />
                      </form>
                      <span class="font-weight-bold indigo-text ml-2" style="font-size: 25px;margin-top: -12px;"><i class="fas fa-sun"></i></span>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <input type="hidden" id="hidden_single_ratio">
                    <label style="font-weight: 800;font-size: 14px;">MARRIED / SINGLE:</label>
                    <div class="d-flex justify-content-center my-4">
                      <span class="font-weight-bold indigo-text mr-2" style="font-size: 25px;margin-top: -12px;"><i class="fas fa-male"></i><i class="fas fa-female"></i></span>
                      <form class="range-field">
                        <input class="border-0" type="range" min="0" max="50" step="1" id="single_slider" />
                      </form>
                      <span class="font-weight-bold indigo-text ml-2" style="font-size: 25px;margin-top: -12px;"><i class="fas fa-male"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="listing-item-container init-grid-items fl-wrap">
   
              <input type="hidden" value="{{ session('email') }}" id="hidden_email" name="hidden_email">
              <table id="listing_data_table">
              
              </table>
              <input type="hidden" id="hidden_list_number" value="10" name="">                                                                    
              <button class="header-search-button color-bg" id="btn_list_location_more" style="position: relative;margin-top: 30px;"><i class="fas fa-sync-alt"></i>Load More</button>              
            </div>

            <!-- listing-item-container end -->
        </div>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>
<script src="{{ asset('js/map-listing33-advanced.js') }}"></script>
<script>
  let panorama;
  function showColumnhiddenmap() {
      if ($(window).width() < 1064) {
          $(".hid-mob-map").animate({
              right: 0
          }, 500, "easeInOutExpo").addClass("fixed-mobile");
      }
  }
  function show_street(city,state) {
    showColumnhiddenmap();
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
  function save_location(id){
    var query1=$("#hidden_email").val();
    var query2=id; 
    if (query1==null || query1.trim()=="") {
        Swal.fire("Register", "Please login or register to save favorite locations", "warning");
    }
    else {
        $.ajax({
            url:"/setfavorite",
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{query1:query1, query2:query2},
            success:function()
            {
             Swal.fire("Success!", "Your selection had been saved", "success");
            }
        });
       }
  }
  function view_city_map(id){
    console.log("view_city_map");
    showColumnhiddenmap();
    let locations = [];
    var map_key = id;
    $.ajax({
      url:"/getCityMapdata",
      method:"POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{
        map_key: map_key
      },
      cache: false,

      success:function(res_data)
      {
        console.log(res_data);
        var data = typeof res_data != 'object' ? JSON.parse(res_data) : res_data;
        var city = [];
        var state = [];
        var locationURL = [];
        var locationImg = [];
        var locationTitle = [];
        var locationAddress = [];
        var locationCategory = [];
        var locationStarRating = [];
        var locationRevievsCounter = [];
        var locationStateAbb = [];
        var locationStatus = [];
        var lat = [];
        var lon = [];
        var marker = [];
        var image = [];
        for (var i in data) {
          city.push(data[i].City);
          state.push(data[i].State);
          locationURL.push(data[i].ID);
          locationImg.push(data[i].Picture_Links);
          locationTitle.push(data[i].City);
          locationAddress.push(data[i].State);
          locationCategory.push('cafe-cat');
          locationStarRating.push('5');
          locationStateAbb.push(data[i].State_Abbreviated);
          locationRevievsCounter.push('4');
          locationStatus.push('open');
          lat.push(data[i].Latitude);
          lon.push(data[i].Longitude);
          marker.push(data[i].ID);
          image.push(data[i].Picture_Links);
        }
        for(let k=0, l=city.length; k < l; k++){

        locations.push([locationData(locationURL[k], locationImg[k], locationTitle[k], locationAddress[k], locationCategory[k], locationStarRating[k], locationStateAbb[k], locationRevievsCounter[k], locationStatus[k]), parseFloat(lat[k]), parseFloat(lon[k]), parseFloat(marker[k]), image[k]],);
        
        }

        function locationData(locationURL, locationImg, locationTitle, locationAddress, locationCategory, locationStatus, locationStateAbb) {
          return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fal fa-times"></i></div><a href="singlelisting?ID='+locationURL+'" class="listing-img-content fl-wrap"><div class="infobox-status '+ locationStatus +'">' + locationStatus + '</div><img src="' + locationImg + '" alt="" target="_blank"><div class="card-popup-raining map-card-rainting" data-staRrating="' + ' ' + '"><span class="map-popup-reviews-count"> ' + ' ' + ' </span></div></a> <div class="listing-content"><div class="listing-content-item fl-wrap"><a href="/find_homes_for_rent?location='+locationTitle+' '+locationAddress+'" data-toggle="tooltip" data-placement="top" title="Homes For Rent" target="_blank"><div class="map-popup-location-category cafe-cat" style="right: 145px;"><i class="fas fa-home" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><a href="/find_homes?location='+locationTitle+' '+locationAddress+'" data-toggle="tooltip" data-placement="top" title="Homes For Sale" target="_blank"><div class="map-popup-location-category cafe-cat" style="right: 80px;"><i class="fas fa-home" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><a href="/find_schools?location='+ locationTitle +' '+ locationAddress +'" target="_blank"><div class="map-popup-location-category cafe-cat"><i class="fas fa-school" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><div class="listing-title fl-wrap"><h4><a href="singlelisting?ID='+locationURL+'" target="_blank">' + locationTitle + '</a></h4><div class="map-popup-location-info"><i class="fas fa-map-marker-alt"></i>' + locationAddress + '</div></div><div class="map-popup-footer"><a href="singlelisting?ID='+locationURL+'" class="main-link" target="_blank">Details <i class="fal fa-long-arrow-right"></i></a></div></div></div></div>')
      }
        var map = new google.maps.Map(document.getElementById('map-main'), {
          zoom: 5,
          scrollwheel: false,
          center: new google.maps.LatLng(38.59, -95.15),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          zoomControl: false,
          mapTypeControl: false,
          scaleControl: false,
          panControl: false,
          fullscreenControl: true,
          navigationControl: false,
          streetViewControl: true,
          animation: google.maps.Animation.BOUNCE,
          gestureHandling: 'cooperative',
          styles: [{
            "featureType": "administrative",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#444444"
            }]
          }]
        });
        var boxText = document.createElement("div");
        boxText.className = 'map-box'
        var currentInfobox;
        var boxOptions = {
          content: boxText,
          disableAutoPan: true,
          alignBottom: true,
          maxWidth: 0,
          pixelOffset: new google.maps.Size(-150, -55),
          zIndex: null,
          boxStyle: {
            width: "300px"
          },
          closeBoxMargin: "0",
          closeBoxURL: "",
          infoBoxClearance: new google.maps.Size(1, 1),
          isHidden: false,
          pane: "floatPane",
          enableEventPropagation: false,
        };

        var markerCluster, overlay, i;
        var allMarkers = [];

        var clusterStyles = [{
          textColor: 'white',
          url: '',
          height: 50,
          width: 50
        }];

        var ib = new InfoBox();
        google.maps.event.addListener(ib, "domready", function () {
          cardRaining();

        });
        var markerImg;
        var markerCount;
        for (i = 0; i < locations.length; i++) {
          var labels = '123456789';
          markerImg = locations[i][4];
          markerCount = locations[i][3] + 1;
          var overlaypositions = new google.maps.LatLng(locations[i][1], locations[i][2]),

          overlay = new CustomMarker(
          overlaypositions, map,{ marker_id: i},  markerImg , markerCount
          );

          allMarkers.push(overlay);

          google.maps.event.addDomListener(overlay, 'click', (function(overlay, i) {

            return function() {
              ib.setOptions(boxOptions);
              boxText.innerHTML = locations[i][0];
              ib.close();
              ib.open(map, overlay);
              currentInfobox = locations[i][3];

              var latLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
              map.panTo(latLng);
              map.panBy(0, -110);

              google.maps.event.addListener(ib,'domready',function(){
                $('.infoBox-close').click(function(e) {
                  e.preventDefault();
                  ib.close();
                  $('.map-marker-container').removeClass('clicked infoBox-opened');
                });

              });

            }
          })(overlay, i));

        }
        var options2 = {
          imagePath: '',
          styles: clusterStyles,
          minClusterSize: 2
        };
        markerCluster = new MarkerClusterer(map, allMarkers, options2);
        google.maps.event.addDomListener(window, "resize", function () {
          var center = map.getCenter();
          google.maps.event.trigger(map, "resize");
          map.setCenter(center);
        });

        $('.map-item').on("click", function (e) {
          e.preventDefault();
          map.setZoom(15);
          var index = currentInfobox;
          var marker_index = parseInt($(this).attr('href').split('#')[1], 10);
          google.maps.event.trigger(allMarkers[marker_index-1], "click");
          if ($(window).width() > 1064) {
            if ($(".map-container").hasClass("fw-map")) {
              $('html, body').animate({
                scrollTop: $(".map-container").offset().top + "-110px"
              }, 1000)
              return false;
            }
          }
        });
        $('.nextmap-nav').on("click", function (e) {
          e.preventDefault();
          map.setZoom(15);
          var index = currentInfobox;
          if (index + 1 < allMarkers.length) {
            google.maps.event.trigger(allMarkers[index+ 1], 'click');
          } else {
            google.maps.event.trigger(allMarkers[0], 'click');
          }
        });
        $('.prevmap-nav').on("click", function (e) {
          e.preventDefault();
          map.setZoom(15);
          if (typeof (currentInfobox) == "undefined") {
            google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
          } else {
            var index = currentInfobox;
            if (index - 1 < 0) {
              google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
            } else {
              google.maps.event.trigger(allMarkers[index - 1], 'click');
            }
          }
        });
        // Scroll enabling button
        var scrollEnabling = $('.scrollContorl');

        $(scrollEnabling).click(function(e){
          e.preventDefault();
          $(this).toggleClass("enabledsroll");

          if ( $(this).is(".enabledsroll") ) {
            map.setOptions({'scrollwheel': true});
          } else {
            map.setOptions({'scrollwheel': false});
          }
        });   
        var zoomControlDiv = document.createElement('div');
        var zoomControl = new ZoomControl(zoomControlDiv, map);
        function ZoomControl(controlDiv, map) {
          zoomControlDiv.index = 1;
          map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
          controlDiv.style.padding = '5px';
          var controlWrapper = document.createElement('div');
          controlDiv.appendChild(controlWrapper);
          var zoomInButton = document.createElement('div');
          zoomInButton.className = "mapzoom-in";
          controlWrapper.appendChild(zoomInButton);
          var zoomOutButton = document.createElement('div');
          zoomOutButton.className = "mapzoom-out";
          controlWrapper.appendChild(zoomOutButton);
          google.maps.event.addDomListener(zoomInButton, 'click', function () {
            map.setZoom(map.getZoom() + 1);
          });
          google.maps.event.addDomListener(zoomOutButton, 'click', function () {
            map.setZoom(map.getZoom() - 1);
          });
        } 
      }
    });
  }
  
  function open_iframe(id){
    var href = $("#iframe_link_"+id).attr("href");
    document.getElementById("site_frame").src = href;
  }
  function multi_state_select(){
    setTimeout(function(){
      $("#hidden_multi_state").val($("div.filter-option-inner-inner").text());
    

      // if($("div.filter-option-inner-inner").text() != "Nothing selected"){
      //   for(var i = 1; i <= 7; i++){
      //     if(i == 6)
      //       continue;
      //     $("#search_focus"+i).val("");
      //     $("#search_focus"+i).attr("disabled", true);
      //   }
      //   $("#search_center_town").val("");
      //   $("#search_range").val("");
      //   $("#search_center_town").attr("disabled", true);
      //   $("#search_range").attr("disabled", true);
      // }else{
      //   for(var i = 1; i <= 7; i++){
      //     if(i == 6)
      //       continue;
      //     $("#search_focus"+i).attr("disabled", false);
      //   }
      //   $("#search_center_town").attr("disabled", false);
      //   $("#search_range").attr("disabled", false);
      // }
      
      listing_update();
      load_data();
      mainMap();
    }, 2000);
  }

  function set_li_function(){
    $("#search_wizard div div div div div.inner.show ul li a").attr("onclick", "multi_state_select()");
  }
  $(document).ready(function(){

    // var query1 = $('#search_focus1').val();
    // var query2 = $('#search_focus2').val();
    // var query3 = $('#search_focus3').val();
    // var query_region= $('#search_focus4').val();
    // var query_county= $('#search_focus5').val();
    // var query_nmc= $('#search_focus7').val();
    // $.ajax({
    //   url: "/getstatelist",
    //   method: "POST",
    //   headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //   },
    //   data: {
    //     query1:query1,
    //     query2:query2,
    //     query3:query3,
    //     query_region:query_region, 
    //     query_county:query_county, 
    //     query_nmc:query_nmc,
    //   },
    //   success:function(response){
    //     $("#multi-select").empty();
    //     var response = typeof response != 'object' ? JSON.parse(response) : response;
    //     // console.log(response);
    //     for(var i = 0; i < response.length; i++){
    //       var element = "<option>"+response[i]+"</option>";
    //       console.log(element);
    //       $("#multi-select").append(element);
    //     }
    //     $('#multi-select').selectpicker();
        
    //     $("button.btn.dropdown-toggle.btn-light.bs-placeholder").attr("style","color: black !important;border: 1px solid grey;");
    //     $("button.btn.dropdown-toggle.btn-light.bs-placeholder").attr("onclick", "set_li_function()");
    //     $("div.dropdown.bootstrap-select").attr("style", "width: 100%;");

    //   }
    // });

    get_state_list();








    var location = "the United States";
    if($("#search_focus3").val() != ""){
      location = $("#search_focus3").val();
    }
    if($("#search_focus4").val() != ""){
      location = $("#search_focus4").val();
    }
    if($("#search_focus5").val() != ""){
      location = $("#search_focus5").val();
    }
    // alert(counter);
    setTimeout(function(){
      var counter = $('#counter_listing').text();
      counter = counter.replace("found", "");
      Swal.fire("Notice!","We found "+ counter +" in "+ location +". Now, use the tools to refine your search and find the places that fit you!", "success");
    }, 1000);
    
    

    $("#btn_range_reset").click(function(){
      for(var i = 1; i<=7; i++){
        if(i == 6)
            continue;
        $("#search_focus"+i).removeAttr("disabled");
      }
      $("#search_center_town").val("");
      $("#search_range").val("");
    });
    var hidden_sortt = $("#hidden_sortt").val();
    $("option[value="+hidden_sortt+"]").attr("selected", true);
    if(hidden_sortt != "default"){
      $(".option[data-value='default']").removeClass("selected focus");
    }


    
    $(".geoLocation, .input-with-icon.location a").on("click", function (e) {
      e.preventDefault();
      geolocate();
    });

    $("#btn_video_view").click(function(){

      $("#site_frame").attr("src", "/help_video_view");
    });

    
    
    
    
    $("#geography div div.col-md-12 div div div.inner.show ul li a").bind("click", function(){
      $("#hidden_multi_state").val($("div.filter-option-inner-inner").text());
      if($("#hidden_multi_state").val() == "")
      {
        return;
      }
      if($("div.filter-option-inner-inner").text() != "Nothing selected"){
        for(var i = 1; i <= 7; i++){
          if(i == 6)
            continue;
          $("#search_focus"+i).val("");
          $("#search_focus"+i).attr("disabled", true);
        }
        $("#search_center_town").val("");
        $("#search_range").val("");
        $("#search_center_town").attr("disabled", true);
        $("#search_range").attr("disabled", true);
      }else{
        for(var i = 1; i <= 7; i++){
          if(i == 6)
            continue;
          $("#search_focus"+i).attr("disabled", false);
        }
        $("#search_center_town").attr("disabled", false);
        $("#search_range").attr("disabled", false);
      }
      
      listing_update();
      load_data();
    });

    



  });
  
    
    function geolocate() {

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
          var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
          map.setCenter(pos);
          map.setZoom(12);

          var avrtimg = $(".avatar-img").attr("data-srcav");
          var markerIcon3 = {
            url: avrtimg,
          }   
          var marker3 = new google.maps.Marker({
            position: pos,
            map:  map,

            icon: markerIcon3,
            title: 'Your location'
          });       
          var myoverlay = new google.maps.OverlayView();
          myoverlay.draw = function () {
          // add an id to the layer that includes all the markers so you can use it in CSS
            this.getPanes().markerLayer.id='markerLayer';
          };
          myoverlay.setMap(map);      

        });
      }
    }

    function CustomMarker(latlng, map, args,   markerImg , markerCount) {
      this.latlng = latlng;
      this.args = args;

      this.markerImg = markerImg;
      this.markerCount = markerCount;
      this.setMap(map);
    }

    CustomMarker.prototype = new google.maps.OverlayView();

    CustomMarker.prototype.draw = function() {

      var self = this;

      var div = this.div;

      if (!div) {

        div = this.div = document.createElement('div');
        div.className = 'map-marker-container';

        div.innerHTML = '<div class="marker-container">'+
        '<span class="marker-count">'+self.markerCount+'</span>'+
        '<div class="marker-card">'+
        '<div class="marker-holder"><img src="'+self.markerImg+'" alt=""></div>'+
        '</div>'+
        '</div>';


        // Clicked marker highlight
        google.maps.event.addDomListener(div, "click", function(event) {
          $('.map-marker-container').removeClass('clicked infoBox-opened');
          google.maps.event.trigger(self, "click");
          $(this).addClass('clicked infoBox-opened');
        });


        if (typeof(self.args.marker_id) !== 'undefined') {
          div.dataset.marker_id = self.args.marker_id;
        }

        var panes = this.getPanes();
        panes.overlayImage.appendChild(div);
      }

      var point = this.getProjection().fromLatLngToDivPixel(this.latlng);

      if (point) {
      div.style.left = (point.x) + 'px';
      div.style.top = (point.y) + 'px';
      }
    };

    CustomMarker.prototype.remove = function() {
      if (this.div) {
        this.div.parentNode.removeChild(this.div);
        this.div = null; $(this).removeClass('clicked');
      } 
    };

    CustomMarker.prototype.getPosition = function() { return this.latlng; };

    // -------------- Custom Map Marker / End -------------- // 


    var head = document.getElementsByTagName( 'head' )[0];

    // Save the original method
    var insertBefore = head.insertBefore;

    // Replace it!
    head.insertBefore = function( newElement, referenceElement ) {

      if ( newElement.href && newElement.href.indexOf( 'https://fonts.googleapis.com/css?family=Roboto' ) === 0 ) {
        return;
      }

      insertBefore.call( head, newElement, referenceElement );
    };  

    var map = document.getElementById('map-main');
    if (typeof (map) != 'undefined' && map != null) {
      google.maps.event.addDomListener(window, 'load', mainMap);
    }


</script>
@include('components/footer')
