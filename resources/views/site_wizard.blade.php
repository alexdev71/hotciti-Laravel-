@include("components/header1")

<div class='container' id="site_wizard_container">
    <h1 style="color: #697891;font-weight: 700;">Welcome To Hotciti</h1>
    <div>
        We are here to help you find there!
        <br/>
        <br/>
        <div class="row first_pop_up_section">
            <div class="col-lg-5 col-md-12 card pb-4">
                <div class="card_header_icon"><i class="fas fa-search-location"></i></div>
                <div class="card-body">
                    <h5 class="card-title mt-4 mb-4" style="color: #697891;">I want to search for the locations that fit me.</h5>
                    <button type="button" onclick="window.location='/listing'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5 col-md-12 card pb-4">
                <div class="card_header_icon"><i class="fas fa-location"></i></div>
                <div class="card-body">
                    <h5 class="card-title mt-4 mb-4" style="color: #697891;">I want to explore a specific location (Stats, Maps, Real Estate. Amenities, Schools etc...)</h5>
                    <button type="button" onclick="window.location = 'city_find'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="row first_pop_up_section">
            <div class="col-lg-5 col-md-12 card pb-4">
                <div class="card_header_icon"><i class="fas fa-chart-bar"></i></div>
                <div class="card-body">
                    <h5 class="card-title mt-4 mb-4" style="color: #697891;">I want to do head to head comparisons of locations (Cost of Living, Politics, Weather etc...)</h5>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#compareModal" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5 col-md-12 card pb-4">
                <div class="card_header_icon"><i class="fas fa-blog"></i></div>
                <div class="card-body">
                    <h5 class="card-title mt-4 mb-4" style="color: #697891;">I want to learn more about locations in U.S. by reading Hotciti Blog.</h5>
                    <button type="button" onclick="window.location = 'https://blog.hotciti.com/'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="row first_pop_up_section">
            <div class="col-lg-5 col-md-12 card pb-4">
                <div class="card_header_icon"><i class="fab fa-forumbee"></i></i></div>
                <div class="card-body">
                    <h5 class="card-title mt-4 mb-4" style="color: #697891;">I want to talk to other relocation minded people in the Hotciti Forum.</h5>
                    <button type="button" onclick="window.location = 'https://forums.hotciti.com/'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5 col-md-12 card pb-4">
                <div class="card_header_icon"><i class="fas fa-tools"></i></div>
                <div class="card-body">
                    <h5 class="card-title mt-4 mb-4" style="color: #697891;">I want to play with some funs. Informative tools</h5>
                    <button type="button" onclick="window.location='/fun_tools'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
                </div>
            </div>
        </div>

    </div>
</div>

@include("components/footer")