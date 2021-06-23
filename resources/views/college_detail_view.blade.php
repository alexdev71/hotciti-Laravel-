<!DOCTYPE html>
<html>
<head>
	<title>Hotciti</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
	<style>
		:root {
		  --star-size: 30px;
		  --star-color: #fff;
		  --star-background: #fc0;
		}

		.Stars {
		  --percent: calc(var(--rating) / 5 * 100%);
		  
		  display: inline-block;
		  font-size: var(--star-size);
		  font-family: Times; 
		  line-height: 1;
		  
		  
		}
		.Stars::before {
		    content: '★★★★★';
		    letter-spacing: 3px;
		    background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
		    -webkit-background-clip: text;
		    -webkit-text-fill-color: transparent;
		  }


	</style>
</head>
<body>
<div class="container-fluid">
	<div class="row" style="margin-top: 10px;">
		<div class="col-12">
			@foreach($college_data->content->blocks as $block)
				@if($block->template == "BlockPremiumEditorial")
					@foreach($block->buckets as $bucket)
						@if(!empty($bucket->contents))
							@if($bucket->contents[0]->template == "PremiumPhoto")
								<img src="{{ $bucket->contents[0]->photo }}" style="width: 100%;">
							@endif
						@endif
					@endforeach
				@endif
			@endforeach
		</div>
	</div>
	<div class="row" style="padding: 10px 0px;">
		<div class="col-lg-6">
			@foreach($college_data->content->blocks[0]->buckets as $bucket)
				@foreach($bucket->contents as $content)
					@if($content->template == "Photo")
						<img src="{{ $content->photos->mapbox_header->crops->DesktopHeader }}" style="width: 100%;height: 100vh;">
					@endif
				@endforeach
			@endforeach
		</div>
		<div class="col-lg-6">
			<div class="row">
				<div class="col-6">
					<a href="/"><img src="{{ asset('images/logo-dark.png') }}" style="width: 200px;"></a>
				</div>
				<div class="col-6">
					
				</div>
			</div><br>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-9">
							<h1 style="font-weight: 900;">{{ $college_data->content->entity_data->name }}</h1>
						</div>
						<div class="col-md-3">
							<h4 style="margin-top: 10px;">{{ $college_data->content->entity_data->type }}</h4>
						</div>
					</div><br/>
					<h6><i class="far fa-bookmark" style="margin-right: 10px;"></i>
						@foreach($college_data->content->blocks as $block)
							@if($block->template == "BlockTemplateTwo")
								@foreach($block->buckets as $bucket)
									@foreach($bucket->contents as $content)
										@if($content->template == "CompactAddress")
											{{ $content->value->Address }} {{ $content->value->City }} {{ $content->value->State }} {{ $content->value->ZipCode }}
										@endif
									@endforeach
								@endforeach
							@endif
						@endforeach
						
					</h6><br/>
					<h6>
						@foreach($college_data->content->blocks as $block)
							@if($block->template == "BlockPremiumEditorial")
								@foreach($block->buckets as $bucket)
									@if(!empty($bucket->contents))
										@if($bucket->contents[0]->template == "PremiumParagraph")
											{{ $bucket->contents[0]->blurb }}
										@endif
									@endif
								@endforeach
							@endif
						@endforeach
					</h6><br/>
					<div class="row">
						<div class="col-12">
							<button class="btn btn-default" style="width: 100%;height: 50px;background-color: white;border: 1px solid #2E3F6E;color: #2E3F6E;font-weight: 700;" data-toggle="modal" data-target="#questionModal">Contact Agent</button>
						</div>
						
					</div>
					
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<table class="table">
						<tbody>
							@foreach($college_data->content->blocks as $block)
								@if($block->template == "BlockTemplateReportCard")
									@foreach($block->buckets as $bucket)
										@if($bucket->template == "OrderedList")
											@foreach($bucket->contents as $content)
												<tr>
													<td style="width: 200px;">{{ $content->label }}</td>
													<td>
														<div class="row">
															<div class="col-3">
																<div class="Stars" style="--rating: {{ $content->value }};"></div>
															</div>
															<div class="col-3">
																{{ $content->value }}
															</div>
														</div>
														
													</td>
												</tr>
											@endforeach
										@endif
									@endforeach
								@endif
							@endforeach
						</tbody>
					</table>           
				</div>
			</div>
			<br/><br/>
		</div>
	</div>
	
</div>

</body>
</html>