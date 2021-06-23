@include("components/header1")
<hr />
<div id="search_container">
	<h1 id="sticky_result_refine_search"><strong id="new_counter">{{ $count }}</strong> MATCHING LOCATIONS</h1>
	<h4 style="margin-bottom: 30px;padding-top: 100px;">Now, Let's hone in even further by refining your search</h4>
	<form action="/listing_new" method="POST" id="listing_form_new">
    @csrf
	<div class="container">
                    <!--tabs -->                       
		<div class="tabs-container fl-wrap">
			<!--tab -->

			<div class="tab">
				<div id="filters-search" class="tab-content  first-tab ">
					<div class="fl-wrap">
						<div class="row">
							<div class="col-md-6">
								<div class="listsearch-input-item">
									<input type="text" id="search_focus6_0" name="search_focus6_0" placeholder="Population from"/>

								</div>
							</div> 
							<div class="col-md-6">
								<div class="listsearch-input-item">
									<input type="text" id="search_focus6" name="search_focus6" placeholder="Population to"/>

								</div>
							</div> 
						<!-- listsearch-input-item end-->
							@include("components/more_filters_new");
							<div class="col-md-6">
								
							</div> 
							<div class="col-md-6">
								
							</div> 

						
							<div class="col-lg-2 col-md-3">
								<div class="listsearch-input-item">
									<button class="header-search-button color-bg" type="button" id="btn_view_location" name="btnsubmit"><i  class="fas fa-eye"></i><span>View Locations</span></button>
								</div>

							</div>
							<div class="col-lg-2 col-md-3">
								<div class="listsearch-input-item">
									<button type="button" class="header-search-button color-bg" id="bulk_csv"><i  class="fas fa-download"></i><span>Download</span></button>
								</div>
							</div>

							<div class="col-lg-2 col-md-3">
								<div class="listsearch-input-item">
									<button type="button" class="header-search-button color-bg" onclick="window.location = '/search_wizard'"><i  class="fas fa-undo"></i><span>Back</span></button>
								</div>
							</div>

							<div class="col-lg-2 col-md-3">
								<div class="listsearch-input-item">
									<button class="header-search-button color-bg" type="submit"><i class="fas fa-sync-alt"></i><span>Reset Search</span></button>
								</div>
							</div>
						<!-- listsearch-input-item end-->                                         
						</div>
					<!-- hidden-listing-filter -->
					</div>
				</div>
			</div>
			</form>
			<!--tab end-->
			<!--tab --> 

			<!--tab end-->
			</div>
		<!--tabs end-->
		</div>
	</div>
<script>
  $(document).ready(function(){
    $("#search_center_town").keyup(function(){

        var query = $("#search_center_town").val();
        $.ajax({
          url:"/getsearchlist",  
          method:"POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:{query:query},  
          beforeSend: function(){
            $("#search_center_town").css("background","#FFF url(images/ajax-loader.gif) no-repeat 165px");
          },
          success:function(data)  
          {    
              $('#data_center_town').html(data); 
              $("#search_center_town").css("background","#FFF");
          }
        });
        for(var i = 1; i<=7; i++){
          $("#search_focus"+i).attr("disabled", "true");
          $("#search_focus"+i).val("");
        }
        $("#search_focus6_0").attr("disabled", "true");
        $("#search_focus6_0").val("");


    });

    $("#search_center_town").bind('change', function () {
      $('#search_center_town').blur();  
    });

    $("#btn_range_reset").click(function(){
      for(var i = 1; i<=7; i++){
        $("#search_focus"+i).removeAttr("disabled");
      }
      $("#search_focus6_0").removeAttr("disabled");
      $("#search_center_town").val("");
      $("#search_range").val("");
    });

    var hidden_sortt = $("#hidden_sortt").val();
    $("option[value="+hidden_sortt+"]").attr("selected", true);

    $("#bulk_csv").click(function(){
      
            getBulkCSV();

    });

    $("#btn_reset").click(function(){
    	location.reload();
    });

  	$("#btn_view_location").click(function(){
  		var search_array = {
  			'query1' : $('#search_focus1').val(),
			'query2' : $('#search_focus2').val(),
			'query3' : $('#search_focus3').val(),
			'query_region' : $('#search_focus4').val(),
			'query_county' : $('#search_focus5').val(),
			'query_pop_0' : $('#search_focus6_0').val(),
			'query_pop' : $('#search_focus6').val(),
			'query_nmc' : $('#search_focus7').val(),
			'query_ocl' : $('#search_focus8').val(),
			'query_mfr' : $('#search_focus9').val(),
			'query_mpop' : $('#search_focus10').val(),
			'query_mage' : $('#search_focus11').val(),
			'query_mhincome' : $('#search_focus12').val(),
			'query_strate' : $('#search_focus13').val(),
			'query_pt_rate' : $('#search_focus14').val(),
			'query_inc_trate' : $('#search_focus15').val(),
			'query_mh_cost' : $('#search_focus16').val(),
			'query_ump_rate' : $('#search_focus17').val(),
			'query_vio_crime' : $('#search_focus18').val(),
			'query_prop_crime' : $('#search_focus19').val(),
			'query_ann_rain' : $('#search_focus20').val(),
			'query_ann_sno' : $('#search_focus21').val(),
			'query_ann_prpp' : $('#search_focus22').val(),
			'query_ann_sunn' : $('#search_focus23').val(),
			'query_ahigh_tem' : $('#search_focus24').val(),
			'query_alow_tem' : $('#search_focus25').val(),
			'query_air_qua' : $('#search_focus26').val(),
			'query_wat_qua' : $('#search_focus27').val(),
			'query_com_tm' : $('#search_focus28').val(),
			'query_dem' : $('#search_focus29').val(),
			'query_rep' : $('#search_focus30').val(),
			'query_bsc' : $('#search_focus31').val(),
			'query_grado' : $('#search_focus32').val(),
			'query_per_rel' : $('#search_focus33').val(),
			'search_center_town' : $('#search_center_town').val(),
			'search_range' : $('#search_range').val(),
  		};

  		localStorage.setItem("search_array", JSON.stringify(search_array));
  		
  		document.getElementById("listing_form_new").submit();
  	});
  });
</script>
@include("components/footer")