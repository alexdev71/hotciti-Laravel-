@include('components/header')

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
                    <div class="list-main-wrap-opt">
                        <!-- price-opt-->
                        <div class="price-opt">
                          <input type="hidden" value="{{ $array['sortt'] }}" id="hidden_sortt">
                            <span class="price-opt-title">Sort   by:</span>
                            <div class="listsearch-input-item">
                              <form action="/listing_new" method="post" id="sortt_form">
                                @csrf
                                <input type="hidden" name="search_focus1">
                                <input type="hidden" name="search_focus2">
                                <input type="hidden" name="search_focus3">
                                <input type="hidden" name="search_focus4">
                                <input type="hidden" name="search_focus5">
                                <input type="hidden" name="search_focus6">
                                <input type="hidden" name="search_focus7">
                                <input type="hidden" name="search_focus8">
                                <input type="hidden" name="search_focus9">
                                <input type="hidden" name="search_focus10">
                                <input type="hidden" name="search_focus11">
                                <input type="hidden" name="search_focus12">
                                <input type="hidden" name="search_focus13">
                                <input type="hidden" name="search_focus14">
                                <input type="hidden" name="search_focus15">
                                <input type="hidden" name="search_focus16">
                                <input type="hidden" name="search_focus17">
                                <input type="hidden" name="search_focus18">
                                <input type="hidden" name="search_focus19">
                                <input type="hidden" name="search_focus20">
                                <input type="hidden" name="search_focus21">
                                <input type="hidden" name="search_focus22">
                                <input type="hidden" name="search_focus23">
                                <input type="hidden" name="search_focus24">
                                <input type="hidden" name="search_focus25">
                                <input type="hidden" name="search_focus26">
                                <input type="hidden" name="search_focus27">
                                <input type="hidden" name="search_focus28">
                                <input type="hidden" name="search_focus29">
                                <input type="hidden" name="search_focus30">
                                <input type="hidden" name="search_focus31">
                                <input type="hidden" name="search_focus32">
                                <input type="hidden" name="search_focus33">
                                <input type="hidden" name="search_focus6_0">

                                <select class="chosen-select no-search-select" id="sortt" name="sortt" >
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
                              </form>
                            </div>
                        </div>
                        <!-- price-opt end-->
                        <!-- price-opt-->
                        <div class="grid-opt">
                            <ul class="no-list-style">
                                <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="fal fa-th"></i></span></li>
                                <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="fal fa-list"></i></span></li>
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
                <div class="mob-nav-content-btn mncb_half color2-bg show-list-wrap-search fl-wrap"><i class="fal fa-filter"></i>  Results</div>
                <div class="mob-nav-content-btn mncb_half color2-bg schm  fl-wrap"><i class="fal fa-map-marker-alt"></i>  View on map</div>
            </div>
            <div class="clearfix"></div>
            <!-- listsearch-input-wrap-->
            <div class="listsearch-input-wrap lws_mobile fl-wrap tabs-act" id="lisfw">
                <div class="listsearch-input-wrap_contrl fl-wrap">
                    <div class="container">
                        <ul class="tabs-menu fl-wrap no-list-style">
                         <li class="current" ><a href="#filters-search"><h2 id="counter" name="counter">{{ $count }} results</h2></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                
            </div>
            <!-- listsearch-input-wrap end-->
            <!-- listing-item-container -->
            <div class="listing-item-container init-grid-items fl-wrap">
<!-- listing-item  -->   <table>
              @foreach($results as $result)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                       
                        <div class="geodir-category-img">
                            <input type="hidden" id="hidden_email" value="{{ $email }}" name="">
                            <input type="hidden" id="hidden_id" value="{{ $result->ID }}" name="">
                            <div onclick="myFunction()" class="geodir-js-favorite_btn">
                              <i  class="fal fa-heart"></i>
                              <span>Save</span>
                        </div>
                        <a href="singlelisting?ID={{ $result->ID }}"  class="geodir-category-img-wrap fl-wrap">
                          <img src="{{ $result->Picture_Links }}" alt=""> 
                        </a>
                        <div class="geodir_status_date gsd_open"><i class="fal fa-car"></i><a href="" id="{{ $result->City_State_Combined }}" class="go_city_compare" data-toggle="modal" data-target="#compareModal">Compare</a>
                        </div>
                        <div class="geodir_status_date gsd_open" style="margin-top: 40px;">
                          <p class="view_city_map" id="{{ $result->ID }}" style="cursor: pointer;color: #007bff;margin-bottom: 0px;"><i class="fas fa-map-marker-alt"></i>View On Map</p>
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
              </table>                                                                             
                            
            </div>
            <!-- listing-item-container end -->
        </div>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>
