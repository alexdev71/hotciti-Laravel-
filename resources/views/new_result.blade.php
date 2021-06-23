@include("components/header1")

<div id="new_result_container">
	<h2 style="text-align: left;">Now we are getting THERE!!!</h2>
	<div id="search_count_wrap">
		<h1>Your Search Resulted in: <strong>{{ $count }}</strong> matching Locations</h1>
	</div>
	<div id="btn_group_wrap">
		<form action="/refined_search" method="get">
			<button type="submit" class="header-search-button color-bg" id="btn_refine_search" style="position: relative;margin-right: 20px;"><i  class="fas fa-search"></i><span>Refine Search</span></button>
		</form>
		<button type="button" class="header-search-button color-bg" id="btn_new_bulk_csv" style="position: relative;margin-right: 20px;"><i  class="fas fa-download"></i><span>Download</span></button>
		
		<form action="/listing_new" method="post">
			@csrf
			<button type="submit" class="header-search-button color-bg" id="btn_view_location" style="position: relative;"><i  class="fas fa-eye"></i><span>View Locations</span></button>
		</form>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("#btn_new_bulk_csv").click(function(){
			
				new_bulk_csv();

		});
	});
</script>
@include("components/footer")