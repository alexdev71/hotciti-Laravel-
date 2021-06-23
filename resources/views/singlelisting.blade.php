@include("components/header")

<div id="wrapper">
    <input type="hidden" value="{{ $row->City }}" name="" id="hidden_city">
    <input type="hidden" value="{{ $row->State_Abbreviated }}" name="" id="hidden_state_abb">
    <!-- content-->
    <div class="content">
        <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
            <div class="bg-parallax-wrap">
                <div class="bg par-elem "  data-bg="{{ $row->Picture_Links }}" data-scrollax="properties: { translateY: '30%' }" style="height: 200%;"></div>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="list-single-header-item  fl-wrap">
                    <div class="row">
                       <div class="col-md-9">
                            <h1>{{$row->City }} <span class="verified-badge"><i class="fal fa-check"></i></span></h1>
							<div class="geodir-category-location fl-wrap"><a href="#" class="state_to_iframe" id="https://www.usnews.com/news/best-states/{{ str_replace(' ', '-', strtolower($row->State)) }}" data-toggle="modal" data-target = "#iframeModal"><i class="fas fa-map-marker-alt"></i> {{ $row->State }}, USA</a> </div>
							<br><br>
							<div class="geodir-category-location fl-wrap"><a href="http://www.{{ $row->City_Link }}" target="_blank"> <i class="fas fa-city"></i>Local Website</a> </div>
                            <div class="geodir-category-location fl-wrap" style="margin-top: 20px;"><a href="{{ $row->Video_Links }}" data-toggle="modal" data-target="#videoModal" id="watch_video"> <i class="fas fa-video"></i>Watch Video</a> </div>
                            <div class="geodir-category-location fl-wrap" style="margin-top: 20px;"><a href="/street_view?city={{ $row->City }}&state={{ $row->State }}" target="_blank"> <i class="fas fa-street-view"></i>Street View</a> </div>
                        </div>
                        <div class="col-md-3">
                            <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec5">
                                <div class="listing-rating-count-wrap single-list-count">
                                    <div class="review-score">{{ $rev_array[1] }}</div>
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $rev_array[1] }}"></div>
                                    <br>                                                
                                    <div class="reviews-count">{{ $rev_array[2] }} reviews</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="list-single-header_bottom fl-wrap">
                    <a class="listing-item-category-wrap" href="#">
                        <div class="listing-sitem-category" style="width:10px;"><i class="fas fa-map-marker-alt"></i></div>
                        <span style="top: -20px;left: 5px;">Zip Code: {{ $row->Zip_Code }}</span>
                    </a>
                    
                    <div class="list-single-stats">
                        <ul class="no-list-style">
                            <li><span class="viewed-counter"><i class="fas fa-eye"></i> Viewed -  {{ $row->visits }}</span></li>
                            <li><span class="bookmark-counter"><i class="fas fa-heart"></i> Bookmark -  {{ $rev_array[0] }} </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- scroll-nav-wrapper--> 
        <div class="scroll-nav-wrapper fl-wrap">
            <div class="container row" style="margin:auto;">
                <nav class="scroll-nav scroll-init col-lg-4 col-md-6 col-sm-6">
                    <ul class="no-list-style">
                        <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Top</a></li>
                        <li><a href="#sec2"><i class="fal fa-info"></i>Details</a></li>
                        
                        <li><a href="#sec5"><i class="fal fa-comments-alt"></i>Reviews</a></li>
                    </ul>
                </nav>
                
                <div class="col-lg-4 d-sm-none d-lg-block"></div>
                <div class="scroll-nav-wrapper-opt col-lg-4 col-md-6 col-sm-6" style="margin-top: 20px;">
                    <input type="hidden" id="hidden_email" value="{{ $email }}" name="">
                    <input type="hidden" id="hidden_id" value="{{ $row->ID }}" name="">
                    
					<a href="#" class="scroll-nav-wrapper-opt-btn" id="btn_favorite"> <i  class="fas fa-heart"></i> Save </a>
                    <a href="#" class="scroll-nav-wrapper-opt-btn showshare"> <i class="fas fa-share"></i> Share </a>

					<!-- <a id="single_page_csv" href="#" class="scroll-nav-wrapper-opt-btn"> <i  class="fas fa-download"></i> Download </a> -->
                    <div class="dropdownplus scroll-nav-wrapper-opt-btn">
                        <button class="dropbtnplus" style="font-size: 12px;border-radius: 2px;"><i  class="fas fa-download" style="color: #4DB7FE;margin-right: 5px;"></i>Downloads</button>
                        <div class="dropdown-contentplus">
                            <a id="single_page_csv" href="#"> CSV Download </a>
                            <a id="single_page_pdf" href="#"> PDF Print </a>
                        </div>
                    </div>
                    <div class="share-holder hid-share">
                        <div class="share-container  isShare"></div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6" style="margin-top: 30px;">
                    <button class="btn btn-success" id="btn_contact_agent" style="background-color: #425998; color: white;" data-toggle="modal" data-target="#townreportModal"><i class="fas fa-mailbox"></i>Contact Agent</button>
                </div>
                
            </div>
        </div>
        <!-- scroll-nav-wrapper end--> 
        <section class="gray-bg no-top-padding">
            <div class="container">
                <div class="breadcrumbs inline-breadcrumbs fl-wrap">
                    <a href="#">Home</a><a href="#">Listings</a><span>Listing Single</span> 
                </div>
                <div class="clearfix"></div>

                <div>
                    
                    <div class="row" style="padding-right: 20px;">
                      <div class="col-md-6">
                        <div class="section-title" style="padding-bottom: 0px;">
                            <h2 style="font-size: 20px;text-align: left;">Homes in {{ $row->City_State_Combined }}</h2>
                        </div>
                      </div>

                      <div class="col-md-6" style="margin-top: 15px;">
                        <button class="btn_slider2_control" id="btn_slider2_next"><i class="fas fa-arrow-right"></i></button>
                        <button class="btn_slider2_control" id="btn_slider2_prev" style="margin-right: 6px;"><i class="fas fa-arrow-left"></i></button>
                        
                      </div>
                    </div>
                    <section class="homes_slider slider" style="padding-top: 20px;padding-bottom: 0px;height: 300px;overflow: hidden;">
                        @if(!empty($homes))
                            @foreach($homes as $home_data)
                            <div class="slide card">
                                <figure class="rounded caption-1" style="margin-bottom: 0px;">
                                    <a href="/home_detail_view?id={{ $home_data->id }}" target="_blank">
                                        <img src="{{ $home_data->imgSrc }}" alt="" class="w-100 card-img-top border border-white border-md">
                                    </a>
                                    
                                    <figcaption id="caption_1">{{ $home_data->price }}</figcaption>
                                    <figcaption id="caption_2" class="px-3 py-2 text-left text-light">
                                        <h2 class="h5 font-weight-bold mb-0" style="padding: 0px;text-align: left;">{{ $home_data->address }}</h2>
                                        <p class="text-small" style="margin-bottom: 0px;">{{ $home_data->beds }}bd | {{ $home_data->baths }}ba | {{ $home_data->area }} sqft</p>
                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
                        @else
                            <p>No data to display</p>
                        @endif
                    </section>
                    <a href="/find_homes?location={{ $row->City_State_Combined }}" target="_blank"><p style="text-align: right;color: green;margin-right: 20px;">See More Listings For Sale In {{ $row->City_State_Combined }}</p></a>
                </div>

                <div class="row">
                    <!-- list-single-main-wrapper-col -->
                    <div class="col-md-8">
                        <!-- list-single-main-wrapper -->
                        

                            <br/>
                            <div class="list-single-main-media fl-wrap">
                                <img src="{{ $row->Picture_Links }}" class="respimg" alt="">
                                
                            </div>
                            
                            <br/>

                            <!-- list-single-main-item --> 
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>Description  {{ $row->City }}  </h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <p>{{ $row->City }},{{ $row->State }}  is located in the {{ $row->Region }} region of the United States near {{ $row->Nearest_Major_City }}. It has a population of {{ $row->Population }} people {{ $row->Male_Population }}% male and {{ $row->Female_Population }}% female.</p>
                                    <p>The average high temperature in the summer is {{ $row->Avg__July_High }} degrees with an average low temperature of {{ $row->Avg__Jan__Low }} degrees in the winter. You should expect {{ $row->Rainfall_in_ }} inches of annual rainfall and {{ $row->Snowfall_in_ }} inches of annual snowfall. </p> 
                                    <p> The safety score in {{ $row->City }} is {{ $row->Violent_Crime }} out of 10 with 10 being the worst and 1 being the best (national average is 4). The unemployment rate in {{ $row->City }} is {{ $row->Unemployment_Rate }}%. The average commute time is {{ $row->Commute_Time }} minutes. The overall cost of living score is {{ $row->Overall_Cost_Of_Living }} as compared to a national average of 100. Voter registration in {{ $row->City }} is {{ $row->Republican }}% Republican and {{ $row->Democrat }}% Democrat. See detailed report below.</p>
                                   
                                </div>
                            </div>
                            <!-- list-single-main-item end -->  
                            
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="list-single-main-item fl-wrap block_box">
                                    <div class="list-single-main-item-title">
                                        <!-- <h3>House rental information  {{ $row->City }}  </h3> -->
                                        <h3>Explore {{ $row->City }}</h3>
                                    </div>
                                    <div class="list-single-main-item_content fl-wrap">
                                        <!-- <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                              <a class="nav-link active" id="nav_home" data-toggle="tab" href="#home">Rental</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="nav_sale" data-toggle="tab" href="#sale">On Sale</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" style="display: block;">
                                            <div id="home" class="big-container tab-pane active"><br>
                                                <section class="customer-logos1 slider" id="house_slide" style="padding-top: 20px;padding-bottom: 0px;">

                                                </section>
                                            </div>
                                            <div id="sale" class="big-container tab-pane fade"><br>
                                                <section class="customer-logos slider" id="house_slide_sale" style="padding-top: 20px;padding-bottom: 0px;">

                                                </section>
                                            </div>
                                        </div>
     -->                                <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                              <a class="nav-link active" id="nav_home" data-toggle="tab" href="#research">Research</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="nav_sale" data-toggle="tab" href="#real_estate">Real Estate</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="nav_sale" data-toggle="tab" href="#amenities">Amenities</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="nav_sale" data-toggle="tab" href="#health_care">Health Care</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" style="display: block;">
                                            <div id="research" class="container tab-pane active"><br>
                                                <div class="row">
                                
                                
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.google.com/maps/place/{{ $row->City }},+{{ $row->{'State_Abbreviated'} }},+USA/" target="_blank"><i class="fas fa-location"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">On the Map</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.areavibes.com/{{ $row->City }}-{{ $row->{'State_Abbreviated'} }}/" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-hand-holding-usd"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Livability</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.cnn.com/resources/coronavirus-information/{{ $row->Zip_Code }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-microscope"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Covid Map</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row" style="margin-top: 10px;">
                                
                                
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://en.wikipedia.org/wiki/{{ $row->City }}%2C_{{ $row->State }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="far fa-landmark"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local History</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.indeed.com/jobs?q=all&amp;l={{ $row->City }}%2C+{{ $row->{'State_Abbreviated'} }}" target="_blank"><i class="fas fa-user-hard-hat"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Employment</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://weather.com/weather/tenday/l/{{ $row->Zip_Code }}"  class="to_iframe" target="_blank" ><i class="fas fa-sun"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local Weather</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>


                                                <div class="row" style="margin-top: 10px;">
                                
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="/find_schools?location={{ $row->City_State_Combined }}" target="_blank"><i class="fas fa-school"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local Schools</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=churches&amp;find_loc={{ $row->City }}%2C+{{ $row->{'State_Abbreviated'} }}&amp;ns=1" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-church"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local Churches</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Colleges%20%26%20Universities&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-graduation-cap"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local Colleges</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>


                                                <div class="row" style="margin-top: 10px;">
                                
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.270towin.com/elected-officials/address.php?s={{ $row->City }}%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-balance-scale"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local Politics</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.bing.com/images/search?q=Town %20{{ $row->City }}%20{{ $row->State }}&amp;qs=n&amp;form=QBIR&amp;sp=-1&amp;ghc=1&amp;pq=west%20{{ $row->City }}%20{{ $row->State }}&amp;sc=8-29&amp;sk=&amp;cvid=C3D46B0A9DE243CF822CBB4BF5F92B49&amp;sc=1-29&amp;qs=n&amp;sk=&amp;cvid=0C4C25EFA59E4D4FBA948A008A7226BC" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-images"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local Pictures</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.walkscore.com/score/{{ $row->City }}-{{ $row->{'State_Abbreviated'} }}-{{ $row->Zip_Code }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-walking"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Walkability</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row" style="margin-top: 10px;">
                                
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://airport.globefeed.com/US_Nearest_Airport_Result.asp?lat={{ $row->Latitude }}&lng=-{{ $row->Longitude }}&place={{ $row->City }},%20{{ $row->{'State_Abbreviated'} }},%20USA" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-plane-departure"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Nearest Airports</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.highspeedinternet.com/in-your-area?zip={{ $row->Zip_Code }}" target="_blank" ><i class="fas fa-network-wired"></i></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Internet Availability</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.bestplaces.net/crime/city/{{ $row->State }}/{{ $row->City }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-skull-crossbones"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Crime</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row" style="margin-top: 10px;">
                                
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Jails%20%26%20Prisons&amp;find_loc=West%20{{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-border-all"></i>></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Jails/Prisons</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.airnow.gov/?city={{ $row->City }}&amp;state={{ $row->{'State_Abbreviated'} }}&amp;country=USA" target="_blank" ><i class="fas fa-smog"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local Air Quality</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://statelaws.findlaw.com/{{ strtolower($row->State) }}-law/{{ strtolower($row->State) }}-criminal-laws.html" target="_blank"><i class="fas fa-balance-scale"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Laws</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div id="real_estate" class="container tab-pane fade"><br>
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="/find_homes?location={{ $row->City }}_{{ $row->State }}" target="_blank" ><i class="fas fa-home"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">HotCiti Real Estate</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Contractors&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-file-signature"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Contractors</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.foreclosure.com/listing/search?q={{ $row->City }}%2C+{{ $row->{'State_Abbreviated'} }}" target="_blank" ><i class="fas fa-home"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Foreclosure</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.zillow.com/homes/{{ $row->City }},-{{ $row->{'State_Abbreviated'} }}_rb/" target="_blank" ><i class="fas fa-home"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Zillow</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.trulia.com/{{ $row->{'State_Abbreviated'} }}/{{ $row->City }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-home"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Trulia</h5>
                                                            </div>
                                                        </div>
                                                    </div> -->


                                                </div>

                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.showcase.com/{{ $row->{'State_Abbreviated'} }}/{{ $row->City }}/retail-space/for-rent/" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="far fa-store"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Commercial Property</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="/find_homes_for_rent?location={{ $row->City_State_Combined }}" target="_blank" ><i class="far fa-building"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Apartments For Rent</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.homeaway.com/search/keywords:{{ $row->City_State_Combined }}-united-states?CID=a_ph_6&amp;k_clickid=1100l8mGg64T&amp;utm_campaign=hometogo_1101l251&amp;utm_content=0&amp;utm_medium=partner&amp;utm_source=aff_ph&amp;adultsCount=2" target="_blank" ><i class="fas fa-island-tropical"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Vacation Rentals</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row" style="margin-top: 10px;">

                                                    

                                                </div>



                                            </div>
                                            <div id="amenities" class="container tab-pane fade"><br>
                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Hotels&amp;find_loc={{ $row->City }}%2C+{{ $row->{'State_Abbreviated'} }}&amp;ns=1" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-bed"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Hotels</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Restaurants&amp;find_loc={{ $row->City }}%2C+{{ $row->State }}&amp;ns=1" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-utensils-alt"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Resturants</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?cflt=shopping&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-shopping-cart"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Shopping</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Breweries&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-beer"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Breweries</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Wineries&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-wine-bottle"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Wineries</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?cflt=nightlife&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-sunset"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Nightlife</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Beaches&amp;find_loc={{ $row->City }}%2C%20[@field:Where2Live_Rev2_State_Abbreviated_1]" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-umbrella-beach"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Beaches</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Tourist%20Attractions&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-suitcase-rolling"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Tourist Attractions</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Site%20Seeing&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-suitcase"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Site Seeing</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Golf+Course&amp;find_loc={{ $row->City }}%2C+{{ $row->{'State_Abbreviated'} }}&amp;ns=1" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-golf-club"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Golf Courses</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.wikido.com/search.php?action=search&amp;mode_search=form&amp;where={{ $row->City }}%2C+{{ $row->{'State_Abbreviated'} }}%2C+US&amp;q=&amp;when=6" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-calendar-week"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Local Events</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Delivery&amp;find_loc={{ $row->City }}%2C+{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fal fa-truck-loading"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Food Delivery</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=parks&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-trees"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Parks</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Hiking%20Trails&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-hiking"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Hiking Trails</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Orchards&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-apple-alt"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Orchards</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Museums&amp;find_loc={{ $row->City }}%2C%20{{ $row->{'State_Abbreviated'} }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="far fa-landmark"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Museums</h5>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                            <div id="health_care" class="container tab-pane fade"><br>
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Doctors&find_loc={{ $row->City }}%20{{ $row->State_Abbreviated }}"  class="to_iframe" data-toggle="modal" data-target="#iframeModal"><i class="fas fa-user-md"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Doctors</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Dentists&find_loc={{ $row->City }}%20{{ $row->State_Abbreviated }}"  class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-tooth"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Dentists</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Optometrists&find_loc={{ $row->City }}%20{{ $row->State_Abbreviated }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-eye"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Optometrist</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Pediatricians&find_loc={{ $row->City }}%20{{ $row->State_Abbreviated }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-baby"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Pediatrician</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=Specialist%20doctor&find_loc={{ $row->City }}%20{{ $row->State_Abbreviated }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-ambulance"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Specialist</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://www.yelp.com/search?find_desc=allergists&find_loc={{ $row->City }}%20{{ $row->State_Abbreviated }}"  class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-allergies"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Allergist</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row" style="margin-top: 10px;">

                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card_header_icon"><a href="https://m.yelp.com/search?find_desc=Hospitals&find_loc={{ $row->City }}%2C+{{ $row->State_Abbreviated }}" class="to_iframe" data-toggle="modal" data-target="#iframeModal" ><i class="fas fa-hospital"></i></a></div>
                                                            <div class="card-body">
                                                                <h5 class="card-title mt-4 mb-4" style="color: #697891;">Hospitals</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               <br/>
                                                                         
                             <!-- list-single-main-item --> 
                             <br/>
                                
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item --> 
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>HOME STATUS</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="listing-features fl-wrap">
                                        <ul class="no-list-style">
                                            <li>Homes Owned: {{ $row->Homes_Owned }} </li>
                                            <li>Homes Vacant: {{ $row->Housing_Vacant }}</li>
                                            <li>Homes Rented: {{ $row->Homes_Rented }} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end --> 
                            <!-- list-single-main-item --> 
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>PUBLIC SCHOOL SYSTEM</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="listing-features fl-wrap">
                                        <ul class="no-list-style">
                                            <li>Annual Spend Per Student: {{ $row->School_Annual_Spend_Per_Student }} </li>
                                            <li>Student To Teacher Ratio: {{ $row->Student__Teacher_Ratio }}</li>
                                            <li>Students Per Librarian: {{ $row->Students_per_Librarian }} </li>
                                            <li>Students Per Counselor: {{ $row->Students_per_Counselor }} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->   
                            <!-- list-single-main-item --> 
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>EDUCATIONAL ATTAINMENT</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="listing-features fl-wrap">
                                        <ul class="no-list-style">
                                            <li>High School Graduation Rate: {{ $row->High_School_Grads_ }} </li>
                                            <li>Percent With Associate Degree: {{ $row->a2_yr_College_Grad_ }}</li>
                                            <li>Percent Bachelor Degree: {{ $row->a4_yr_College_Grad_ }} </li>
                                             <li>Percent Graduate Degree: {{ $row->Graduate_Degrees }} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->   
                             <!-- list-single-main-item --> 
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>COMMUTE TIME</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="listing-features fl-wrap">
                                        <ul class="no-list-style">
                                            <li>Av Commute Time: {{ $row->Commute_Time }} </li>
                                            <li>% Auto Alone: {{ $row->Auto_alone }}</li>
                                            <li>% Carpool: {{ $row->Carpool }} </li>
                                            <li>% Mass Transit: {{ $row->Mass_Transit }} </li>
                                            <li>% Work At Home: {{ $row->Work_at_Home }}</li>
                                            <li>% < 15 mins: {{ $row->Commute_Less_Than_15_min_ }} </li>
                                            <li>% 15-29 mins: {{ $row->Commute_15_to_29_min_ }} </li>
                                            <li>% 30-44 mins: {{ $row->Commute_30_to_44_min_ }}</li>
                                            <li>% 45-59 mins: {{ $row->Commute_45_to_59_min_ }} </li>
                                            <li>% >= 60 min: {{ $row->Commute_greater_than_60_min_ }} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->                                     
                           <!-- list-single-main-item --> 
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>COST OF LIVING: National Average = 100</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="listing-features fl-wrap">
                                        <ul class="no-list-style">
                                            <li>Overall Score: {{ $row->Overall_Cost_Of_Living }} </li>
                                            <li>Cost Of Food Score: {{ $row->Food }}</li>
                                            <li>Cost Of Utilities Score: {{ $row->Utilities }} </li>
                                            <li>Cost Of Misc Score: {{ $row->Miscellaneous }} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item --> 
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>RELIGION</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="listing-features fl-wrap">
                                        <ul class="no-list-style">
                                            <li>% Religious: {{ $row->Percent_Religious }} </li>
                                            <li>% Catholic: {{ $row->Catholic }}</li>
                                            <li>% Protestant: {{ $row->Protestant }} </li>
                                            <li>% Mormon: {{ $row->LDS }}</li>
                                            <li>% Baptist: {{ $row->Baptist }} </li>
                                            <li>% Episcopalian: {{ $row->Episcopalian }}</li>
                                            <li>% Pentecostal: {{ $row->Pentecostal }} </li>
                                            <li>% Lutheran: {{ $row->Lutheran }}</li>
                                            <li>% Methodist: {{ $row->Methodist }} </li>
                                            <li>% Presbyterian: {{ $row->Presbyterian }} </li>
                                            <li>% Other Christian: {{ $row->Other_Christian }}</li>
                                            <li>% Jewish: {{ $row->Jewish }} </li>
                                            <li>%  Buddhist (Eastern): {{ $row->Eastern }} </li>
                                            <li>% Islam: {{ $row->Islam }} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->          
                            <!-- list-single-facts -->                               
                            <!-- list-single-facts end -->       
                            <!-- list-single-main-item-->   
                           
                            <!-- list-single-main-item end -->                                     
                            <!-- list-single-main-item -->   
                           
                            <!-- list-single-main-item end -->                                       
                            <!-- list-single-main-item -->   
                               <div class="list-single-main-item fl-wrap block_box" id="sec5">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Add Review</h3>
                                </div>
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <!-- Review Comment -->
                                    <form id="add-comment" action="/addreview" method="post" class="add-comment  custom-form" name="rangeCalc" >
                                        @csrf
                                        <!-- <input type="hidden" id="login_val" value="{{ session('logged_in') }}"> -->
                                        <fieldset>
                                            <div class="review-score-form fl-wrap">
                                                <div class="review-range-container">
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Economy</div>
                                                        <div class="range-slider-wrap ">
                                                            <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="4">
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end --> 
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Cultural interaction </div>
                                                        <div class="range-slider-wrap ">
                                                            <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1"  value="1">
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end --> 
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Livability</div>
                                                        <div class="range-slider-wrap ">
                                                            <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="5" >
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end --> 
                                                    <!-- review-range-item-->
                                                    <div class="review-range-item">
                                                        <div class="range-slider-title">Environment</div>
                                                        <div class="range-slider-wrap">
                                                            <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="3">
                                                        </div>
                                                    </div>
                                                    <!-- review-range-item end -->                                     
                                                </div>
                                                <div class="review-total">
                                                    <span><input type="text" name="rg_total"   data-form="AVG({rgcl})" value="0"></span>    
                                                    <strong>Your Score</strong>
                                                </div>
                                            </div>
                                            <div class="list-single-main-item_content fl-wrap">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-user"></i></label>
                                                        <input type="text" name="name" placeholder="Your Name *" value=""/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-envelope"></i>  </label>
                                                        <input type="text" name="email" placeholder="Email Address*" value=""/>
                                                    </div>
                                                </div>
                                                <textarea cols="40" rows="3" name="comment" placeholder="Your Review:"></textarea>
                                                <div class="clearfix"></div>
                                                <input type="hidden" name="IDD" value="{{ $ID }}"/>
                                                <div class="clearfix"></div>
                                                <button type="submit" class="btn  color2-bg  float-btn" id="btn_review">Submit Review <i class="fal fa-paper-plane"></i></button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                
                                <!-- Add Review Box / End -->
                            </div>
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="col-md-12">
                                    <h3 style="font-weight: 700; color: #697891;">Reviews From Our Clients</h3>
                                    <div id="testimonial-slider" class="owl-carousel">
                                        @foreach($reviews as $review)
                                        <div class="testimonial">

                                            <div class="testimonial-content" style="min-height: 235px;">
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $review->score }}"></div><br/>
                                                <div class="testimonial-icon">
                                                    <i class="fa fa-quote-left"></i>
                                                </div>
                                                <p class="description">
                                                     {{ $review->comment }}
                                                </p>
                                            </div>
                                            <h3 class="title">{{ $review->name }}</h3>
                                        </div>
                                        @endforeach
                                    </div>
                                                
                                </div>
                            </div>
                            <!-- list-single-main-item end -->                                    
                        </div>

                    </div>
                    <!-- list-single-main-wrapper-col end -->
                    <!-- list-single-sidebar -->

                    <div class="col-md-4">
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <div id="mc_embed_signup" style="text-align: left;">
                                        
                                        <div id="mc_embed_signup_scroll">
                                            <h2 style="color: #697891;font-weight: 700;">Contact Agent</h2>
                                            <input type="hidden" name="form_location" id="form_location" value="{{ $row->City_State_Combined }}">
                                            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                            <div class="mc-field-group">
                                                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                                </label>
                                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                            </div>
                                            <div class="mc-field-group">
                                                <label for="mce-FNAME">Full Name <span class="asterisk">*</span></label>
                                                <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                                            </div>
                                            <div class="mc-field-group">
                                                <label for="mce-phone">Phone Number <span class="asterisk">*</span></label>
                                                <input type="text" value="" name="PHONE" class="" id="mce-phone">
                                            </div>
                                            <div class="mc-field-group">
                                                <label for=""></label>
                                                <input type="text" placeholder="I am interested in {{ $row->City }}, {{ $row->State_Abbreviated }}" disabled="true" style="margin-top: 20px;">
                                            </div>
                                            <div class="mc-field-group">
                                                <input type="radio" name="contact_me_check" style="width: 10%;float: left;margin-top: 2px;" id="contact_me_check">
                                                <label for="contact_me_check">I would like an agent to contact me.</label>
                                            </div>
                                            <div class="mc-field-group">
                                                <input type="radio" name="contact_me_check" style="width: 10%;float: left;margin-top: 2px;" id="free_report_check">
                                                <label for="contact_me_check">I would like a FREE report on this location.</label>
                                            </div>
                                            <div class="clear">
                                                <input type="button" value="Send" name="subscribe" id="mc-embedded-subscribe" class="button" style="width: 100%;height: 50px;border-radius: 30px;background-color: #425998;">
                                                <p style="line-height: 1.75;color: #697891;">By proceeding, you consent to receive calls and texts at the number you provided, including marketing by autodialer and prerecorded and artificial voice and email, from hotciti.com and others about your inquiry and other home-related matters, but not as a condition of any purchase; this applies regardless of whether you check, or leave un-checked the box above.</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->  
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>POPULATION</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Population </span><span class="opening-hours-time">{{ $row->Population }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Population Density </span><span class="opening-hours-time">{{ $row->Pop__Density }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Population Change </span><span class="opening-hours-time">{{ $row->Pop__Change }} </span></li>
                                        <li class="thu"><span class="opening-hours-day">Male Population </span><span class="opening-hours-time">{{ $row->Male_Population }} </span></li>
                                        <li class="fri"><span class="opening-hours-day">Female Population </span><span class="opening-hours-time">{{ $row->Female_Population }} </span></li>
                                        <li class="fri"><span class="opening-hours-day">Married Population </span><span class="opening-hours-time">{{ $row->Married_Population }} </span></li>
                                        <li class="fri"><span class="opening-hours-day">Single Population </span><span class="opening-hours-time">{{ $row->Single_Population }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->   
                        <!--box-widget-item -->
                       <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>HOUSEHOLD INFORMATION</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Number Of Households </span><span class="opening-hours-time">{{ $row->Households }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Avg. Household Size </span><span class="opening-hours-time">{{ $row->Household_Size }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Median Home Age </span><span class="opening-hours-time">{{ $row->Median_Home_Age }} </span></li>
                                        <li class="thu"><span class="opening-hours-day">Median Home Cost </span><span class="opening-hours-time">{{ $row->Median_Home_Cost }} </span></li>
                                        <li class="fri"><span class="opening-hours-day">Home Appreciation </span><span class="opening-hours-time">{{ $row->Home_Appreciation }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->                                                                   
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>WEATHER & ENVIRONMENT</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Air Quality </span><span class="opening-hours-time">{{ $row->Air_Quality }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Water Quality </span><span class="opening-hours-time">{{ $row->Water_Quality_Score }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Snowfall </span><span class="opening-hours-time">{{ $row->Snowfall_in_ }} </span></li>
                                        <li class="thu"><span class="opening-hours-day">Pollution </span><span class="opening-hours-time">{{ $row->Population }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Rainfall </span><span class="opening-hours-time">{{ $row->Rainfall_in_ }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Precipitation Days </span><span class="opening-hours-time">{{ $row->Precipitation_Days }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Sunny Days </span><span class="opening-hours-time">{{ $row->Sunny_Days }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">July High </span><span class="opening-hours-time">{{ $row->Avg__July_High }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">January Low </span><span class="opening-hours-time">{{ $row->Avg__Jan__Low }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Comfort Index </span><span class="opening-hours-time">{{ $row->Comfort_Index_higherbetter }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">UV Index </span><span class="opening-hours-time">{{ $row->UV_Index }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->                                  
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>CRIME & SAFETY</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Violent Crime </span><span class="opening-hours-time">{{ $row->Violent_Crime }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Property Crime </span><span class="opening-hours-time">{{ $row->Property_Crime }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->    
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>UNEMPLOYMENT</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Unemployment Rate </span><span class="opening-hours-time">{{ $row->Unemployment_Rate }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Recent Job Growth </span><span class="opening-hours-time">{{ $row->Recent_Job_Growth }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Future Job Growth </span><span class="opening-hours-time">{{ $row->Future_Job_Growth }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->  
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>TAXES</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Sales Tax </span><span class="opening-hours-time">{{ $row->Sales_Taxes }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Income Tax </span><span class="opening-hours-time">{{ $row->Income_Taxes }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Property Tax </span><span class="opening-hours-time">{{ $row->Property_Tax_Rate }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->  
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>INCOME</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Household Income </span><span class="opening-hours-time">{{ $row->Income_Less_Than_15K }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Percent Between 15-25k </span><span class="opening-hours-time">{{ $row->Income_between_15K_and_25K }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Percent Between 25-35k </span><span class="opening-hours-time">{{ $row->Income_between_25K_and_35K }} </span></li>
                                        <li class="thu"><span class="opening-hours-day">Percent Between 35-50k</span><span class="opening-hours-time">{{ $row->Income_between_35K_and_50K }} </span></li>
                                        <li class="fri"><span class="opening-hours-day">Percent between 50-75k </span><span class="opening-hours-time">{{ $row->Income_between_50K_and_75K }} </span></li>
                                        <li class="fri"><span class="opening-hours-day">Percent Between 75-100k </span><span class="opening-hours-time">{{ $row->Income_between_75K_and_100K }} </span></li>
                                        <li class="sun"><span class="opening-hours-day">Percent Between 100-150k </span><span class="opening-hours-time">{{ $row->Income_between_100K_and_150K }} </span></li>
                                        <li class="sun"><span class="opening-hours-day">Percent Between 150-250k </span><span class="opening-hours-time">{{ $row->Income_between_150K_and_250K }} </span></li>
                                        <li class="sun"><span class="opening-hours-day">Percent Between 250-500k </span><span class="opening-hours-time">{{ $row->Income_between_250K_and_500K }} </span></li> 
                                        <li class="sun"><span class="opening-hours-day">Percent Greater Than 500k </span><span class="opening-hours-time">{{ $row->Income_greater_than_500K }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->  
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>OCCUPATION TYPE</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Business / Finance </span><span class="opening-hours-time">{{ $row->Management_Business_and_Financia }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Professional </span><span class="opening-hours-time">{{ $row->Professional_and_Related_Occupat }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Service: </span><span class="opening-hours-time">{{ $row->Service }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Sales & Office </span><span class="opening-hours-time">{{ $row->Sales_and_Office }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Farming, Fishery, Forestry </span><span class="opening-hours-time">{{ $row->Farming_Fishing_and_Forestry }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Construction </span><span class="opening-hours-time">{{ $row->Construction_Extraction_and_Main }} </span></li>
                                        <li class="wed"><span class="opening-hours-day">Transportation </span><span class="opening-hours-time">{{ $row->Production_Transportation_and_Ma }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end --> 
                        <!--box-widget-item -->                                       
                          <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>POLITICS</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <ul class="no-list-style">
                                        <li class="mon"><span class="opening-hours-day">Democrat: </span><span class="opening-hours-time">{{ $row->Democrat }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Republican: </span><span class="opening-hours-time">{{ $row->Republican }} </span></li>
                                        <li class="tue"><span class="opening-hours-day">Independent: </span><span class="opening-hours-time">{{ $row->Independent_Other }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->  
                        <!--box-widget-item -->
                        <div class="box-widget-item fl-wrap block_box">
                            <div class="box-widget-item-header">
                                <h3>Tags</h3>
                            </div>
                            <div class="box-widget opening-hours fl-wrap">
                                <div class="box-widget-content">
                                    <div class="list-single-tags tags-stylwrap">
                                        <a href="#">State</a>
                                        <a href="#">City</a>
                                        <a href="#">Street</a>
                                        <a href="#">Location</a>
                                        <a href="#">Schools</a>
                                        <a href="#">Hospitals</a>                                                                               
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--box-widget-item end -->           
                    </div>
                    <!-- list-single-sidebar end -->                                
                </div>
            </div>

        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>

<script>
$(document).ready(function(){
    $('.homes_slider').slick({
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
        itemsDesktopSmall:[980,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        slideSpeed:1000,
        autoPlay:true
    });
    $("#single_page_csv").click(function(){

            getCSV();
    });
    $("#single_page_pdf").click(function(){
        window.print();
    });
    $("#btn_favorite").click(function(){
        if($("#hidden_session").val() == ""){
            Swal.fire("Register", "You should login or register to save favorite locations", "warning");
        }
        else{
            myFunction();
        }
    });

    $(".to_iframe").click(function(){
        var href = $(this).attr("href");
        document.getElementById("site_frame").src = href;
    });

    $("#watch_video").click(function(){
        var href = $(this).attr("href");
        document.getElementById("video_source").src = href;
    });

    $("#mc-embedded-subscribe").click(function(){
        if($("#mce-EMAIL").val() == "" || $("#mce-FNAME").val() == "" || $("#mce-phone").val() == ""){
            Swal.fire("Error", "All fields are required!", "error");
            return;
        }
        var content = "";
        if($("#contact_me_check").prop("checked") == true){
            content = "I would like an agent to contact me";
        }
        else if($("#free_report_check").prop("checked") == true){
            content = "I would like a FREE report for this location";
        }
        $.ajax({
            url: "/town_report_form",
            method: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                EMAIL: $("#mce-EMAIL").val(),
                FNAME: $("#mce-FNAME").val(),
                phone: $("#mce-phone").val(),
                MMERGE5: content,
                form_location: $("#form_location").val(),
            },
            success:function(data){
                Swal.fire("success", "Successfully Submitted!", "success");
                $("#mce-EMAIL").val("");
                $("#mce-FNAME").val("");
                $("#mce-phone").val("");
                $("#contact_me_check").prop("checked", false);
            }
        });
    });

    $(".state_to_iframe").click(function(){
        var state_stat = $(this).attr("id");
        $("#site_frame").attr("src", state_stat);
    });


    $("#btn_contact_agent").click(function(){
        $("#modal_interest_location").val("I am interested in "+$("#form_location").val());
        $("#modal_form_location").val($("#form_location").val());
    });
    setTimeout(function(){document.querySelector("#wrapper > div > div:nth-child(3)").remove();},1000);
    

    $("#btn_slider2_next").click(function(){
        $(".homes_slider").slick("slickNext");
    });

    $("#btn_slider2_prev").click(function(){
        $(".homes_slider").slick("slickPrev");
    });

    $("#videoModal").on('hide.bs.modal', function(){

      $("#video_source").attr("src", "");
    });
});
</script>
@include("components/footer")