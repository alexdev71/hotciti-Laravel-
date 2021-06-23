@include("components/header1")

<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!-- Map -->
        <div class="map-container  fw-map big_map hid-mob-map">
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
        <div class="clearfix"></div>
        <section class="gray-bg small-padding no-top-padding-sec">
            <div class="container">
                <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                    <a href="#">Home</a><a href="#">Listings</a><a href="#">{{ $searchkey }}</a><span>Listing Single</span> 
                </div>
                <div class="fl-wrap">
                    <div class="mob-nav-content-btn mncb_half color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i>  Filters</div>
                    <div class="mob-nav-content-btn mncb_half color2-bg schm ntm fl-wrap"><i class="fal fa-map-marker-alt"></i>  View on map</div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class=" fl-wrap  lws_mobile  tabs-act block_box">
                                <div class="filter-sidebar-header fl-wrap" id="filters-column">
                                    <ul class="tabs-menu fl-wrap no-list-style">
                                        <li class="current"><a href="#filters-search"> <i class="fal fa-sliders-h"></i> Filters </a></li>
                                        
                                    </ul>
                                </div>
                                <div class="scrl-content filter-sidebar    fs-viscon">
                                    <!--tabs -->                       
                                    <div class="tabs-container fl-wrap">
                                        <!--tab -->
                                        <form action="headersearch" method="get" id="header_search_view_form">
                                            <div class="tab">
                                                <div id="filters-search" class="tab-content  first-tab ">
                             <!-- listsearch-input-item-->
                                                     <div class="listsearch-input-item">
                                                        <span class="iconn-dec"><i class="far fa-bookmark"></i></span>
                                                        <input type="text" list="data1" id="map-search12" name="map_search11" placeholder="Region" value="{{ $searchkey }}"/>
                                                        <datalist id="data1" name="data1" ></datalist> 
                                                    </div>
         <!-- listsearch-input-item end-->

                            <!-- listsearch-input-item-->
                                                    
                             <!-- listsearch-input-item end-->                                                     
                                                    
                                                </div>
                                            </div>
                                        </form>
                                        <!--tab end-->
                                        <!--tab --> 
                                        <div class="tab">
                                            <div id="category-search" class="tab-content">
                                                <div class="fl-wrap">
                                                    <a class="category-carousel-item fl-wrap full-height checket-cat" href="#">
                                                        <img src="images/all/1.jpg" alt="">
                                                        <div class="category-carousel-item-icon red-bg"><i class="fal fa-cheeseburger"></i></div>
                                                        <div class="category-carousel-item-container">
                                                            <div class="category-carousel-item-title">Restaurants / Cafe</div>
                                                            <div class="category-carousel-item-counter">6 listings</div>
                                                        </div>
                                                    </a>
                                                    <a class="category-carousel-item fl-wrap full-height" href="#">
                                                        <img src="images/all/1.jpg" alt=""> 
                                                        <div class="category-carousel-item-icon yellow-bg"><i class="fal fa-bed"></i></div>
                                                        <div class="category-carousel-item-container">
                                                            <div class="category-carousel-item-title">Hotel / Hostel</div>
                                                            <div class="category-carousel-item-counter">14 listings</div>
                                                        </div>
                                                    </a>
                                                    <a class="category-carousel-item fl-wrap full-height" href="#">
                                                        <img src="images/all/1.jpg" alt=""> 
                                                        <div class="category-carousel-item-icon purp-bg"><i class="fal fa-cocktail"></i></div>
                                                        <div class="category-carousel-item-container">
                                                            <div class="category-carousel-item-title">Events / Nightlife</div>
                                                            <div class="category-carousel-item-counter">6 listings</div>
                                                        </div>
                                                    </a>
                                                    <a class="category-carousel-item fl-wrap full-height" href="#">
                                                        <img src="images/all/1.jpg" alt=""> 
                                                        <div class="category-carousel-item-icon blue-bg"><i class="fal fa-dumbbell"></i></div>
                                                        <div class="category-carousel-item-container">
                                                            <div class="category-carousel-item-title">Fitness / Gym</div>
                                                            <div class="category-carousel-item-counter">18 listings</div>
                                                        </div>
                                                    </a>
                                                    <a class="category-carousel-item fl-wrap full-height" href="#">
                                                        <img src="images/all/1.jpg" alt=""> 
                                                        <div class="category-carousel-item-icon green-bg"><i class="fal fa-cart-arrow-down"></i></div>
                                                        <div class="category-carousel-item-container">
                                                            <div class="category-carousel-item-title">Shopping</div>
                                                            <div class="category-carousel-item-counter">19 listings</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--tab end-->
                                    </div>
                                    <!--tabs end-->                         
                                </div>
                            </div>
                            <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="#filters-column">Back to Maps <i class="fas fa-caret-up"></i></a>
                        </div>
                        <div class="col-md-8">
                            <!-- list-main-wrap-header-->
                            <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow">
                                <!-- list-main-wrap-title-->
                                <div class="list-main-wrap-title">
                                    <h2>Results For : <span>{{ $searchkey }}</span></h2>
                                </div>
                                <!-- list-main-wrap-title end-->
                                <!-- list-main-wrap-opt-->
                                <div class="list-main-wrap-opt">
                                    <!-- price-opt-->

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
                            <!-- list-main-wrap-header end-->                            
                            <!-- listing-item-container -->
                            <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                                <!-- listing-item  -->
                            
                                <table>
                                @foreach($bestplaces as $bestplace)
                                	
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <input type="hidden" id="hidden_email" value="{{ $email }}" name="">
                                                <input type="hidden" id="hidden_id" value="{{ $bestplace->ID }}" name="">
                                                <div class="geodir-js-favorite_btn"><i onclick="myFunction()" class="fal fa-heart"></i><span>Save</span></div>
                                                <a href="singlelisting?ID={{ $bestplace->ID }}"  class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ $bestplace->Picture_Links }}" alt=""> 
                                                </a>
                                                <div class="listing-avatar"><a href="singlelisting?ID={{ $bestplace->ID }}"><img src="images/avatar/1.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">View Details</strong></span>
                                                </div>
                                                <div class="geodir_status_date gsd_open"><i class="fal fa-car"></i><a href="singlelisting?ID={{ $bestplace->ID }}">Learn More</a> </div>
                                    <div class="geodir-category-opt">
                                        <div class="listing-rating-count-wrap">
                                            <div class="review-score">{{ $scores }}</div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="{{ $scores }}"></div>
                                                        <br>
                                    <div class="reviews-count">{{ $review_counts }} reviews</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="#">{{ $bestplace->City }}</a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" ><i class="fas fa-map-marker-alt"></i>{{ $bestplace->State }}, USA</a></div>
                                                    </div>
                                                </div>
                                                <div class="geodir-category-text fl-wrap">
                                                    <p class="small-text">
                                        To see full details of this city, click on the blue button above.</p>
                                                    <div class="facilities-list fl-wrap">
                                                        <div class="facilities-list-title">Tips : </div>
                                                        <ul class="no-list-style">
                                                            <li class="tolt"  data-microtip-position="top" data-tooltip="Population: {{ $bestplace->Population }}"><i class="fal fa-parking"></i></li>
                                                            <li class="tolt"  data-microtip-position="top" data-tooltip="Unemployment: {{ $bestplace->Unemployment_Category }}"><i class="fal fa-shopping-bag"></i></li>
                                                            <li class="tolt"  data-microtip-position="top" data-tooltip="Age Category: {{ $bestplace->Median_Age_Category }}"><i class="fal fa-user-plus"></i></li>
                                                            <li class="tolt"  data-microtip-position="top" data-tooltip="Income Category: {{ $bestplace->Median_Income_Category }}"><i class="fal fa-wallet"></i></li>
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
                        <!-- listing-item end -->




								</table>
                                <!-- php ends  -->
                                <!-- listing-item end -->       
                            </div>
                            <!-- listing-item-container end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>
<script src="{{ asset('js/mapq123.js') }}"></script>
@include("components/footer")