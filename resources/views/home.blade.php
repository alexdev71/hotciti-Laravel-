@include ('components/header')
<!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--section  -->
                    <section class="hero-section"   data-scrollax-parent="true">
                        <div class="bg-tabs-wrap">
                            <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
                                <div class="bg bg_tabs" id="header_banner_wrap" >
                                  <div style="width: 100%;height: 100%;position: absolute;z-index: 10;background-color: rgba(41, 56, 78,0.6);"></div>
                                    <img src="images/Hotciti_Images/hotciti_banner (5).jpeg" style="height: 100%;width: 100%;" id="img_header_banner">
                                </div>
                            </div>
                        </div>
                        <div class="container small-container" id="home_search_container">
                            <div class="intro-item fl-wrap">
                                <div style="max-width: 525px;" id="home_texts">
                                    <h1 id="header_banner_title">We are here to help you find there</h1>
                                    <p style="font-size: 20px; color: white;">Finding the right place to live shouldn’t be hard. From the East Coast to the West Coast, we make it easy to connect with the places that fit you. </p>
                                </div>
                                
                                
                                
                                
                            </div>
                            <div style="height: 50px;"></div>
                            
                            <!-- main-search-input-tabs-->
                            <div class="main-search-input-tabs  tabs-act fl-wrap">
                                

                                <div class="tabs-container fl-wrap" style="z-index: 3;">
                                   <form method="get" action="/singlelisting" id="home_explorer_form">

                                      <div class="tab">
                                         <div id="tab-inpt1" class="tab-content first-tab">
                                          <div class="main-search-input-wrap fl-wrap">
                                            <div class="main-search-input fl-wrap">
                                                <div class="main-search-input-item" style="width: 100%;">
                                                  <label><i class="fal fa-map-marker-check" style="color: #c8c8c8 !important;"></i></label>
                                                  <input type="text" list="search1" name="map-search1" id="map-search1" class="no-search-select" placeholder="Enter City or Zip Code" autocomplete="off" />
                                                  <datalist id="search1" name="search1" ></datalist>
                                                </div>
                                                <!-- <button class="main-search-button color2-bg">Explore <i class="far fa-search"></i></button> -->
                                              </div>
                                            </div>
                                        </div>
                                      </div>
                                  </form>
                                  <form action="/listing" method="POST" id="main_search_form">
                                    @csrf
                                      <div class="tab">
                                          
                                          <div id="tab-inpt2" class="tab-content">
                                              <div class="main-search-input-wrap fl-wrap">
                                                 
                                                <div class="main-search-input fl-wrap" style="padding: 3px 8px 8px 8px;">     
                                                <div class="main-search-input-item input-item-search">
                                                  <label><i class="fal fa-map-marker-check" style="color: #c8c8c8 !important;"></i></label>
                                                  <input type="text" list="box2" name="search_box2" id="search_box2" class="no-search-select" placeholder="Enter a State"/>
                                                  <datalist id="box2" name="box2" ></datalist> 
                                                </div>
                                                 <div class="main-search-input-item input-item-search">
                                                    <label><i class="fal fa-map-marker-check" style="color: #c8c8c8 !important;"></i></label>
                                                    <input type="text" list="box0" id="search_box" name="search_box" class=" no-search-select" placeholder="Enter a County" value=""/>
                                                    <datalist id="box0" name="box0" ></datalist> 
                                                </div>
                                                <div class="main-search-input-item input-item-search location autocomplete-container">
                                                    <label><i class="fal fa-map-marker-check" style="color: #c8c8c8 !important;"></i></label>
                                                    <input type="text" list="box1" id="search_box1" name="search_box1" class=" no-search-select" placeholder="Enter a Region" value=""/>
                                                    <datalist id="box1" name="box1" >
                                                        <option value="Midwest">
                                                        <option value="North East">
                                                        <option value="South East">
                                                        <option value="South West">
                                                        <option value="West">
                                                    </datalist>         
                                                </div>
                                                 <div class="main-search-input-item input-item-search">
                                                    <button class="btn btn-default" style="width: 100%;margin-top: 5px;background-color: white;color: #757575 !important;">Search Entire US</button>
                                                </div>
                                                <!-- <button class="main-search-button color2-bg" onclick="window.location.href='/listing'">Search <i class="far fa-search"></i></button>
       -->                                      </div>
                                              
                                                </div>
                                            </div>
                                        </div>
                                      </form>
                                      
                                        <div class="tab">
                                            <div id="tab-inpt3" class="tab-content">
                                                <div class="main-search-input-wrap fl-wrap">
                                                    <div class="main-search-input fl-wrap">
                                                        <div class="main-search-input-item">
                                                            <label><i class="fal fa-map-marker-check" style="color: #c8c8c8 !important;"></i></label>
                                                            <input type="text" list="data1" name="col-search1" id="col-search1" class="no-search-select" placeholder="Enter City 1"/>
                                                          <datalist id="data1" name="data1" ></datalist> 
                                                        </div>
                                                       <div class="main-search-input-item">
                                                            <label><i class="fal fa-map-marker-check" style="color: #c8c8c8 !important;"></i></label>
                                                            <input type="text" list="data2" name="col-search2" id="col-search2" class=" no-search-select" placeholder="Enter City 2"/>
                                                          <datalist id="data2" name="data2" ></datalist> 
                                                        </div>
                                                       <div class="main-search-input-item">
                                                            <label><i class="fal fa-map-marker-check" style="color: #c8c8c8 !important;"></i></label>
                                                            <input type="text" list="data3" name="col-search3" id="col-search3" class="no-search-select" placeholder="Enter City 3"/>
                                                          <datalist id="data3" name="data3" ></datalist> 
                                                        </div>
                                                        <button type="button" id="main_compare_button" data-toggle="modal" data-target="#compareModal" class="main-search-button color2-bg" style="background-color: #007BFF;">Search <i class="far fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                  
                                </div>
                                <ul class="tabs-menu change_bg no-list-style" style="text-align: left;">
                                  <li style="color: white; font-size: 16px;font-weight: 700;">Select a Category:</li>
                                  <li ><a href="#tab-inpt2" style="margin-top: 20px;"> Search</a></li>
                                  <li class="current"><a href="#tab-inpt1"> Explore</a></li> 
                                  <li><a href="#tab-inpt3"> Compare</a></li>
                                </ul>   
                            </div>
                            <!-- main-search-input-tabs end-->
                            <div class="hero-categories fl-wrap">
                               
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
                        </div>
                    </section>
                    <!--section end-->
                    <!--section  -->
                    <section class="slw-sec" id="sec1">
                      <!-- <div class="big-container" style="margin-bottom: 120px;">
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="card" style="padding: 0;border-radius: 10px;box-shadow: 3px 10px rgba(0, 64, 128, 0.04);">
                                    <div>
                                      <img src="images/team/01-home.png" style="margin-top: 15%;width: 20%;height: 122px;">
                                      <h3 style="font-weight: bold;margin-top: 20px;">Search Places</h3>
                                      <p style="font-size: 16px;width: 350px;margin: auto;margin-top: 30px;color: #5A7184;">Scour more than 42,000 locations in the United States based on your personal preferences (weather, cost of living, crime, population, and dozens of other topics) and find the locations that best fit you.</p>
                                      <button type="button" class="btn btn-default" style="padding: 14px 33px !important;background-color: white;margin-top: 30px;margin-bottom: 50px;color: #337AB7 !important;border: 1px solid #337AB7;" onclick="window.location='/listing'">Search Places</button>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="card" style="padding: 0;border-radius: 10px;box-shadow: 3px 10px rgba(0, 64, 128, 0.04);">
                                    <div>
                                      <img src="images/team/home-approved.png" style="margin-top: 15%;width: 33%;height: 122px;">
                                      <h3 style="font-weight: bold;margin-top: 20px;">Explore Places</h3>
                                      <p style="font-size: 16px;width: 350px;margin: auto;margin-top: 30px;color: #5A7184;">Enjoy an immersive experience of any single city or town, watch videos, view pictures, compare stats, take virtual tours, explore maps, research amenities, available real estate, and more to see if the location fits you.</p>
                                      <button type="button" class="btn btn-default" style="padding: 14px 33px !important;background-color: white;margin-top: 30px;margin-bottom: 50px;color: #337AB7 !important;border: 1px solid #337AB7;" onclick="window.location='/city_find'" >Explore Places</button>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="card" style="padding: 0;border-radius: 10px;box-shadow: 3px 10px rgba(0, 64, 128, 0.04);">
                                    <div>
                                      <img src="images/team/clipboard.png" style="margin-top: 15%;width: 25%;height: 122px;">
                                      <h3 style="font-weight: bold;margin-top: 20px;">Compare Places</h3>
                                      <p style="font-size: 16px;width: 350px;margin: auto;margin-top: 30px;color: #5A7184;">Perform head-to-head analysis of multiple locations via weather, cost of living, politics, crime, and more. Or perform a comprehensive city comparison with a single click. </p>
                                      <button type="button" class="btn btn-default" style="padding: 14px 33px !important;background-color: white;margin-top: 55px;margin-bottom: 50px;color: #337AB7 !important;border: 1px solid #337AB7;" data-toggle="modal" data-target="#compareModal">Compare Places</button>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div> -->

                            <div class="big-container">
                              <section style="width: 100%;background-color: rgba(225,243,253, 0.6);padding: 0;margin-bottom: 100px;">
                                <div class="row">
                                  <div class="col-md-3" style="text-align: left;margin-top: 10%;margin-left: 3%;">
                                    <h4 style="font-weight: 700;font-size: 23px;font-family: 'Whitney SSm A', 'Whitney SSm B', Arial;line-height:32px;">Be the first to know about foreclosures in your area</h4>
                                    <p style="font-size: 14px;font-weight: 400;">Set up email alerts today</p>
                                    <button class="btn btn-primary" style="padding: 12px 25px 12px 25px !important;float: left;height: 46px;width: 166px;background-color: #337AB7;" data-toggle="collapse" data-target="#foreclosure_collapse">View Listings</button>
                                  </div>
                                  <div class="col-md-8">
                                    <img src="images/home_fore.png" style="width: 100%;">
                                  </div>
                                </div>
                                <div id="foreclosure_collapse" class="collapse" style="width: 100%;">
                                  <div style="padding: 5px 10px 5px;"><fdc-search-widget rsp="3338"></fdc-search-widget></div><div style="padding: 5px 10px 5px; font-size:10px; color:#999999; font-family:Arial, Helvetica, sans-serif; clear:both;height:12px">Powered by <a href="https://www.foreclosure.com/?rsp=3338" title="Foreclosure listings" style="font-size:10px; color:#999999; text-align:right;">Foreclosure.com</a></div>
                                </div>
                               </section>
                            <!-- BEGIN Foreclosure Widget -->
                            <script src="https://fdcwidget.foreclosure.com/static/lib/fdcwidget/js/main.js"></script>
                            
                            <!-- END Foreclosure Widget -->
                            <div class="row" style="padding-right: 20px;margin-bottom:40px;">
                              <div class="col-md-6">
                                <h3 class="slider_title">Select cities to compare</h3>
                              </div>

                              <div class="col-md-6">
                                <button class="btn_slider2_control" id="btn_slider1_next"><i class="fas fa-arrow-right"></i></button>
                                <button class="btn_slider2_control" id="btn_slider1_prev" style="margin-right: 6px;"><i class="fas fa-arrow-left"></i></button>
                                
                                <button type="button" class="btn btn-default" id="btn_custom_slider" data-toggle="modal" data-target="#myModal">
                                  <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 8px;">
                                      <path d="M2.5 5.23828V3.76172H11.5V5.23828H2.5ZM0.25 0H13.75V1.51172H0.25V0ZM5.48828 9V7.48828H8.51172V9H5.48828Z" fill="#908E8E"/>
                                  </svg>Filter Locations
                                </button>
                                
                              </div>
                            </div>
                              
                               <section class="customer-logos slider" style="padding-top: 20px;">
                                   @foreach($custom_slider_imgs as $custom_slider_img)
                                    <div class="slide card slide_card">
                                      <a href="/singlelisting?ID={{ $custom_slider_img->ID }}"><img src="{{ $custom_slider_img->Picture_Links }}" style="height: 268px;"></a><br/>
                                      
                                      <div style="padding:20px;">
                                        <div class="row">
                                          <div class="col-7">
                                            <h4 style="text-align: left;">{{ str_replace("township","",$custom_slider_img->City) }}</h4>
                                          </div>
                                          <div class="col-4">
                                            <button class="btn btn-default btn_slider_compare" style="color: #337AB7 !important;background-color: #E0EBF4;padding: 12px 25px 12px 25px !important;float: right;" id="{{ $custom_slider_img->City_State_Combined }}" data-toggle="modal" data-target="#compareModal">Compare</button>
                                          </div>
                                        </div>
                                        <br/>
                                        <hr>
                                        <div class="row" style="text-align: left;">
                                          <div class="col-6">
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-user-alt" style="color: #30BD88;font-size:18px;"></i>&nbsp;POPULATION:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $custom_slider_img->Population }}</h5>
                                            </div>
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-venus" style="color: #30BD88;font-size:18px;"></i>&nbsp;FEMALE:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $custom_slider_img->Female_Population }}%</h5>
                                            </div>
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-thermometer-three-quarters" style="color: #30BD88;font-size:18px;"></i>&nbsp;TEMPERATURE:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $custom_slider_img->Avg__Jan__Low }}-{{ $custom_slider_img->Avg__July_High }}</h5>
                                            </div>
                                          </div>
                                          <div class="col-6">
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-user-shield" style="color: #30BD88;font-size:18px;"></i>&nbsp;SAFETY SCORE:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $custom_slider_img->Violent_Crime }}
                                                @if($custom_slider_img->Violent_Crime < 4)
                                                  (Good)
                                                @elseif($custom_slider_img->Violent_Crime > 4)
                                                  (Bad)
                                                @endif
                                              </h5>
                                            </div>
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-mars" style="color: #30BD88;font-size:18px;"></i>&nbsp;MALE:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $custom_slider_img->Male_Population }}%</h5>
                                            </div>
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-user-hard-hat" style="color: #30BD88;font-size:18px;"></i>&nbsp;UNEMPLOYMENT:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $custom_slider_img->Unemployment_Rate }}%</h5>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @endforeach
                               </section>
                               <div class="row" style="padding-right: 20px;margin-bottom:40px;">
                                  <div class="col-md-6">
                                    <h3 class="slider_title">Explore popular destinations</h3>
                                  </div>

                                  <div class="col-md-6">
                                    <button class="btn_slider2_control" id="btn_slider2_next"><i class="fas fa-arrow-right"></i></button>
                                    <button class="btn_slider2_control" id="btn_slider2_prev" style="margin-right: 6px;"><i class="fas fa-arrow-left"></i></button>
                                    
                                  </div>
                                </div>
                               
                               <section class="customer-logos1 slider" style="padding-top: 20px;">
                                   @foreach($weather_slider_imgs as $weather_slider_img)
                                    <div class="slide card slide_card">
                                      <a href="/singlelisting?ID={{ $weather_slider_img->ID }}"><img src="{{ $weather_slider_img->Picture_Links }}" style="height: 268px;"></a><br/>
                                      <br/>
                                      <div style="padding:20px;">
                                        <div class="row">
                                          <div class="col-7">
                                            <h4 style="text-align: left;">{{ str_replace("township","",$weather_slider_img->City) }}</h4>
                                          </div>
                                          <div class="col-4">
                                            <button class="btn btn-default btn_slider_compare" style="color: #337AB7 !important;background-color: #E0EBF4;padding: 12px 25px 12px 25px !important;float: right;" id="{{ $weather_slider_img->City_State_Combined }}" data-toggle="modal" data-target="#compareModal">Compare</button>
                                          </div>
                                        </div>
                                        <br/>
                                        <hr>
                                        <div class="row" style="text-align: left;">
                                          <div class="col-6">
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-user-alt" style="color: #30BD88;font-size:18px;"></i>&nbsp;POPULATION:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $weather_slider_img->Population }}</h5>
                                            </div>
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-venus" style="color: #30BD88;font-size:18px;"></i>&nbsp;FEMALE:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $weather_slider_img->Female_Population }}%</h5>
                                            </div>
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-thermometer-three-quarters" style="color: #30BD88;font-size:18px;"></i>&nbsp;TEMPERATURE:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $weather_slider_img->Avg__Jan__Low }}-{{ $weather_slider_img->Avg__July_High }}</h5>
                                            </div>
                                          </div>
                                          <div class="col-6">
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-user-shield" style="color: #30BD88;font-size:18px;"></i>&nbsp;SAFETY SCORE:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $weather_slider_img->Violent_Crime }}
                                                @if($weather_slider_img->Violent_Crime < 4)
                                                  (Good)
                                                @elseif($weather_slider_img->Violent_Crime > 4)
                                                  (Bad)
                                                @endif
                                              </h5>
                                            </div>
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-mars" style="color: #30BD88;font-size:18px;"></i>&nbsp;MALE:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $weather_slider_img->Male_Population }}%</h5>
                                            </div>
                                            <div>
                                              <h6 style="color: #9393AA;" class="slider_card_desc_key"><i class="fas fa-user-hard-hat" style="color: #30BD88;font-size:18px;"></i>&nbsp;UNEMPLOYMENT:</h6>
                                              <h5 style="margin-left: 22px;color: #272755;">{{ $weather_slider_img->Unemployment_Rate }}%</h5>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @endforeach
                               </section>
                               
                               
                            </div>

                            

                            
                            <div class="demo">
                                <div class="big-container" style="position:unset;">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <div style="width: 500px;text-align: left;">
                                            <div id="home_review_title_quote">
                                              <i class="fas fa-quote-left" style="font-size: 32px;font-weight: 900;color: white;"></i>
                                            </div>
                                            <h3 id="review_title">What Our Visitors<br/> are Saying</h3>
                                          </div>
                                            
                                            <div id="testimonial-slider" class="owl-carousel">
                                                
                                                <div class="testimonial">
                                                    <div class="testimonial-content" style="text-align: left;">
                                                        <p class="description">
                                                             "We have lived here for 13 years and raised 3 kids in a great family-friendly area. Great weather, no crime, beautiful beaches, and lagoon, not densely populated. Along with almost all of San Diego coastal county, it is awesome!"
                                                        </p>
                                                        <div class="row" style="margin-top: 36px;">
                                                          <div class="col-md-2">
                                                            <img src="images/client1.png">
                                                          </div>
                                                          <div class="col-md-4">
                                                            <h3 class="title" style="font-size: 18px;font-weight: 700;">Robert Stanley</h3>
                                                            <p style="color: #5A7184;">Location: "Carlsbad, California</p>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>

                                                <div class="testimonial">
                                                    <div class="testimonial-content" style="text-align: left;">
                                                        <p class="description">
                                                             "I spent most of my life growing up in the Caribbean, I have to admit the beaches of Destin have to be the best I've seen."
                                                        </p>
                                                        <div class="row" style="margin-top: 36px;">
                                                          <div class="col-md-2">
                                                            <img src="images/client2.png">
                                                          </div>
                                                          <div class="col-md-4">
                                                            <h3 class="title" style="font-size: 18px;font-weight: 700;">Pricillia Makalew</h3>
                                                            <p style="color: #5A7184;">Location: "Destin, Florida"</p>
                                                          </div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="big-container" style="margin-bottom: 120px;">
                              <div style="margin-bottom: 52px;margin-top: 100px;">
                                <h3 style="font-size: 48px;font-weight: 700;color: #3A3335;font-family: 'Whitney SSm A', 'Whitney SSm B', Arial;line-height: 56px;text-align: left;">Read Our Blog</h3>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="card" style="padding: 0;border-radius: 10px;box-shadow: 3px 10px rgba(0, 64, 128, 0.04);">
                                    <img src="images/blog/blog1.jpg" style="width: 100%;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                    <div style="padding: 20px;text-align: left;width: 365px;">
                                      <h3 style="font-size: 24px;font-weight: 700;color: #183B56;font-family: 'Whitney SSm A', 'Whitney SSm B', Arial;line-height: 32px;">Explore Newport, RI</h3>
                                      <a href="https://blog.hotciti.com/?p=2607" style="font-size: 14px;color: #337AB7;font-weight: 700;line-height: 32px;" target="_blank">READ MORE<i class="fas fa-arrow-right" style="margin-left: 13px;"></i></a>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-4">
                                  <div class="card" style="padding: 0;border-radius: 10px;box-shadow: 3px 10px rgba(0, 64, 128, 0.04);">
                                    <img src="images/blog/blog3.jpg" style="width: 100%;border-top-left-radius: 10px;border-top-right-radius: 10px;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                    <div style="padding: 20px;text-align: left;width: 365px;">
                                      <h3 style="font-size: 24px;font-weight: 700;color: #183B56;font-family: 'Whitney SSm A', 'Whitney SSm B', Arial;line-height: 32px;">Best Places To Retire</h3>
                                      <a href="https://blog.hotciti.com/?p=2604" style="font-size: 14px;color: #337AB7;font-weight: 700;line-height: 32px;" target="_blank">READ MORE<i class="fas fa-arrow-right" style="margin-left: 13px;"></i></a>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-lg-4">
                                  <div class="card" style="padding: 0;border-radius: 10px;box-shadow: 3px 10px rgba(0, 64, 128, 0.04);">
                                    <img src="images/blog/blog2.png" style="width: 100%;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                                    <div style="padding: 20px;text-align: left;width: 365px;">
                                      <h3 style="font-size: 24px;font-weight: 700;color: #183B56;font-family: 'Whitney SSm A', 'Whitney SSm B', Arial;line-height: 32px;">Find The Best Beach Towns</h3>
                                      <a href="https://blog.hotciti.com/?p=37" style="font-size: 14px;color: #337AB7;font-weight: 700;line-height: 32px;" target="_blank">READ MORE<i class="fas fa-arrow-right" style="margin-left: 13px;"></i></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                    </section>
                    
                </div>
                <!--content end-->
            </div>



