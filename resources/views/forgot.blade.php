@include("components/header1")

<div id="wrapper">
                <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section single-par" data-scrollax-parent="true">
            <div class="bg par-elem "  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay op7"></div>
            <div class="container">
                <div class="section-title center-align big-title">
                    <h2><span>reset your password</span></h2>
                    <span class="section-separator"></span>
                    <div class="breadcrumbs fl-wrap"><a href="#">Home</a><span>reset password</span></div>
                </div>
            </div>
            <div class="header-sec-link">
                <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
            </div>
        </section>
        <!--  section  end-->
        <!--  section  -->
        <section   id="sec1" data-scrollax-parent="true">
            <div class="container">
                <!--about-wrap -->
                <div class="about-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="ab_text-title fl-wrap">
                                <h3>Get in Touch</h3>
                                <span class="section-separator fl-sec-sep"></span>
                            </div>
                            <!--box-widget-item -->                                       
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget">
                                    <div class="box-widget-content bwc-nopad">
                                        <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                            <ul class="no-list-style">
                                              <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a href="#" class="custom-scroll-link">hotciti.com</a></li>
                                                <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a href="#singleMap" class="custom-scroll-link">USA 27TH Brooklyn NY</a></li>
                                                <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>
                                                <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#">admin@hotciti.com</a></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->  
                            <!--box-widget-item -->
                            
                            <!--box-widget-item end -->                                            
                        </div>
                        <div class="col-md-8">
                            <div class="ab_text">
                                <div class="ab_text-title fl-wrap">
                                    <h3>Reset your Password</h3>
                                    <span class="section-separator fl-sec-sep"></span>
                                </div>
                                
                                <div id="contact-form">
                                    <div id="message">
                                    	@if(session("message"))
                                    		<p style="font-size: 16px; color:red;">{{ session("message") }}</p>
                                    	@endif
                                    </div>
                                    <form  class="custom-form" action="/forgotpassword" method="post">
                                    	@csrf
                                        <fieldset>
                                            <div class="clearfix"></div>
                                            <label><i class="fal fa-envelope"></i> email address </label>
                                            <input type="text"  name="email" id="email" placeholder="Email Address*" value=""/>
                                        </fieldset>
                                        <button type="submit" class="btn float-btn color2-bg" id="submit">Reset Password<i class="fal fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</div>

@include("components/footer")