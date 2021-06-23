function get_state_list(){
  var query1 = $('#search_focus1').val();
  var query2 = $('#search_focus2').val();
  var query3 = $('#search_focus3').val();
  var query_region= $('#search_focus4').val();
  var query_county= $('#search_focus5').val();
  var query_nmc= $('#search_focus7').val();
  $.ajax({
    url: "/getstatelist",
    method: "POST",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
      query1:query1,
      query2:query2,
      query3:query3,
      query_region:query_region, 
      query_county:query_county, 
      query_nmc:query_nmc,
    },
    success:function(response){
      $("#multi-select").empty();
      $("#geography div div.col-md-12").empty();
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
  console.log("listing_update");
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
  $.ajax({
    url: "/listing_update",
    method: "POST",
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{multi_state:multi_state, sortt:sortt,query1:query1,query2:query2,query3:query3,query_region:query_region,query_county:query_county,query_pop:query_pop,query_pop_0,query_nmc:query_nmc,query_ocl:query_ocl,query_mfr:query_mfr,query_mpop:query_mpop,query_mage:query_mage,query_mhincome:query_mhincome,query_strate:query_strate,query_pt_rate:query_pt_rate,query_inc_trate:query_inc_trate,query_mh_cost:query_mh_cost,query_ump_rate:query_ump_rate,query_vio_crime:query_vio_crime,query_prop_crime:query_prop_crime,query_ann_rain:query_ann_rain,query_ann_sno:query_ann_sno,query_ann_prpp:query_ann_prpp,query_ann_sunn:query_ann_sunn,query_ahigh_tem:query_ahigh_tem,query_alow_tem:query_alow_tem,query_air_qua:query_air_qua,query_wat_qua:query_wat_qua,query_com_tm:query_com_tm,query_dem:query_dem,query_rep:query_rep,query_bsc:query_bsc,query_grado:query_grado,query_per_rel:query_per_rel, search_center_town:search_center_town, search_range:search_range},
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
 var limit_number = $("#hidden_list_number").val();
 $.ajax({
  url:"/fetch_counter",
  method:"POST",
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  data:{limit_number:limit_number,multi_state:multi_state,query1:query1,query2:query2,query3:query3,query_region:query_region,query_county:query_county,query_pop:query_pop,query_pop_0,query_nmc:query_nmc,query_ocl:query_ocl,query_mfr:query_mfr,query_mpop:query_mpop,query_mage:query_mage,query_mhincome:query_mhincome,query_strate:query_strate,query_pt_rate:query_pt_rate,query_inc_trate:query_inc_trate,query_mh_cost:query_mh_cost,query_ump_rate:query_ump_rate,query_vio_crime:query_vio_crime,query_prop_crime:query_prop_crime,query_ann_rain:query_ann_rain,query_ann_sno:query_ann_sno,query_ann_prpp:query_ann_prpp,query_ann_sunn:query_ann_sunn,query_ahigh_tem:query_ahigh_tem,query_alow_tem:query_alow_tem,query_air_qua:query_air_qua,query_wat_qua:query_wat_qua,query_com_tm:query_com_tm,query_dem:query_dem,query_rep:query_rep,query_bsc:query_bsc,query_grado:query_grado,query_per_rel:query_per_rel, search_center_town:search_center_town, search_range:search_range},
        //cache: false,
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
    // var search_array = JSON.parse(localStorage.getItem("search_array"));
    // console.log(search_array.query3);
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
$('#search_range').change(function(){
  load_data();
  listing_update();
  mainMap();
});
$('#search_focus1').change(function(){
  
 load_data();
 listing_update();
 mainMap();
 get_state_list()
 
});
$('#search_focus2').change(function(){
 load_data();
 listing_update();
 mainMap();
 get_state_list()
 
});
$('#search_focus3').change(function(){
  load_data();
  listing_update();
  mainMap();
  get_state_list()
  
});
$('#search_focus4').change(function(){
  load_data();
  listing_update();
  mainMap();
  get_state_list()
  
});
$('#search_focus5').change(function(){
  load_data();
  listing_update();
  mainMap();
  get_state_list()
  
});
$('#search_focus6').change(function(){
  load_data();
  listing_update();
  mainMap();
});
$('#search_focus6_0').change(function(){
  load_data();
  listing_update();
  mainMap();
});
$('#search_focus7').change(function(){
 load_data();
 listing_update();
 mainMap();
 get_state_list()
});

$("#btn_reset_search").click(function(){
  window.location = "/listing";
});
$('#slider-range8').slider({
  range: true,
  min: 0,
  max: 600,
  step: 1,
  values: [isNaN($('#search_focus8').val().split(';')[0]) ? 0 : $('#search_focus8').val().split(';')[0], isNaN($('#search_focus8').val().split(';')[1]) ? 600 : $('#search_focus8').val().split(';')[1]]
});
  // alert(isNaN($('#search_focus8').val().split(';')[1]) ? 600 : $('#search_focus8').val().split(';')[1]);
  // Move the range wrapper into the generated divs
  $('#range8 .ui-slider-range').append($('#range-wrapper8'));

  // Apply initial values to the range container
  $('#range8').html('<span class="range-value">' + $('#slider-range8').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range8").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range8 .ui-slider-handle,#slider-range8 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper8 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range8 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper8 .gear-large').hasClass('active')) {
      $('#gear-wrapper8 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper8 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper8 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range8').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus8").val(ui.values[0]+";"+ui.values[1]);
      $('#range8').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper8 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper8 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper8 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper8 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 600) {
        if (!$('range-wrapper8 .range-alert').hasClass('active')) {
          $('range-wrapper8 .range-alert').addClass('active');
        }
      } else {
        if ($('range-wrapper8 .range-alert').hasClass('active')) {
          $('range-wrapper8 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper8 .range, #range-wrapper8 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });


  $('#slider-range9').slider({
    range: true,
    min: 0,
    max: 100,
    step: 1,
    values: [isNaN($('#search_focus9').val().split(';')[0]) ? 0 : $('#search_focus9').val().split(';')[0], isNaN($('#search_focus9').val().split(';')[1]) ? 100 : $('#search_focus9').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range9 .ui-slider-range').append($('#range-wrapper9'));

  // Apply initial values to the range container
  $('#range9').html('<span class="range-value">' + $('#slider-range9').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range9").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range9 .ui-slider-handle, #slider-range9 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper9 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range9 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper9 .gear-large').hasClass('active')) {
      $('#gear-wrapper9 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper9 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper9 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range9').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus9").val(ui.values[0]+";"+ui.values[1]);
      $('#range9').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper9 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper9 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper9 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper9 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 100) {
        if (!$('#range-wrapper9 .range-alert').hasClass('active')) {
          $('#range-wrapper9 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper9 .range-alert').hasClass('active')) {
          $('#range-wrapper9 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper9 .range, #range-wrapper9 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });



  $('#slider-range10').slider({
    range: true,
    min: 0,
    max: 100,
    step: 1,
    values: [isNaN($('#search_focus10').val().split(';')[0]) ? 0 : $('#search_focus10').val().split(';')[0], isNaN($('#search_focus10').val().split(';')[1]) ? 100 : $('#search_focus10').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range10 .ui-slider-range').append($('#range-wrapper10'));

  // Apply initial values to the range container
  $('#range10').html('<span class="range-value">' + $('#slider-range10').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range10").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range10 .ui-slider-handle, #slider-range10 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper10 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range10 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper10 .gear-large').hasClass('active')) {
      $('#gear-wrapper10 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper10 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper10 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range10').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus10").val(ui.values[0]+";"+ui.values[1]);
      $('#range10').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper10 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper10 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper10 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper10 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 100) {
        if (!$('#range-wrapper10 .range-alert').hasClass('active')) {
          $('#range-wrapper10 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper10 .range-alert').hasClass('active')) {
          $('#range-wrapper10 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper10 .range, #range-wrapper10 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });



  $('#slider-range11').slider({
    range: true,
    min: 0,
    max: 100,
    step: 1,
    values: [isNaN($('#search_focus11').val().split(';')[0]) ? 0 : $('#search_focus11').val().split(';')[0], isNaN($('#search_focus11').val().split(';')[1]) ? 100 : $('#search_focus11').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range11 .ui-slider-range').append($('#range-wrapper11'));

  // Apply initial values to the range container
  $('#range11').html('<span class="range-value">' + $('#slider-range11').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range11").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range11 .ui-slider-handle, #slider-range11 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper11 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range11 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper11 .gear-large').hasClass('active')) {
      $('#gear-wrapper11 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper11 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper11 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range11').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus11").val(ui.values[0]+";"+ui.values[1]);
      $('#range11').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper11 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper11 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper11 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper11 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 100) {
        if (!$('#range-wrapper11 .range-alert').hasClass('active')) {
          $('#range-wrapper11 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper11 .range-alert').hasClass('active')) {
          $('#range-wrapper11 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper11 .range, #range-wrapper11 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });


  $('#slider-range12').slider({
    range: true,
    min: 0,
    max: 600000,
    step: 1,
    values: [isNaN($('#search_focus12').val().split(';')[0]) ? 0 : $('#search_focus12').val().split(';')[0], isNaN($('#search_focus12').val().split(';')[1]) ? 600000 : $('#search_focus12').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range12 .ui-slider-range').append($('#range-wrapper12'));

  // Apply initial values to the range container
  $('#range12').html('<span class="range-value">$' + $('#slider-range12').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value">$' + $("#slider-range12").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range12 .ui-slider-handle, #slider-range12 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper12 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range12 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper12 .gear-large').hasClass('active')) {
      $('#gear-wrapper12 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper12 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper12 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range12').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus12").val(ui.values[0]+";"+ui.values[1]);
      $('#range12').html('<span class="range-value">$' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value">$' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper12 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper12 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper12 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper12 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 600000) {
        if (!$('#range-wrapper12 .range-alert').hasClass('active')) {
          $('#range-wrapper12 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper12 .range-alert').hasClass('active')) {
          $('#range-wrapper12 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper12 .range, #range-wrapper12 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range13').slider({
    range: true,
    min: 0,
    max: 16,
    step: 1,
    values: [isNaN($('#search_focus13').val().split(';')[0]) ? 0 : $('#search_focus13').val().split(';')[0], isNaN($('#search_focus13').val().split(';')[1]) ? 16 : $('#search_focus13').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range13 .ui-slider-range').append($('#range-wrapper13'));

  // Apply initial values to the range container
  $('#range13').html('<span class="range-value">' + $('#slider-range13').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range13").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range13 .ui-slider-handle, #slider-range13 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper13 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range13 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper13 .gear-large').hasClass('active')) {
      $('#gear-wrapper13 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper13 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper13 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range13').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus13").val(ui.values[0]+";"+ui.values[1]);
      $('#range13').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper13 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper13 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper13 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper13 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 16) {
        if (!$('#range-wrapper13 .range-alert').hasClass('active')) {
          $('#range-wrapper13 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper13 .range-alert').hasClass('active')) {
          $('#range-wrapper13 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper13 .range, #range-wrapper13 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range14').slider({
    range: true,
    min: 0,
    max: 36,
    step: 1,
    values: [isNaN($('#search_focus14').val().split(';')[0]) ? 0 : $('#search_focus14').val().split(';')[0], isNaN($('#search_focus14').val().split(';')[1]) ? 36 : $('#search_focus14').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range14 .ui-slider-range').append($('#range-wrapper14'));

  // Apply initial values to the range container
  $('#range14').html('<span class="range-value">' + $('#slider-range14').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range14").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range14 .ui-slider-handle, #slider-range14 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper14 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range14 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper14 .gear-large').hasClass('active')) {
      $('#gear-wrapper14 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper14 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper14 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range14').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus14").val(ui.values[0]+";"+ui.values[1]);
      $('#range14').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper14 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper14 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper14 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper14 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 36) {
        if (!$('#range-wrapper14 .range-alert').hasClass('active')) {
          $('#range-wrapper14 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper14 .range-alert').hasClass('active')) {
          $('#range-wrapper14 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper14 .range, #range-wrapper14 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range15').slider({
    range: true,
    min: 0,
    max: 12,
    step: 1,
    values: [isNaN($('#search_focus15').val().split(';')[0]) ? 0 : $('#search_focus15').val().split(';')[0], isNaN($('#search_focus15').val().split(';')[1]) ? 12 : $('#search_focus15').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range15 .ui-slider-range').append($('#range-wrapper15'));

  // Apply initial values to the range container
  $('#range15').html('<span class="range-value">' + $('#slider-range15').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range15").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range15 .ui-slider-handle, #slider-range15 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper15 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range15 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper15 .gear-large').hasClass('active')) {
      $('#gear-wrapper15 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper15 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper15 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range15').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus15").val(ui.values[0]+";"+ui.values[1]);
      $('#range15').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper15 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper15 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper15 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper15 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 12) {
        if (!$('#range-wrapper15 .range-alert').hasClass('active')) {
          $('#range-wrapper15 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper15 .range-alert').hasClass('active')) {
          $('#range-wrapper15 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper15 .range, #range-wrapper15 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range16').slider({
    range: true,
    min: 0,
    max: 2700000,
    step: 1,
    values: [isNaN($('#search_focus16').val().split(';')[0]) ? 0 : $('#search_focus16').val().split(';')[0], isNaN($('#search_focus16').val().split(';')[1]) ? 2700000 : $('#search_focus16').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range16 .ui-slider-range').append($('#range-wrapper16'));

  // Apply initial values to the range container
  $('#range16').html('<span class="range-value">$' + $('#slider-range16').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value">$' + $("#slider-range16").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range16 .ui-slider-handle, #slider-range16 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper16 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range16 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper16 .gear-large').hasClass('active')) {
      $('#gear-wrapper16 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper16 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper16 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range16').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus16").val(ui.values[0]+";"+ui.values[1]);
      $('#range16').html('<span class="range-value">$' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value">$' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper16 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper16 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper16 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper16 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 2700000) {
        if (!$('#range-wrapper16 .range-alert').hasClass('active')) {
          $('#range-wrapper16 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper16 .range-alert').hasClass('active')) {
          $('#range-wrapper16 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper16 .range, #range-wrapper16 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range17').slider({
    range: true,
    min: 0,
    max: 48,
    step: 1,
    values: [isNaN($('#search_focus17').val().split(';')[0]) ? 0 : $('#search_focus17').val().split(';')[0], isNaN($('#search_focus17').val().split(';')[1]) ? 48 : $('#search_focus17').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range17 .ui-slider-range').append($('#range-wrapper17'));

  // Apply initial values to the range container
  $('#range17').html('<span class="range-value">' + $('#slider-range17').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range17").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range17 .ui-slider-handle, #slider-range17 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper17 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range17 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper17 .gear-large').hasClass('active')) {
      $('#gear-wrapper17 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper17 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper17 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range17').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus17").val(ui.values[0]+";"+ui.values[1]);
      $('#range17').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper17 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper17 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper17 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper17 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 48) {
        if (!$('#range-wrapper17 .range-alert').hasClass('active')) {
          $('#range-wrapper17 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper17 .range-alert').hasClass('active')) {
          $('#range-wrapper17 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper17 .range, #range-wrapper17 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range18').slider({
    range: true,
    min: 0,
    max: 16,
    step: 1,
    values: [isNaN($('#search_focus18').val().split(';')[0]) ? 0 : $('#search_focus18').val().split(';')[0], isNaN($('#search_focus18').val().split(';')[1]) ? 16 : $('#search_focus18').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range18 .ui-slider-range').append($('#range-wrapper18'));

  // Apply initial values to the range container
  $('#range18').html('<span class="range-value">' + $('#slider-range18').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range18").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range18 .ui-slider-handle, #slider-range18 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper18 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range18 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper18 .gear-large').hasClass('active')) {
      $('#gear-wrapper18 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper18 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper18 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range18').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus18").val(ui.values[0]+";"+ui.values[1]);
      $('#range18').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper18 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper18 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper18 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper18 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 16) {
        if (!$('#range-wrapper18 .range-alert').hasClass('active')) {
          $('#range-wrapper18 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper18 .range-alert').hasClass('active')) {
          $('#range-wrapper18 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper18 .range, #range-wrapper18 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range19').slider({
    range: true,
    min: 0,
    max: 16,
    step: 1,
    values: [isNaN($('#search_focus19').val().split(';')[0]) ? 0 : $('#search_focus19').val().split(';')[0], isNaN($('#search_focus19').val().split(';')[1]) ? 16 : $('#search_focus19').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range19 .ui-slider-range').append($('#range-wrapper19'));

  // Apply initial values to the range container
  $('#range19').html('<span class="range-value">' + $('#slider-range19').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range19").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range19 .ui-slider-handle, #slider-range19 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper19 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range19 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper19 .gear-large').hasClass('active')) {
      $('#gear-wrapper19 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper19 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper19 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range19').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus19").val(ui.values[0]+";"+ui.values[1]);
      $('#range19').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper19 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper19 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper19 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper19 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 16) {
        if (!$('#range-wrapper19 .range-alert').hasClass('active')) {
          $('#range-wrapper19 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper19 .range-alert').hasClass('active')) {
          $('#range-wrapper19 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper19 .range, #range-wrapper19 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range20').slider({
    range: true,
    min: 0,
    max: 220,
    step: 1,
    values: [isNaN($('#search_focus20').val().split(';')[0]) ? 0 : $('#search_focus20').val().split(';')[0], isNaN($('#search_focus20').val().split(';')[1]) ? 220 : $('#search_focus20').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range20 .ui-slider-range').append($('#range-wrapper20'));

  // Apply initial values to the range container
  $('#range20').html('<span class="range-value">' + $('#slider-range20').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range20").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span>');

  // Show the gears on press of the handles
  $('#slider-range20 .ui-slider-handle, #slider-range20 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper20 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range20 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper20 .gear-large').hasClass('active')) {
      $('#gear-wrapper20 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper20 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper20 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range20').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus20").val(ui.values[0]+";"+ui.values[1]);
      $('#range20').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper20 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper20 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper20 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper20 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 220) {
        if (!$('#range-wrapper20 .range-alert').hasClass('active')) {
          $('#range-wrapper20 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper20 .range-alert').hasClass('active')) {
          $('#range-wrapper20 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper20 .range, #range-wrapper20 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });


  $('#slider-range21').slider({
    range: true,
    min: 0,
    max: 520,
    step: 1,
    values: [isNaN($('#search_focus21').val().split(';')[0]) ? 0 : $('#search_focus21').val().split(';')[0], isNaN($('#search_focus21').val().split(';')[1]) ? 520 : $('#search_focus21').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range21 .ui-slider-range').append($('#range-wrapper21'));

  // Apply initial values to the range container
  $('#range21').html('<span class="range-value">' + $('#slider-range21').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range21").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span>');

  // Show the gears on press of the handles
  $('#slider-range21 .ui-slider-handle, #slider-range21 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper21 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range21 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper21 .gear-large').hasClass('active')) {
      $('#gear-wrapper21 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper21 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper21 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range21').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus21").val(ui.values[0]+";"+ui.values[1]);
      $('#range21').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper21 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper21 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper21 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper21 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 520) {
        if (!$('#range-wrapper21 .range-alert').hasClass('active')) {
          $('#range-wrapper21 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper21 .range-alert').hasClass('active')) {
          $('#range-wrapper21 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper21 .range, #range-wrapper21 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range22').slider({
    range: true,
    min: 0,
    max: 320,
    step: 1,
    values: [isNaN($('#search_focus22').val().split(';')[0]) ? 0 : $('#search_focus22').val().split(';')[0], isNaN($('#search_focus22').val().split(';')[1]) ? 320 : $('#search_focus22').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range22 .ui-slider-range').append($('#range-wrapper22'));

  // Apply initial values to the range container
  $('#range22').html('<span class="range-value">' + $('#slider-range22').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range22").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span>');

  // Show the gears on press of the handles
  $('#slider-range22 .ui-slider-handle, #slider-range22 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper22 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range22 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper22 .gear-large').hasClass('active')) {
      $('#gear-wrapper22 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper22 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper22 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range22').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus22").val(ui.values[0]+";"+ui.values[1]);
      $('#range22').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'in</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper22 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper22 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper22 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper22 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 320) {
        if (!$('#range-wrapper22 .range-alert').hasClass('active')) {
          $('#range-wrapper22 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper22 .range-alert').hasClass('active')) {
          $('#range-wrapper22 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper22 .range, #range-wrapper22 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });


  $('#slider-range23').slider({
    range: true,
    min: 0,
    max: 320,
    step: 1,
    values: [isNaN($('#search_focus23').val().split(';')[0]) ? 0 : $('#search_focus23').val().split(';')[0], isNaN($('#search_focus23').val().split(';')[1]) ? 320 : $('#search_focus23').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range23 .ui-slider-range').append($('#range-wrapper23'));

  // Apply initial values to the range container
  $('#range23').html('<span class="range-value">' + $('#slider-range23').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range23").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range23 .ui-slider-handle, #slider-range23 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper23 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range23 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper23 .gear-large').hasClass('active')) {
      $('#gear-wrapper23 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper23 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper23 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range23').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus23").val(ui.values[0]+";"+ui.values[1]);
      $('#range23').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper23 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper23 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper23 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper23 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 320) {
        if (!$('#range-wrapper23 .range-alert').hasClass('active')) {
          $('#range-wrapper23 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper23 .range-alert').hasClass('active')) {
          $('#range-wrapper23 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper23 .range, #range-wrapper23 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range24').slider({
    range: true,
    min: 0,
    max: 120,
    step: 1,
    values: [isNaN($('#search_focus24').val().split(';')[0]) ? 0 : $('#search_focus24').val().split(';')[0], isNaN($('#search_focus24').val().split(';')[1]) ? 120 : $('#search_focus24').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range24 .ui-slider-range').append($('#range-wrapper24'));

  // Apply initial values to the range container
  $('#range24').html('<span class="range-value">' + $('#slider-range24').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range24").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range24 .ui-slider-handle, #slider-range24 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper24 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range24 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper24 .gear-large').hasClass('active')) {
      $('#gear-wrapper24 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper24 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper24 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range24').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus24").val(ui.values[0]+";"+ui.values[1]);
      $('#range24').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper24 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper24 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper24 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper24 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 120) {
        if (!$('#range-wrapper24 .range-alert').hasClass('active')) {
          $('#range-wrapper24 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper24 .range-alert').hasClass('active')) {
          $('#range-wrapper24 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper24 .range, #range-wrapper24 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });


  $('#slider-range25').slider({
    range: true,
    min: 0,
    max: 72,
    step: 1,
    values: [isNaN($('#search_focus25').val().split(';')[0]) ? 0 : $('#search_focus25').val().split(';')[0], isNaN($('#search_focus25').val().split(';')[1]) ? 72 : $('#search_focus25').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range25 .ui-slider-range').append($('#range-wrapper25'));

  // Apply initial values to the range container
  $('#range25').html('<span class="range-value">' + $('#slider-range25').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range25").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range25 .ui-slider-handle, #slider-range25 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper25 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range25 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper25 .gear-large').hasClass('active')) {
      $('#gear-wrapper25 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper25 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper25 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range25').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus25").val(ui.values[0]+";"+ui.values[1]);
      $('#range25').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper25 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper25 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper25 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper25 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 72) {
        if (!$('#range-wrapper25 .range-alert').hasClass('active')) {
          $('#range-wrapper25 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper25 .range-alert').hasClass('active')) {
          $('#range-wrapper25 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper25 .range, #range-wrapper25 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });



  $('#slider-range26').slider({
    range: true,
    min: 0,
    max: 120,
    step: 1,
    values: [isNaN($('#search_focus26').val().split(';')[0]) ? 0 : $('#search_focus26').val().split(';')[0], isNaN($('#search_focus26').val().split(';')[1]) ? 120 : $('#search_focus26').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range26 .ui-slider-range').append($('#range-wrapper26'));

  // Apply initial values to the range container
  $('#range26').html('<span class="range-value">' + $('#slider-range26').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range26").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range26 .ui-slider-handle, #slider-range26 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper26 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range26 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper26 .gear-large').hasClass('active')) {
      $('#gear-wrapper26 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper26 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper26 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range26').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus26").val(ui.values[0]+";"+ui.values[1]);
      $('#range26').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper26 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper26 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper26 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper26 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 120) {
        if (!$('#range-wrapper26 .range-alert').hasClass('active')) {
          $('#range-wrapper26 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper26 .range-alert').hasClass('active')) {
          $('#range-wrapper26 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper26 .range, #range-wrapper26 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range27').slider({
    range: true,
    min: 0,
    max: 108,
    step: 1,
    values: [isNaN($('#search_focus27').val().split(';')[0]) ? 0 : $('#search_focus27').val().split(';')[0], isNaN($('#search_focus27').val().split(';')[1]) ? 108 : $('#search_focus27').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range27 .ui-slider-range').append($('#range-wrapper27'));

  // Apply initial values to the range container
  $('#range27').html('<span class="range-value">' + $('#slider-range27').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range27").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

  // Show the gears on press of the handles
  $('#slider-range27 .ui-slider-handle, #slider-range27 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper27 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range27 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper27 .gear-large').hasClass('active')) {
      $('#gear-wrapper27 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper27 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper27 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range27').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus27").val(ui.values[0]+";"+ui.values[1]);
      $('#range27').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper27 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper27 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper27 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper27 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 108) {
        if (!$('#range-wrapper27 .range-alert').hasClass('active')) {
          $('#range-wrapper27 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper27 .range-alert').hasClass('active')) {
          $('#range-wrapper27 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper27 .range, #range-wrapper27 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range28').slider({
    range: true,
    min: 0,
    max: 100,
    step: 1,
    values: [isNaN($('#search_focus28').val().split(';')[0]) ? 0 : $('#search_focus28').val().split(';')[0], isNaN($('#search_focus28').val().split(';')[1]) ? 100 : $('#search_focus28').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range28 .ui-slider-range').append($('#range-wrapper28'));

  // Apply initial values to the range container
  $('#range28').html('<span class="range-value">' + $('#slider-range28').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'mins</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range28").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'mins</span>');

  // Show the gears on press of the handles
  $('#slider-range28 .ui-slider-handle, #slider-range28 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper28 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range28 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper28 .gear-large').hasClass('active')) {
      $('#gear-wrapper28 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper28 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper28 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range28').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus28").val(ui.values[0]+";"+ui.values[1]);
      $('#range28').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'mins</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + 'mins</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper28 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper28 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper28 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper28 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 100) {
        if (!$('#range-wrapper28 .range-alert').hasClass('active')) {
          $('#range-wrapper28 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper28 .range-alert').hasClass('active')) {
          $('#range-wrapper28 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper28 .range, #range-wrapper28 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range29').slider({
    range: true,
    min: 0,
    max: 100,
    step: 1,
    values: [isNaN($('#search_focus29').val().split(';')[0]) ? 0 : $('#search_focus29').val().split(';')[0], isNaN($('#search_focus29').val().split(';')[1]) ? 100 : $('#search_focus29').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range29 .ui-slider-range').append($('#range-wrapper29'));

  // Apply initial values to the range container
  $('#range29').html('<span class="range-value">' + $('#slider-range29').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range29").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range29 .ui-slider-handle, #slider-range29 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper29 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range29 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper29 .gear-large').hasClass('active')) {
      $('#gear-wrapper29 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper29 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper29 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range29').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus29").val(ui.values[0]+";"+ui.values[1]);
      $('#range29').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper29 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper29 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper29 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper29 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 100) {
        if (!$('#range-wrapper29 .range-alert').hasClass('active')) {
          $('#range-wrapper29 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper29 .range-alert').hasClass('active')) {
          $('#range-wrapper29 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper29 .range, #range-wrapper29 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range30').slider({
    range: true,
    min: 0,
    max: 100,
    step: 1,
    values: [isNaN($('#search_focus30').val().split(';')[0]) ? 0 : $('#search_focus30').val().split(';')[0], isNaN($('#search_focus30').val().split(';')[1]) ? 100 : $('#search_focus30').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range30 .ui-slider-range').append($('#range-wrapper30'));

  // Apply initial values to the range container
  $('#range30').html('<span class="range-value">' + $('#slider-range30').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range30").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range30 .ui-slider-handle, #slider-range30 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper30 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range30 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper30 .gear-large').hasClass('active')) {
      $('#gear-wrapper30 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper30 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper30 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range30').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus30").val(ui.values[0]+";"+ui.values[1]);
      $('#range30').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper30 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper30 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper30 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper30 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 100) {
        if (!$('#range-wrapper30 .range-alert').hasClass('active')) {
          $('#range-wrapper30 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper30 .range-alert').hasClass('active')) {
          $('#range-wrapper30 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper30 .range, #range-wrapper30 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });


  $('#slider-range31').slider({
    range: true,
    min: 0,
    max: 100,
    step: 1,
    values: [isNaN($('#search_focus31').val().split(';')[0]) ? 0 : $('#search_focus31').val().split(';')[0], isNaN($('#search_focus31').val().split(';')[1]) ? 100 : $('#search_focus31').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range31 .ui-slider-range').append($('#range-wrapper31'));

  // Apply initial values to the range container
  $('#range31').html('<span class="range-value">' + $('#slider-range31').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range31").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range31 .ui-slider-handle, #slider-range31 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper31 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range31 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper31 .gear-large').hasClass('active')) {
      $('#gear-wrapper31 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper31 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper31 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range31').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus31").val(ui.values[0]+";"+ui.values[1]);
      $('#range31').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper31 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper31 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper31 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper31 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 100) {
        if (!$('#range-wrapper31 .range-alert').hasClass('active')) {
          $('#range-wrapper31 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper31 .range-alert').hasClass('active')) {
          $('#range-wrapper31 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper31 .range, #range-wrapper31 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  

  $('#slider-range32').slider({
    range: true,
    min: 0,
    max: 100,
    step: 1,
    values: [isNaN($('#search_focus32').val().split(';')[0]) ? 0 : $('#search_focus32').val().split(';')[0], isNaN($('#search_focus32').val().split(';')[1]) ? 100 : $('#search_focus32').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range32 .ui-slider-range').append($('#range-wrapper32'));

  // Apply initial values to the range container
  $('#range32').html('<span class="range-value">' + $('#slider-range32').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range32").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range32 .ui-slider-handle, #slider-range32 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper32 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range32 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper32 .gear-large').hasClass('active')) {
      $('#gear-wrapper32 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper32 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper32 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range32').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus32").val(ui.values[0]+";"+ui.values[1]);
      $('#range32').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper32 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper32 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper32 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper32 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 100) {
        if (!$('#range-wrapper32 .range-alert').hasClass('active')) {
          $('#range-wrapper32 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper32 .range-alert').hasClass('active')) {
          $('#range-wrapper32 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper32 .range, #range-wrapper32 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

  $('#slider-range33').slider({
    range: true,
    min: 0,
    max: 160,
    step: 1,
    values: [isNaN($('#search_focus33').val().split(';')[0]) ? 0 : $('#search_focus33').val().split(';')[0], isNaN($('#search_focus33').val().split(';')[1]) ? 160 : $('#search_focus33').val().split(';')[1]]
  });

  // Move the range wrapper into the generated divs
  $('#range33 .ui-slider-range').append($('#range-wrapper33'));

  // Apply initial values to the range container
  $('#range33').html('<span class="range-value">' + $('#slider-range33').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + $("#slider-range33").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

  // Show the gears on press of the handles
  $('#slider-range33 .ui-slider-handle, #slider-range33 .ui-slider-range').on('mousedown', function() {
    $('#gear-wrapper33 .gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $('#slider-range33 .ui-slider-handle').on('mouseup', function() {
    if ($('#gear-wrapper33 .gear-large').hasClass('active')) {
      $('#gear-wrapper33 .gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
  gearTwoAngle = 0,
  rangeWidth = $('.ui-slider-range').css('width');

  $('#gear-wrapper33 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('#gear-wrapper33 .gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range33').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding
      $("#search_focus33").val(ui.values[0]+";"+ui.values[1]);
      $('#range33').html('<span class="range-value">' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span><span class="range-divider"></span><span class="range-value">' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") + '%</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper33 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper33 .gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('#gear-wrapper33 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('#gear-wrapper33 .gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }

      if (ui.values[1] === 160) {
        if (!$('#range-wrapper33 .range-alert').hasClass('active')) {
          $('#range-wrapper33 .range-alert').addClass('active');
        }
      } else {
        if ($('#range-wrapper33 .range-alert').hasClass('active')) {
          $('#range-wrapper33 .range-alert').removeClass('active');
        }
      }

      load_data();
      listing_update();
      mainMap();
    }

  });

  // Prevent the range container from moving the slider
  $('#range-wrapper33 .range, #range-wrapper33 .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });
});