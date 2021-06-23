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
                    
                  <form action="/find_homes" method="post" id="find_home_form">
                  @csrf
                    <div class="list-main-wrap-opt">
                       <div class="price-opt">
                        <input type="hidden" name="hidden_price" id="hidden_price" value="{{ $filter_array[0] }}">
                            <div class="listsearch-input-item">
                              <select class="chosen-select no-search-select" name="price_filter" id="price_filter">
                                <option value="">Price</option>
                                <option value="100000">$100,000+</option>
                                <option value="200000">$200,000+</option>
                                <option value="300000">$300,000+</option>
                                <option value="400000">$400,000+</option>
                                <option value="500000">$500,000+</option>
                                <option value="600000">$600,000+</option>
                                <option value="700000">$700,000+</option>
                                <option value="800000">$800,000+</option>
                                <option value="900000">$900,000+</option>
                              </select>
                            </div>
                        </div>
                        <div class="price-opt">
                          <input type="hidden" name="hidden_home_type" id="hidden_home_type" value="{{ $filter_array[1] }}">
                            <div class="listsearch-input-item">
                              <select class="chosen-select no-search-select" name="home_type_filter" id="home_type_filter">
                                <option value="">Home Type</option>
                                <option value="SINGLE_FAMILY">Single Family</option>
                                <option value="MULTI_FAMILY">Multi Family</option>
                                <option value="LOT">Lot</option>
                                <option value="MANUFACTURED">Manufactured</option>
                              </select>
                            </div>
                        </div>
                        <div class="grid-opt">
                            <ul class="no-list-style">
                                <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="fal fa-th"></i></span></li>
                                <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="fal fa-list"></i></span></li>
                            </ul>
                        </div>
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
                            </div>
                            
                              
                            </form>
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
                @foreach($homes_for_list as $home_data)
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                       
                        <div class="geodir-category-img">
                            <div onclick="myFunction()" class="geodir-js-favorite_btn">
                              <i  class="fal fa-heart"></i>
                              <span>Save</span>
                            </div>
                            <div class="geodir_status_date gsd_open">
                              <p class="view_home_map" id="{{ $home_data->id }}" style="cursor: pointer;color: #007bff;margin-bottom: 0px;"><i class="fas fa-map-marker-alt"></i>View On Map</p>
                            </div>
                            <a href="/home_detail_view?id={{ $home_data->id }}"  class="geodir-category-img-wrap fl-wrap" target="_blank">
                              <img src="{{ $home_data->imgSrc }}" alt=""> 
                            </a>
                            <div class="listing-avatar"><a href="/home_detail_view?id={{ $home_data->id }}" target="_blank"><img src="images/avatar/1.jpg" alt=""></a>
                                <span class="avatar-tooltip">View Details</strong></span>
                            </div>
                        </div>
                        <div class="geodir-category-content fl-wrap title-sin_item">
                            <div class="geodir-category-content-title fl-wrap">
                                <div class="geodir-category-content-title-item">
                                    <h3 style="font-size: 26px;" class="title-sin_map"><a href="#">{{ $home_data->price }}</a></h3>
                                    <h6 style="margin-top: 5px;">{{ $home_data->beds }}bd | {{ $home_data->baths }}ba | {{ $home_data->area }} sqft</h6>
                                </div>
                            </div>
                            <div class="geodir-category-content-title fl-wrap" style="text-align: left;">
                              <h6>{{ $home_data->address }}</h6>
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
<script src="{{ asset('js/map-listing-home.js') }}"></script>
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
        setTimeout(function(){$("#find_home_form").submit();}, 1000);
      }
    });

    $("option[value='"+ $("#hidden_price").val() +"']").attr("selected", true);
    $("option[value='"+ $("#hidden_home_type").val() +"']").attr("selected", true);

    $("#price_filter").change(function(){
      $("#find_home_form").submit();
    });

    $("#home_type_filter").change(function(){
      $("#find_home_form").submit();
    });
  });
</script>
@include('components/footer')