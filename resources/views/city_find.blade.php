@include("components/header1")

<div id="select_search_container">
    <h1 style="color: #697891;font-weight: 700;">Choose a location to explore:</h1>
    <div class="row first_pop_up_section">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <form action="/singlelisting" method="get" id="city_find_form" style="width: 100%;">
                <input type="text" list="search1" name="map-search1" id="main_search1" style="width: 100%;" class="no-search-select form-control" placeholder="Enter City or Zip Code"/>
                <datalist id="search1" name="search1" ></datalist>
            </form>
        </div>
    </div>
</div>

@include("components/footer")