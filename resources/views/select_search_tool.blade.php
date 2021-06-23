@include("components/header1")

<div id="select_search_container">
    <h1 style="color: #697891;font-weight: 700;">Search Options</h1>
    <div class="row first_pop_up_section">
        <div class="col-lg-8">
            <h4 style="text-align: left;color: #697891;">I want to use the search wizard (For Beginners)</h4>
        </div>
        <div class="col-lg-4">
            <button type="button" onclick="window.location='/search_wizard'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
        </div>
    </div>
    <div class="row first_pop_up_section">
        <div class="col-lg-8">
            <h4 style="text-align: left;color: #697891;">I want to use the Advanced Search tools (For serious research)</h4>
        </div>
        <div class="col-lg-4">
            <button type="button" onclick="window.location='/listing'" class="btn btn-default" style="background: #384F95;">Let's Do This<i class="far fa-search"></i></button>
        </div>
    </div>
</div>

@include("components/footer")