    <!DOCTYPE HTML> 
    <html lang="en">
        <head>
            <!--=============== basic  ===============-->
            <meta charset="UTF-8">
            <title>HotCiti</title>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <meta name="robots" content="index, follow"/>
            <meta name="keywords" content="Best Places To Live | Best Places To Live In Flordia| Best Places To Live In Texas | Best Places To Live In California | Best Places To live Massachusetts | "/>
            <meta name="description" content="Find The Best Places To Live | HotCiti"/>
            <!--=============== css  ===============--> 
            <script src="https://dropinblog.com/js/embed.js"></script>
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
            <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
            
            <link type="text/css" rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">
            <link rel="stylesheet" href="{{ asset('css/color.css') }}">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
            <!--=============== favicons ===============-->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
            <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script> -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWFCuljIcioW3cXqjsrunpEubiLE5raMI&libraries=places&callback=initAutocomplete"></script>

            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
            <script src="{{ asset('js/map-plugins.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
            <script src="{{ asset('js/custom.js') }}"></script>
            

            <style>
          table{ 
                   display: table; 
               }
             tr{ 
                   display: table-row; 
               }
            td{ 
                  display: table-cell; 
              } 
                .pol{  
                    background-color:#eee;  
                    cursor:pointer; 
                    z-index: 99;
               }  
               .loo{  
                    padding:12px;  
               } 
               .pol .loo:hover{background:#fff;cursor: pointer;} 
               ul {
                list-style-type: none;
                }
        </style>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-4S00J3QNP4"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-4S00J3QNP4');
        </script>
        </head>
        <body>
            <!--loader-->
            <div class="loader-wrap">
                <div class="loader-inner">
                    <div class="loader-inner-cirle"></div>
                </div>
            </div>
            <!--loader end-->
            <!-- main start  -->
             <div id="main">
                <!-- header -->
                <header class="main-header" style="position: fixed;background-color: white;border-bottom: 0.5px solid rgba(58, 51, 53, 0.2);">
                    <input type="hidden" value="{{ session('logged_in') }}" id="hidden_session">
                    <input type="hidden" value="{{ session('is_premium') }}" id="hidden_session_premium">
                    <!-- logo-->
                    
                    <a href="/" class="logo-holder"><img src="images/logo-dark.png" alt=""></a>
                    <!-- logo end-->
                    <!-- header-search_btn-->         
                    
                    
                    <!-- header-search_btn end-->
                    <!-- header opt -->

                        
                    <div class="cart-btn   show-header-modal" data-microtip-position="bottom" role="tooltip" aria-label="Your Wishlist"><i class="fal fa-heart" style="color:#3A3335";></i><span class="cart-counter green-bg"></span> </div>
                    <div class="header-user-menu" style="top: 15px;">
                        <div class="header-search_btn show-search-button" style="color: #3A3335;"><i class="fal fa-search" style="color: #3A3335 !important;"></i><span>Search</span></div>
                        <div class="header-user-name btn-primary">
                                @if(session('logged_in') != null)
                                    Hello , {{ session("first_name") }}
                                @else
                                    <p style="margin-left: 20px;" id="login_header1">Log in</p>
                                @endif
                        </div>
                        <ul>
                            @if(session('logged_in') == null)
                                <li class="show-reg-form3 modal-open"><a href="#" > Log In</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#register_modal"> Register</a></li>
                            @else
                                <li><a href="/signout">Log Out</a></li>
                            @endif
                        </ul>
                    </div>
                    

                    <nav class="navbar navbar-expand-xl navbar-light bg-transparent" style="margin-top: 20px;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="outline: none;border: none;">
                            <span class="navbar-toggler-icon" id="listing-menu-span"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a href="/" style="color: #3A3335;">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #3A3335;">Find Places</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/listing_advanced"  style="color: #697891;">Standard Search</a>
                                        <a class="dropdown-item" href="/listing"  style="color: #697891;">Advanced Search</a>
                                        <a class="dropdown-item" href="/city_find"  style="color: #697891;">Explore Places</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#compareModal"  style="color: #697891;">Compare Places</a>
                                        <a class="dropdown-item" href="/distance_search"  style="color: #697891;">Distance Search</a>
                                        <a class="dropdown-item" href="/street_view" style="color: #697891;">Street View</a>
                                        <a class="dropdown-item" href="/head_to_head"  style="color: #697891;">Head To Head</a>
                                        <!-- <a class="dropdown-item" href="/moving_checklist" style="color: #697891;">Moving Checklist</a> -->
                                        <a class="dropdown-item" href="/top10"  style="color: #697891;">Top 10</a>
                                        <a class="dropdown-item" href="/gun_laws"  style="color: #697891;">Gun Laws</a>
                                        <a class="dropdown-item" href="/city_compare"  style="color: #697891;">City Compare</a>
                                        <a class="dropdown-item" href="/dashboard"  style="color: #697891;">Cost Of Living</a>
                                        <a class="dropdown-item" href="/crime_compare"  style="color: #697891;">Crime Compare</a>
                                        <a class="dropdown-item" href="/politics_compare"  style="color: #697891;">Politics Compare</a>
                                        <a class="dropdown-item" href="/weather_compare"  style="color: #697891;">Weather Compare</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #3A3335;">Find Homes</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/find_homes"  style="color: #697891;">For Sale</a>
                                        <a class="dropdown-item" href="/find_homes_for_rent"  style="color: #697891;">For Rent</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #3A3335;">Find Schools</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/find_schools"  style="color: #697891;">Schools</a>
                                        <a class="dropdown-item" href="/find_colleges"  style="color: #697891;">Colleges</a>
                                    </div>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a href="/find_hotels" style="color: #3A3335;">Find Accommodations</a>
                                </li>
                                
                               
                                <li class="nav-item">
                                    <a href="https://blog.hotciti.com" style="color: #3A3335;">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="forum_open" id="https://discord.gg/nYS6FSXN" data-toggle="modal" data-target="#iframeModal" style="color: #3A3335;">Forum</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a data-toggle="modal" data-target="#questionModal" style="cursor: pointer;">Ask A Question</a>
                                </li> -->
                            </ul>
                        </div>
                    </nav>
                    <!-- navigation  end -->
                       <!-- header-search_container -->
                    <div class="header-search_container header-search vis-search">
                        <div style="margin-left: 12%;">
                            <form action="/headersearch" method="get" id="header_search_form">
                                <div class="header-search-input-wrap fl-wrap">
                                    <!-- header-search-input --> 
                                    <div class="header-search-input">
                                        <label><i class="fal fa-keyboard"></i></label>
                                        <input type="text" list="datab11" name="map_search11" id="map-search11" class="no-search-select" placeholder="Please Enter City Name"/>
                                        <datalist id="datab11" name="datab11" ></datalist>  
                                    </div>
                                    <!-- header-search-input end -->  
                                    <!-- header-search-input --> 
                                    
                                    <!-- header-search-input end --> 
                                    
                                </div>
                            </form>
                            <div class="header-search_close color-bg"><i class="fal fa-long-arrow-up"></i></div>
                        </div>
                    </div>
                    <!-- header-search_container  end --> 
                    <!-- wishlist-wrap--> 
                    <div class="header-modal novis_wishlist">
                        <!-- header-modal-container--> 
                        <div class="header-modal-container scrollbar-inner fl-wrap" style="height: 285px;" data-simplebar>
                            <!--widget-posts-->
                            <div class="widget-posts  fl-wrap" style="height: 265px;overflow: auto;">
                                <ul class="no-list-style">
                                    @if(isset($favs))
                                        @foreach($favs as $fav)
                                            <li id="{{ $fav->id }}">
                                                <div class="widget-posts-img"><a href="singlelisting?ID={{ $fav->ID }}"><img src="{{ $fav->Picture_Links }}" alt=""></a>  
                                                </div>
                                                <div class="widget-posts-descr">
                                                    <h4><a href="singlelisting?ID={{ $fav->ID }}">{{ $fav->City }}</a></h4>
                                                    <div class="geodir-category-location fl-wrap"><a href="singlelisting?ID={{ $fav->ID }}"><i class="fas fa-map-marker-alt"></i> {{ $fav->State }}, USA</a></div>
                                                    <div class="widget-posts-descr-link"><a href="singlelisting?ID={{ $fav->ID }}" >hotciti.com </a></div>
                                                    <div></div>
                                                    <div class="clear-wishlist">
                                                        <input type="hidden" id="hidden_email" value="{{ session('email') }}" name="">
                                                        <i id="{{ $fav->id }}" class="fal fa-times-circle fav_remove_i"></i>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!-- widget-posts end-->
                        </div>
                        <!-- header-modal-container end--> 
                        <div class="header-modal-top fl-wrap">
                            <h4>Saved : <span><strong></strong> Locations</span></h4>
                            <div class="close-header-modal"><i class="far fa-times"></i></div>
                        </div>
                    </div>

                    <!--wishlist-wrap end --> 
                </header>
                <!-- header end-->
                <!-- header end-->
                <script src="https://checklist.com/widget/v1/widget.js"></script>
                <script>
                    $(document).ready(function(){
                        $(".to_iframe").click(function(){
                            var href = $(this).attr("href");
                            document.getElementById("site_frame").src = href;
                        });
                    });
                </script>
        </body>
    </html>