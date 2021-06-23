@include("components/header")
<div id="premium_wrapper">
	<center><h1 style="color: #697891;font-weight: 800;">Get Smart, Premium</h1></center>
    <div class="row px-md-5" id="premium_plan">
        <div class="col-md-4 mt-3 card" style="height: 584px;padding-left: 0px; padding-right: 0px;">
            <div id="price_part" style="height:200px;background-color: skyblue;">
                <div class="section-title" style="padding-bottom: 0px;">
                    <h2>Daily</h2>
                </div>
                <div class="section-title">
                    <h2 id="daily_premium_price">$4.95</h2>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <button type="button" class="btn btn-primary" id="btn_daily_premium" data-toggle="modal" data-target="#register_modal">Upgrade<i class="fa fa-level-up" aria-hidden="true"></i></button>
                
            </div>

            <div style="margin-top: 40px;">
                <ul class="list-group list-group-flush" style="text-align: left;">
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Download CSV for Single Town</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Bulk CSV download for Specific Towns</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Premium Filter with Sliders</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Distance Search</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 card" style="height: 600px;padding-left: 0px; padding-right: 0px;">
            <div id="price_part" style="height:216px;background-color: lightgreen;">
                <div class="section-title" style="padding-bottom: 0px;">
                    <h2>Annual</h2>
                </div>
                <div class="section-title">
                    <h2 id="annual_premium_price">$89.95</h2>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <button type="button" class="btn btn-success" id="btn_annual_premium" data-toggle="modal" data-target="#register_modal">Upgrade<i class="fa fa-level-up" aria-hidden="true"></i></button>
                
            </div>
            <div style="margin-top: 40px;">
                <ul class="list-group list-group-flush" style="text-align: left;">
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Download CSV for Single Town</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Bulk CSV download for Specific Towns</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Premium Filter with Sliders</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Distance Search</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 mt-3 card" style="height: 584px;padding-left: 0px; padding-right: 0px;">
            <div id="price_part" style="height:200px;background-color: lightpink;">
                <div class="section-title" style="padding-bottom: 0px;">
                    <h2>Monthly</h2>
                </div>
                <div class="section-title">
                    <h2 id="monthly_premium_price">$8.95</h2>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <button type="button" class="btn btn-danger" id="btn_monthly_premium" data-toggle="modal" data-target="#register_modal">Upgrade<i class="fa fa-level-up" aria-hidden="true"></i></button>
            </div>
            <div style="margin-top: 40px;">
                <ul class="list-group list-group-flush" style="text-align: left;">
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Download CSV for Single Town</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Bulk CSV download for Specific Towns</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Premium Filter with Sliders</li>
                  <li class="list-group-item"><i class="fas fa-check mr-2" style="color:skyblue;"></i>Distance Search</li>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<center><h3 style="color: #697891;font-weight: 800;">Selected Plan will NOT automatically renew on a daily, monthly or annual basis</h3></center>

<script>
	$(document).ready(function (){
	$("#btn_monthly_premium").click(function(){
        $("input[name='premium_type']").val("monthly");
        $("input[name='payment_amount']").val("8.95");
     });

     $("#btn_daily_premium").click(function(){
        $("input[name='premium_type']").val("daily");
        $("input[name='payment_amount']").val("4.95");
     });

     $("#btn_annual_premium").click(function(){
        $("input[name='premium_type']").val("annual");
        $("input[name='payment_amount']").val("89.95");
     });
	});
</script>
@include("components/footer")