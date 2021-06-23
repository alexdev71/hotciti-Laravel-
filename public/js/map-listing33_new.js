(function ($) {
    "use strict";
    function mainMap() 
    {
    let locations = [];
    var search_array = JSON.parse(localStorage.getItem("search_array"));
     var query1 = search_array.query1;
     var query2 = search_array.query2;
     var query3 = search_array.query3;
     var query_region= search_array.query_region;
     var query_county= search_array.query_county;
     var query_pop_0= search_array.query_pop_0;
     var query_pop= search_array.query_pop;
     var query_nmc= search_array.query_nmc;
     var query_ocl= search_array.query_ocl;
     var query_mfr= search_array.query_mfr;
     var query_mpop= search_array.query_mpop;
     var query_mage= search_array.query_mage;
     var query_mhincome= search_array.query_mhincome;
     var query_strate= search_array.query_strate;
     var query_pt_rate= search_array.query_pt_rate;
     var query_inc_trate= search_array.query_inc_trate;
     var query_mh_cost= search_array.query_mh_cost;
     var query_ump_rate= search_array.query_ump_rate;
     var query_vio_crime= search_array.query_vio_crime;
     var query_prop_crime= search_array.query_prop_crime;
     var query_ann_rain= search_array.query_ann_rain;
     var query_ann_sno= search_array.query_ann_sno;
     var query_ann_prpp= search_array.query_ann_prpp;
     var query_ann_sunn= search_array.query_ann_sunn;
     var query_ahigh_tem= search_array.query_ahigh_tem;
     var query_alow_tem= search_array.query_alow_tem;
     var query_air_qua= search_array.query_air_qua;
     var query_wat_qua= search_array.query_wat_qua;
     var query_com_tm= search_array.query_com_tm;
     var query_dem= search_array.query_dem;
     var query_rep= search_array.query_rep;
     var query_bsc= search_array.query_bsc;
     var query_grado= search_array.query_grado;
     var query_per_rel= search_array.query_per_rel;
     var search_center_town = $("#search_center_town").val();
     var search_range = $("#search_range").val();
      $.ajax({
        url:"/getlistingMapdata",
        method:"POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, 
        data:{search_center_town:search_center_town,search_range:search_range,query1:query1,query2:query2,query3:query3,query_region:query_region,query_county:query_county,query_pop:query_pop,query_pop_0,query_nmc:query_nmc,query_ocl:query_ocl,query_mfr:query_mfr,query_mpop:query_mpop,query_mage:query_mage,query_mhincome:query_mhincome,query_strate:query_strate,query_pt_rate:query_pt_rate,query_inc_trate:query_inc_trate,query_mh_cost:query_mh_cost,query_ump_rate:query_ump_rate,query_vio_crime:query_vio_crime,query_prop_crime:query_prop_crime,query_ann_rain:query_ann_rain,query_ann_sno:query_ann_sno,query_ann_prpp:query_ann_prpp,query_ann_sunn:query_ann_sunn,query_ahigh_tem:query_ahigh_tem,query_alow_tem:query_alow_tem,query_air_qua:query_air_qua,query_wat_qua:query_wat_qua,query_com_tm:query_com_tm,query_dem:query_dem,query_rep:query_rep,query_bsc:query_bsc,query_grado:query_grado,query_per_rel:query_per_rel},
        cache: false,

        success:function(data)
        {
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
                     //begin
      console.log(city.length);
                         //  Map Infoboxes ------------------
       //var locations = [];
       for(let k=0, l=city.length; k < l; k++){

        locations.push([locationData(locationURL[k], locationImg[k], locationTitle[k], locationAddress[k], locationCategory[k], locationStarRating[k], locationRevievsCounter[k], locationStatus[k]), parseFloat(lat[k]), parseFloat(lon[k]), parseFloat(marker[k]), image[k]],);
       // console.log(locations);
        //console.log(locations[0][2]);
        }
        console.log(locations[0][2]);
     
        console.log(locations);
    //   console.log(locations[0][2]);

          function locationData(locationURL, locationImg, locationTitle, locationAddress, locationCategory, locationStatus) {
            return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fal fa-times"></i></div><a href="singlelisting?ID='+locationURL+'" class="listing-img-content fl-wrap"><div class="infobox-status '+ locationStatus +'">' + locationStatus + '</div><img src="' + locationImg + '" alt=""><div class="card-popup-raining map-card-rainting" data-staRrating="' + ' ' + '"><span class="map-popup-reviews-count"> ' + ' ' + ' </span></div></a> <div class="listing-content"><div class="listing-content-item fl-wrap"><div class="map-popup-location-category ' + locationCategory + '"></div><div class="listing-title fl-wrap"><h4><a href="singlelisting?ID='+locationURL+'">' + locationTitle + '</a></h4><div class="map-popup-location-info"><i class="fas fa-map-marker-alt"></i>' + locationAddress + '</div></div><div class="map-popup-footer"><a href="singlelisting?ID='+locationURL+'" class="main-link">Details <i class="fal fa-long-arrow-right"></i></a></div></div></div></div> ')
        }
      //  Map Infoboxes ------------------

      //   Map Infoboxes end ------------------
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
  
  
  
  
})(this.jQuery);