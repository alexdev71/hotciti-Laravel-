var check_city = "";
var check_city_neighbour = "";
var check_suburbs = "";
var check_towns = "";
var check_very_conservative = "";
var check_conservative = "";
var check_balanced = "";
var check_liberal = "";
var check_very_liberal = "";
var cost_living_1 = "";
var cost_living_2 = "";
var cost_living_3 = "";
var cost_living_4 = "";
var crime_1 = "";
var crime_2 = "";
var crime_3 = "";
var crime_4 = "";
var home_cost_1 = "";
var home_cost_2 = "";
var home_cost_3 = "";
var home_cost_4 = "";
var male_female_ratio = "";
var weather_ratio = "";
var single_ratio = "";
function get_search_values(){
  male_female_ratio = $("#hidden_male_female_ratio").val();
  weather_ratio = $("#hidden_weather").val();
  single_ratio = $("#hidden_single_ratio").val();
  if($("#check_city").prop("checked") == true){
    check_city = "true";
  }else{
    check_city = "";
  }

  if($("#check_city_neighbour").prop("checked") == true){
    check_city_neighbour = "true";
  }else{
    check_city_neighbour = "";
  }

  if($("#check_suburbs").prop("checked") == true){
    check_suburbs = "true";
  }else{
    check_suburbs = "";
  }

  if($("#check_towns").prop("checked") == true){
    check_towns = "true";
  }else{
    check_towns = "";
  }

  if($("#check_very_conservative").prop("checked") == true){
    check_very_conservative = "true";
  }else{
    check_very_conservative = "";
  }

  if($("#check_conservative").prop("checked") == true){
    check_conservative = "true";
  }else{
    check_conservative = "";
  }

  if($("#check_balanced").prop("checked") == true){
    check_balanced = "true";
  }else{
    check_balanced = "";
  }

  if($("#check_liberal").prop("checked") == true){
    check_liberal = "true";
  }else{
    check_liberal = "";
  }

  if($("#check_very_liberal").prop("checked") == true){
    check_very_liberal = "true";
  }else{
    check_very_liberal = "";
  }

  if($("#btn_cost_living_1").hasClass("selected")){
    cost_living_1 = "true";
  }else{
    cost_living_1 = "";
  }

  if($("#btn_cost_living_2").hasClass("selected")){
    cost_living_2 = "true";
  }else{
    cost_living_2 = "";
  }

  if($("#btn_cost_living_3").hasClass("selected")){
    cost_living_3 = "true";
  }else{
    cost_living_3 = "";
  }

  if($("#btn_cost_living_4").hasClass("selected")){
    cost_living_4 = "true";
  }else{
    cost_living_4 = "";
  }

  if($("#btn_crime_1").hasClass("selected")){
    crime_1 = "true";
  }else{
    crime_1 = "";
  }

  if($("#btn_crime_2").hasClass("selected")){
    crime_2 = "true";
  }else{
    crime_2 = "";
  }

  if($("#btn_crime_3").hasClass("selected")){
    crime_3 = "true";
  }else{
    crime_3 = "";
  }

  if($("#btn_crime_4").hasClass("selected")){
    crime_4 = "true";
  }else{
    crime_4 = "";
  }

  if($("#btn_home_cost_1").hasClass("selected")){
    home_cost_1 = "true";
  }else{
    home_cost_1 = "";
  }

  if($("#btn_home_cost_2").hasClass("selected")){
    home_cost_2 = "true";
  }else{
    home_cost_2 = "";
  }

  if($("#btn_home_cost_3").hasClass("selected")){
    home_cost_3 = "true";
  }else{
    home_cost_3 = "";
  }

  if($("#btn_home_cost_4").hasClass("selected")){
    home_cost_4 = "true";
  }else{
    home_cost_4 = "";
  }
}
function get_state_list(){
      $.ajax({
        url: "/getstatelist",
        method: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        },
        success:function(response){
          $("#multi-select").empty();
          // $("#search_wizard div div.col-12").empty();
          var select_element = document.createElement("select");
          select_element.setAttribute("class", "selectpicker");
          select_element.setAttribute("id", "multi-select");
          select_element.setAttribute("multiple", true);
          select_element.setAttribute("data-live-search", true);
          $("#geography div div.col-md-12").append(select_element);
          var response = typeof response != 'object' ? JSON.parse(response) : response;
          // console.log(response);
          for(var i = 0; i < response.length; i++){
            if(response[i] != ""){
              var element = "<option>"+response[i]+"</option>";
              $("#multi-select").append(element);
            }
            
          }
          $('#multi-select').selectpicker();
          
          $("button.btn.dropdown-toggle.btn-light.bs-placeholder").attr("style","color: black !important;border: 1px solid grey;");
          $("button.btn.dropdown-toggle.btn-light.bs-placeholder").attr("onclick", "set_li_function()");
          $("div.dropdown.bootstrap-select").attr("style", "width: 100%;");
          $("div.filter-option-inner-inner").text("State");
        }
      });
    }
    function listing_update(){
      var location_limit = $("#hidden_list_number").val();
      get_search_values();

      var sortt = $('#sortt').val();
      var multi_state = $("#hidden_multi_state").val();
      $.ajax({
        url: "/listing_update_advanced",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
          multi_state:multi_state, 
          sortt:sortt, 
          check_city:check_city, 
          check_city_neighbour:check_city_neighbour, 
          check_suburbs:check_suburbs, 
          check_towns:check_towns,
          check_very_conservative:check_very_conservative, 
          check_conservative:check_conservative,
          check_balanced: check_balanced,
          check_liberal:check_liberal,
          check_very_liberal:check_very_liberal,
          cost_living_1:cost_living_1,
          cost_living_2:cost_living_2,
          cost_living_3:cost_living_3,
          cost_living_4:cost_living_4,
          crime_1:crime_1,
          crime_2:crime_2,
          crime_3:crime_3,
          crime_4:crime_4,
          home_cost_1:home_cost_1,
          home_cost_2:home_cost_2,
          home_cost_3:home_cost_3,
          home_cost_4:home_cost_4,
          male_female_ratio:male_female_ratio,
          weather_ratio:weather_ratio,
          single_ratio:single_ratio,
          limit_number:location_limit,
        },
        success:function(response){
          var list_column_class = "has_one_column";
          if(screen.width <= 900){
            list_column_class = "has_two_column";
          }
          var response = typeof response != 'object' ? JSON.parse(response) : response;
          // console.log(response);
          $("#listing_data_table").empty();
          for(var i in response){
            var review_score = response[i].AverageRating;
            if(response[i].AverageRating == null){
              review_score = "0";
            }
            var element = '<div class="listing-item '+ list_column_class +'"><article class="geodir-category-listing fl-wrap"><div class="geodir-category-img"><input type="hidden" id="hidden_id_'+ response[i].ID +'" value="'+ response[i].ID +'" name=""><div id="'+ response[i].ID +'" class="geodir-js-favorite_btn" onclick="save_location('+ response[i].ID +')"><i  class="fal fa-heart"></i><span>Save</span></div><a href="singlelisting?ID='+ response[i].ID +'"  class="geodir-category-img-wrap fl-wrap" target="_blank"><img src="'+ response[i].Picture_Links +'" alt=""></a><div class="listing-avatar"><a href="/singlelisting?ID='+ response[i].ID +'" target="_blank"><img src="images/avatar/1.jpg" alt=""></a><span class="avatar-tooltip">View Details</strong></span></div><div class="geodir_status_date gsd_open"><i class="fal fa-car"></i><a href="" id="compare_city_'+ response[i].ID +'" class="'+ response[i].City_State_Combined +'" onclick="compare_modal_value('+ response[i].ID +')" data-toggle="modal" data-target="#compareModal">Compare</a></div><div class="geodir_status_date gsd_open" style="margin-top: 40px;"><p class="view_city_map" id="'+ response[i].ID +'" onclick="view_city_map('+ response[i].ID +')" style="cursor: pointer;color: #007bff;margin-bottom: 0px;"><i class="fas fa-map-marker-alt"></i>View On Map</p></div><div class="geodir_status_date gsd_open" style="margin-top: 80px;"><p class="view_city_map" id="'+ response[i].ID +'" onclick="show_street(\''+ response[i].City +'\',\''+ response[i].State +'\')" style="cursor: pointer;color: #007bff;margin-bottom: 0px;"><i class="fas fa-map-marker-alt"></i>Street View</p></div><div class="geodir-category-opt"><div class="listing-rating-count-wrap"><div class="review-score">'+ review_score +'</div><div class="listing-rating card-popup-rainingvis" data-starrating2="'+ response[i].AverageRating +'"></div><br><div class="reviews-count">'+ response[i].NumberOf +' reviews</div></div></div></div><div class="geodir-category-content fl-wrap title-sin_item"><div class="geodir-category-content-title fl-wrap"><div class="geodir-category-content-title-item"><h3 class="title-sin_map"><a href="singlelisting?ID='+ response[i].ID +'" target="_blank">'+ response[i].City +'</a><span class="verified-badge"><i class="fal fa-check"></i></span></h3><div class="geodir-category-location fl-wrap"><a href="#" ><i class="fas fa-map-marker-alt"></i>'+ response[i].State +', USA</a></div></div></div><div class="geodir-category-text fl-wrap"><p class="small-text">To see full details of this city, click on the blue button above.</p><div class="facilities-list fl-wrap"><div class="facilities-list-title">Tips : </div><ul class="no-list-style"><li class="tolt"  data-microtip-position="top" data-tooltip="Population:  '+ response[i].Population +'"><i class="fal fa-parking"></i></li><li class="tolt"  data-microtip-position="top" data-tooltip="Unemployment: '+ response[i].Unemployment_Category +'"><i class="fal fa-shopping-bag"></i></li><li class="tolt"  data-microtip-position="top" data-tooltip="Age Category: '+ response[i].Median_Age_Category +'"><i class="fal fa-user-plus"></i></li><li class="tolt"  data-microtip-position="top" data-tooltip="Income Category: '+ response[i].Median_Income_Category +'"><i class="fal fa-wallet"></i></li></ul></div></div><div class="geodir-category-footer fl-wrap dropup"><a href="/find_schools?location=' +response[i].City+ ' ' + response[i].State + '" class="listing-item-category-wrap" style="margin-left: 10px;" target="_blank"><div class="listing-item-category red-bg"><i class="fal fa-school"></i></div><span>Schools</span></a><div class="listing-item-category red-bg" style="margin-left: 20px;"><i class="fal fa-home"></i></div><button type="button" class="btn btn-secondary dropdown-toggle" id="btn_homes_pink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Homes</button><div class="dropdown-menu"><a class="dropdown-item" href="/find_homes?location=' +response[i].City_State_Combined+ '" target="_blank">For Sale</a><a class="dropdown-item" href="/find_homes_for_rent?location=' +response[i].City_State_Combined+ '" target="_blank">For Rent</a></div></div><div class="geodir-category-footer fl-wrap dropup"><a href="/find_colleges?location=' +response[i].State+ '" class="listing-item-category-wrap" style="margin-left: 10px;" target="_blank"><div class="listing-item-category red-bg"><i class="fal fa-graduation-cap"></i></div><span>Colleges</span></a><a href="/find_hotels?location=' +response[i].City+ ' '+ response[i].State +' " class="listing-item-category-wrap" style="margin-left: 17px;" target="_blank"><div class="listing-item-category red-bg"><i class="fal fa-hotel"></i></div><span>Accommodations</span></a></article></div>';
            $("#listing_data_table").append(element);
          }
          
        }
      });
    }
    function load_data()
    {
     get_search_values();
     var multi_state = $("#hidden_multi_state").val();
      var limit_number = $("#hidden_list_number").val();
      $.ajax({
        url:"/fetch_counter_advanced",
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
          multi_state:multi_state, 
          check_city:check_city, 
          check_city_neighbour:check_city_neighbour, 
          check_suburbs:check_suburbs, 
          check_towns:check_towns,
          check_very_conservative:check_very_conservative, 
          check_conservative:check_conservative,
          check_balanced: check_balanced,
          check_liberal:check_liberal,
          check_very_liberal:check_very_liberal,
          cost_living_1:cost_living_1,
          cost_living_2:cost_living_2,
          cost_living_3:cost_living_3,
          cost_living_4:cost_living_4,
          crime_1:crime_1,
          crime_2:crime_2,
          crime_3:crime_3,
          crime_4:crime_4,
          home_cost_1:home_cost_1,
          home_cost_2:home_cost_2,
          home_cost_3:home_cost_3,
          home_cost_4:home_cost_4,
          male_female_ratio:male_female_ratio,
          weather_ratio:weather_ratio,
          single_ratio:single_ratio,
        },
        success:function(data)
        {
          $('#new_counter').html(data);
          $('#counter_listing').html(data+" locations found");
        }
      });
    }
    function mainMap() 
    {
      console.log("mainMap");
    let locations = [];
    get_search_values();
     var multi_state = $("#hidden_multi_state").val();
      $.ajax({
        url:"/getlistingMapdata_advanced",
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, 
        data:{
          multi_state:multi_state, 
          check_city:check_city, 
          check_city_neighbour:check_city_neighbour, 
          check_suburbs:check_suburbs, 
          check_towns:check_towns,
          check_very_conservative:check_very_conservative, 
          check_conservative:check_conservative,
          check_balanced: check_balanced,
          check_liberal:check_liberal,
          check_very_liberal:check_very_liberal,
          cost_living_1:cost_living_1,
          cost_living_2:cost_living_2,
          cost_living_3:cost_living_3,
          cost_living_4:cost_living_4,
          crime_1:crime_1,
          crime_2:crime_2,
          crime_3:crime_3,
          crime_4:crime_4,
          home_cost_1:home_cost_1,
          home_cost_2:home_cost_2,
          home_cost_3:home_cost_3,
          home_cost_4:home_cost_4,
          male_female_ratio:male_female_ratio,
          weather_ratio:weather_ratio,
          single_ratio:single_ratio,
        },
        cache: false,
        success:function(data)
        {
          data = typeof data != 'object' ? JSON.parse(data) : data
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
          var locationStateAbb = [];
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
             locationStateAbb.push(data[i].State_Abbreviated);
             locationCategory.push('cafe-cat');
             locationStarRating.push('5');
             locationRevievsCounter.push('4');
             locationStatus.push('open');
             lat.push(data[i].Latitude);
             lon.push(data[i].Longitude);
             marker.push(data[i].ID);
             image.push(data[i].Picture_Links);
           
          } 
                     //begin
          // console.log(city.length);
                         //  Map Infoboxes ------------------
         //var locations = [];
         for(let k=0, l=city.length; k < l; k++){

          locations.push([locationData(locationURL[k], locationImg[k], locationTitle[k], locationAddress[k], locationCategory[k], locationStarRating[k], locationStateAbb[k], locationRevievsCounter[k], locationStatus[k]), parseFloat(lat[k]), parseFloat(lon[k]), parseFloat(marker[k]), image[k]],);
          // console.log(locationStateAbb[k]);
          }
        // console.log(locations[0][2]);
     
        // console.log(locations);
    //   console.log(locations[0][2]);

          function locationData(locationURL, locationImg, locationTitle, locationAddress, locationCategory, locationStatus, locationStateAbb) {
            return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fal fa-times"></i></div><a href="singlelisting?ID='+locationURL+'" class="listing-img-content fl-wrap" target="_blank"><div class="infobox-status '+ locationStatus +'">' + locationStatus + '</div><img src="' + locationImg + '" alt=""><div class="card-popup-raining map-card-rainting" data-staRrating="' + ' ' + '"><span class="map-popup-reviews-count"> ' + ' ' + ' </span></div></a> <div class="listing-content"><div class="listing-content-item fl-wrap"><a href="/find_homes?location='+ locationTitle +' '+locationAddress+'" data-toggle="tooltip" data-placement="top" title="Homes For Sale" target="_blank"><div class="map-popup-location-category cafe-cat" style="right: 80px;"><i class="fas fa-home" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><a href="/find_homes_for_rent?location='+ locationTitle +' '+locationAddress+'" data-toggle="tooltip"  data-placement="top" title="Homes For Rent" target="_blank"><div class="map-popup-location-category cafe-cat" style="right: 145px;"><i class="fas fa-home" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><a href="/find_schools?location=' +locationTitle+ ' ' + locationAddress + '" target="_blank"><div class="map-popup-location-category cafe-cat"><i class="fas fa-school" style="color:white;margin-top:10px;font-size: 20px;"></i></div></a><div class="listing-title fl-wrap"><h4><a href="singlelisting?ID='+locationURL+'" target="_blank">' + locationTitle + '</a></h4><div class="map-popup-location-info"><i class="fas fa-map-marker-alt"></i>' + locationAddress + '</div></div><div class="map-popup-footer"><a href="singlelisting?ID='+locationURL+'" class="main-link" target="_blank">Details <i class="fal fa-long-arrow-right"></i></a></div></div></div></div>')
        }
      //  Map Infoboxes ------------------

      //   Map Infoboxes end ------------------
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

      var clusterStyles = [
        {
          textColor: 'white',
          url: '',
          height: 50,
          width: 50
        }
      ];

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
  //ajax tag start      
      }
    });