<script>
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 1500,
            settings: {
                slidesToShow: 3
            }
        },{
            breakpoint: 1100,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 770,
            settings: {
                slidesToShow: 2
            }
        },{
            breakpoint: 450,
            settings: {
                slidesToShow: 1
            }
        }]
    });
    $('.customer-logos1').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 1500,
            settings: {
                slidesToShow: 3
            }
        },{
            breakpoint: 1100,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 770,
            settings: {
                slidesToShow: 2
            }
        },{
            breakpoint: 450,
            settings: {
                slidesToShow: 1
            }
        }]
    });
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[980,1],
        itemsTablet:[768,1],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        slideSpeed:1000,
        autoPlay:true
    });
    $('[data-toggle="tooltip"]').tooltip();

    // if($("#hidden_session").val() == ""){
    //   setTimeout(function(){
    //     var overlay = $('<div id="overlay"></div>');
    //     overlay.show();
    //     overlay.appendTo(document.body);
    //     overlay.css("display", "block");
    //     $('.popup').show();
    //     $('.close').click(function(){
    //         $('.popup').hide();
    //         overlay.appendTo(document.body).remove();
    //         return false;
    //     });

    //     $('.x').click(function(){
    //         $('.popup').hide();
    //         overlay.appendTo(document.body).remove();
    //         return false;
    //     });
    //   }, 10000);
    // }
    
      $('#home_popup_register').click(function(){
          $('.popup').hide();
          $("#overlay").appendTo(document.body).remove();
      });

      $(".btn_slider_compare").click(function(){
        var location = $(this).attr("id");
        $("#modal-col-search1").val(location);
      });
    
      $("#btn_slider1_next").click(function(){
        $(".customer-logos").slick("slickNext");
      });

      $("#btn_slider1_prev").click(function(){
        $(".customer-logos").slick("slickPrev");
      });

      $("#btn_slider2_next").click(function(){
        $(".customer-logos1").slick("slickNext");
      });

      $("#btn_slider2_prev").click(function(){
        $(".customer-logos1").slick("slickPrev");
      });

      if(screen.width <= 900){
        $("#img_header_banner").attr("src", "images/Hotciti_Images/mobile_new.jpg");
        $("#img_header_banner").attr("style", "width: 100%;height:100%;");
      }
});

</script>
@include("components/footer")