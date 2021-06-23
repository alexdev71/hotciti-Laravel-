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
                                    <div class="col-md-4">
                                      <div class="listsearch-input-item">
                                        <button class="header-search-button color-bg" id="btn_video_view" data-toggle="modal" data-target="#iframeModal" type="button" style="margin-top: 15px;"><i class="fas fa-video" style="color: white !important;padding-right: 0px;margin-right: 0px;"></i><span>Help Videos</span></button>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="listsearch-input-item">
                                          <button type="button" class="header-search-button color-bg" onclick="getBulkCSV()" style="margin-top: 15px;"><i  class="fas fa-download" style="color: white !important;padding-right: 0px;margin-right: 0px;"></i><span>Download</span></button>
                                      </div>
                                    </div>

                                    <div class="col-md-4">
                                      <div class="listsearch-input-item">
                                          <button class="header-search-button color-bg" id="btn_reset_search_distance" type="button" style="margin-top: 15px;"><i class="fas fa-sync-alt" style="color: white !important;padding-right: 0px;margin-right: 0px;"></i><span>Reset Search</span></button>
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
                <div class="container" id="sticky_search_container" style="margin-top: 230px;">
                    <!--tabs -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="listsearch-input-item">
                          <span class="iconn-dec"><i class="far fa-bookmark"></i></span>
                            <input type="text" list="data_center_town" id="search_center_town" name="search_center_town" placeholder="Center Town" />
                           <datalist id="data_center_town" name="data_center_town" >
                           
                          </datalist> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="listsearch-input-item">
                          <span class="iconn-dec"><i class="far fa-bookmark"></i></span>
                            <input type="text" id="search_range" name="search_range" placeholder="Range By Miles" />
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
<script src="{{ asset('js/map-listing33.js') }}"></script>
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
          return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fal fa-times"></i></div><a href="singlelisting?ID='+locationURL+'" class="listing-img-content fl-wrap"><div class="infobox-status '+ locationStatus +'">' + locationStatus + '</div><img src="' + locationImg + '" alt="" target="_blank"><div class="card-popup-raining map-card-rainting" data-staRrating="' + ' ' + '"><span class="map-popup-reviews-count"> ' + ' ' + ' </span></div></a> <div class="listing-content"><div class="listing-content-item fl-wrap"><a href="/location_home?location='+locationTitle+' '+locationStateAbb+'" target="_blank"><div class="map-popup-location-category cafe-cat" style="right: 80px;"><i class="fas fa-home" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><a href="/find_schools?location='+ locationTitle +' '+ locationStateAbb +'" target="_blank"><div class="map-popup-location-category cafe-cat"><i class="fas fa-school" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><div class="listing-title fl-wrap"><h4><a href="singlelisting?ID='+locationURL+'" target="_blank">' + locationTitle + '</a></h4><div class="map-popup-location-info"><i class="fas fa-map-marker-alt"></i>' + locationAddress + '</div></div><div class="map-popup-footer"><a href="singlelisting?ID='+locationURL+'" class="main-link" target="_blank">Details <i class="fal fa-long-arrow-right"></i></a></div></div></div></div>')
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
  function view_multi_map(){
    console.log("view_multi_map");
    let locations = [];
    var query1 = $('#search_focus1').val();
     var query2 = $('#search_focus2').val();
     var query3 = $('#search_focus3').val();
     var query_region= $('#search_focus4').val();
     var query_county= $('#search_focus5').val();
     var query_pop_0= $('#search_focus6_0').val();
     var query_pop= $('#search_focus6').val();
     var query_nmc= $('#search_focus7').val();
     var query_ocl= $('#search_focus8').val();
     var query_mfr= $('#search_focus9').val();
     var query_mpop= $('#search_focus10').val();
     var query_mage= $('#search_focus11').val();
     var query_mhincome= $('#search_focus12').val();
     var query_strate= $('#search_focus13').val();
     var query_pt_rate= $('#search_focus14').val();
     var query_inc_trate= $('#search_focus15').val();
     var query_mh_cost= $('#search_focus16').val();
     var query_ump_rate= $('#search_focus17').val();
     var query_vio_crime= $('#search_focus18').val();
     var query_prop_crime= $('#search_focus19').val();
     var query_ann_rain= $('#search_focus20').val();
     var query_ann_sno= $('#search_focus21').val();
     var query_ann_prpp= $('#search_focus22').val();
     var query_ann_sunn= $('#search_focus23').val();
     var query_ahigh_tem= $('#search_focus24').val();
     var query_alow_tem= $('#search_focus25').val();
     var query_air_qua= $('#search_focus26').val();
     var query_wat_qua= $('#search_focus27').val();
     var query_com_tm= $('#search_focus28').val();
     var query_dem= $('#search_focus29').val();
     var query_rep= $('#search_focus30').val();
     var query_bsc= $('#search_focus31').val();
     var query_grado= $('#search_focus32').val();
     var query_per_rel= $('#search_focus33').val();
     var search_center_town = $("#search_center_town").val();
     var search_range = $("#search_range").val();
     var multi_state = $("#hidden_multi_state").val();
    $.ajax({
      url:"/getlistingMapdata",
      method:"POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{multi_state: multi_state,search_center_town:search_center_town,search_range:search_range,query1:query1,query2:query2,query3:query3,query_region:query_region,query_county:query_county,query_pop:query_pop,query_pop_0,query_nmc:query_nmc,query_ocl:query_ocl,query_mfr:query_mfr,query_mpop:query_mpop,query_mage:query_mage,query_mhincome:query_mhincome,query_strate:query_strate,query_pt_rate:query_pt_rate,query_inc_trate:query_inc_trate,query_mh_cost:query_mh_cost,query_ump_rate:query_ump_rate,query_vio_crime:query_vio_crime,query_prop_crime:query_prop_crime,query_ann_rain:query_ann_rain,query_ann_sno:query_ann_sno,query_ann_prpp:query_ann_prpp,query_ann_sunn:query_ann_sunn,query_ahigh_tem:query_ahigh_tem,query_alow_tem:query_alow_tem,query_air_qua:query_air_qua,query_wat_qua:query_wat_qua,query_com_tm:query_com_tm,query_dem:query_dem,query_rep:query_rep,query_bsc:query_bsc,query_grado:query_grado,query_per_rel:query_per_rel},
      cache: false,

      success:function(res_data)
      {
        var data = typeof res_data != 'object' ? JSON.parse(res_data) : res_data;
        console.log(data);
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
          return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fal fa-times"></i></div><a href="singlelisting?ID='+locationURL+'" class="listing-img-content fl-wrap"><div class="infobox-status '+ locationStatus +'">' + locationStatus + '</div><img src="' + locationImg + '" alt="" target="_blank"><div class="card-popup-raining map-card-rainting" data-staRrating="' + ' ' + '"><span class="map-popup-reviews-count"> ' + ' ' + ' </span></div></a> <div class="listing-content"><div class="listing-content-item fl-wrap"><a href="/location_home?location='+locationTitle+' '+locationStateAbb+'" target="_blank"><div class="map-popup-location-category cafe-cat" style="right: 80px;"><i class="fas fa-home" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><a href="/find_schools?location='+ locationTitle +' '+ locationStateAbb +'" target="_blank"><div class="map-popup-location-category cafe-cat"><i class="fas fa-school" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><div class="listing-title fl-wrap"><h4><a href="singlelisting?ID='+locationURL+'" target="_blank">' + locationTitle + '</a></h4><div class="map-popup-location-info"><i class="fas fa-map-marker-alt"></i>' + locationAddress + '</div></div><div class="map-popup-footer"><a href="singlelisting?ID='+locationURL+'" class="main-link" target="_blank">Details <i class="fal fa-long-arrow-right"></i></a></div></div></div></div>')
      }
        var map = new google.maps.Map(document.getElementById('map-main'), {
          zoom: 3,
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
      
      listing_update_multi();
      load_data();
      view_multi_map();
    }, 2000);
  }
  function set_li_function(){
    $("#multi_state div div div div div.inner.show ul li a").attr("onclick", "multi_state_select()");
  }
  $(document).ready(function(){
    console.log($("div.filter-option-inner-inner").text());
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

    
    
    
    
    $("#multi_state div div div div div.inner.show ul li a").bind("click", function(){
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
      
      listing_update_multi();
      load_data();
    });

    $("#btn_list_location_more").click(function(){
      var location_counts_temp1 = $("#counter_listing").text();
      var location_counts_temp2 = location_counts_temp1.split(" ");
      var location_counts = location_counts_temp2[0];
      if($("#hidden_list_number").val() < location_counts){
        var hidden_count = Number($("#hidden_list_number").val()) + 10;
        $("#hidden_list_number").val(hidden_count);
        listing_update_multi();
      }
    });

    $("#btn_reset_search_distance").click(function(){
      window.location = "/distance_search";
    });

  });
  function listing_update_multi(){
    console.log("listing_update_multi");
      var query1 = $('#search_focus1').val();
      var query2 = $('#search_focus2').val();
      var query3 = $('#search_focus3').val();
      var query_region= $('#search_focus4').val();
      var query_county= $('#search_focus5').val();
      var query_pop_0= $('#search_focus6_0').val();
      var query_pop= $('#search_focus6').val();
      var query_nmc= $('#search_focus7').val();
      var query_ocl= $('#search_focus8').val();
      var query_mfr= $('#search_focus9').val();
      var query_mpop= $('#search_focus10').val();
      var query_mage= $('#search_focus11').val();
      var query_mhincome= $('#search_focus12').val();
      var query_strate= $('#search_focus13').val();
      var query_pt_rate= $('#search_focus14').val();
      var query_inc_trate= $('#search_focus15').val();
      var query_mh_cost= $('#search_focus16').val();
      var query_ump_rate= $('#search_focus17').val();
      var query_vio_crime= $('#search_focus18').val();
      var query_prop_crime= $('#search_focus19').val();
      var query_ann_rain= $('#search_focus20').val();
      var query_ann_sno= $('#search_focus21').val();
      var query_ann_prpp= $('#search_focus22').val();
      var query_ann_sunn= $('#search_focus23').val();
      var query_ahigh_tem= $('#search_focus24').val();
      var query_alow_tem= $('#search_focus25').val();
      var query_air_qua= $('#search_focus26').val();
      var query_wat_qua= $('#search_focus27').val();
      var query_com_tm= $('#search_focus28').val();
      var query_dem= $('#search_focus29').val();
      var query_rep= $('#search_focus30').val();
      var query_bsc= $('#search_focus31').val();
      var query_grado= $('#search_focus32').val();
      var query_per_rel= $('#search_focus33').val();
      var search_center_town = $('#search_center_town').val();
      var search_range = $('#search_range').val();
      var sortt = $('#sortt').val();
      var multi_state = $("#hidden_multi_state").val();
      var limit_number = $("#hidden_list_number").val();
      $.ajax({
        url: "/listing_update",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{limit_number:limit_number,multi_state:multi_state, sortt:sortt,query1:query1,query2:query2,query3:query3,query_region:query_region,query_county:query_county,query_pop:query_pop,query_pop_0,query_nmc:query_nmc,query_ocl:query_ocl,query_mfr:query_mfr,query_mpop:query_mpop,query_mage:query_mage,query_mhincome:query_mhincome,query_strate:query_strate,query_pt_rate:query_pt_rate,query_inc_trate:query_inc_trate,query_mh_cost:query_mh_cost,query_ump_rate:query_ump_rate,query_vio_crime:query_vio_crime,query_prop_crime:query_prop_crime,query_ann_rain:query_ann_rain,query_ann_sno:query_ann_sno,query_ann_prpp:query_ann_prpp,query_ann_sunn:query_ann_sunn,query_ahigh_tem:query_ahigh_tem,query_alow_tem:query_alow_tem,query_air_qua:query_air_qua,query_wat_qua:query_wat_qua,query_com_tm:query_com_tm,query_dem:query_dem,query_rep:query_rep,query_bsc:query_bsc,query_grado:query_grado,query_per_rel:query_per_rel, search_center_town:search_center_town, search_range:search_range},
        success:function(response){
          var list_column_class = "has_one_column";
          if(screen.width <= 900){
            list_column_class = "has_two_column";
          }
          var response = typeof response != 'object' ? JSON.parse(response) : response;
          console.log(response);
          $("#listing_data_table").empty();
          for(var i in response){
            var review_score = response[i].AverageRating;
            if(response[i].AverageRating == null){
              review_score = "0";
            }
            var element = '<div class="listing-item '+ list_column_class +'"><article class="geodir-category-listing fl-wrap"><div class="geodir-category-img"><input type="hidden" id="hidden_id_'+ response[i].ID +'" value="'+ response[i].ID +'" name=""><div id="'+ response[i].ID +'" class="geodir-js-favorite_btn" onclick="save_location('+ response[i].ID +')"><i  class="fal fa-heart"></i><span>Save</span></div><a href="singlelisting?ID='+ response[i].ID +'"  class="geodir-category-img-wrap fl-wrap" target="_blank"><img src="'+ response[i].Picture_Links +'" alt=""></a><div class="listing-avatar"><a href="/singlelisting?ID='+ response[i].ID +'"><img src="images/avatar/1.jpg" alt=""></a><span class="avatar-tooltip">View Details</strong></span></div><div class="geodir_status_date gsd_open"><i class="fal fa-car"></i><a href="" id="compare_city_'+ response[i].ID +'" class="'+ response[i].City_State_Combined +'" onclick="compare_modal_value('+ response[i].ID +')" data-toggle="modal" data-target="#compareModal">Compare</a></div><div class="geodir_status_date gsd_open" style="margin-top: 40px;"><p class="view_city_map" id="'+ response[i].ID +'" onclick="view_city_map('+ response[i].ID +')" style="cursor: pointer;color: #007bff;margin-bottom: 0px;"><i class="fas fa-map-marker-alt"></i>View On Map</p></div><div class="geodir-category-opt"><div class="listing-rating-count-wrap"><div class="review-score">'+ review_score +'</div><div class="listing-rating card-popup-rainingvis" data-starrating2="'+ response[i].AverageRating +'"></div><br><div class="reviews-count">'+ response[i].NumberOf +' reviews</div></div></div></div><div class="geodir-category-content fl-wrap title-sin_item"><div class="geodir-category-content-title fl-wrap"><div class="geodir-category-content-title-item"><h3 class="title-sin_map"><a href="#">'+ response[i].City +'</a><span class="verified-badge"><i class="fal fa-check"></i></span></h3><div class="geodir-category-location fl-wrap"><a href="#" ><i class="fas fa-map-marker-alt"></i>'+ response[i].State +', USA</a></div></div></div><div class="geodir-category-text fl-wrap"><p class="small-text">To see full details of this city, click on the blue button above.</p><div class="facilities-list fl-wrap"><div class="facilities-list-title">Tips : </div><ul class="no-list-style"><li class="tolt"  data-microtip-position="top" data-tooltip="Population:  '+ response[i].Population +'"><i class="fal fa-parking"></i></li><li class="tolt"  data-microtip-position="top" data-tooltip="Unemployment: '+ response[i].Unemployment_Category +'"><i class="fal fa-shopping-bag"></i></li><li class="tolt"  data-microtip-position="top" data-tooltip="Age Category: '+ response[i].Median_Age_Category +'"><i class="fal fa-user-plus"></i></li><li class="tolt"  data-microtip-position="top" data-tooltip="Income Category: '+ response[i].Median_Income_Category +'"><i class="fal fa-wallet"></i></li></ul></div></div><div class="geodir-category-footer fl-wrap"><a href="/location_home?location='+ response[i].State_Abbreviated +' '+ response[i].City +'" class="listing-item-category-wrap" target="_blank"><div class="listing-item-category red-bg"><i class="fal fa-home"></i></div><span>Homes</span></a><a href="/find_schools?location=' +response[i].City+ ' ' + response[i].State + '" class="listing-item-category-wrap" style="margin-left: 10px;" target="_blank"><div class="listing-item-category red-bg"><i class="fal fa-school"></i></div><span>Schools</span></a><div class="geodir-opt-list"><ul class="no-list-style"><li><a href="#" class="show_gcc"></a></li><li><div class="dynamic-gal gdop-list-link"></div></li></ul></div><div></div><div class="geodir-category_contacts"><div class="close_gcc"><i class="fal fa-times-circle"></i></div><ul class="no-list-style"><li><span><i class="fal fa-phone"></i> Call : </span><a href="#">+38099231212</a></li><li><span><i class="fal fa-envelope"></i> Write : </span><a href="#">yourmail@domain.com</a></li></ul></div></div></div></article></div>';
            $("#listing_data_table").append(element);
          }
          
        }
      });
    }
    function load_data()
    {
     var query1 = $('#search_focus1').val();
     var query2 = $('#search_focus2').val();
     var query3 = $('#search_focus3').val();
     var query_region= $('#search_focus4').val();
     var query_county= $('#search_focus5').val();
     var query_pop_0= $('#search_focus6_0').val();
     var query_pop= $('#search_focus6').val();
     var query_nmc= $('#search_focus7').val();
     var query_ocl= $('#search_focus8').val();
     var query_mfr= $('#search_focus9').val();
     var query_mpop= $('#search_focus10').val();
     var query_mage= $('#search_focus11').val();
     var query_mhincome= $('#search_focus12').val();
     var query_strate= $('#search_focus13').val();
     var query_pt_rate= $('#search_focus14').val();
     var query_inc_trate= $('#search_focus15').val();
     var query_mh_cost= $('#search_focus16').val();
     var query_ump_rate= $('#search_focus17').val();
     var query_vio_crime= $('#search_focus18').val();
     var query_prop_crime= $('#search_focus19').val();
     var query_ann_rain= $('#search_focus20').val();
     var query_ann_sno= $('#search_focus21').val();
     var query_ann_prpp= $('#search_focus22').val();
     var query_ann_sunn= $('#search_focus23').val();
     var query_ahigh_tem= $('#search_focus24').val();
     var query_alow_tem= $('#search_focus25').val();
     var query_air_qua= $('#search_focus26').val();
     var query_wat_qua= $('#search_focus27').val();
     var query_com_tm= $('#search_focus28').val();
     var query_dem= $('#search_focus29').val();
     var query_rep= $('#search_focus30').val();
     var query_bsc= $('#search_focus31').val();
     var query_grado= $('#search_focus32').val();
     var query_per_rel= $('#search_focus33').val();
     var search_center_town = $('#search_center_town').val();
     var search_range = $('#search_range').val();
     var multi_state = $("#hidden_multi_state").val();

      $.ajax({
        url:"/fetch_counter",
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{multi_state:multi_state,query1:query1,query2:query2,query3:query3,query_region:query_region,query_county:query_county,query_pop:query_pop,query_pop_0,query_nmc:query_nmc,query_ocl:query_ocl,query_mfr:query_mfr,query_mpop:query_mpop,query_mage:query_mage,query_mhincome:query_mhincome,query_strate:query_strate,query_pt_rate:query_pt_rate,query_inc_trate:query_inc_trate,query_mh_cost:query_mh_cost,query_ump_rate:query_ump_rate,query_vio_crime:query_vio_crime,query_prop_crime:query_prop_crime,query_ann_rain:query_ann_rain,query_ann_sno:query_ann_sno,query_ann_prpp:query_ann_prpp,query_ann_sunn:query_ann_sunn,query_ahigh_tem:query_ahigh_tem,query_alow_tem:query_alow_tem,query_air_qua:query_air_qua,query_wat_qua:query_wat_qua,query_com_tm:query_com_tm,query_dem:query_dem,query_rep:query_rep,query_bsc:query_bsc,query_grado:query_grado,query_per_rel:query_per_rel, search_center_town:search_center_town, search_range:search_range},
        //cache: false,
        success:function(data)
        {
          $('#new_counter').html(data);
          $('#counter_listing').html(data+" locations found");
        }
      });
    }
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