//ajax tag end

    
      // Geo Location Button
      $(".geoLocation, .input-with-icon.location a").on("click", function (e) {
          e.preventDefault();
          geolocate();
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

    }
$(document).ready(function(){
    "use strict";
    load_data(1);
     listing_update(1);



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
                         '</div>'
 

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

  
  $("#sortt").change(function(){
      listing_update();
      
    });

  $(".search_checks_pop").click(function(){
    listing_update();
    load_data();
    mainMap();
  });

  $(".search_checks_politics").click(function(){
    listing_update();
    load_data();
    mainMap();
  });

  $(".btn_selections").click(function(){
    
    
    if(!$(this).hasClass("selected")){
      $(this).attr("style", "border: 1px solid skyblue !important;color: skyblue !important;");
      $(this).addClass("selected");
    }
    else{
      $(this).attr("style", "border: 1px solid grey !important;color: grey !important;");
      $(this).removeClass("selected");
    }
    
    listing_update();
    load_data();
    mainMap();

  });
  
  $(document).on('input', '#male_female_slider', function() {
    $('#hidden_male_female_ratio').val( $(this).val() );
    listing_update();
    load_data();
    mainMap();
  });

  $(document).on('input', '#weather_slider', function() {
    $('#hidden_weather').val( $(this).val() );
    listing_update();
    load_data();
    mainMap();
  });

  $(document).on('input', '#single_slider', function() {
    $('#hidden_single_ratio').val( $(this).val() );
    listing_update();
    load_data();
    mainMap();
  });
  $("#btn_reset_search").click(function(){
    window.location = "/listing_advanced";
  });
  $("#btn_to_distance_search").click(function(){
    window.location = "/distance_search";
  });
  $("#btn_to_advanced_search").click(function(){
    window.location = "/listing";
  });
  $("#btn_list_location_more").click(function(){
      var location_counts_temp1 = $("#counter_listing").text();
      var location_counts_temp2 = location_counts_temp1.split(" ");
      var location_counts = location_counts_temp2[0];
      if($("#hidden_list_number").val() < location_counts){
        var hidden_count = Number($("#hidden_list_number").val()) + 10;
        $("#hidden_list_number").val(hidden_count);
        listing_update();
      }
    });
});