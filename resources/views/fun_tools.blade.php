@include("components/header1")

<div id="select_search_container">
    <h1 style="color: #697891;font-weight: 700;">Search Options</h1>
    <div class="row first_pop_up_section">
        <div class="col-lg-8">
            <h4 style="text-align: left;color: #697891;">I want to find top 10 cities</h4>
        </div>
        <div class="col-lg-4">
            <button type="button" onclick="window.location='/top10'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
        </div>
    </div>
    <div class="row first_pop_up_section">
        <div class="col-lg-8">
            <h4 style="text-align: left;color: #697891;">I want to play with fun tools</h4>
        </div>
        <div class="col-lg-4">
            <button type="button" onclick="window.location='/head_to_head'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
        </div>
    </div>
</div>


@include("components/footer")