<script src="{{ asset('js/map-listing33_new.js') }}"></script>
<script>
  $(document).ready(function(){
    var search_array = JSON.parse(localStorage.getItem("search_array"));
    $("input[name='search_focus1']").val(search_array.query1);
    $("input[name='search_focus2']").val(search_array.query2);
    $("input[name='search_focus3']").val(search_array.query3);
    $("input[name='search_focus4']").val(search_array.query_region);
    $("input[name='search_focus5']").val(search_array.query_county);
    $("input[name='search_focus6_0']").val(search_array.query_pop_0);
    $("input[name='search_focus6']").val(search_array.query_pop);
    $("input[name='search_focus7']").val(search_array.query_nmc);
    $("input[name='search_focus8']").val(search_array.query_ocl);
    $("input[name='search_focus9']").val(search_array.query_mfr);
    $("input[name='search_focus10']").val(search_array.query_mpop);
    $("input[name='search_focus11']").val(search_array.query_mage);
    $("input[name='search_focus12']").val(search_array.query_mhincome);
    $("input[name='search_focus13']").val(search_array.query_strate);
    $("input[name='search_focus14']").val(search_array.query_pt_rate);
    $("input[name='search_focus15']").val(search_array.query_inc_trate);
    $("input[name='search_focus16']").val(search_array.query_mh_cost);
    $("input[name='search_focus17']").val(search_array.query_ump_rate);
    $("input[name='search_focus18']").val(search_array.query_vio_crime);
    $("input[name='search_focus19']").val(search_array.query_prop_crime);
    $("input[name='search_focus20']").val(search_array.query_ann_rain);
    $("input[name='search_focus21']").val(search_array.query_ann_sno);
    $("input[name='search_focus22']").val(search_array.query_ann_prpp);
    $("input[name='search_focus23']").val(search_array.query_ann_sunn);
    $("input[name='search_focus24']").val(search_array.query_ahigh_tem);
    $("input[name='search_focus25']").val(search_array.query_alow_tem);
    $("input[name='search_focus26']").val(search_array.query_air_qua);
    $("input[name='search_focus27']").val(search_array.query_wat_qua);
    $("input[name='search_focus28']").val(search_array.query_com_tm);
    $("input[name='search_focus29']").val(search_array.query_dem);
    $("input[name='search_focus30']").val(search_array.query_rep);
    $("input[name='search_focus31']").val(search_array.query_bsc);
    $("input[name='search_focus32']").val(search_array.query_grado);
    $("input[name='search_focus33']").val(search_array.query_per_rel);

    

    $("#search_center_town").bind('change', function () {
      $('#search_center_town').blur();  
    });

    $("#btn_range_reset").click(function(){
      for(var i = 1; i<=7; i++){
        $("#search_focus"+i).removeAttr("disabled");
      }
      $("#search_focus6_0").removeAttr("disabled");
      $("#search_center_town").val("");
      $("#search_range").val("");
    });

    var hidden_sortt = $("#hidden_sortt").val();
    $("option[value="+hidden_sortt+"]").attr("selected", true);

    $("#bulk_csv").click(function(){
      
            getBulkCSV();

    });

    $("#sortt").change(function(){
      $("#sortt_form").submit();
    });
    // var search_array = JSON.parse(localStorage.getItem("search_array"));
    // console.log(search_array.query3);
    $(".view_city_map").click(function(){
      let locations = [];
      var map_key = $(this).attr("id");
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

        success:function(res_datas)
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
            locationRevievsCounter.push('4');
            locationStatus.push('open');
            lat.push(data[i].Latitude);
            lon.push(data[i].Longitude);
            marker.push(data[i].ID);
            image.push(data[i].Picture_Links);
          }
          for(let k=0, l=city.length; k < l; k++){
            locations.push([locationData(locationURL[k], locationImg[k], locationTitle[k], locationAddress[k], locationCategory[k], locationStarRating[k], locationRevievsCounter[k], locationStatus[k]), parseFloat(lat[k]), parseFloat(lon[k]), parseFloat(marker[k]), image[k]],);
          }
          function locationData(locationURL, locationImg, locationTitle, locationAddress, locationCategory, locationStatus) {
            return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fal fa-times"></i></div><a href="singlelisting?ID='+locationURL+'" class="listing-img-content fl-wrap"><div class="infobox-status '+ locationStatus +'">' + locationStatus + '</div><img src="' + locationImg + '" alt=""><div class="card-popup-raining map-card-rainting" data-staRrating="' + ' ' + '"><span class="map-popup-reviews-count"> ' + ' ' + ' </span></div></a> <div class="listing-content"><div class="listing-content-item fl-wrap"><div class="map-popup-location-category ' + locationCategory + '"></div><div class="listing-title fl-wrap"><h4><a href="singlelisting?ID='+locationURL+'">' + locationTitle + '</a></h4><div class="map-popup-location-info"><i class="fas fa-map-marker-alt"></i>' + locationAddress + '</div></div><div class="map-popup-footer"><a href="singlelisting?ID='+locationURL+'" class="main-link">Details <i class="fal fa-long-arrow-right"></i></a></div></div></div></div> ')
          }
          var map = new google.maps.Map(document.getElementById('map-main'), {
            zoom: 4,
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
    $(".geoLocation, .input-with-icon.location a").on("click", function (e) {
      e.preventDefault();
      geolocate();
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
    
  });

</script>
@include('components/footer')