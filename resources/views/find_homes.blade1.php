@include("components/header1")
    <div id="select_search_container">
        <h1 style="font-weight: 700;">WHERE WOULD YOU LIKE TO FIND HOMES?</h1><br/><br/>
        <div class="row first_pop_up_section">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <form action="/view_real_estate" method="get" id="real_estate_form">
                    <input type="text" list="search1" name="city_home_search" id="city_home_search" class="no-search-select form-control" placeholder="Enter City or Zip Code" style="width:60%; float: left;" />
                    <datalist id="search1" name="search1" ></datalist>
                    <button type="button" data-toggle="modal" data-target="#homeinfoModal" class="btn btn-default" id="btn_find_home" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="row first_pop_up_section">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <form action="/view_match_table" method="get">
                    <input type="text" list="search1" name="county_home_search" id="county_home_search" class="no-search-select form-control" placeholder="Enter a county" style="width:60%; float: left;"/>
                    <datalist id="search1" name="search1" ></datalist>
                    <button type="submit" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="row first_pop_up_section">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <form action="/view_match_table" method="get">
                    <input type="text" list="search1" name="state_home_search" id="state_home_search" class="no-search-select form-control" placeholder="Enter a state" style="width:60%; float: left;"/>
                    <datalist id="search1" name="search1" ></datalist>
                    <button type="submit" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#btn_find_home").click(function(){
                var location = $("#city_home_search").val();
                if($("#city_home_search").val() == ""){
                    $("#homeinfoModal").modal("toggle");
                    Swal.fire("Error", "Please enter the location first!", "error");
                }
                $("#home_location_name").html(location);
            });
            $(".home_popup_bed").click(function(){
                var bed_count = $(this).attr("id");
                $("#hidden_bed_count").val(bed_count);
                $(".home_popup_bed").attr("style", "border: 1px solid #6C75A7");
                $(this).attr("style", "border:2px solid blue");
            });
            $(".home_popup_bath").click(function(){
                var bed_count = $(this).attr("id");
                $("#hidden_bath_count").val(bed_count);
                $(".home_popup_bath").attr("style", "border: 1px solid #6C75A7");
                $(this).attr("style", "border:2px solid blue");
            });


            $("#btn_submit_home").click(function(){
                var location = $("#city_home_search").val();
                var first_name = $("#home_fname").val();
                var last_name = $("#home_lname").val();
                var email = $("#home_email").val();
                var phone_number = "";
                if($("#hidden_session").val() == ""){
                    phone_number = $("#home_phone").val();
                }
                if(first_name == "" || last_name == "" || email == ""){
                    Swal.fire("error", "All fields are required!", "error");
                }
                var bedrooms = $("#hidden_bed_count").val();
                var bathrooms = $("#hidden_bath_count").val();
                if(bedrooms == "" || bathrooms == ""){
                    Swal.fire("error", "Please select number of bedrooms and bathrooms you want!", "error");
                }

                var home_type = [];
                if($("#check_houses").prop("checked") == true){
                    home_type.push($("#check_houses").val());
                }

                if($("#check_town_homes").prop("checked") == true){
                    home_type.push($("#check_town_homes").val());
                }

                if($("#check_multi_family").prop("checked") == true){
                    home_type.push($("#check_multi_family").val());
                }

                if($("#check_condos").prop("checked") == true){
                    home_type.push($("#check_condos").val());
                }

                if($("#check_land").prop("checked") == true){
                    home_type.push($("#check_land").val());
                }

                if($("#check_apartments").prop("checked") == true){
                    home_type.push($("#check_apartments").val());
                }

                if($("#check_manufactured").prop("checked") == true){
                    home_type.push($("#check_manufactured").val());
                }

                if($("#check_manufactured").prop("checked") == true){
                    home_type.push($("#check_manufactured").val());
                }

                var home_purpose = "";

                if($("#for_sale_radio").prop("checked") == true){
                    home_purpose = $("#for_sale_radio").val();
                }

                if($("#for_rent_radio").prop("checked") == true){
                    home_purpose = $("#for_rent_radio").val();
                }

                if($("#land_radio").prop("checked") == true){
                    home_purpose = $("#land_radio").val();
                }

                var min_price = $("#min_home_price").val();
                var max_price = $("#max_home_price").val();

                $.ajax({
                    url: "save_home_info",
                    method: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        location: location,
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        phone_number: phone_number,
                        bedrooms: bedrooms,
                        bathrooms: bathrooms,
                        home_type: home_type,
                        home_purpose: home_purpose,
                        min_price: min_price,
                        max_price: max_price
                    },
                    success:function(data){
                        $("#real_estate_form").submit();
                    }
                });
            });
        });
    </script>
@include("components/footer")