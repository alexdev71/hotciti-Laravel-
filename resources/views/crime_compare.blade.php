@include("components/header")
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>




<div id="wrapper">
                <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
            <div class="container">
                <div class="dashboard-breadcrumbs breadcrumbs"><a href="/">Home</a><a href="#" data-toggle="modal" data-target="#compareModal">Dashboard</a><span>Main page</span></div>
                <!--Tariff Plan menu-->
                <div   class="tfp-btn"><span>Tariff Plan : </span> <strong>Extended</strong></div>
                <div class="tfp-det">
                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                    <a href="#" class="tfp-det-btn color2-bg">Details</a>
                </div>
                <!--Tariff Plan menu end-->
                <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                    <h1><span>Crimes Compare</span></h1>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="dashboard-header fl-wrap">
                <div class="container">
                    <div class="dashboard-header_conatiner fl-wrap">
                        <div class="dashboard-header-avatar">
                            <img src="images/avatar/1.jpg" alt="">
                            <a href="dashboard-myprofile.html" class="color-bg edit-prof_btn"><i class="fal fa-edit"></i></a>
                        </div>
                        <div class="dashboard-header-stats-wrap">
                            <div class="dashboard-header-stats">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <!--  dashboard-header-stats-item -->
                                        <div class="swiper-slide">
                                            <div class="listsearch-input-item">
			                                    <input type="text" list="data1" id="fetch_graph1" name="fetch_graph1" class=" no-search-select" placeholder="Enter City 1" value="{{ $city1 }}"/>
			                                    <datalist id="data1" name="data1" >
			                                      
			                                     </datalist> 
			                                </div>
                                        </div>
                                        <!--  dashboard-header-stats-item end -->
                                        <!--  dashboard-header-stats-item -->
                                        <div class="swiper-slide">
                                            <div class="listsearch-input-item">
			                                    <input type="text" list="data2" id="fetch_graph2" name="fetch_graph2" class=" no-search-select" placeholder="Enter City 2" value="{{ $city2 }}"/>
			                                    <datalist id="data2" name="data2" >
			                                      
			                                     </datalist> 
			                                </div>
                                        </div>
                                        <!--  dashboard-header-stats-item end -->
                                        <!--  dashboard-header-stats-item -->
                                        <div class="swiper-slide">
                                            <div class="listsearch-input-item">
			                                    <input type="text" list="data3" id="fetch_graph3" name="fetch_graph3" class=" no-search-select" placeholder="Enter City 3" value="{{ $city3 }}"/>
			                                    <datalist id="data3" name="data3" >
			                                      
			                                     </datalist> 
			                                </div>
                                        </div>
                                        <!--  dashboard-header-stats-item end -->
                                        <!--  dashboard-header-stats-item -->
                                        
                                        <!--  dashboard-header-stats-item end -->
                                    </div>
                                </div>
                            </div>
                            <!--  dashboard-header-stats  end -->
                            <div class="dhs-controls">
                                <div class="dhs dhs-prev"><i class="fal fa-angle-left"></i></div>
                                <div class="dhs dhs-next"><i class="fal fa-angle-right"></i></div>
                            </div>
                        </div>
                        <!--  dashboard-header-stats-wrap end -->
                        <a href="/dashboard">Back to Dashboard <i class="fal fa-layer-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
            <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
            <div class="circle-wrap" style="left:120px;bottom:120px;" data-scrollax="properties: { translateY: '-200px' }">
                <div class="circle_bg-bal circle_bg-bal_small"></div>
            </div>
            <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
                <div class="circle_bg-bal circle_bg-bal_middle"></div>
            </div>
            <div class="circle-wrap" style="right:40%;top:-10px;"  >
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
            </div>
            <div class="circle-wrap" style="right:55%;top:90px;"  >
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
            </div>
        </section>
        <!--  section  end-->
        <!--  section  -->
        <section class="gray-bg main-dashboard-sec" id="sec1">
            <div class="container">
                <br/>
                    <p style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <br/>
                <!--  dashboard-menu-->
                
                <!-- dashboard-menu  end-->
                <!-- dashboard content-->
           
                
                            
                <div style="overflow-x:auto;">
                <table>

				<tr>
					<td width="100%"><div id="vio"></div></td>

				</tr>
				<tr>
					<td width="100%"><div id="pro"></div></td>

				</tr>

				</table>
				</div>


                <div class="col-md-12">    
                    <div class="dashboard-title dt-inbox fl-wrap">
                        <h3>Crimes Compare</h3>
                    </div>
                    <!-- dashboard-list-box--> 
                    <div class="dashboard-list-box  fl-wrap">
  
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message">
                               
                            <div style="overflow-x:auto;">     
                          <table id="userTable" border="1" >
                          <thead>
                             <tr>
                              
                               <th align='left' width="15%">City</th>  
                               <th width="5%">Violent</th>
                               <th width="5%">Property</th>
                             
                             </tr>
                           </thead>
                           <tbody></tbody>
                           </table>
                           </div>
                       
                            </div>
                        </div>
                        <!-- dashboard-list end-->                                           
                                                            
                        <!-- dashboard-list end-->    
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message">
                                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                <div class="dashboard-message-text">
                                    <i class="far fa-check green-bg"></i>
                                    <p> Data from our database @ <a href="#">hotciti.com</a> </p>
                                </div>
                                <div class="dashboard-message-time"><i class="fal fa-calendar-week"></i> September 2020</div>
                            </div>
                        </div>
                        <!-- dashboard-list end-->    
                        <!-- dashboard-list end-->    
                        
                        <!-- dashboard-list end-->                                           
                    </div>
                    <!-- dashboard-list-box end--> 
                </div>
                <!-- dashboard content end-->
            </div>
        </section>
        <!--  section  end-->
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>







<script src="{{ asset('js/dashboard_custom.js') }}"></script>
<script src="{{ asset('js/dashboard5.js') }}"></script>
<script>
        $(document).ready(function(){
            var width = screen.width;
            if(width < 500){
                Swal.fire("Notice", "For best results, please rotate to landscape view", "success");
            }
        });
    </script>
@include("components/footer")