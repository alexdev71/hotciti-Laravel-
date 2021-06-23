<!--register form -->
    <div class="main-register-wrap modal1">
        <div class="reg-overlay"></div>
        <div class="main-register-holder tabs-act">
            <div class="main-register fl-wrap  modal_main">
                <div class="main-register_title">Welcome to <span><strong>hot</strong>citi<strong>.</strong></span></div>
                <div class="close-reg"><i class="fal fa-times"></i></div>
                <ul class="tabs-menu fl-wrap no-list-style">
                    <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                </ul>
                <!--tabs -->                       
                <div class="tabs-container">
                    <div class="tab">
                        <!--tab -->
                        <div id="tab-1" class="tab-content first-tab">
                            <div class="custom-form">
                                <form  action="/login" method="post"  name="registerform">
                                    @csrf
                                    <label>Email Address <span>*</span> </label>
                                    <input name="email" type="text"   onClick="this.select()" value="">
                                    <label >Password <span>*</span> </label>
                                    <input name="password" type="password"   onClick="this.select()" value="" >
                                    
                                    <div class="clearfix"></div>
                                    <div class="filter-tags">
                                        <input id="check-a3" type="checkbox" name="check">
                                        <label for="check-a3">Remember me</label>
                                    </div>
                                    <div class="log-separator fl-wrap"><span></span></div>
                                    <div class="soc-log fl-wrap">
                                     <p>click to login or register your account.</p>
                                     <button type="submit" name="login" class="btn float-btn color2-bg"> Login  <i class="fas fa-caret-right"></i></button>
                                    </div>
                                </form>
                                <div class="lost_password">
                                    <a href="forgot.php">Lost Your Password?</a>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                        <!--tab -->
                        
                        <!--tab end -->
                    </div>
                    <!--tabs end -->
                    
                    <div class="wave-bg">
                        <div class='wave -one'></div>
                        <div class='wave -two'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--register form end -->
    <a class="to-top"><i class="fas fa-caret-up"></i></a>     
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Pick State and your Topic</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="/" method="get">
            <div class="row mb-5 mt-4">
                <div class="col-md-5">
                    <!-- <input type="text" list="custom_box" name="custom_state" id="custom_state" class="form-control no-search-select" placeholder="Enter State" required />
                    <datalist id="custom_box" name="custom_box" ></datalist>  -->
                    <select name="custom_state" class="form-control">
                        @if($states ?? '')
                            @foreach($states as $state)
                                <option value="{{ $state->State }}">{{ $state->State }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-7">
                    <select name="custom_select" class="form-control">
                        <option value="Comfort_Index_higherbetter">Comfort Index (High To Low)</option>
                        <option value="Overall_Cost_Of_Living">Cost Of Living (High To Low)</option>
                        <option value="Avg__July_High">High Temperature (High To Low)</option>
                        <option value="Household_Income">Household Income (High To Low)</option>
                        <option value="Population">Population (High To Low)</option>
                        <option value="Democrat">Registered Democrat (High To Low)</option>
                        <option value="Republican">Registered Republican (High To Low)</option>
                        <option value="Recent_Job_Growth">Recent Job Growth (High To Low)</option>
                        <option value="Snowfall_in_">Snowfall (High To Low)</option>
                        <option value="Sunny_Days">Sunny Days (High To Low)</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Search<i class="fas fa-search"></i></button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!--  Register Modal Start  -->

<div class="modal" id="register_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sign In To Hotciti</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="/register" method="post"   name="registerform" class="main-register-form" id="main-register-form2">
            @csrf
            <input type="hidden" name="premium_type">
            <input type="hidden" name="payment_amount">
            <div class="form-group">
                <label for="firstname">First Name <span>*</span> </label>
                <input name='firstname' type="text"   onClick="this.select()" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name <span>*</span> </label>
                <input name='lastname' type="text"   onClick="this.select()" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address <span>*</span></label>
                <input name="email" type="text"  onClick="this.select()" id="email" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password <span>*</span></label>
                <input name="password" type="password" id="reg_pass"  class="form-control"  onClick="this.select()" value=""  required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password <span>*</span></label>
                <input name="confirm_password" type="password" id="reg_repass"   class="form-control" onClick="this.select()" value=""  required>
            </div>
            <div class="form-group">
                <label for="confirm_password">What Do You Want? <span>*</span></label>
                <select name="user_purpose" id="user_purpose" class="form-control">
                    <option value="I am ready to relocate">I am ready to relocate.</option>
                    <option value="I am thinking about relocating">I am thinking about relocating.</option>
                    <option value="I am just looking for more information">I am just looking for more information.</option>
                    <option value="I am just using the site for fun">I am just using the site for fun.</option>
                </select>
            </div>
            <div class="filter-tags ft-list">
                <input id="check-a2" type="checkbox" name="check">
                <label for="check-a2">I agree to the <a href="https://www.termsfeed.com/live/d822498f-f651-47f1-b89e-751221f8df54">Privacy Policy</a></label>
            </div>
            <div class="clearfix"></div>
            <div class="filter-tags ft-list">
                <input id="check-a" type="checkbox" name="check">
                <label for="check-a">I agree to the <a href="https://www.termsfeed.com/live/df7f81fc-d91f-42f6-9780-1a55e55cd1ef">Terms and Conditions</a></label>
            </div>
            <div class="clearfix"></div>
            <div class="log-separator fl-wrap"><span></span></div>
            <div class="soc-log fl-wrap">
              <p>click to login or register your account.</p>
               <button type="button" name="register" id="reg_btn" class="btn float-btn color2-bg"> Register  <i class="fas fa-caret-right"></i></button>
             </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--  Register Modal End -->

<!-- First Load Modal Start -->

<div class='popup'>
    <div class='cnt223' style="padding: 0px;">
        
        <div style="padding: 30px;">
            <a class="close" style="float: right;color: #697891;">X</a>
            <h1 style="color: #2E3F6E !important;font-weight: 800;">Welcome To HotCiti</h1>
            <h5 style="color: #697891 !important;">Registration is voluntary and FREE!!! By registering, you gain access to all the Hotciti tools and get the ability to save your work.</h5>
        </div>
        <div class="row" style="margin-left: 0px;margin-right: 0px;">
            <div class="col-md-6" style="background-color: #e6f0ff;">
                <h2 style="color: #2E3F6E !important;font-weight: 800;">Login</h2>
                <h6 style="color: #697891 !important;">Please enter your credientials below!</h6>
                <form  action="/login" method="post"  name="registerform" style="padding: 30px;">
                    @csrf
                    <div class="form-group">
                        <!-- <input name="email" type="text"   onClick="this.select()" value=""> -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Your Email" onClick="this.select()">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <input name="password" type="password"   onClick="this.select()" value="" > -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Your Password" onClick="this.select()">
                        </div>
                    </div>
                    
                    
                    <div class="clearfix"></div>
                    <div class="filter-tags">
                        <input id="check-a3" type="checkbox" name="check">
                        <label for="check-a3">Remember me</label>
                    </div>
                    <div class="log-separator fl-wrap"></div>
                    <div class="soc-log fl-wrap">
                     <button type="submit" name="login" class="btn float-btn color2-bg"> Login  <i class="fas fa-caret-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-md-6" style="background-color: #2E3F6E;">
                
                <h2 style="margin-top: 35%;color: white;">Register</h2>
                <h6 style="color: white;">Don't have an account? Register Now!</h6>
                <button id="home_popup_register" class="btn btn-primary" data-toggle="modal" data-target="#register_modal"><i class="fal fa-user-circle" style="color: #2E3F6E !important;"></i>Register An Account</button>
            </div>
        </div>
    </div>
</div>
<!-- First Load Modal End -->


<!-- City Compare Modal Start -->

<div class="modal" id="compareModal">
  <div class="modal-dialog" id="compareModal_dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="margin-left: 20%;">Pick City And Desired Compare Tool</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="/city_compare" method="post" id="modal_compare_form" target="_blank">
            @csrf
            <div class="form-group">
                <label><h5>First City</h5></label>
                <input type="text" list="modal-data1" name="col-search1" id="modal-col-search1" class="form-control" placeholder="Enter City 1"/>
                <datalist id="modal-data1" name="data1" ></datalist> 
            </div>
            <div class="form-group">
                <input type="text" list="modal-data2" name="col-search2" id="modal-col-search2" class="form-control" placeholder="Enter City 2"/>
                <datalist id="modal-data2" name="data2" ></datalist> 
            </div>
            <div class="form-group">
                <input type="text" list="modal-data3" name="col-search3" id="modal-col-search3" class="form-control" placeholder="Enter City 3"/>
                <datalist id="modal-data3" name="data3" ></datalist> 
            </div>

            <div class="form-group">
                <label><h5>Select Compare Tool</h5></label>
                <select name="compare_tool" id="compare_tool" class="form-control" style="height: 50px;">
                    <option class="compare_tool_targets" value="city_compare">City Compare</option>
                    <option class="compare_tool_targets" value="cost_living">Cost Of Living</option>
                    <option class="compare_tool_targets" value="weather_compare">Weather Compare</option>
                    <option class="compare_tool_targets" value="crime_compare">Crime Compare</option>
                    <option class="compare_tool_targets" value="politics_compare">Politics Compare</option>
                    <option class="compare_tool_targets" value="head_to_head_compare">Head To Head Compare</option>
                </select>
            </div><br/>
            <button type="submit" class="btn btn-primary" style="width: 100%;height: 50px;font-size: 16px !important;font-weight: 700;">Compare</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

        <!-- City Compare Modal End -->

        <!-- iFrame Modal Start -->

<div class="modal" id="iframeModal">
  <div class="modal-dialog" id="iframeModal_dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <iframe src="" name="site_frame" id="site_frame"></iframe>
      </div> 

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

        <!--iFrame Modal End -->

                <!-- Video Modal Start -->

<div class="modal" id="videoModal">
  <div class="modal-dialog" id="iframeModal_dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <iframe src="" id="video_source" name="video_source"></iframe>
      </div> 

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

        <!--Video Modal End -->
        <!--Question Modal Start -->
        <div class="modal" id="questionModal">
            <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div id="mc_embed_signup" style="text-align: left;">
                                        
                        <div id="mc_embed_signup_scroll">
                            <h2 style="color: #697891;font-weight: 700;">ASK A QUESTION</h2>
                            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                            <div class="mc-field-group">
                                <label for="question_email">Email Address  <span class="asterisk">*</span>
                                </label>
                                <input type="email" value="" name="question_email" class="required email" id="question_email">
                            </div>
                            <div class="mc-field-group">
                                <label for="question_name">Full Name <span class="asterisk">*</span></label>
                                <input type="text" value="" name="question_name" class="" id="question_name">
                            </div>
                            <div class="mc-field-group">
                                <label for="question_phone">Phone Number <span class="asterisk">*</span></label>
                                <input type="text" value="" name="question_phone" class="" id="question_phone">
                            </div>
                            
                            <div class="mc-field-group">
                                <label for="message">Message <span class="asterisk">*</span></label>
                                <textarea class="form-control" name="question_message" id="question_message"></textarea>
                            </div>
                            
                            <div class="clear">
                                <input type="button" value="Send" name="subscribe" id="question_submit" class="button" style="width: 100%;height: 50px;border-radius: 30px;background-color: #425998;">
                            </div>
                        </div>
                        
                    </div>
                  </div> 

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
            </div>
        </div>


        

        <!--Question Modal End -->



        <!--Question Modal Start -->
        <div class="modal" id="townreportModal">
            <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">

                        <div id="mc_embed_signup" style="text-align: left;display: block !important;">
                            
                            <div id="mc_embed_signup_scroll">
                                <h2 style="color: #697891;font-weight: 700;">MORE ABOUT THIS LOCATION</h2>
                                <input type="hidden" name="form_location" id="modal_form_location">
                                <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                <div class="mc-field-group">
                                    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                    </label>
                                    <input type="email" value="" name="EMAIL" class="required email" id="mce-modal-EMAIL">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-FNAME">Full Name <span class="asterisk">*</span></label>
                                    <input type="text" value="" name="FNAME" class="" id="mce-modal-FNAME">
                                </div>
                                <div class="mc-field-group">
                                    <label for="mce-phone">Phone Number <span class="asterisk">*</span></label>
                                    <input type="text" value="" name="PHONE" class="" id="mce-modal-phone">
                                </div>
                                <div class="mc-field-group">
                                    <label for=""></label>
                                    <input type="text" id="modal_interest_location" disabled="true" style="margin-top: 20px;">
                                </div>
                                <div class="mc-field-group">
                                    <input type="checkbox" name="contact_me_modal_check" style="width: 10%;float: left;margin-top: 2px;" id="contact_me_modal_check">
                                    <label for="contact_me_check">I would like an agent to contact me.</label>
                                </div>
                                
                                <div class="clear">
                                    <input type="button" value="Subscribe" name="subscribe" id="modal_contact_subscribe" class="button" style="width: 100%;height: 50px;border-radius: 30px;background-color: #425998;">
                                    <p style="line-height: 1.75;color: #697891;">By proceeding, you consent to receive calls and texts at the number you provided, including marketing by autodialer and prerecorded and artificial voice and email, from hotciti.com and others about your inquiry and other home-related matters, but not as a condition of any purchase; this applies regardless of whether you check, or leave un-checked the box above.</p>
                                </div>
                            </div>
                            
                        </div>

                  </div> 

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
            </div>
        </div>


        

        <!--Question Modal End -->

        <!--Find Home Modal Start -->
        <div class="modal" id="homeinfoModal">
            <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body" style="text-align: left;">
                    <h2>What are you looking for in <strong id="home_location_name"></strong></h2>
                    @if(session('logged_in') == null)
                        <div class="row">
                            <div class="col-md-6">
                                <label for="home_fname">First Name</label>
                                <input type="text" name="home_fname" id="home_fname" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="home_lname">Last Name</label>
                                <input type="text" name="home_lname" id="home_lname" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="home_email">Email</label>
                                <input type="text" name="home_email" id="home_email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="home_phone">Phone Number</label>
                                <input type="text" name="home_phone" id="home_phone" class="form-control">
                            </div>
                        </div><br/>
                    @else
                        <input type="hidden" name="house_email" id="house_email" value="{{ session('email') }}">
                        <input type="hidden" name="house_fname" id="house_fname" value="{{ session('first_name') }}">
                        <input type="hidden" name="house_lname" id="house_lname" value="{{ session('last_name') }}">
                    @endif
                    <div>
                        <h5>Bedrooms</h5>
                        <input type="hidden" name="hidden_bed_count" id="hidden_bed_count">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn home_popup_bed" id="any">Any</button>
                            <button type="button" class="btn home_popup_bed" id="1">1+</button>
                            <button type="button" class="btn home_popup_bed" id="2">2+</button>
                            <button type="button" class="btn home_popup_bed" id="3">3+</button>
                            <button type="button" class="btn home_popup_bed" id="4">4+</button>
                            <button type="button" class="btn home_popup_bed" id="5">5+</button>
                        </div>
                    </div><br/>

                    <div>
                        <h5>Bathrooms</h5>
                        <input type="hidden" name="hidden_bath_count" id="hidden_bath_count">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn home_popup_bath" id="any">Any</button>
                            <button type="button" class="btn home_popup_bath" id="1">1+</button>
                            <button type="button" class="btn home_popup_bath" id="1.5">1.5+</button>
                            <button type="button" class="btn home_popup_bath" id="2">2+</button>
                            <button type="button" class="btn home_popup_bath" id="3">3+</button>
                            <button type="button" class="btn home_popup_bath" id="4">4+</button>
                        </div>
                    </div><br/>
                    <div class="row">
                      <div class="col-md-6" style="line-height: 1.75;">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check_houses" id="check_houses" value="Houses">
                            <label class="form-check-label" for="check_houses" style="font-size: 14px;font-weight: 600;color: #6C75A7;">Houses</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check_town_homes" id="check_town_homes" value="Town Homes">
                            <label class="form-check-label" for="check_town_homes" style="font-size: 14px;font-weight: 600;color: #6C75A7;">Town Homes</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check_multi_family" id="check_multi_family" value="Multi-Family">
                            <label class="form-check-label" for="check_multi_family" style="font-size: 14px;font-weight: 600;color: #6C75A7;">Multi-Family</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check_condos" id="check_condos" value="Condos/Co-ops">
                            <label class="form-check-label" for="check_condos" style="font-size: 14px;font-weight: 600;color: #6C75A7;">Condos/Co-ops</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check_land" id="check_land" value="Lots/Land">
                            <label class="form-check-label" for="check_land" style="font-size: 14px;font-weight: 600;color: #6C75A7;">Lots/Land</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check_apartments" id="check_apartments" value="Apartments">
                            <label class="form-check-label" for="check_apartments" style="font-size: 14px;font-weight: 600;color: #6C75A7;">Apartments</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="check_manufactured" id="check_manufactured" value="Manufactured">
                            <label class="form-check-label" for="check_manufactured" style="font-size: 14px;font-weight: 600;color: #6C75A7;">Manufactured</label>
                        </div><br/><br/>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="house_purpose_radio" id="for_sale_radio" value="For Sale" checked>
                            <label class="form-check-label" for="for_sale_radio" style="font-size: 14px;font-weight: 600;color: #6C75A7;">
                                For Sale
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="house_purpose_radio" id="for_rent_radio" value="For Rent">
                            <label class="form-check-label" for="for_rent_radio" style="font-size: 14px;font-weight: 600;color: #6C75A7;">
                                For Rent
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="house_purpose_radio" id="land_radio" value="Land">
                            <label class="form-check-label" for="land_radio" style="font-size: 14px;font-weight: 600;color: #6C75A7;">
                                Land
                            </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <h6>Price Range</h6>
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="text" class="form-control" id="min_home_price" name="min_home_price" placeholder="MIN">
                              </div>

                              <div class="col-md-6">
                                  <input type="text" class="form-control" id="max_home_price" name="max_home_price" placeholder="MAX">
                              </div>
                          </div><br />
                          <div style="line-height: 1;">
                              <p>$0+</p>
                              <p>$100,000+</p>
                              <p>$200,000+</p>
                              <p>$300,000+</p>
                              <p>$400,000+</p>
                              <p>$500,000+</p>
                              <p>$600,000+</p>
                              <p>$700,000+</p>
                              <p>$800,000+</p>
                              <p>$900,000+</p>
                          </div>
                      </div>
                  </div>
                  <button type="button" class="btn btn-default" id="btn_submit_home" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                  </div> 
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
            </div>
        </div>


        

        <!--Find Home Modal End -->


        <!-- Street View Modal Start -->


        <div class="modal" id="streetviewModal">
            <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <h1 style="text-align: center;">Please Enter City Name</h1>
                    <div class="row">
                        <form method="get" action="/street_view">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" id="street_view_city" class="form-control" name="city" placeholder="Enter a City">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" id="street_view_state" class="form-control" name="state" placeholder="Enter a State">
                                </div>
                            </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success">View Street</button>
                    </form>
                  </div> 

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
            </div>
        </div>

        <!-- Street View Modal End -->