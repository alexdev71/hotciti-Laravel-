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
                    
                  <form action="/find_schools" method="post" id="find_school_form">
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
                          <div class="col-lg-6 col-md-12">

                            
                            <div class="input-group mb-3">
                              <input type="text" class="form-control location_inputs" name="location" id="location" placeholder="Enter location" value="{{ $location }}">
                              <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn_input_clear" type="button">X</button>
                              </div>
                            </div>                            </form>
                          </div>
                          <div class="col-lg-6 col-md-12">
                            <button class="btn btn-default" style="width: 100%;height: 45px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E !important;font-weight: 700 !important;" data-toggle="modal" data-target="#questionModal">Contact Agent</button>
                          </div>
                        </div>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="listing-item-container init-grid-items fl-wrap">
              <table>
                @foreach($schools_for_list as $school_data)
                <div class="listing-item has_one_column">
                    <article class="geodir-category-listing fl-wrap">
                       
                        <div class="geodir-category-img">
                            <div onclick="myFunction()" class="geodir-js-favorite_btn">
                              <i  class="fal fa-heart"></i>
                              <span>Save</span>
                            </div>
                            <a href="#"  class="geodir-category-img-wrap fl-wrap">
                              <img src="images/favicon.ico" alt="" class="school_img_placeholder"> 
                            </a>
                            <div class="listing-avatar"><a href="/school_detail_view?search_key={{ $school_data->id }}-{{ $school_data->address->city }}-{{ $school_data->state }}-{{ $school_data->name }}" target="_blank"><img src="images/avatar/1.jpg" alt=""></a>
                                <span class="avatar-tooltip">View Details</strong></span>
                            </div>
                        </div>
                        <div class="geodir-category-content fl-wrap title-sin_item">
                            <div class="geodir-category-content-title fl-wrap">
                                <div class="geodir-category-content-title-item">
                                    <h3 style="font-size: 26px;" class="title-sin_map"><a href="/school_detail_view?search_key={{ $school_data->id }}-{{ $school_data->address->city }}-{{ $school_data->state }}-{{ $school_data->name }}" target="_blank">{{ $school_data->name }}</a></h3>
                                </div>
                            </div>
                            <div class="geodir-category-content-title fl-wrap" style="text-align: left;">
                              <h6>{{ $school_data->address->street1 }}, {{ $school_data->address->city }}, {{ $school_data->state }}, {{ $school_data->address->zip }}</h6>
                              <h6>{{ ucfirst($school_data->schoolType) }}, {{ $school_data->gradeLevels }} | {{ $school_data->enrollment }} Students 
                                @if($school_data->rating != null)
                                <strong>| Rank {{ $school_data->rating }} / 10</strong>
                                @else
                                <strong>| Rank 5 / 10</strong>
                                @endif
                              </h6>
                            </div>
                            <div class="geodir-category-content-title fl-wrap" style="text-align: left;">
                              <a class="see_school_members" style="cursor: pointer;font-size: 16px;" id="{{ $school_data->districtName }}-{{ $school_data->state }}"><i class="fas fa-arrow-right"></i>&nbsp;&nbsp;See School Board Memebers</a>
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
<script src="{{ asset('js/map-listing-school.js') }}"></script>
<script>

  $(document).ready(function(){
    

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

    $("#location").autocomplete({
      select: function(event, ui){
        setTimeout(function(){$("#find_school_form").submit();}, 1000);
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