<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PayPalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::post('/login', [HomeController::class, 'login']);
Route::post('/register', [HomeController::class, 'register']);
Route::get('/signout', [HomeController::class, 'signout']);
Route::get('/headersearch', [SearchController::class, 'headersearch']);
Route::post('/getPageMapData', [SearchController::class, 'getPageMapData']);
Route::post('/getsearchlist', [SearchController::class, 'getsearchlist']);
Route::get('/singlelisting', [SearchController::class, 'singlelisting']);
Route::post('/listing_update', [SearchController::class, 'listing_update']);
Route::get('/listing', [SearchController::class, 'listing']);
Route::post('/listing', [SearchController::class, 'listing']);
Route::post('/listing_new', [SearchController::class, 'listing_new']);
Route::post('/getstatelist', [SearchController::class, 'getstatelist']);
Route::post('/getcountylist', [SearchController::class, 'getcountylist']);
Route::post('/getlistingMapdata', [SearchController::class, 'getlistingMapdata']);
Route::post('/fetch_counter', [SearchController::class, 'fetch_counter']);
Route::post('/getcitylist', [SearchController::class, 'getcitylist']);
Route::post('/getnearestcity', [SearchController::class, 'getnearestcity']);
Route::post('/setfavorite', [HomeController::class, 'setfavorite']);
Route::get('/blog', function(){
	return view('blog');
});
Route::get('/test', function(){
    return view('test');
});
Route::post('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::post('/city_compare', [HomeController::class, 'city_compare']);
Route::get('/city_compare', [HomeController::class, 'city_compare']);
Route::post('/weather_compare', [HomeController::class, 'weather_compare']);
Route::get('/weather_compare', [HomeController::class, 'weather_compare']);
Route::post('/crime_compare', [HomeController::class, 'crime_compare']);
Route::get('/crime_compare', [HomeController::class, 'crime_compare']);
Route::post('/politics_compare', [HomeController::class, 'politics_compare']);
Route::get('/politics_compare', [HomeController::class, 'politics_compare']);
Route::post('/getcitystatecombine', [SearchController::class, 'getcitystatecombine']);
Route::post('/fetchgraph', [SearchController::class, 'fetchgraph']);
Route::post('/addreview', [HomeController::class, 'addreview']);
Route::get('/SingleCsvdata', [SearchController::class, 'SingleCsvdata']);
Route::post('/BulkCSVdownload', [SearchController::class, 'BulkCSVdownload']);
Route::get('/empty_search', [SearchController::class, 'empty_search']);
Route::get('/not_found', [SearchController::class, 'not_found']);
Route::get('/multi_search_result', [SearchController::class, 'multi_search_result']);
Route::post('/payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('/cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');;
Route::get('/payment/success', [PayPalController::class, 'success'])->name('payment.success');
Route::get('/premium_view', function(){
	return view('premium_view');
});
Route::post('/new_result', [SearchController::class, 'new_result']);
Route::get('/new_bulk_csv', [SearchController::class, 'new_bulk_csv']);
Route::get('/refined_search', [SearchController::class, 'refined_search']);
Route::get('/search_wizard', function(){
	if(Session::get("logged_in"))
    {
        $favs = DB::table("bestplaces")
                ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                ->where("fav.user_email", "=", Session::get("email"))
                ->get();
        return view("search_wizard")->with("favs", $favs);
    }
    else
        return view("search_wizard");
	
});

Route::post('/getCityMapdata', [SearchController::class, 'getCityMapdata']);
Route::get('/top10', [HomeController::class, 'top10']);
Route::post('/top10', [HomeController::class, 'top10']);
Route::get('/select_search_tool', function(){
	if(Session::get("logged_in"))
    {
        $favs = DB::table("bestplaces")
                ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                ->where("fav.user_email", "=", Session::get("email"))
                ->get();
        return view("select_search_tool")->with("favs", $favs);
    }
    else
        return view("select_search_tool");
	
});
Route::get('/city_find', function(){
	if(Session::get("logged_in"))
    {
        $favs = DB::table("bestplaces")
                ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                ->where("fav.user_email", "=", Session::get("email"))
                ->get();
        return view("city_find")->with("favs", $favs);
    }
    else
        return view("city_find");
	
});

Route::get('/site_wizard', function(){
	if(Session::get("logged_in"))
    {
        $favs = DB::table("bestplaces")
                ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                ->where("fav.user_email", "=", Session::get("email"))
                ->get();
        return view("site_wizard")->with("favs", $favs);
    }
    else
        return view("site_wizard");
});

Route::get('/fun_tools', function(){
	if(Session::get("logged_in"))
    {
        $favs = DB::table("bestplaces")
                ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                ->where("fav.user_email", "=", Session::get("email"))
                ->get();
        return view("fun_tools")->with("favs", $favs);
    }
    else
        return view("fun_tools");
	
});

Route::get('/head_to_head', function(){
	if(Session::get("logged_in"))
    {
        $favs = DB::table("bestplaces")
                ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                ->where("fav.user_email", "=", Session::get("email"))
                ->get();
        return view("head_to_head")->with("favs", $favs);
    }
    else
        return view("head_to_head");
	
});

Route::post('/head_to_head_compare', [HomeController::class, 'head_to_head_compare']);
Route::get('/pdfview', [HomeController::class, 'pdfview']);
Route::post('/removefav', [HomeController::class, 'removefav']);
Route::post('/town_report_form', [HomeController::class, 'town_report_form']);
// Route::get("/find_homes", function(){
    
//     if(Session::get("logged_in"))
//     {
//         $favs = DB::table("bestplaces")
//                 ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
//                 ->where("fav.user_email", "=", Session::get("email"))
//                 ->get();
//         return view("find_homes")->with("favs", $favs);
//     }
//     else
//         return view("find_homes");
// });
Route::get('/find_homes', [HomeController::class, 'find_homes']);
Route::post('/find_homes', [HomeController::class, 'find_homes']);
Route::get("/view_real_estate", [HomeController::class, 'view_real_estate']);
Route::get("/view_match_table", [HomeController::class, 'view_match_table']);
Route::get("/mortgage_calculator", function(){
    return view("mortgage_calculator");
});
Route::get("/moving_checklist", function(){
    return view("moving_checklist");
});

Route::post("/save_questions", [HomeController::class, 'save_questions']);
Route::post("/save_home_info", [HomeController::class, 'save_home_info']);
Route::get("/help_video_view", function(){
    return view("help_video_view");
});
Route::get("/location_home", [HomeController::class, 'location_home']);
Route::get("/home_detail_view", [HomeController::class, 'home_detail_view']);
Route::post("/gethomemapdata", [SearchController::class, 'gethomemapdata']);
Route::post("/getsinglehomemapdata", [SearchController::class, 'getsinglehomemapdata']);
Route::get('/find_schools', [HomeController::class, 'find_schools']);
Route::post('/find_schools', [HomeController::class, 'find_schools']);
Route::post('/getschoolmapdata', [SearchController::class, 'getschoolmapdata']);
Route::Get('/school_detail_view',[HomeController::class, 'school_detail_view']);
Route::post('/home_appointment', [HomeController::class, 'home_appointment']);
Route::get('/distance_search', function(){
    return view('distance_search');
});

Route::get('/gun_laws',[HomeController::class,'gun_laws']);
Route::get('/street_view',[HomeController::class, 'street_view']);
Route::get('/find_homes_for_rent',[HomeController::class, 'find_homes_for_rent']);
Route::post("/getrenthomemapdata", [HomeController::class, 'getrenthomemapdata']);
Route::post("/getsinglerenthomemapdata", [SearchController::class, 'getsinglerenthomemapdata']);
Route::get("/rent_home_detail_view",[HomeController::class, 'rent_home_detail_view']);
Route::get("/find_hotels",[HomeController::class, "find_hotels"]);
Route::post("/gethotelsmapdata",[HomeController::class, "gethotelsmapdata"]);
Route::get("/hotel_detail_view",[HomeController::class, "hotel_detail_view"]);
Route::get("/find_colleges", [HomeController::class, "find_colleges"]);
Route::get("/college_detail_view",[HomeController::class, "college_detail_view"]);
Route::post("/getcollegesmapdata",[HomeController::class, "getcollegesmapdata"]);
Route::post("/listing_advanced",[SearchController::class, "listing_advanced"]);
Route::get("/listing_advanced",[SearchController::class, "listing_advanced"]);
Route::post("/listing_update_advanced",[SearchController::class, "listing_update_advanced"]);
Route::post("/fetch_counter_advanced",[SearchController::class, "fetch_counter_advanced"]);
Route::post("/getlistingMapdata_advanced",[SearchController::class, "getlistingMapdata_advanced"]);