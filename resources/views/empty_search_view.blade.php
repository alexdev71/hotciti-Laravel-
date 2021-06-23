@include("components/header1")
<div class="big-container" style="padding-top: 150px; padding-bottom: 100px;">
	<div class="section-title">
		<center><h2>We have multiple locations to choose from. Please select from the list below.</h2></center>
	</div>
	<table id="table_view" class="table">
		<thead>
			<th>City</th>
			<th>State</th>
			<th>County</th>
			<th>Zip Code</th>
			
		</thead>
		<tbody>
			@foreach($results as $result)
			<tr>
				<td><a href="/singlelisting?ID={{ $result->ID }}" style="text-decoration: none;">{{ $result->City }}</a></td>
				<td>{{ $result->State }}</td>
				<td>{{ $result->County }}</td>
				<td>{{ $result->Zip_Code }}</td>
				
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script>
	$(document).ready(function(){
		$("#table_view").DataTable();
	});
</script>
@include("components/footer")