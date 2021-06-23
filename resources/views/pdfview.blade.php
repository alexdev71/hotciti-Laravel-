@include("components/header")
<input type="hidden" value="{{ $row->ID }}" id="hidden_id" name="">
<div id="wrapper" style="margin-top: 30px;">

    
    <h1>{{ $row->City }}, {{ $row->State }}</h1>
    <div class="content">
        <section class="gray-bg no-top-padding">
            <div class="container">
                <div class="clearfix"></div>
                <div class="row">

                    <div class="col-md-8">

                        <div class="list-single-main-wrapper fl-wrap" id="sec2">
                            <div class="list-single-main-media fl-wrap">
                                <img src="{{ $row->Picture_Links }}" class="respimg" alt="">
                                
                            </div>
                               <br/>
 
                            <div class="list-single-main-item fl-wrap block_box">
                                <div class="list-single-main-item-title">
                                    <h3>Description  {{ $row->City }}  </h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <p>{{ $row->City }},{{ $row->State }}  is located in the {{ $row->Region }} region of the United States near {{ $row->Nearest_Major_City }}. It has a population of {{ $row->Population }} people {{ $row->Male_Population }}% male and {{ $row->Female_Population }}% female.</p>
									<p>The average high temperature in the summer is {{ $row->Avg__July_High }} degrees with an average low temperature of {{ $row->Avg__Jan__Low }} degrees in the winter. You should expect {{ $row->Rainfall_in_ }} inches of annual rainfall and {{ $row->Snowfall_in_ }} inches of annual snowfall. </p> 
									<p> The safety score in {{ $row->City }} is {{ $row->Violent_Crime }} out of 10 with 10 being the worst and 1 being the best (national average is 4). The unemployment rate in {{ $row->City }} is {{ $row->Unemployment_Rate }}%. The average commute time is {{ $row->Commute_Time }} minutes. The overall cost of living score is{{ $row->Overall_Cost_Of_Living }} as compared to a national average of 100. Voter registration in {{ $row->City }} is {{ $row->Republican }}% Republican and {{ $row->Democrat }}% Democrat. See detailed report below.</p>
                                   
                                </div>
                            </div>
                             <br/>
                                
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
                        </div>
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
                    </div>

                    <div class="col-md-4">
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
                    </div>                               
                </div>
            </div>

        </section>
        <div class="limit-box fl-wrap"></div>
    </div>
</div>

<div class="row" style="margin-bottom: 70px;">
	<div class="col-md-4">
		<button type="button" class="header-search-button color-bg" id="btn_download_pdf"><i  class="fas fa-download"></i><span>Download</span></button>
	</div>
	<div class="col-md-4">
		<button type="button" class="header-search-button color-bg" id="btn_cancel"><i  class="fas fa-undo"></i><span>Cancel</span></button>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("#btn_cancel").click(function(){
			window.location = '/singlelisting?ID=' + $("#hidden_id").val();
		});
		$("#btn_download_pdf").click(function(){
			var element = document.getElementById("wrapper");
			console.log(window);
			html2pdf().from(element).save();
		});
	});
	function CreatePDFfromHTML() {
	    var HTML_Width = $("#wrapper").width();
	    var HTML_Height = $("#wrapper").height();
	    var top_left_margin = 15;
	    var PDF_Width = HTML_Width + (top_left_margin * 2);
	    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
	    var canvas_image_width = HTML_Width;
	    var canvas_image_height = HTML_Height;

	    // console.log(HTML_Width + " " + HTML_Height + " " + PDF_Width + " " + PDF_Height);

	    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

	    // console.log(HTML_Width + " " + HTML_Height + " " + PDF_Width + " " + PDF_Height + " " + totalPDFPages);

	    html2canvas($("#wrapper")[0]).then(function (canvas) {
	        var imgData = canvas.toDataURL("image/jpeg", 1.0);
	        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
	        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
	        for (var i = 1; i <= totalPDFPages; i++) { 
	            pdf.addPage(PDF_Width, PDF_Height);
	            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
	        }
	        pdf.save("CityReport.pdf");
	    });
	}
</script>
@include("components/footer");