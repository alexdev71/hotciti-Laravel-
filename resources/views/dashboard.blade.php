@include('components/header')

<div id="wrapper">
                <!-- content-->
	<div class="content">
	    <!--  section  -->
	    <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
	        <div class="container">
	            <div class="dashboard-breadcrumbs breadcrumbs"><a href="/">Home</a><a href="#" data-toggle="modal" data-target="#compareModal">Dashboard</a><span>Cost of Living</span></div>
	            <!--Tariff Plan menu-->
	            
	            
	            <!--Tariff Plan menu end-->
	            <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
	                <h1><span>Cost of Living Calculator Dashboard</span></h1>
	            </div>
	        </div>
	        <div class="clearfix"></div>
	        <div class="dashboard-header fl-wrap">
	            <div class="container">
	                <div class="dashboard-header_conatiner fl-wrap">
	                    
	                    <div class="dashboard-header-stats-wrap">
	                        <div class="dashboard-header-stats">
	                            <div class="swiper-container">
	                                <div class="swiper-wrapper">
	                                    
	                                </div>
	                            </div>
	                        </div>
	                        <!--  dashboard-header-stats  end -->
	                       
	                    </div>
	                    <!--  dashboard-header-stats-wrap end -->
	                    
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

	            <div class="col-md-12">
	                <div class="dashboard-title fl-wrap">
	                    <h3>Cost of Living</h3>
	                </div>
	                <!-- list-single-facts -->                               
	                
	                <!-- list-single-facts end -->                                     
	                <div class="list-single-main-item fl-wrap block_box">
	                    <!-- chart-wra-->           
	                    <div class="chart-wrap   fl-wrap">
	                        <div class="chart-header fl-wrap">
	                             <div class="listsearch-input-item cost_of_living_input">
	                             	<input type="text" list="data1" id="fetch_graph1" name="fetch_graph1" class=" no-search-select" placeholder="Enter City 1" value="{{ $city1 }}"/>
	                             	<datalist id="data1" name="data1" >
	                                 
	                                 </datalist> 
	                            </div>
	                            <div class="listsearch-input-item cost_of_living_input">
	                                <input type="text" list="data2" id="fetch_graph2" name="fetch_graph2" class=" no-search-select" placeholder="Enter City 2" value="{{ $city2 }}"/>
	                                <datalist id="data2" name="data2" >
	                                  
	                                 </datalist> 
	                            </div>
	                            <div class="listsearch-input-item cost_of_living_input">
	                                <input type="text" list="data3" id="fetch_graph3" name="fetch_graph3" class=" no-search-select" placeholder="Enter City 3" value="{{ $city3 }}"/>
	                                <datalist id="data3" name="data3" >
	                                  
	                                 </datalist> 
	                            </div>
	                            <br/>
	                            <br/>
	                            <br/>
	                             <!--graph starts-->     
	                            
	                        </div>
	                        <br/>
			                    <center><p style="font-size: 16px;text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></center>
			                <br/>
			                <div>
	                        <canvas id="canvas-chart"></canvas>
	                        </div>
	                    </div>
	                    <!--chart-wrap end-->                                         
	                </div>
	                 <!--graph end-->     
	                <div class="dashboard-title dt-inbox fl-wrap">
	                    <h3>Cost of Living Calculator</h3>
	                </div>
	                <!-- dashboard-list-box--> 
	                <div class="dashboard-list-box  fl-wrap">
	                    <!-- dashboard-list end-->    
	                    
	                    <!-- dashboard-list end-->    
	                    <!-- dashboard-list end-->    
	                    <div class="dashboard-list fl-wrap" style="overflow: auto;">
	                        <div class="dashboard-message">
	                           
	                                
	                      <table id="userTable" border="1" >
	                      <thead>
	                         <tr>
	                           
	                           <th align='left' width="15%">City</th>
	                           <th width="5%">Entertainment</th>
	                           <th width="5%">Food</th>
	                           <th width="5%">Income Taxes</th>
	                           <th width="5%">Mortgage</th>
	                           <th width="7%">Property Tax Rate</th>
	                           <th width="5%">Sales Tax</th>
	                           <th width="5%">Utilities</th>
	                           <th width="7%">Total</th>
	                         </tr>
	                       </thead>
	                       <tbody></tbody>
	                       </table>
	                      
	                   
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
	<script src="{{ asset('js/charts.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <script>
    	$(document).ready(function(){
    		var width = screen.width;
    		if(width < 500){
    			Swal.fire("Notice", "For best results, please rotate to landscape view", "success");
    		}
    	});
    </script>
@include('components/footer')