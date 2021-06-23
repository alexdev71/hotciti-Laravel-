<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
class SearchController extends Controller
{
    public function headersearch(Request $request){
    	$search_key = str_replace(", ", " ", $request->map_search11);
    	$select_bestplaces = DB::table("bestplaces")
    							->where("City_State_Combined", "=", $search_key)
    							->limit(50)
    							->get();
    	if(count($select_bestplaces) == 0){
    		return redirect("empty_search");
    	}
    	foreach($select_bestplaces as $bestplace){
    		$id = $bestplace->ID;
    		$image_link = $bestplace->Picture_Links;
    		$email = Session::get("email");
    		$scores = DB::table("rev")
    					->where("IDD", "=", $id)
    					->avg("score");
    		$review_counts = DB::table("rev")
    					->where("IDD", "=", $id)
    					->count("email");
    	}
    	// print_r($select_bestplaces);
    	if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("searchview")->with("bestplaces", $select_bestplaces)->with("scores", $scores)->with("review_counts", $review_counts)->with("email", Session::get("email"))->with("searchkey", $search_key)->with("favs", $favs);
        }
        else
            return view("searchview")->with("bestplaces", $select_bestplaces)->with("scores", $scores)->with("review_counts", $review_counts)->with("email", Session::get("email"))->with("searchkey", $search_key);
    }

    public function getPageMapData(Request $request){
    	$search_key = $request->query1;
    	$results = DB::table("bestplaces")
    				->where("City_State_Combined", "=", $search_key)
    				->get();
    	
    		echo json_encode($results);
    	
    }


    public function getsearchlist(Request $request){
    	$output = Array();
    	$search_key = $request->input("query");
    	$search_key = "";
    	$city = "";
    	$zip_code = "";
    	$state = "";
    	$region = "";
    	$county = "";
    	$nearest_city = "";
    	$query_multi_state = "";
    	if($request->has("query")){
    		$search_key = $request->input("query");
    	}
    	if($request->has("query1")){
    		$zip_code = $request->input("query1");
    	}
    	if($request->has("query2")){
    		$zip_code = $request->input("query2");
    	}
    	if($request->has("query3")){
    		$state = $request->input("query3");
    	}
    	if($request->has("query_region")){
    		$region = $request->input("query_region");
    	}
    	if($request->has("query_county")){
    		$county = $request->input("query_county");
    	}
    	if($request->has("query_nmc")){
    		$nearest_city = $request->input("query_nmc");
    	}
    	if($request->has('query_multi_state')){
    		$query_multi_state = $request->input('query_multi_state');
    	}
    	$query = "SELECT City_State_Combined FROM bestplaces WHERE 1";

    	if($search_key != ""){
            if(is_numeric($search_key) != 1){
                $query .= " AND City_State_Combined like '".$search_key."%'";
            }
            else{
                $query .= " AND Zip_Code like '".$search_key."%'";
            }
    		
    	}
    	if($city != ""){
    		$query .= " AND City like '".$city."%'";
    	}
    	if($zip_code != ""){
    		$query .= " AND Zip_Code = '".$zip_code."'";
    	}
    	if($county != ""){
    		$query .= " AND County = '".$county."'";
    	}
    	if($region != ""){
    		$query .= " AND Region = '".$region."'";
    	}
    	if($nearest_city != ""){
    		$query .= " AND Nearest_Major_City = '".$nearest_city."'";
    	}
    	if($state != ""){
    		$query .= " AND (State = '".$state."'";
    	}
    	
    	if($query_multi_state != '' && $query_multi_state != 'State'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					if($state != ''){
						$query .= ' OR State = "'.$state_array[$i].'" ';
					}
					else{
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'" ';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'" ';
						}
					}
					
					
				}
			}
			else{
				if($query3 != ''){
					$query .= ' OR State = "'.$query_multi_state.'" ';
				}
				else{
					$query .= ' AND (State = "'.$query_multi_state.'" ';
				}
				
			}
		}

		if(strpos($query, ")") !== false){
			$query .= ") GROUP BY City";
		}else{
			$query .= " GROUP BY City";
		}

		$query .= " LIMIT 25";
    	// echo $query;
    	// $results = DB::table("city")
    	// 			->select("City")
    	// 			->where("City", "like", "%".$search_key."%")
    	// 			->limit(25)
    	// 			->get();
    	$results = DB::select($query);
    	if(count($results) != 0){
	    	foreach($results as $result)
			{
			    array_push($output, $result->City_State_Combined);
			}
            echo json_encode($output);
		}else{
			$output = 'City Not Found';
            echo $output;
		}
		
    }

    public function singlelisting(Request $request){
    	$map_search1 = "";
    	$map_search_keys = Array();
    	
    	$space_count = 0;
    	$map_search1 = $request->input("map-search1");
    	if($request->has("ID")){
    		array_push($map_search_keys, "", "");
    	}else{
    		if(is_numeric($map_search1) != 1)
    		{
    			if(strpos($map_search1, ", ")){
		    		$map_search_keys = (explode(", ", $map_search1));
		    	}else if(strpos($map_search1, " ")){
		    		// $map_search_keys = (explode(" ", $map_search1));
		    		$space_count = substr_count($map_search1, " ");
		    		if($space_count == 1){
		    			$map_search_keys = (explode(" ", $map_search1));
		    		}
		    		else if($space_count == 2){
		    			$second_pos = strpos($map_search1, ' ', strpos($map_search1, ' ') + 1);
		    			$state_abb = substr($map_search1, $second_pos);
		    			if(strlen($state_abb) == 3){
		    				$map_search_keys[0] = substr($map_search1, 0, $second_pos);
							$map_search_keys[1] = substr($map_search1, $second_pos+1);
		    			}
		    			else{
		    				$pos = strpos($map_search1, ' ');
			    			$map_search_keys[0] = substr($map_search1, 0, $pos);
							$map_search_keys[1] = substr($map_search1, $pos+1);
		    			}
		    		}
		    		else if($space_count == 3){
			    		$pos = strpos($map_search1, ' ', strpos($map_search1, ' ') + 1);
			    		$map_search_keys[0] = substr($map_search1, 0, $pos);
						$map_search_keys[1] = substr($map_search1, $pos+1);
			    	}
		    	}
		    	else{
		    		return redirect("/not_found?key1=".$map_search1);
		    	}
    		}
    		else{
    			$map_search_keys[0] = "";
    			$map_search_keys[1] = "";
    		}
	    }

        if($space_count > 3){
            $total_visits = DB::table("bestplaces")
                            ->select("visits")
                            ->where("ID", $request->input("ID"))
                            ->orwhere("City_State_Combined", $map_search1)
                            ->get();
        }
        else{
            $total_visits = DB::table("bestplaces")
                     ->select("visits")
                     ->where("ID", $request->input("ID"))
                     ->orWhere([["City", "=", $map_search_keys[0]], ["State", "=", $map_search_keys[1]]])
                     ->orWhere([["City", "=", $map_search_keys[0]], ["State_Abbreviated", "=", $map_search_keys[1]],])
                     ->orWhere("Zip_Code", $map_search1)
                     ->get();
        }
    	
        	    

	    if(empty($total_visits[0]))
	    {
	    	if($request->input("map-search1") == "")
	    	{
	    		return redirect("/empty_search");
	    	}
	    	else
	    	{
	    		if($map_search_keys[0] != "" && $map_search_keys[1] != ""){
		    		$pos = strpos($map_search_keys[1], ' ');
		    		$map_search_keys[0] = $map_search_keys[0] . " " . substr($map_search_keys[1], 0, $pos);
		    		$map_search_keys[1] = substr($map_search_keys[1], $pos + 1);

		    		$total_visits = DB::table("bestplaces")
    					->select("visits")
	    				->where("ID", $request->input("ID"))
	    				->orWhere([["City", "=", $map_search_keys[0]], ["State", "=", $map_search_keys[1]]])
	    				->orWhere([["City", "=", $map_search_keys[0]], ["State_Abbreviated", "=", $map_search_keys[1]],])
	    				->orWhere("Zip_Code", $map_search1)
	    				->get();
	    			if(empty($total_visits[0])){
	    				return redirect("/not_found?key1=".$map_search1);
	    			}
		    	}
		    	else{
		    		return redirect("/not_found?key1=".$map_search1);
		    	}
	    	}
	    }
	    if(count($total_visits) > 1)
	    {
	    	return redirect("/multi_search_result?key=".$map_search1);
	    }
	    foreach($total_visits as $total_visit){
	    	$visit = $total_visit->visits + 1;
	    }
        if($space_count > 3){
            $update = DB::table("bestplaces")
                        ->where("ID", $request->input("ID"))
                        ->orWhere("City_State_Combined", $map_search1)
                        ->update(["visits" => $visit]);
            $results = DB::table("bestplaces")
                        ->where("ID", $request->input("ID"))
                        ->orWhere("City_State_Combined", $map_search1)
                        ->get();
        }
        else{
            $update = DB::table("bestplaces")
                        ->where("ID", $request->input("ID"))
                        ->orWhere([["City", "=", $map_search_keys[0]], ["State", "=", $map_search_keys[1]]])
                        ->orWhere([["City", "=", $map_search_keys[0]], ["State_Abbreviated", "=", $map_search_keys[1]],])
                        ->orWhere("Zip_Code", $map_search1)
                        ->update(["visits" => $visit]);
            $results = DB::table("bestplaces")
                        ->where("ID", $request->input("ID"))
                        ->orWhere([["City", "=", $map_search_keys[0]], ["State", "=", $map_search_keys[1]]])
                        ->orWhere([["City", "=", $map_search_keys[0]], ["State_Abbreviated", "=", $map_search_keys[1]],])
                        ->orWhere("Zip_Code", $map_search1)
                        ->get();
        }
    	
    	foreach($results as $result){
    		$row = $result;
    	}
    	if($request->has("ID")){
    		$ID = $request->input("ID");
    	}else{
    		$search_key = $map_search1;
            if($space_count > 3){
                $get_IDs = DB::table("bestplaces")
                            ->select("ID")
                            ->orWhere("City_State_Combined", $map_search1)
                            ->get();
            }
            else{
                $get_IDs = DB::table("bestplaces")
                            ->select("ID")
                            ->orWhere([["City", "=", $map_search_keys[0]], ["State", "=", $map_search_keys[1]]])
                            ->orWhere([["City", "=", $map_search_keys[0]], ["State_Abbreviated", "=", $map_search_keys[1]],])   
                            ->orWhere("Zip_Code", $map_search1)
                            ->get();
            }
    		
    		foreach($get_IDs as $get_ID){
    			$ID = $get_ID->ID;
    		}
    	}
    	$num_ros = DB::table("fav")
    				->where("IDD", $ID)
    				->count("IDD");
    	$avg_score = DB::select("select cast(avg(score) as decimal(10,1)) as AverageRating from rev where IDD=".$ID.";");
    	$num_rate = DB::table("rev")
    				->where("IDD", $ID)
    				->count("IDD");
    	$rev_array = Array();
    	array_push($rev_array, $num_ros);
    	array_push($rev_array, $avg_score[0]->AverageRating);
    	array_push($rev_array, $num_rate);
    	$reviews = DB::table("rev")
    				->where("IDD", $ID)
    				->get();



        $locations = DB::select("SELECT City_State_Combined FROM bestplaces WHERE ID = ".$ID);

        foreach($locations as $location){
            $location_home = str_replace(" township","",$location->City_State_Combined);
        }
        $location1 = str_replace(" ", "+", $location_home);
        // echo $location1;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://zillow.vercel.app/api/search?query='.$location1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
            'x-vercel-cache: MISS',
            'x-vercel-id: arn1::iad1::cqdqq-1619482511519-16db4d85f556'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        $homes_for_slider = Array();
        if(is_object($response)){
            foreach($response->searchResults->listResults as $home){
                array_push($homes_for_slider, $home);
            }
        }
        
    	if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("singlelisting")->with("row", $row)->with("ID", $ID)->with("email", Session::get("email"))->with("rev_array", $rev_array)->with("favs", $favs)->with("reviews", $reviews)->with("homes", $homes_for_slider);
        }
        else
            return view("singlelisting")->with("row", $row)->with("ID", $ID)->with("email", Session::get("email"))->with("rev_array", $rev_array)->with("reviews", $reviews)->with("homes", $homes_for_slider);
    }


    public function getstatelist(Request $request){
    	$output = Array();
    	$search_key = $request->input("query");
    	$query = "SELECT State FROM bestplaces WHERE 1";
    	$search_key = "";
    	$city = "";
    	$zip_code = "";
    	$region = "";
    	$county = "";
    	$nearest_city = "";
    	if($request->has("query")){
    		$search_key = $request->input("query");
    	}
    	if($request->has("query1")){
    		$city = $request->input("query1");
    	}
    	if($request->has("query2")){
    		$zip_code = $request->input("query2");
    	}

    	if($request->has("query_region")){
    		$region = $request->input("query_region");
    	}
    	if($request->has("query_county")){
    		$county = $request->input("query_county");
    	}
    	if($request->has("query_nmc")){
    		$nearest_city = $request->input("query_nmc");
    	}

    	if($search_key != ""){
    		$query .= " AND State like '".$search_key."%'";
    	}
    	if($city != ""){
    		$query .= " AND City = '".$city."'";
    	}
    	if($zip_code != ""){
    		$query .= " AND Zip_Code = '".$zip_code."'";
    	}
    	if($county != ""){
    		$query .= " AND County = '".$county."'";
    	}
    	if($region != ""){
    		$query .= " AND Region = '".$region."'";
    	}
    	if($nearest_city != ""){
    		$query .= " AND Nearest_Major_City = '".$nearest_city."'";
    	}
    	$query .= " GROUP BY State";
    	// echo $query;
    	$results = DB::select($query);
    	if(count($results) != 0){
	    	foreach($results as $result)
			{
			    array_push($output, $result->State);
			}
		}else{
			$output .= 'State Not Found';
		}
		echo json_encode($output);
    }

    public function getcountylist(Request $request){
    	$output = Array();
    	$search_key = $request->input("query");
    	$search_key = "";
    	$city = "";
    	$zip_code = "";
    	$state = "";
    	$region = "";
    	$county = "";
    	$nearest_city = "";
    	$query_multi_state = "";
    	if($request->has("query")){
    		$search_key = $request->input("query");
    	}
    	if($request->has("query2")){
    		$zip_code = $request->input("query2");
    	}
    	if($request->has("query3")){
    		$state = $request->input("query3");
    	}
    	if($request->has("query_region")){
    		$region = $request->input("query_region");
    	}
    	if($request->has("query_county")){
    		$city = $request->input("query_city");
    	}
    	if($request->has("query_nmc")){
    		$nearest_city = $request->input("query_nmc");
    	}
    	if($request->has('query_multi_state')){
    		$query_multi_state = $request->input('query_multi_state');
    	}
    	$query = "SELECT County FROM bestplaces WHERE 1";
    	if($search_key != ""){
    		$query .= " AND County like '".$search_key."%'";
    	}
    	if($city != ""){
    		$query .= " AND City = '".$city."'";
    	}
    	if($zip_code != ""){
    		$query .= " AND Zip_Code = '".$zip_code."'";
    	}
    	if($region != ""){
    		$query .= " AND Region = '".$region."'";
    	}
    	if($nearest_city != ""){
    		$query .= " AND Nearest_Major_City = '".$nearest_city."'";
    	}
    	if($state != "" && ($query_multi_state != '' && $query_multi_state != 'State')){
            $query .= " AND (State = '".$state."'";
        }
        else if($state != "" && ($query_multi_state != '' || $query_multi_state != 'State')){
            $query .= " AND State = '".$state."'";
        }
    	
    	if($query_multi_state != '' && $query_multi_state != 'State'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					if($state != ''){
						$query .= ' OR State = "'.$state_array[$i].'" ';
					}
					else{
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'" ';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'" ';
						}
					}
					
					
				}
			}
			else{
				if($query3 != ''){
					$query .= ' OR State = "'.$query_multi_state.'" ';
				}
				else{
					$query .= ' AND (State = "'.$query_multi_state.'" ';
				}
				
			}
            $query .= ")";
		}
		
		$query .= " GROUP BY County";
		

		$query .= " LIMIT 25";
    	// echo $query;
    	// $results = DB::table("city")
    	// 			->select("City")
    	// 			->where("City", "like", "%".$search_key."%")
    	// 			->limit(25)
    	// 			->get();
    	$results = DB::select($query);
    	if(count($results) != 0){
	    	foreach($results as $result)
			{
			    array_push($output, $result->County);
			}
            echo json_encode($output);
		}else{
			$output = 'County Not Found';
            echo $output;
		}
		
    }

    public function listing(Request $request){
    	$search_box = '';
    	$search_box1 = '';
    	$search_box2 = '';

    	if($request->has('search_box')){
    		$search_box = $request->input("search_box");
    	}
    	if($request->has('search_box1')){
    		$search_box1 = $request->input("search_box1");
    	}
    	if($request->has('search_box2')){
    		$search_box2 = $request->input("search_box2");
    	}
    	$search_box_array = Array();
    	array_push($search_box_array, $search_box, $search_box1, $search_box2);
    	$states = DB::select("SELECT * FROM state");
    	if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("listing")->with("favs", $favs)->with("search_box_array", $search_box_array)->with("states", $states);
        }
    	return view("listing")->with("search_box_array", $search_box_array)->with("states", $states);
    }

    public function listing_advanced(Request $request){
    	$states = DB::select("SELECT * FROM state");
    	if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("listing_advanced")->with("favs", $favs)->with("states", $states);
        }
    	return view("listing_advanced")->with("states", $states);
    }

    public function listing_update(Request $request){
    	$query1 = '';
    	$query2 = '';
    	$query3 = '';
    	$query_region = '';
    	$query_county = '';
    	$query_pop_0 = '';
    	$query_pop = '';
    	$query_nmc = '';
    	$query_ocl = '';
    	$query_mfr = '';
    	$query_mpop = '';
    	$query_mage = '';
    	$query_mhincome = '';
    	$query_strate = '';
    	$query_pt_rate = '';
    	$query_inc_trate = '';
    	$query_mh_cost = '';
    	$query_ump_rate = '';
    	$query_vio_crime = '';
    	$query_prop_crime = '';
    	$query_ann_rain = '';
    	$query_ann_sno = '';
    	$query_ann_prpp = '';
    	$query_ann_sunn = '';
    	$query_ahigh_tem = '';
    	$query_alow_tem = '';
    	$query_air_qua = '';
    	$query_wat_qua = '';
    	$query_com_tm = '';
    	$query_dem = '';
    	$query_rep = '';
    	$query_bsc = '';
    	$query_grado = '';
    	$query_per_rel = '';
    	$query_center_town = '';
    	$query_search_range = '';

    	if($request->has('sortt')){
    		$sortt = $request->input('sortt');
    	}else{
    		$sortt = 'default';
    	}
    	$array = Array();
		$query1= $request->input('query1');
		$query2= $request->input('query2');
		$query3= $request->input('query3');
		$query_region= $request->input('query_region');
		$query_county= $request->input('query_county');
		$query_pop_0= str_replace(",","",$request->input('query_pop_0'));
		$query_pop= str_replace(",","",$request->input('query_pop'));
		$query_nmc= $request->input('query_nmc');
		$query_ocl= $request->input('query_ocl');
		$query_mfr= $request->input('query_mfr');
		$query_mpop= $request->input('query_mpop');
		$query_mage= $request->input('query_mage');
		$query_mhincome= $request->input('query_mhincome');
		$query_strate= $request->input('query_strate');
		$query_pt_rate= $request->input('query_pt_rate');
		$query_inc_trate= $request->input('query_inc_trate');
		$query_mh_cost= $request->input('query_mh_cost');
		$query_ump_rate= $request->input('query_ump_rate');
		$query_vio_crime= $request->input('query_vio_crime');
		$query_prop_crime= $request->input('query_prop_crime');
		$query_ann_rain= $request->input('query_ann_rain');
		$query_ann_sno= $request->input('query_ann_sno');
		$query_ann_prpp= $request->input('query_ann_prpp');
		$query_ann_sunn= $request->input('query_ann_sunn');
		$query_ahigh_tem= $request->input('query_ahigh_tem');
		$query_alow_tem= $request->input('query_alow_tem');
		$query_air_qua= $request->input('query_air_qua');

		$query_wat_qua= $request->input('query_wat_qua');
		$query_com_tm= $request->input('query_com_tm');
		$query_dem= $request->input('query_dem');
		$query_rep= $request->input('query_rep');
		$query_bsc= $request->input('query_bsc');
		$query_grado= $request->input('query_grado');
		$query_per_rel= $request->input('query_per_rel');

		$query_center_town = $request->input('search_center_town');
		$query_search_range = $request->input('search_range');

		$query_multi_state = $request->input('multi_state');

		$data = Array();
		$ocl=(explode(";",$query_ocl));
		$mfr=(explode(";",$query_mfr));
		$mpop=(explode(";",$query_mpop));
		$mage=(explode(";",$query_mage));
		$mhincome=(explode(";",$query_mhincome));
		$strate=(explode(";",$query_strate));
		$pt_rate=(explode(";",$query_pt_rate));
		$inc_trate=(explode(";",$query_inc_trate));
		$mh_cost=(explode(";",$query_mh_cost));
		$ump_rate=(explode(";",$query_ump_rate));
		$vio_crime=(explode(";",$query_vio_crime));
		$prop_crime=(explode(";",$query_prop_crime));
		$ann_rain=(explode(";",$query_ann_rain));
		$ann_sno=(explode(";",$query_ann_sno));
		$ann_prpp=(explode(";",$query_ann_prpp));
		$ann_sunn=(explode(";",$query_ann_sunn));
		$ahigh_tem=(explode(";",$query_ahigh_tem));
		$alow_tem=(explode(";",$query_alow_tem));
		$air_qua=(explode(";",$query_air_qua));

		$wat_qua=(explode(";",$query_wat_qua));
		$com_tm=(explode(";",$query_com_tm));
		$dem=(explode(";",$query_dem));
		$rep=(explode(";",$query_rep));
		$bsc=(explode(";",$query_bsc));
		$grado=(explode(";",$query_grado));
		$per_rel=(explode(";",$query_per_rel));


    	$query = "SELECT bestplaces.*, COUNT(email) AS NumberOf, CAST(AVG(score) AS DECIMAL(10, 1)) AS AverageRating FROM bestplaces LEFT JOIN rev on rev.IDD = bestplaces.ID WHERE 1 " ;

		if($query1 != '' )
		{
		 $query .= ' AND City = "'.$query1.'" ';
		}
		if($query2 != '' )
		{
		 $query .= ' AND Zip_Code = "'.$query2.'" ';
		}
		if($query3 != '' && ($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'))
		{
		 $query .= ' AND (State = "'.$query3.'" ';
		}
        else if($query3 != '' && ($query_multi_state != '' || $query_multi_state != 'State' || $query_multi_state != 'Nothing selected')){
            $query .= ' AND State = "'.$query3.'" ';
        }
		if($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					if($query3 != ''){
						$query .= ' OR State = "'.$state_array[$i].'" ';
					}
					else{
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'"';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'"';
						}
					}
					
					
				}
			}
			else{
				if($query3 != ''){
					$query .= ' OR State = "'.$query_multi_state.'"';
				}
				else{
					$query .= ' AND (State = "'.$query_multi_state.'"';
				}
				
			}
            $query .= ")";
		}
		if($query_region != '' )
		{
		 $query .= ' AND Region = "'.$query_region.'" ';
		}
		if($query_county != '' )
		{
		 $query .= ' AND County = "'.$query_county.'" ';
		}
		if($query_nmc != '' )
		{
		 $query .= ' AND Nearest_Major_City = "'.$query_nmc.'" ';
		}
		if($query_ocl != '')
		{
		 $query .= ' AND Overall_Cost_Of_Living BETWEEN "'.$ocl[0].'" AND "'.$ocl[1].'" ';
		}
		if($query_pop != '' )
		{
		     $query .= ' AND Population BETWEEN "'.$query_pop_0.'" AND "'.$query_pop.'" ';
		}
		if($query_mfr != '' )
		{
		    $query .= ' AND Male_Population BETWEEN "'.$mfr[0].'" AND "'.$mfr[1].'" ';
		}
		if($query_mpop != '')
		{
		 $query .= ' AND Married_Population BETWEEN "'.$mpop[0].'" AND "'.$mpop[1].'" ';
		}
		if($query_mage != '' )
		{
		 $query .= ' AND Median_Age BETWEEN "'.$mage[0].'" AND "'.$mage[1].'" ';
		}
		if($query_mhincome != '' )
		{
		   $query .= ' AND Household_Income BETWEEN "'.$mhincome[0].'" AND "'.$mhincome[1].'" ';
		}
		if($query_strate != '' )
		{
		  $query .= ' AND Sales_Taxes BETWEEN "'.$strate[0].'" AND "'.$strate[1].'" ';
		}
		if($query_pt_rate != '' )
		{
		  $query .= ' AND Property_Tax_Rate BETWEEN "'.$pt_rate[0].'" AND "'.$pt_rate[1].'" ';
		}
		if($query_inc_trate != '' )
		{
		 $query .= ' AND Income_Taxes BETWEEN "'.$inc_trate[0].'" AND "'.$inc_trate[1].'" ';
		}
		if($query_mh_cost != '' )
		{
		 $query .= ' AND Median_Home_Cost BETWEEN "'.$mh_cost[0].'" AND "'.$mh_cost[1].'" ';
		}

		if($query_ump_rate != '' )
		{
		  $query .= ' AND Unemployment_Rate BETWEEN "'.$ump_rate[0].'" AND "'.$ump_rate[1].'" ';
		}
		if($query_vio_crime != '' )
		{
		  $query .= ' AND Violent_Crime BETWEEN "'.$vio_crime[0].'" AND "'.$vio_crime[1].'" ';
		}
		if($query_prop_crime != '' )
		{
		  $query .= ' AND Property_Crime BETWEEN "'.$prop_crime[0].'" AND "'.$prop_crime[1].'" ';
		}
		if($query_ann_rain != '' )
		{
		  $query .= ' AND Rainfall_in_ BETWEEN "'.$ann_rain[0].'" AND "'.$ann_rain[1].'" ';
		}
		if($query_ann_sno != '' )
		{
		 $query .= ' AND Snowfall_in_ BETWEEN "'.$ann_sno[0].'" AND "'.$ann_sno[1].'" ';
		}
		if($query_ann_prpp != '' )
		{
		 $query .= ' AND Precipitation_Days BETWEEN "'.$ann_prpp[0].'" AND "'.$ann_prpp[1].'" ';
		}
		if($query_ann_sunn != '' )
		{
		 $query .= ' AND Sunny_Days BETWEEN "'.$ann_sunn[0].'" AND "'.$ann_sunn[1].'" ';
		}
		if($query_ahigh_tem != '' )
		{
		 $query .= ' AND Avg__July_High BETWEEN "'.$ahigh_tem[0].'" AND "'.$ahigh_tem[1].'" ';
		}
		if($query_alow_tem != '' )
		{
		  $query .= ' AND Avg__Jan__Low BETWEEN "'.$alow_tem[0].'" AND "'.$alow_tem[1].'" ';
		}
		if($query_air_qua != '' )
		{
		 $query .= ' AND Air_Quality BETWEEN "'.$air_qua[0].'" AND "'.$air_qua[1].'" ';
		}
		if($query_wat_qua != '' )
		{
		  $query .= ' AND Water_Quality_Score BETWEEN "'.$wat_qua[0].'" AND "'.$wat_qua[1].'" ';
		}
		if($query_com_tm != '' )
		{
		 $query .= ' AND Commute_Time BETWEEN "'.$com_tm[0].'" AND "'.$com_tm[1].'" ';
		}
		if($query_dem != '' )
		{
		  $query .= ' AND Democrat BETWEEN "'.$dem[0].'" AND "'.$dem[1].'" ';
		}
		if($query_rep != '' )
		{
		  $query .= ' AND Republican BETWEEN "'.$rep[0].'" AND "'.$rep[1].'" ';
		}
		if($query_bsc != '' )
		{
		   $query .= ' AND a4_yr_College_Grad_ BETWEEN "'.$bsc[0].'" AND "'.$bsc[1].'" ';
		}
		if($query_grado != '' )
		{
		$query .= ' AND Graduate_Degrees  BETWEEN "'.$grado[0].'" AND "'.$grado[1].'"  ';
		}

		if($query_per_rel != '' )
		{
		   $query .= ' AND Percent_Religious BETWEEN "'.$per_rel[0].'" AND "'.$per_rel[1].'" ';
		}


		if($query_center_town != '' && $query_search_range != ''){
			$query_search_range_temp = $query_search_range / 54.6;
			$query .= ' AND ABS(Latitude - (SELECT Latitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <= '.$query_search_range_temp.' AND ABS(Longitude - (SELECT Longitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <=  '.$query_search_range_temp.' ';
		}
		$query .= " GROUP BY bestplaces.ID ";
		//$query .= 'ORDER BY City ASC ';
		if($sortt === 'populationH') {
		    $query .= ' ORDER BY Population DESC ';
		}
		if($sortt === 'populationL') {
		    $query .= ' ORDER BY Population ASC ';
		}
		if($sortt === 'snowH') {
		    $query .= ' ORDER BY Snowfall_in_ DESC ';
		}
		if($sortt === 'snowL') {
		    $query .= ' ORDER BY Snowfall_in_ ASC ';
		}
		if($sortt === 'livingcostH') {
		    $query .= ' ORDER BY Overall_Cost_Of_Living DESC ';
		}
		if($sortt === 'livingcostL') {
		    $query .= ' ORDER BY Overall_Cost_Of_Living ASC ';
		}
		if($sortt === 'violentcrimeH') {
		    $query .= ' ORDER BY Violent_Crime DESC ';
		}
		if($sortt === 'violentcrimeL') {
		    $query .= ' ORDER BY Violent_Crime ASC ';
		}
        if($sortt === 'med_homecostH') {
		    $query .= ' ORDER BY Median_Home_Cost DESC ';
		}
		if($sortt === 'med_homecostL') {
		    $query .= ' ORDER BY Median_Home_Cost ASC ';
		}
		if($sortt === 'registered_democratH') {
		    $query .= ' ORDER BY Democrat DESC ';
		}
		if($sortt === 'registered_democratL') {
		    $query .= ' ORDER BY Democrat ASC ';
		}
		if($sortt === 'registered_republicanH') {
		    $query .= ' ORDER BY Republican DESC ';
		}
		if($sortt === 'registered_republicanL') {
		    $query .= ' ORDER BY Republican ASC ';
		}
		if($sortt === 'sunny_daysH') {
		    $query .= ' ORDER BY Sunny_Days DESC ';
		}
		if($sortt === 'sunny_daysL') {
		    $query .= ' ORDER BY Sunny_Days ASC ';
		}
		if($sortt === 'high_temperatureH') {
		    $query .= ' ORDER BY Avg__July_High DESC ';
		}
		if($sortt === 'high_temperatureL') {
		    $query .= ' ORDER BY Avg__July_High ASC ';
		}
		if($sortt === 'commute_timeH') {
		    $query .= ' ORDER BY Commute_Time DESC ';
		}
		if($sortt === 'commute_timeL') {
		    $query .= ' ORDER BY Commute_Time ASC ';
		}
		if($sortt === 'default'){
			$query .= ' ORDER BY City ASC ';
		}
		$limit_number = "10";
		if($request->has("limit_number")){
			$limit_number = $request->input("limit_number");
		}
		$query .= ' LIMIT 0,'.$limit_number;

		// echo $query;
		// echo $query;
		$results = DB::select($query);
		$email = Session::get("email");
		

		echo json_encode($results);
    }

    public function listing_update_advanced(Request $request){
    	
    	if($request->has('sortt')){
    		$sortt = $request->input('sortt');
    	}else{
    		$sortt = 'default';
    	}
    	$array = Array();
		$check_city = "";
		$check_city_neighbour = "";
		$check_suburbs = "";
		$check_towns = "";
		$check_very_conservative = "";
		$check_conservative = "";
		$check_balanced = "";
		$check_liberal = "";
		$check_very_liberal = "";
		$cost_living_1 = "";
		$cost_living_2 = "";
		$cost_living_3 = "";
		$cost_living_4 = "";
		$crime_1 = "";
		$crime_2 = "";
		$crime_3 = "";
		$crime_4 = "";
		$home_cost_1 = "";
		$home_cost_2 = "";
		$home_cost_3 = "";
		$home_cost_4 = "";
		$male_female_ratio = "";
		$weather_ratio = "";
		$single_ratio = "";
		if($request->has("male_female_ratio")){
    		$male_female_ratio = $request->input("male_female_ratio");
    	}
    	if($request->has("weather_ratio")){
    		$weather_ratio = $request->input("weather_ratio");
    	}
    	if($request->has("single_ratio")){
    		$single_ratio = $request->input("single_ratio");
    	}
    	if($request->has("check_city")){
    		$check_city = $request->input("check_city");
    	}
    	if($request->has("check_city_neighbour")){
    		$check_city_neighbour = $request->input("check_city_neighbour");
    	}
    	if($request->has("check_suburbs")){
    		$check_suburbs = $request->input("check_suburbs");
    	}
    	if($request->has("check_towns")){
    		$check_towns = $request->input("check_towns");
    	}

    	if($request->has("check_very_conservative")){
    		$check_very_conservative = $request->input("check_very_conservative");
    	}

    	if($request->has("check_conservative")){
    		$check_conservative = $request->input("check_conservative");
    	}

    	if($request->has("check_balanced")){
    		$check_balanced = $request->input("check_balanced");
    	}
    	if($request->has("check_liberal")){
    		$check_liberal = $request->input("check_liberal");
    	}
		if($request->has("check_very_liberal")){
    		$check_very_liberal = $request->input("check_very_liberal");
    	}
    	if($request->has("cost_living_1")){
    		$cost_living_1 = $request->input("cost_living_1");
    	}

    	if($request->has("cost_living_2")){
    		$cost_living_2 = $request->input("cost_living_2");
    	}
    	if($request->has("cost_living_3")){
    		$cost_living_3 = $request->input("cost_living_3");
    	}
		if($request->has("cost_living_4")){
    		$cost_living_4 = $request->input("cost_living_4");
    	}

    	if($request->has("crime_1")){
    		$crime_1 = $request->input("crime_1");
    	}

    	if($request->has("crime_2")){
    		$crime_2 = $request->input("crime_2");
    	}
    	if($request->has("crime_3")){
    		$crime_3 = $request->input("crime_3");
    	}
		if($request->has("crime_4")){
    		$crime_4 = $request->input("crime_4");
    	}

    	if($request->has("home_cost_1")){
    		$home_cost_1 = $request->input("home_cost_1");
    	}

    	if($request->has("home_cost_2")){
    		$home_cost_2 = $request->input("home_cost_2");
    	}
    	if($request->has("home_cost_3")){
    		$home_cost_3 = $request->input("home_cost_3");
    	}
		if($request->has("home_cost_4")){
    		$home_cost_4 = $request->input("home_cost_4");
    	}

		$query_multi_state = $request->input('multi_state');

		$data = Array();
		


    	$query = "SELECT bestplaces.*, COUNT(email) AS NumberOf, CAST(AVG(score) AS DECIMAL(10, 1)) AS AverageRating FROM bestplaces LEFT JOIN rev on rev.IDD = bestplaces.ID WHERE 1 " ;

		if($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'"';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'"';
						}
					
					
				}
			}
			else{

				$query .= ' AND (State = "'.$query_multi_state.'"';				
			}
            $query .= ")";
		}
		
		if($check_city != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population > 100000) ";
			}else{
				$query .= " AND ((Population > 100000) ";
			}
			
		}

		if($check_city_neighbour != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 50000 AND 99999) ";
			}else{
				$query .= " AND ((Population BETWEEN 50000 AND 99999) ";
			}
			
		}

		if($check_suburbs != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 10000 AND 49999) ";
			}else{
				$query .= " AND ((Population BETWEEN 10000 AND 49999) ";
			}
			
		}

		if($check_towns != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 0 AND 9999) ";
			}else{
				$query .= " AND ((Population BETWEEN 0 AND 9999) ";
			}
			
		}
		if(strpos($query, "Population") !== false){
			$query .= ")";
		}
		
		if($check_very_conservative != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 75 AND 100) ";
			}else{
				$query .= " AND ((Republican BETWEEN 75 AND 100) ";
			}
			
		}

		if($check_conservative != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 60 AND 74.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 60 AND 74.9) ";
			}
			
		}

		if($check_balanced != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 50 AND 59.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 50 AND 59.9) ";
			}
			
		}

		if($check_liberal != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 25.1 AND 49.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 25.1 AND 49.9) ";
			}
			
		}

		if($check_very_liberal != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 0 AND 25) ";
			}else{
				$query .= " AND ((Republican BETWEEN 0 AND 25) ";
			}
			
		}
		if(strpos($query, "Republican") !== false){
			$query .= ")";
		}
		if($cost_living_1 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 0 AND 50) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 0 AND 50) ";
			}
			
		}

		if($cost_living_2 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 50.1 AND 90) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 50.1 AND 90) ";
			}
			
		}

		if($cost_living_3 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 90.1 AND 105) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 90.1 AND 105) ";
			}
			
		}

		if($cost_living_4 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living > 105) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living > 105) ";
			}
			
		}
		if(strpos($query, "Overall_Cost_Of_Living") !== false){
			$query .= ")";
		}
		if($crime_1 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 0 AND 2) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 0 AND 2) ";
			}
			
		}

		if($crime_2 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 3 AND 4) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 3 AND 4) ";
			}
			
		}

		if($crime_3 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 5 AND 6) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 5 AND 6) ";
			}
			
		}

		if($crime_4 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 7 AND 10) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 7 AND 10) ";
			}
			
		}
		if(strpos($query, "Violent_Crime") !== false){
			$query .= ")";
		}
		if($home_cost_1 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 0 AND 50000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 0 AND 50000) ";
			}
			
		}

		if($home_cost_2 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 50001 AND 100000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 50001 AND 100000) ";
			}
			
		}

		if($home_cost_3 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 100001 AND 200000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 100001 AND 200000) ";
			}
			
		}

		if($home_cost_4 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost > 200000) ";
			}else{
				$query .= " AND ((Median_Home_Cost > 200000) ";
			}
			
		}
		if(strpos($query, "Median_Home_Cost") !== false){
			$query .= ")";
		}
		
		if($male_female_ratio != ""){
			$query .= " AND CEILING(Female_Population) = ".$male_female_ratio." ";
		}

		if($weather_ratio != ""){
			$query .= " AND CEILING(Snowfall_in_) = ".$weather_ratio." ";
		}

		if($single_ratio != ""){
			$query .= " AND CEILING(Married_Population) = ".$single_ratio." ";
		}

		$query .= " GROUP BY bestplaces.ID ";
		//$query .= 'ORDER BY City ASC ';
		if($sortt === 'populationH') {
		    $query .= ' ORDER BY Population DESC ';
		}
		if($sortt === 'populationL') {
		    $query .= ' ORDER BY Population ASC ';
		}
		if($sortt === 'snowH') {
		    $query .= ' ORDER BY Snowfall_in_ DESC ';
		}
		if($sortt === 'snowL') {
		    $query .= ' ORDER BY Snowfall_in_ ASC ';
		}
		if($sortt === 'livingcostH') {
		    $query .= ' ORDER BY Overall_Cost_Of_Living DESC ';
		}
		if($sortt === 'livingcostL') {
		    $query .= ' ORDER BY Overall_Cost_Of_Living ASC ';
		}
		if($sortt === 'violentcrimeH') {
		    $query .= ' ORDER BY Violent_Crime DESC ';
		}
		if($sortt === 'violentcrimeL') {
		    $query .= ' ORDER BY Violent_Crime ASC ';
		}
        if($sortt === 'med_homecostH') {
		    $query .= ' ORDER BY Median_Home_Cost DESC ';
		}
		if($sortt === 'med_homecostL') {
		    $query .= ' ORDER BY Median_Home_Cost ASC ';
		}
		if($sortt === 'registered_democratH') {
		    $query .= ' ORDER BY Democrat DESC ';
		}
		if($sortt === 'registered_democratL') {
		    $query .= ' ORDER BY Democrat ASC ';
		}
		if($sortt === 'registered_republicanH') {
		    $query .= ' ORDER BY Republican DESC ';
		}
		if($sortt === 'registered_republicanL') {
		    $query .= ' ORDER BY Republican ASC ';
		}
		if($sortt === 'sunny_daysH') {
		    $query .= ' ORDER BY Sunny_Days DESC ';
		}
		if($sortt === 'sunny_daysL') {
		    $query .= ' ORDER BY Sunny_Days ASC ';
		}
		if($sortt === 'high_temperatureH') {
		    $query .= ' ORDER BY Avg__July_High DESC ';
		}
		if($sortt === 'high_temperatureL') {
		    $query .= ' ORDER BY Avg__July_High ASC ';
		}
		if($sortt === 'commute_timeH') {
		    $query .= ' ORDER BY Commute_Time DESC ';
		}
		if($sortt === 'commute_timeL') {
		    $query .= ' ORDER BY Commute_Time ASC ';
		}
		if($sortt === 'default'){
			$query .= ' ORDER BY City ASC ';
		}
		$limit_number = "10";
		if($request->has("limit_number")){
			$limit_number = $request->input("limit_number");
		}
		$query .= ' LIMIT 0,'.$limit_number;

		// echo $query;
		// echo $query;
		$results = DB::select($query);
		$email = Session::get("email");
		

		echo json_encode($results);
    }

    public function listing_new(Request $request){
    	$query1 = '';
    	$query2 = '';
    	$query3 = '';
    	$query_region = '';
    	$query_county = '';
    	$query_pop_0 = '';
    	$query_pop = '';
    	$query_nmc = '';
    	$query_ocl = '';
    	$query_mfr = '';
    	$query_mpop = '';
    	$query_mage = '';
    	$query_mhincome = '';
    	$query_strate = '';
    	$query_pt_rate = '';
    	$query_inc_trate = '';
    	$query_mh_cost = '';
    	$query_ump_rate = '';
    	$query_vio_crime = '';
    	$query_prop_crime = '';
    	$query_ann_rain = '';
    	$query_ann_sno = '';
    	$query_ann_prpp = '';
    	$query_ann_sunn = '';
    	$query_ahigh_tem = '';
    	$query_alow_tem = '';
    	$query_air_qua = '';
    	$query_wat_qua = '';
    	$query_com_tm = '';
    	$query_dem = '';
    	$query_rep = '';
    	$query_bsc = '';
    	$query_grado = '';
    	$query_per_rel = '';
    	$query_center_town = '';
    	$query_search_range = '';
    	if($request->has('sortt')){
    		$sortt = $request->input('sortt');
    	}else{
    		$sortt = 'default';
    	}
    	$array = Array();
    		$query1= $request->input('search_focus1');
			$query2= $request->input('search_focus2');
			$query3= $request->input('search_focus3');
			$query_region= $request->input('search_focus4');
			$query_county= $request->input('search_focus5');
			$query_pop_0= str_replace(",","",$request->input('search_focus6_0'));
			$query_pop= str_replace(",","",$request->input('search_focus6'));
			$query_nmc= $request->input('search_focus7');
			$query_ocl= $request->input('search_focus8');
			$query_mfr= $request->input('search_focus9');
			$query_mpop= $request->input('search_focus10');
			$query_mage= $request->input('search_focus11');
			$query_mhincome= $request->input('search_focus12');
			$query_strate= $request->input('search_focus13');
			$query_pt_rate= $request->input('search_focus14');
			$query_inc_trate= $request->input('search_focus15');
			$query_mh_cost= $request->input('search_focus16');
			$query_ump_rate= $request->input('search_focus17');
			$query_vio_crime= $request->input('search_focus18');
			$query_prop_crime= $request->input('search_focus19');
			$query_ann_rain= $request->input('search_focus20');
			$query_ann_sno= $request->input('search_focus21');
			$query_ann_prpp= $request->input('search_focus22');
			$query_ann_sunn= $request->input('search_focus23');
			$query_ahigh_tem= $request->input('search_focus24');
			$query_alow_tem= $request->input('search_focus25');
			$query_air_qua= $request->input('search_focus26');

			$query_wat_qua= $request->input('search_focus27');
			$query_com_tm= $request->input('search_focus28');
			$query_dem= $request->input('search_focus29');
			$query_rep= $request->input('search_focus30');
			$query_bsc= $request->input('search_focus31');
			$query_grado= $request->input('search_focus32');
			$query_per_rel= $request->input('search_focus33');

			$query_center_town = $request->input('search_center_town');
			$query_search_range = $request->input('search_range');



			$data = Array();
			$ocl=(explode(";",$query_ocl));
			$mfr=(explode(";",$query_mfr));
			$mpop=(explode(";",$query_mpop));
			$mage=(explode(";",$query_mage));
			$mhincome=(explode(";",$query_mhincome));
			$strate=(explode(";",$query_strate));
			$pt_rate=(explode(";",$query_pt_rate));
			$inc_trate=(explode(";",$query_inc_trate));
			$mh_cost=(explode(";",$query_mh_cost));
			$ump_rate=(explode(";",$query_ump_rate));
			$vio_crime=(explode(";",$query_vio_crime));
			$prop_crime=(explode(";",$query_prop_crime));
			$ann_rain=(explode(";",$query_ann_rain));
			$ann_sno=(explode(";",$query_ann_sno));
			$ann_prpp=(explode(";",$query_ann_prpp));
			$ann_sunn=(explode(";",$query_ann_sunn));
			$ahigh_tem=(explode(";",$query_ahigh_tem));
			$alow_tem=(explode(";",$query_alow_tem));
			$air_qua=(explode(";",$query_air_qua));

			$wat_qua=(explode(";",$query_wat_qua));
			$com_tm=(explode(";",$query_com_tm));
			$dem=(explode(";",$query_dem));
			$rep=(explode(";",$query_rep));
			$bsc=(explode(";",$query_bsc));
			$grado=(explode(";",$query_grado));
			$per_rel=(explode(";",$query_per_rel));

    	


    	$query = "SELECT bestplaces.*, COUNT(email) AS NumberOf, CAST(AVG(score) AS DECIMAL(10, 1)) AS AverageRating FROM bestplaces LEFT JOIN rev on rev.IDD = bestplaces.ID WHERE 1 " ;

		if($query1 != '' )
		{
		 $query .= ' AND City = "'.$query1.'" ';
		}
		if($query2 != '' )
		{
		 $query .= ' AND Zip_Code = "'.$query2.'" ';
		}
		if($query3 != '' )
		{
		 $query .= ' AND State = "'.$query3.'" ';
		}

		if($query_region != '' )
		{
		 $query .= ' AND Region = "'.$query_region.'" ';
		}
		if($query_county != '' )
		{
		 $query .= ' AND County = "'.$query_county.'" ';
		}
		if($query_nmc != '' )
		{
		 $query .= ' AND Nearest_Major_City = "'.$query_nmc.'" ';
		}
		if($query_ocl != '')
		{
		 $query .= ' AND Overall_Cost_Of_Living BETWEEN "'.$ocl[0].'" AND "'.$ocl[1].'" ';
		}
		if($query_pop != '' )
		{
		     $query .= ' AND Population BETWEEN "'.$query_pop_0.'" AND "'.$query_pop.'" ';
		}
		if($query_mfr != '' )
		{
		    $query .= ' AND Male_Population BETWEEN "'.$mfr[0].'" AND "'.$mfr[1].'" ';
		}
		if($query_mpop != '')
		{
		 $query .= ' AND Married_Population BETWEEN "'.$mpop[0].'" AND "'.$mpop[1].'" ';
		}
		if($query_mage != '' )
		{
		 $query .= ' AND Median_Age BETWEEN "'.$mage[0].'" AND "'.$mage[1].'" ';
		}
		if($query_mhincome != '' )
		{
		   $query .= ' AND Household_Income BETWEEN "'.$mhincome[0].'" AND "'.$mhincome[1].'" ';
		}
		if($query_strate != '' )
		{
		  $query .= ' AND Sales_Taxes BETWEEN "'.$strate[0].'" AND "'.$strate[1].'" ';
		}
		if($query_pt_rate != '' )
		{
		  $query .= ' AND Property_Tax_Rate BETWEEN "'.$pt_rate[0].'" AND "'.$pt_rate[1].'" ';
		}
		if($query_inc_trate != '' )
		{
		 $query .= ' AND Income_Taxes BETWEEN "'.$inc_trate[0].'" AND "'.$inc_trate[1].'" ';
		}
		if($query_mh_cost != '' )
		{
		 $query .= ' AND Median_Home_Cost BETWEEN "'.$mh_cost[0].'" AND "'.$mh_cost[1].'" ';
		}

		if($query_ump_rate != '' )
		{
		  $query .= ' AND Unemployment_Rate BETWEEN "'.$ump_rate[0].'" AND "'.$ump_rate[1].'" ';
		}
		if($query_vio_crime != '' )
		{
		  $query .= ' AND Violent_Crime BETWEEN "'.$vio_crime[0].'" AND "'.$vio_crime[1].'" ';
		}
		if($query_prop_crime != '' )
		{
		  $query .= ' AND Property_Crime BETWEEN "'.$prop_crime[0].'" AND "'.$prop_crime[1].'" ';
		}
		if($query_ann_rain != '' )
		{
		  $query .= ' AND Rainfall_in_ BETWEEN "'.$ann_rain[0].'" AND "'.$ann_rain[1].'" ';
		}
		if($query_ann_sno != '' )
		{
		 $query .= ' AND Snowfall_in_ BETWEEN "'.$ann_sno[0].'" AND "'.$ann_sno[1].'" ';
		}
		if($query_ann_prpp != '' )
		{
		 $query .= ' AND Precipitation_Days BETWEEN "'.$ann_prpp[0].'" AND "'.$ann_prpp[1].'" ';
		}
		if($query_ann_sunn != '' )
		{
		 $query .= ' AND Sunny_Days BETWEEN "'.$ann_sunn[0].'" AND "'.$ann_sunn[1].'" ';
		}
		if($query_ahigh_tem != '' )
		{
		 $query .= ' AND Avg__July_High BETWEEN "'.$ahigh_tem[0].'" AND "'.$ahigh_tem[1].'" ';
		}
		if($query_alow_tem != '' )
		{
		  $query .= ' AND Avg__Jan__Low BETWEEN "'.$alow_tem[0].'" AND "'.$alow_tem[1].'" ';
		}
		if($query_air_qua != '' )
		{
		 $query .= ' AND Air_Quality BETWEEN "'.$air_qua[0].'" AND "'.$air_qua[1].'" ';
		}
		if($query_wat_qua != '' )
		{
		  $query .= ' AND Water_Quality_Score BETWEEN "'.$wat_qua[0].'" AND "'.$wat_qua[1].'" ';
		}
		if($query_com_tm != '' )
		{
		 $query .= ' AND Commute_Time BETWEEN "'.$com_tm[0].'" AND "'.$com_tm[1].'" ';
		}
		if($query_dem != '' )
		{
		  $query .= ' AND Democrat BETWEEN "'.$dem[0].'" AND "'.$dem[1].'" ';
		}
		if($query_rep != '' )
		{
		  $query .= ' AND Republican BETWEEN "'.$rep[0].'" AND "'.$rep[1].'" ';
		}
		if($query_bsc != '' )
		{
		   $query .= ' AND a4_yr_College_Grad_ BETWEEN "'.$bsc[0].'" AND "'.$bsc[1].'" ';
		}
		if($query_grado != '' )
		{
		$query .= ' AND Graduate_Degrees  BETWEEN "'.$grado[0].'" AND "'.$grado[1].'"  ';
		}

		if($query_per_rel != '' )
		{
		   $query .= ' AND Percent_Religious BETWEEN "'.$per_rel[0].'" AND "'.$per_rel[1].'" ';
		}

		if(Session::get("search_region_key") != ""){
    		$query .= " AND Region = '".Session::get("search_region_key")."' ";
    	}

    	if(Session::get("search_state_key") != ""){
    		$query .= " AND State = '".Session::get("search_state_key")."' ";
    	}

    	if(Session::get("search_county_key") != ""){
    		$query .= " AND County = '".Session::get("search_county_key")."' ";
    	}

		if($query_center_town != '' && $query_search_range != ''){
			$query_search_range_temp = $query_search_range / 54.6;
			$query .= ' AND ABS(Latitude - (SELECT Latitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <= '.$query_search_range_temp.' AND ABS(Longitude - (SELECT Longitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <=  '.$query_search_range_temp.' ';
		}
		$query .= "GROUP BY bestplaces.ID ";
		//$query .= 'ORDER BY City ASC ';
		if($sortt === 'populationH') {
		    $query .= ' ORDER BY Population DESC ';
		}
		if($sortt === 'populationL') {
		    $query .= ' ORDER BY Population ASC ';
		}
		if($sortt === 'snowH') {
		    $query .= ' ORDER BY Snowfall_in_ DESC ';
		}
		if($sortt === 'snowL') {
		    $query .= ' ORDER BY Snowfall_in_ ASC ';
		}
		if($sortt === 'livingcostH') {
		    $query .= ' ORDER BY Overall_Cost_Of_Living DESC ';
		}
		if($sortt === 'livingcostL') {
		    $query .= ' ORDER BY Overall_Cost_Of_Living ASC ';
		}
		if($sortt === 'violentcrimeH') {
		    $query .= ' ORDER BY Violent_Crime DESC ';
		}
		if($sortt === 'violentcrimeL') {
		    $query .= ' ORDER BY Violent_Crime ASC ';
		}
        if($sortt === 'med_homecostH') {
		    $query .= ' ORDER BY Median_Home_Cost DESC ';
		}
		if($sortt === 'med_homecostL') {
		    $query .= ' ORDER BY Median_Home_Cost ASC ';
		}
		if($sortt === 'registered_democratH') {
		    $query .= ' ORDER BY Democrat DESC ';
		}
		if($sortt === 'registered_democratL') {
		    $query .= ' ORDER BY Democrat ASC ';
		}
		if($sortt === 'registered_republicanH') {
		    $query .= ' ORDER BY Republican DESC ';
		}
		if($sortt === 'registered_republicanL') {
		    $query .= ' ORDER BY Republican ASC ';
		}
		if($sortt === 'sunny_daysH') {
		    $query .= ' ORDER BY Sunny_Days DESC ';
		}
		if($sortt === 'sunny_daysL') {
		    $query .= ' ORDER BY Sunny_Days ASC ';
		}
		if($sortt === 'high_temperatureH') {
		    $query .= ' ORDER BY Avg__July_High DESC ';
		}
		if($sortt === 'high_temperatureL') {
		    $query .= ' ORDER BY Avg__July_High ASC ';
		}
		if($sortt === 'commute_timeH') {
		    $query .= ' ORDER BY Commute_Time DESC ';
		}
		if($sortt === 'commute_timeL') {
		    $query .= ' ORDER BY Commute_Time ASC ';
		}
		if($sortt === 'default'){
			$query .= ' ORDER BY City ASC ';
		}
		$results_for_count = DB::select($query);
		// echo $query;
		$query .= 'LIMIT 0,50';
		// echo  Session::get("city_counter");
		$results = DB::select($query);
		$count = count($results_for_count);
		
		$email = Session::get("email");
		$array = [
			"query1"=>$query1,
			"query2"=>$query2,
			"query3"=>$query3,
			"query_region"=>$query_region,
			"query_county"=>$query_county,
			"query_pop_0"=>$query_pop_0,
			"query_pop"=>$query_pop,
			"query_nmc"=>$query_nmc,
			"query_ocl"=>$query_ocl,
			"query_mfr"=>$query_mfr,
			"query_mpop"=>$query_mpop,
			"query_mage"=>$query_mage,
			"query_mhincome"=>$query_mhincome,
			"query_strate"=>$query_strate,
			"query_pt_rate"=>$query_pt_rate,
			"query_inc_trate"=>$query_inc_trate,
			"query_mh_cost"=>$query_mh_cost,
			"query_ump_rate"=>$query_ump_rate,
			"query_vio_crime"=>$query_vio_crime,
			"query_prop_crime"=>$query_prop_crime,
			"query_ann_rain"=>$query_ann_rain,
			"query_ann_sno"=>$query_ann_sno,
			"query_ann_prpp"=>$query_ann_prpp,
			"query_ann_sunn"=>$query_ann_sunn,
			"query_ahigh_tem"=>$query_ahigh_tem,
			"query_alow_tem"=>$query_alow_tem,
			"query_air_qua"=>$query_air_qua,
			"query_wat_qua"=>$query_wat_qua,
			"query_com_tm"=>$query_com_tm,
			"query_dem"=>$query_dem,
			"query_rep"=>$query_rep,
			"query_bsc"=>$query_bsc,
			"query_grado"=>$query_grado,
			"query_per_rel"=>$query_per_rel,
			"search_range"=>$query_search_range,
			"search_center_town"=>$query_center_town,
			"sortt"=>$sortt,
		];
		if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("listing_new")->with("results", $results)->with("email", $email)->with("array", $array)->with("favs", $favs)->with("count", $count);
        }
        else
            return view("listing_new")->with("results", $results)->with("email", $email)->with("array", $array)->with("count", $count);
    }

    public function getlistingMapdata(Request $request){

    	$data = Array();

		$ocl=(explode(";",$request->input('query_ocl')));
		$mfr=(explode(";",$request->input('query_mfr')));
		$mpop=(explode(";",$request->input('query_mpop')));
		$mage=(explode(";",$request->input('query_mage')));
		$mhincome=(explode(";",$request->input('query_mhincome')));
		$strate=(explode(";",$request->input('query_strate')));
		$pt_rate=(explode(";",$request->input('query_pt_rate')));
		$inc_trate=(explode(";",$request->input('query_inc_trate')));
		$mh_cost=(explode(";",$request->input('query_mh_cost')));

		$ump_rate=(explode(";",$request->input('query_ump_rate')));
		$vio_crime=(explode(";",$request->input('query_vio_crime')));
		$prop_crime=(explode(";",$request->input('query_prop_crime')));
		$ann_rain=(explode(";",$request->input('query_ann_rain')));
		$ann_sno=(explode(";",$request->input('query_ann_sno')));

		$ann_prpp=(explode(";",$request->input('query_ann_prpp')));
		$ann_sunn=(explode(";",$request->input('query_ann_sunn')));
		$ahigh_tem=(explode(";",$request->input('query_ahigh_tem')));
		$alow_tem=(explode(";",$request->input('query_alow_tem')));
		$air_qua=(explode(";",$request->input('query_air_qua')));

		$wat_qua=(explode(";",$request->input('query_wat_qua')));
		$com_tm=(explode(";",$request->input('query_com_tm')));
		$dem=(explode(";",$request->input('query_dem')));
		$rep=(explode(";",$request->input('query_rep')));
		$bsc=(explode(";",$request->input('query_bsc')));
		$grado=(explode(";",$request->input('query_grado')));
		$per_rel=(explode(";",$request->input('query_per_rel')));
		$query_center_town = $request->input('search_center_town');
		$query_search_range = $request->input('search_range');
        $query_multi_state = $request->input('multi_state');
		$query = "SELECT * FROM bestplaces WHERE 1  ";

		if($request->input('query1') != '' )
		{
		 $query .= ' AND City = "'.$request->input('query1').'" ';
		}
		if($request->input('query2') != '' )
		{
		 $query .= ' AND Zip_Code = "'.$request->input('query2').'" ';
		}
		if($request->input('query3') != '' && ($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'))
        {
         $query .= ' AND (State = "'.$request->input('query3').'" ';
        }
        else if($request->input('query3') != '' && ($query_multi_state != '' || $query_multi_state != 'State' || $query_multi_state != 'Nothing selected')){
            $query .= ' AND State = "'.$request->input('query3').'" ';
        }
        if($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'){
            if(strpos($query_multi_state, ", ") !== false){
                $state_array = explode(", ", $query_multi_state);
                for($i = 0; $i < count($state_array); $i++){
                    if($request->input('query3') != ''){
                        $query .= ' OR State = "'.$state_array[$i].'"';
                    }
                    else{
                        if($i == 0){
                            $query .= ' AND (State = "'.$state_array[$i].'"';
                        }else{
                            $query .= ' OR State = "'.$state_array[$i].'"';
                        }
                    }
                    
                    
                }
            }
            else{
                if($request->input('query3') != ''){
                    $query .= ' OR State = "'.$query_multi_state.'"';
                }
                else{
                    $query .= ' AND (State = "'.$query_multi_state.'"';
                }
                
            }
            $query .= ")";
        }

		if($request->input('query_region') != '' )
		{
		 $query .= ' AND Region = "'.$request->input('query_region').'" ';
		}
		if($request->input('query_county') != '' )
		{
		 $query .= ' AND County = "'.$request->input('query_county').'" ';
		}
		if($request->input('query_pop') != '' )
		{
		 $query .= ' AND Population BETWEEN "'.$request->input('query_pop_0').'" AND "'.$request->input('query_pop').'" ';
		}
		if($request->input('query_nmc') != '' )
		{
		 $query .= ' AND Nearest_Major_City = "'.$request->input('query_nmc').'" ';
		}
		if($request->input('query_ocl') != '' )
		{
		  $query .= ' AND Overall_Cost_Of_Living BETWEEN "'.$ocl[0].'" AND "'.$ocl[1].'" ';
		}
		if($request->input('query_mfr') != '' )
		{
		    $query .= ' AND Male_Population BETWEEN "'.$mfr[0].'" AND "'.$mfr[1].'" ';
		}
		if($request->input('query_mpop') != '' )
		{
		 $query .= ' AND Married_Population BETWEEN "'.$mpop[0].'" AND "'.$mpop[1].'" ';
		}
		if($request->input('query_mage') != '' )
		{
		 $query .= ' AND Median_Age BETWEEN "'.$mage[0].'" AND "'.$mage[1].'" ';
		}

		if($request->input('query_mhincome') != '' )
		{
		    $query .= ' AND Household_Income BETWEEN "'.$mhincome[0].'" AND "'.$mhincome[1].'" ';
		}
		if($request->input('query_strate') != '' )
		{
		   $query .= ' AND Sales_Taxes BETWEEN "'.$strate[0].'" AND "'.$strate[1].'" ';
		}
		if($request->input('query_pt_rate') != '' )
		{
		  $query .= ' AND Property_Tax_Rate BETWEEN "'.$pt_rate[0].'" AND "'.$pt_rate[1].'" ';
		}
		if($request->input('query_inc_trate') != '' )
		{
		   $query .= ' AND Income_Taxes BETWEEN "'.$inc_trate[0].'" AND "'.$inc_trate[1].'" ';
		}
		if($request->input('query_mh_cost') != '' )
		{
		   $query .= ' AND Median_Home_Cost BETWEEN "'.$mh_cost[0].'" AND "'.$mh_cost[1].'" ';
		}
		if($request->input('query_ump_rate') != '' )
		{
		    $query .= ' AND Unemployment_Rate BETWEEN "'.$ump_rate[0].'" AND "'.$ump_rate[1].'" ';
		}
		if($request->input('query_vio_crime') != '' )
		{
		    $query .= ' AND Violent_Crime BETWEEN "'.$vio_crime[0].'" AND "'.$vio_crime[1].'" ';
		}
		if($request->input('query_prop_crime') != '' )
		{
		   $query .= ' AND Property_Crime BETWEEN "'.$prop_crime[0].'" AND "'.$prop_crime[1].'" ';
		}
		if($request->input('query_ann_rain') != '' )
		{
		    $query .= ' AND Rainfall_in_ BETWEEN "'.$ann_rain[0].'" AND "'.$ann_rain[1].'" ';
		}
		if($request->input('query_ann_sno') != '' )
		{
		   $query .= ' AND Snowfall_in_ BETWEEN "'.$ann_sno[0].'" AND "'.$ann_sno[1].'" ';
		}
		if($request->input('query_ann_prpp') != '' )
		{
		  $query .= ' AND Precipitation_Days BETWEEN "'.$ann_prpp[0].'" AND "'.$ann_prpp[1].'" ';
		}
		if($request->input('query_ann_sunn') != '' )
		{
		  $query .= ' AND Sunny_Days BETWEEN "'.$ann_sunn[0].'" AND "'.$ann_sunn[1].'" ';
		}
		if($request->input('query_ahigh_tem') != '' )
		{
		   $query .= ' AND Avg__July_High BETWEEN "'.$ahigh_tem[0].'" AND "'.$ahigh_tem[1].'" ';
		}
		if($request->input('query_alow_tem') != '' )
		{
		   $query .= ' AND Avg__Jan__Low BETWEEN "'.$alow_tem[0].'" AND "'.$alow_tem[1].'" ';
		}
		if($request->input('query_air_qua') != '' )
		{
		   $query .= ' AND Air_Quality BETWEEN "'.$air_qua[0].'" AND "'.$air_qua[1].'" ';
		}
		if($request->input('query_wat_qua') != '' )
		{
		   $query .= ' AND Water_Quality_Score BETWEEN "'.$wat_qua[0].'" AND "'.$wat_qua[1].'" ';
		}
		if($request->input('query_com_tm') != '' )
		{
		   $query .= ' AND Commute_Time BETWEEN "'.$com_tm[0].'" AND "'.$com_tm[1].'" ';
		}
		if($request->input('query_dem') != '' )
		{
		  $query .= ' AND Democrat BETWEEN "'.$dem[0].'" AND "'.$dem[1].'" ';
		}
		if($request->input('query_rep') != '' )
		{
		  $query .= ' AND Republican BETWEEN "'.$rep[0].'" AND "'.$rep[1].'" ';
		}
		if($request->input('query_bsc') != '' )
		{
		   $query .= ' AND a4_yr_College_Grad_ BETWEEN "'.$bsc[0].'" AND "'.$bsc[1].'" ';
		}
		if($request->input('query_grado') != '' )
		{
		$query .= ' AND Graduate_Degrees  BETWEEN "'.$grado[0].'" AND "'.$grado[1].'"  ';
		}
		if($request->input('query_per_rel') != '' )
		{
		   $query .= ' AND Percent_Religious BETWEEN "'.$per_rel[0].'" AND "'.$per_rel[1].'" ';
		}
		if(Session::get("search_region_key") != ""){
    		$query .= " AND Region = '".Session::get("search_region_key")."' ";
    	}

    	if(Session::get("search_state_key") != ""){
    		$query .= " AND State = '".Session::get("search_state_key")."' ";
    	}

    	if(Session::get("search_county_key") != ""){
    		$query .= " AND County = '".Session::get("search_county_key")."' ";
    	}
		if($query_center_town != '' && $query_search_range != ''){
			$query_search_range = $query_search_range / 54.6;
			$query .= ' AND ABS(Latitude - (SELECT Latitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <= '.$query_search_range.' AND ABS(Longitude - (SELECT Longitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <=  '.$query_search_range.' ';
		}
		//$query .= 'ORDER BY city ASC ';
		$query .= ' LIMIT 0,50';
		$results = DB::select($query);


		  foreach($results as $result) { 
		        array_push($data, $result);
		        
		 }
		header('Content-Type: application/json');
		echo json_encode($data);
    }

    public function getlistingMapdata_advanced(Request $request){

    	$data = Array();

		$check_city = "";
		$check_city_neighbour = "";
		$check_suburbs = "";
		$check_towns = "";
		$check_very_conservative = "";
		$check_conservative = "";
		$check_balanced = "";
		$check_liberal = "";
		$check_very_liberal = "";
		$cost_living_1 = "";
		$cost_living_2 = "";
		$cost_living_3 = "";
		$cost_living_4 = "";
		$crime_1 = "";
		$crime_2 = "";
		$crime_3 = "";
		$crime_4 = "";
		$home_cost_1 = "";
		$home_cost_2 = "";
		$home_cost_3 = "";
		$home_cost_4 = "";
		$male_female_ratio = "";
		$weather_ratio = "";
		$single_ratio = "";
		if($request->has("male_female_ratio")){
    		$male_female_ratio = $request->input("male_female_ratio");
    	}
    	if($request->has("weather_ratio")){
    		$weather_ratio = $request->input("weather_ratio");
    	}
    	if($request->has("single_ratio")){
    		$single_ratio = $request->input("single_ratio");
    	}
    	if($request->has("check_city")){
    		$check_city = $request->input("check_city");
    	}
    	if($request->has("check_city_neighbour")){
    		$check_city_neighbour = $request->input("check_city_neighbour");
    	}
    	if($request->has("check_suburbs")){
    		$check_suburbs = $request->input("check_suburbs");
    	}
    	if($request->has("check_towns")){
    		$check_towns = $request->input("check_towns");
    	}

    	if($request->has("check_very_conservative")){
    		$check_very_conservative = $request->input("check_very_conservative");
    	}

    	if($request->has("check_conservative")){
    		$check_conservative = $request->input("check_conservative");
    	}

    	if($request->has("check_balanced")){
    		$check_balanced = $request->input("check_balanced");
    	}
    	if($request->has("check_liberal")){
    		$check_liberal = $request->input("check_liberal");
    	}
		if($request->has("check_very_liberal")){
    		$check_very_liberal = $request->input("check_very_liberal");
    	}
    	if($request->has("cost_living_1")){
    		$cost_living_1 = $request->input("cost_living_1");
    	}

    	if($request->has("cost_living_2")){
    		$cost_living_2 = $request->input("cost_living_2");
    	}
    	if($request->has("cost_living_3")){
    		$cost_living_3 = $request->input("cost_living_3");
    	}
		if($request->has("cost_living_4")){
    		$cost_living_4 = $request->input("cost_living_4");
    	}

    	if($request->has("crime_1")){
    		$crime_1 = $request->input("crime_1");
    	}

    	if($request->has("crime_2")){
    		$crime_2 = $request->input("crime_2");
    	}
    	if($request->has("crime_3")){
    		$crime_3 = $request->input("crime_3");
    	}
		if($request->has("crime_4")){
    		$crime_4 = $request->input("crime_4");
    	}

    	if($request->has("home_cost_1")){
    		$home_cost_1 = $request->input("home_cost_1");
    	}

    	if($request->has("home_cost_2")){
    		$home_cost_2 = $request->input("home_cost_2");
    	}
    	if($request->has("home_cost_3")){
    		$home_cost_3 = $request->input("home_cost_3");
    	}
		if($request->has("home_cost_4")){
    		$home_cost_4 = $request->input("home_cost_4");
    	}

		$query_multi_state = $request->input('multi_state');

		$data = Array();
		


    	$query = "SELECT * FROM bestplaces WHERE 1 " ;

		if($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'"';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'"';
						}
					
					
				}
			}
			else{

				$query .= ' AND (State = "'.$query_multi_state.'"';				
			}
            $query .= ")";
		}
		
		if($check_city != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population > 100000) ";
			}else{
				$query .= " AND ((Population > 100000) ";
			}
			
		}

		if($check_city_neighbour != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 50000 AND 99999) ";
			}else{
				$query .= " AND ((Population BETWEEN 50000 AND 99999) ";
			}
			
		}

		if($check_suburbs != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 10000 AND 49999) ";
			}else{
				$query .= " AND ((Population BETWEEN 10000 AND 49999) ";
			}
			
		}

		if($check_towns != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 0 AND 9999) ";
			}else{
				$query .= " AND ((Population BETWEEN 0 AND 9999) ";
			}
			
		}
		if(strpos($query, "Population") !== false){
			$query .= ")";
		}
		
		if($check_very_conservative != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 75 AND 100) ";
			}else{
				$query .= " AND ((Republican BETWEEN 75 AND 100) ";
			}
			
		}

		if($check_conservative != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 60 AND 74.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 60 AND 74.9) ";
			}
			
		}

		if($check_balanced != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 50 AND 59.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 50 AND 59.9) ";
			}
			
		}

		if($check_liberal != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 25.1 AND 49.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 25.1 AND 49.9) ";
			}
			
		}

		if($check_very_liberal != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 0 AND 25) ";
			}else{
				$query .= " AND ((Republican BETWEEN 0 AND 25) ";
			}
			
		}
		if(strpos($query, "Republican") !== false){
			$query .= ")";
		}
		if($cost_living_1 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 0 AND 50) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 0 AND 50) ";
			}
			
		}

		if($cost_living_2 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 50.1 AND 90) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 50.1 AND 90) ";
			}
			
		}

		if($cost_living_3 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 90.1 AND 105) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 90.1 AND 105) ";
			}
			
		}

		if($cost_living_4 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living > 105) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living > 105) ";
			}
			
		}
		if(strpos($query, "Overall_Cost_Of_Living") !== false){
			$query .=")";
		}
		if($crime_1 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 0 AND 2) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 0 AND 2) ";
			}
			
		}

		if($crime_2 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 3 AND 4) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 3 AND 4) ";
			}
			
		}

		if($crime_3 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 5 AND 6) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 5 AND 6) ";
			}
			
		}

		if($crime_4 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 7 AND 10) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 7 AND 10) ";
			}
			
		}
		if(strpos($query, "Violent_Crime") !== false){
			$query .= ")";
		}
		if($home_cost_1 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 0 AND 50000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 0 AND 50000) ";
			}
			
		}

		if($home_cost_2 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 50001 AND 100000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 50001 AND 100000) ";
			}
			
		}

		if($home_cost_3 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 100001 AND 200000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 100001 AND 200000) ";
			}
			
		}

		if($home_cost_4 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost > 200000) ";
			}else{
				$query .= " AND ((Median_Home_Cost > 200000) ";
			}
			
		}
		if(strpos($query, "Median_Home_Cost") !== false){
			$query .= ")";
		}

		if($male_female_ratio != ""){
			$query .= " AND CEILING(Female_Population) = ".$male_female_ratio." ";
		}

		if($weather_ratio != ""){
			$query .= " AND CEILING(Snowfall_in_) = ".$weather_ratio." ";
		}

		if($single_ratio != ""){
			$query .= " AND CEILING(Married_Population) = ".$single_ratio." ";
		}

		$query .= ' LIMIT 0,50';
		// echo $query;
		$results = DB::select($query);


		  foreach($results as $result) { 
		        array_push($data, $result);
		        
		 }
		header('Content-Type: application/json');
		echo json_encode($data);
    }

    public function getCityMapdata(Request $request){
    	$data = Array();
    	$map_key = $request->input("map_key");
    	$query = "SELECT * FROM bestplaces WHERE ID = ".$map_key;
    	$results = DB::select($query);


		foreach($results as $result) {
		    array_push($data, $result);
		}
		header('Content-Type: application/json');
		echo json_encode($data);
    }

    public function fetch_counter(Request $request){
    	$ocl=(explode(";",$request->input('query_ocl')));
		$mfr=(explode(";",$request->input('query_mfr')));
		$mpop=(explode(";",$request->input('query_mpop')));
		$mage=(explode(";",$request->input('query_mage')));
		$mhincome=(explode(";",$request->input('query_mhincome')));
		$strate=(explode(";",$request->input('query_strate')));
		$pt_rate=(explode(";",$request->input('query_pt_rate')));
		$inc_trate=(explode(";",$request->input('query_inc_trate')));
		$mh_cost=(explode(";",$request->input('query_mh_cost')));

		$ump_rate=(explode(";",$request->input('query_ump_rate')));
		$vio_crime=(explode(";",$request->input('query_vio_crime')));
		$prop_crime=(explode(";",$request->input('query_prop_crime')));
		$ann_rain=(explode(";",$request->input('query_ann_rain')));
		$ann_sno=(explode(";",$request->input('query_ann_sno')));

		$ann_prpp=(explode(";",$request->input('query_ann_prpp')));
		$ann_sunn=(explode(";",$request->input('query_ann_sunn')));
		$ahigh_tem=(explode(";",$request->input('query_ahigh_tem')));
		$alow_tem=(explode(";",$request->input('query_alow_tem')));
		$air_qua=(explode(";",$request->input('query_air_qua')));

		$wat_qua=(explode(";",$request->input('query_wat_qua')));
		$com_tm=(explode(";",$request->input('query_com_tm')));
		$dem=(explode(";",$request->input('query_dem')));
		$rep=(explode(";",$request->input('query_rep')));
		$bsc=(explode(";",$request->input('query_bsc')));
		$grado=(explode(";",$request->input('query_grado')));
		$per_rel=(explode(";",$request->input('query_per_rel')));
		$query_center_town = $request->input('search_center_town');
		$query_search_range = $request->input('search_range');
		$query_multi_state = $request->input('multi_state');
		$query = "SELECT COUNT(ID) AS Count FROM bestplaces WHERE 1  ";

		if($request->input('query1') != '' )
		{
		 $query .= ' AND City = "'.$request->input('query1').'" ';
		}
		if($request->input('query2') != '' )
		{
		 $query .= ' AND Zip_Code = "'.$request->input('query2').'" ';
		}
		if($request->input('query3') != '' && ($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'))
        {
         $query .= ' AND (State = "'.$request->input('query3').'" ';
        }
        else if($request->input('query3') != '' && ($query_multi_state != '' || $query_multi_state != 'State' || $query_multi_state != 'Nothing selected')){
            $query .= ' AND State = "'.$request->input('query3').'" ';
        }
		if($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					if($request->input('query3') != ''){
						$query .= ' OR State = "'.$state_array[$i].'"';
					}
					else{
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'"';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'"';
						}
					}
					
					
				}
			}
			else{
				if($request->input('query3') != ''){
					$query .= ' OR State = "'.$query_multi_state.'"';
				}
				else{
					$query .= ' AND (State = "'.$query_multi_state.'"';
				}
				
			}
            $query .= ")";
		}

		if($request->input('query_region') != '' )
		{
		 $query .= ' AND Region = "'.$request->input('query_region').'" ';
		}
		if($request->input('query_county') != '' )
		{
		 $query .= ' AND County = "'.$request->input('query_county').'" ';
		}
		if($request->input('query_pop') != '' )
		{
		 $query .= ' AND Population BETWEEN "'.str_replace(",","",$request->input('query_pop_0')).'" AND "'.str_replace(",","",$request->input('query_pop')).'" ';
		}
		if($request->input('query_nmc') != '' )
		{
		 $query .= ' AND Nearest_Major_City = "'.$request->input('query_nmc').'" ';
		}
		if($request->input('query_ocl') != '' )
		{
		  $query .= ' AND Overall_Cost_Of_Living BETWEEN "'.$ocl[0].'" AND "'.$ocl[1].'" ';
		}
		if($request->input('query_mfr') != '' )
		{
		    $query .= ' AND Male_Population BETWEEN "'.$mfr[0].'" AND "'.$mfr[1].'" ';
		}
		if($request->input('query_mpop') != '' )
		{
		 $query .= ' AND Married_Population BETWEEN "'.$mpop[0].'" AND "'.$mpop[1].'" ';
		}
		if($request->input('query_mage') != '' )
		{
		 $query .= ' AND Median_Age BETWEEN "'.$mage[0].'" AND "'.$mage[1].'" ';
		}

		if($request->input('query_mhincome') != '' )
		{
		    $query .= ' AND Household_Income BETWEEN "'.$mhincome[0].'" AND "'.$mhincome[1].'" ';
		}
		if($request->input('query_strate') != '' )
		{
		   $query .= ' AND Sales_Taxes BETWEEN "'.$strate[0].'" AND "'.$strate[1].'" ';
		}
		if($request->input('query_pt_rate') != '' )
		{
		  $query .= ' AND Property_Tax_Rate BETWEEN "'.$pt_rate[0].'" AND "'.$pt_rate[1].'" ';
		}
		if($request->input('query_inc_trate') != '' )
		{
		   $query .= ' AND Income_Taxes BETWEEN "'.$inc_trate[0].'" AND "'.$inc_trate[1].'" ';
		}
		if($request->input('query_mh_cost') != '' )
		{
		   $query .= ' AND Median_Home_Cost BETWEEN "'.$mh_cost[0].'" AND "'.$mh_cost[1].'" ';
		}
		if($request->input('query_ump_rate') != '' )
		{
		    $query .= ' AND Unemployment_Rate BETWEEN "'.$ump_rate[0].'" AND "'.$ump_rate[1].'" ';
		}
		if($request->input('query_vio_crime') != '' )
		{
		    $query .= ' AND Violent_Crime BETWEEN "'.$vio_crime[0].'" AND "'.$vio_crime[1].'" ';
		}
		if($request->input('query_prop_crime') != '' )
		{
		   $query .= ' AND Property_Crime BETWEEN "'.$prop_crime[0].'" AND "'.$prop_crime[1].'" ';
		}
		if($request->input('query_ann_rain') != '' )
		{
		    $query .= ' AND Rainfall_in_ BETWEEN "'.$ann_rain[0].'" AND "'.$ann_rain[1].'" ';
		}
		if($request->input('query_ann_sno') != '' )
		{
		   $query .= ' AND Snowfall_in_ BETWEEN "'.$ann_sno[0].'" AND "'.$ann_sno[1].'" ';
		}
		if($request->input('query_ann_prpp') != '' )
		{
		  $query .= ' AND Precipitation_Days BETWEEN "'.$ann_prpp[0].'" AND "'.$ann_prpp[1].'" ';
		}
		if($request->input('query_ann_sunn') != '' )
		{
		  $query .= ' AND Sunny_Days BETWEEN "'.$ann_sunn[0].'" AND "'.$ann_sunn[1].'" ';
		}
		if($request->input('query_ahigh_tem') != '' )
		{
		   $query .= ' AND Avg__July_High BETWEEN "'.$ahigh_tem[0].'" AND "'.$ahigh_tem[1].'" ';
		}
		if($request->input('query_alow_tem') != '' )
		{
		   $query .= ' AND Avg__Jan__Low BETWEEN "'.$alow_tem[0].'" AND "'.$alow_tem[1].'" ';
		}
		if($request->input('query_air_qua') != '' )
		{
		   $query .= ' AND Air_Quality BETWEEN "'.$air_qua[0].'" AND "'.$air_qua[1].'" ';
		}
		if($request->input('query_wat_qua') != '' )
		{
		   $query .= ' AND Water_Quality_Score BETWEEN "'.$wat_qua[0].'" AND "'.$wat_qua[1].'" ';
		}
		if($request->input('query_com_tm') != '' )
		{
		   $query .= ' AND Commute_Time BETWEEN "'.$com_tm[0].'" AND "'.$com_tm[1].'" ';
		}
		if($request->input('query_dem') != '' )
		{
		  $query .= ' AND Democrat BETWEEN "'.$dem[0].'" AND "'.$dem[1].'" ';
		}
		if($request->input('query_rep') != '' )
		{
		  $query .= ' AND Republican BETWEEN "'.$rep[0].'" AND "'.$rep[1].'" ';
		}
		if($request->input('query_bsc') != '' )
		{
		   $query .= ' AND a4_yr_College_Grad_ BETWEEN "'.$bsc[0].'" AND "'.$bsc[1].'" ';
		}
		if($request->input('query_grado') != '' )
		{
		$query .= ' AND Graduate_Degrees  BETWEEN "'.$grado[0].'" AND "'.$grado[1].'"  ';
		}
		if($request->input('query_per_rel') != '' )
		{
		   $query .= ' AND Percent_Religious BETWEEN "'.$per_rel[0].'" AND "'.$per_rel[1].'" ';
		}
		if(Session::get("search_region_key") != ""){
    		$query .= " AND Region = '".Session::get("search_region_key")."' ";
    	}

    	if(Session::get("search_state_key") != ""){
    		$query .= " AND State = '".Session::get("search_state_key")."' ";
    	}

    	if(Session::get("search_county_key") != ""){
    		$query .= " AND County = '".Session::get("search_county_key")."' ";
    	}
    	if(Session::get("csv_limit") != 0){
    		$query .= " LIMIT ".Session::get("csv_limit")." ";
    	}
		if($query_center_town != '' && $query_search_range != ''){
			$query_search_range = $query_search_range / 54.6;
			$query .= ' AND ABS(Latitude - (SELECT Latitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <= '.$query_search_range.' AND ABS(Longitude - (SELECT Longitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <=  '.$query_search_range.' ';
		}
		//$query .= 'ORDER BY city ASC ';
		// echo $query;
		$result = DB::select($query);
		Session::put("city_counter", $result[0]->Count);
		echo $result[0]->Count;
    }

    public function fetch_counter_advanced(Request $request){
    	$check_city = "";
		$check_city_neighbour = "";
		$check_suburbs = "";
		$check_towns = "";
		$check_very_conservative = "";
		$check_conservative = "";
		$check_balanced = "";
		$check_liberal = "";
		$check_very_liberal = "";
		$cost_living_1 = "";
		$cost_living_2 = "";
		$cost_living_3 = "";
		$cost_living_4 = "";
		$crime_1 = "";
		$crime_2 = "";
		$crime_3 = "";
		$crime_4 = "";
		$home_cost_1 = "";
		$home_cost_2 = "";
		$home_cost_3 = "";
		$home_cost_4 = "";
		$male_female_ratio = "";
		$weather_ratio = "";
		$single_ratio = "";
		if($request->has("male_female_ratio")){
    		$male_female_ratio = $request->input("male_female_ratio");
    	}
    	if($request->has("weather_ratio")){
    		$weather_ratio = $request->input("weather_ratio");
    	}
    	if($request->has("single_ratio")){
    		$single_ratio = $request->input("single_ratio");
    	}
    	if($request->has("check_city")){
    		$check_city = $request->input("check_city");
    	}
    	if($request->has("check_city_neighbour")){
    		$check_city_neighbour = $request->input("check_city_neighbour");
    	}
    	if($request->has("check_suburbs")){
    		$check_suburbs = $request->input("check_suburbs");
    	}
    	if($request->has("check_towns")){
    		$check_towns = $request->input("check_towns");
    	}

    	if($request->has("check_very_conservative")){
    		$check_very_conservative = $request->input("check_very_conservative");
    	}

    	if($request->has("check_conservative")){
    		$check_conservative = $request->input("check_conservative");
    	}

    	if($request->has("check_balanced")){
    		$check_balanced = $request->input("check_balanced");
    	}
    	if($request->has("check_liberal")){
    		$check_liberal = $request->input("check_liberal");
    	}
		if($request->has("check_very_liberal")){
    		$check_very_liberal = $request->input("check_very_liberal");
    	}
    	if($request->has("cost_living_1")){
    		$cost_living_1 = $request->input("cost_living_1");
    	}

    	if($request->has("cost_living_2")){
    		$cost_living_2 = $request->input("cost_living_2");
    	}
    	if($request->has("cost_living_3")){
    		$cost_living_3 = $request->input("cost_living_3");
    	}
		if($request->has("cost_living_4")){
    		$cost_living_4 = $request->input("cost_living_4");
    	}

    	if($request->has("crime_1")){
    		$crime_1 = $request->input("crime_1");
    	}

    	if($request->has("crime_2")){
    		$crime_2 = $request->input("crime_2");
    	}
    	if($request->has("crime_3")){
    		$crime_3 = $request->input("crime_3");
    	}
		if($request->has("crime_4")){
    		$crime_4 = $request->input("crime_4");
    	}

    	if($request->has("home_cost_1")){
    		$home_cost_1 = $request->input("home_cost_1");
    	}

    	if($request->has("home_cost_2")){
    		$home_cost_2 = $request->input("home_cost_2");
    	}
    	if($request->has("home_cost_3")){
    		$home_cost_3 = $request->input("home_cost_3");
    	}
		if($request->has("home_cost_4")){
    		$home_cost_4 = $request->input("home_cost_4");
    	}

		$query_multi_state = $request->input('multi_state');

		$data = Array();
		


    	$query = "SELECT COUNT(ID) AS Count FROM bestplaces WHERE 1 " ;

		if($query_multi_state != '' && $query_multi_state != 'State' && $query_multi_state != 'Nothing selected'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'"';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'"';
						}
					
					
				}
			}
			else{

				$query .= ' AND (State = "'.$query_multi_state.'"';				
			}
            $query .= ")";
		}
		
		if($check_city != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population > 100000) ";
			}else{
				$query .= " AND ((Population > 100000) ";
			}
			
		}

		if($check_city_neighbour != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 50000 AND 99999) ";
			}else{
				$query .= " AND ((Population BETWEEN 50000 AND 99999) ";
			}
			
		}

		if($check_suburbs != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 10000 AND 49999) ";
			}else{
				$query .= " AND ((Population BETWEEN 10000 AND 49999) ";
			}
			
		}

		if($check_towns != ""){
			if(strpos($query, "Population") !== false){
				$query .= " OR (Population BETWEEN 0 AND 9999) ";
			}else{
				$query .= " AND ((Population BETWEEN 0 AND 9999) ";
			}
			
		}
		if(strpos($query, "Population") !== false){
			$query .= ")";
		}
		
		if($check_very_conservative != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 75 AND 100) ";
			}else{
				$query .= " AND ((Republican BETWEEN 75 AND 100) ";
			}
			
		}

		if($check_conservative != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 60 AND 74.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 60 AND 74.9) ";
			}
			
		}

		if($check_balanced != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 50 AND 59.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 50 AND 59.9) ";
			}
			
		}

		if($check_liberal != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 25.1 AND 49.9) ";
			}else{
				$query .= " AND ((Republican BETWEEN 25.1 AND 49.9) ";
			}
			
		}

		if($check_very_liberal != ""){
			if(strpos($query, "Republican") !== false){
				$query .= " OR (Republican BETWEEN 0 AND 25) ";
			}else{
				$query .= " AND ((Republican BETWEEN 0 AND 25) ";
			}
			
		}
		if(strpos($query, "Republican") !== false){
			$query .= ")";
		}
		if($cost_living_1 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 0 AND 50) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 0 AND 50) ";
			}
			
		}

		if($cost_living_2 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 50.1 AND 90) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 50.1 AND 90) ";
			}
			
		}

		if($cost_living_3 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living BETWEEN 90.1 AND 105) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living BETWEEN 90.1 AND 105) ";
			}
			
		}

		if($cost_living_4 != ""){
			if(strpos($query, "Overall_Cost_Of_Living") !== false){
				$query .= " OR (Overall_Cost_Of_Living > 105) ";
			}else{
				$query .= " AND ((Overall_Cost_Of_Living > 105) ";
			}
			
		}
		if(strpos($query, "Overall_Cost_Of_Living") !== false){
			$query .= ")";
		}
		if($crime_1 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 0 AND 2) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 0 AND 2) ";
			}
			
		}

		if($crime_2 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 3 AND 4) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 3 AND 4) ";
			}
			
		}

		if($crime_3 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 5 AND 6) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 5 AND 6) ";
			}
			
		}

		if($crime_4 != ""){
			if(strpos($query, "Violent_Crime") !== false){
				$query .= " OR (Violent_Crime BETWEEN 7 AND 10) ";
			}else{
				$query .= " AND ((Violent_Crime BETWEEN 7 AND 10) ";
			}
			
		}
		if(strpos($query, "Violent_Crime") !== false){
			$query .= ")";
		}
		if($home_cost_1 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 0 AND 50000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 0 AND 50000) ";
			}
			
		}

		if($home_cost_2 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 50001 AND 100000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 50001 AND 100000) ";
			}
			
		}

		if($home_cost_3 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost BETWEEN 100001 AND 200000) ";
			}else{
				$query .= " AND ((Median_Home_Cost BETWEEN 100001 AND 200000) ";
			}
			
		}

		if($home_cost_4 != ""){
			if(strpos($query, "Median_Home_Cost") !== false){
				$query .= " OR (Median_Home_Cost > 200000) ";
			}else{
				$query .= " AND ((Median_Home_Cost > 200000) ";
			}
			
		}
		if(strpos($query, "Median_Home_Cost") !== false){
			$query .= ")";
		}
		if($male_female_ratio != ""){
			$query .= " AND CEILING(Female_Population) = ".$male_female_ratio." ";
		}

		if($weather_ratio != ""){
			$query .= " AND CEILING(Snowfall_in_) = ".$weather_ratio." ";
		}

		if($single_ratio != ""){
			$query .= " AND CEILING(Married_Population) = ".$single_ratio." ";
		}

		//$query .= 'ORDER BY city ASC ';
		// echo $query;
		$result = DB::select($query);
		Session::put("city_counter", $result[0]->Count);
		echo $result[0]->Count;
    }


    public function getcitylist(Request $request){
    	$output = Array();
    	$search_key = $request->input("query");
    	$search_key = "";
    	$zip_code = "";
    	$state = "";
    	$region = "";
    	$county = "";
    	$nearest_city = "";
        $query_multi_state = "";
    	if($request->has("query")){
    		$search_key = $request->input("query");
    	}
    	if($request->has("query2")){
    		$zip_code = $request->input("query2");
    	}
    	if($request->has("query3")){
    		$state = $request->input("query3");
    	}
    	if($request->has("query_region")){
    		$region = $request->input("query_region");
    	}
    	if($request->has("query_county")){
    		$county = $request->input("query_county");
    	}
    	if($request->has("query_nmc")){
    		$nearest_city = $request->input("query_nmc");
    	}
    	if($request->has('query_multi_state')){
    		$query_multi_state = $request->input('query_multi_state');
    	}
    	$query = "SELECT City FROM bestplaces WHERE 1";
    	if($search_key != ""){
    		$query .= " AND City like '".$search_key."%'";
    	}
    	if($zip_code != ""){
    		$query .= " AND Zip_Code = '".$zip_code."'";
    	}
    	if($county != ""){
    		$query .= " AND County = '".$county."'";
    	}
    	if($region != ""){
    		$query .= " AND Region = '".$region."'";
    	}
    	if($nearest_city != ""){
    		$query .= " AND Nearest_Major_City = '".$nearest_city."'";
    	}
    	if($state != "" && ($query_multi_state != '' && $query_multi_state != 'State')){
            $query .= " AND (State = '".$state."'";
        }
        else if($state != "" && ($query_multi_state != '' || $query_multi_state != 'State')){
            $query .= " AND State = '".$state."'";
        }
    	
    	if($query_multi_state != '' && $query_multi_state != 'State'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					if($state != ''){
						$query .= ' OR State = "'.$state_array[$i].'" ';
					}
					else{
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'" ';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'" ';
						}
					}
					
					
				}
			}
			else{
				if($query3 != ''){
					$query .= ' OR State = "'.$query_multi_state.'" ';
				}
				else{
					$query .= ' AND (State = "'.$query_multi_state.'" ';
				}
				
			}
            $query .= ")";
		}

		
		$query .= " GROUP BY City";


		$query .= " LIMIT 25";
    	// echo $query;
    	// $results = DB::table("city")
    	// 			->select("City")
    	// 			->where("City", "like", "%".$search_key."%")
    	// 			->limit(25)
    	// 			->get();
    	$results = DB::select($query);
    	if(count($results) != 0){
	    	foreach($results as $result)
			{
			    array_push($output, $result->City);
			}
            echo json_encode($output);
		}else{
			$output = 'City Not Found';
            echo $output;
		}
		
    }

    public function getnearestcity(Request $request){
    	$output = Array();
    	$search_key = $request->input("query");
    	$search_key = "";
    	$zip_code = "";
    	$state = "";
    	$region = "";
    	$county = "";
    	$city = "";
    	$nearest_city = "";
    	if($request->has("query")){
    		$search_key = $request->input("query");
    	}
    	if($request->has("query1")){
    		$city = $request->input("query1");
    	}
    	if($request->has("query2")){
    		$zip_code = $request->input("query2");
    	}
    	if($request->has("query3")){
    		$state = $request->input("query3");
    	}
    	if($request->has("query_region")){
    		$region = $request->input("query_region");
    	}
    	if($request->has("query_county")){
    		$county = $request->input("query_county");
    	}

    	if($request->has('query_multi_state')){
    		$query_multi_state = $request->input('query_multi_state');
    	}
    	$query = "SELECT Nearest_Major_City FROM bestplaces WHERE 1";
    	if($search_key != ""){
    		$query .= " AND Nearest_Major_City like '".$search_key."%'";
    	}
    	if($zip_code != ""){
    		$query .= " AND Zip_Code = '".$zip_code."'";
    	}
    	if($county != ""){
    		$query .= " AND County = '".$county."'";
    	}
    	if($region != ""){
    		$query .= " AND Region = '".$region."'";
    	}
    	if($city != ""){
    		$query .= " AND City = '".$city."'";
    	}
    	if($state != "" && ($query_multi_state != '' && $query_multi_state != 'State')){
    		$query .= " AND (State = '".$state."'";
    	}
        else if($state != "" && ($query_multi_state != '' || $query_multi_state != 'State')){
            $query .= " AND State = '".$state."'";
        }
    	
    	if($query_multi_state != '' && $query_multi_state != 'State'){
			if(strpos($query_multi_state, ", ") !== false){
				$state_array = explode(", ", $query_multi_state);
				for($i = 0; $i < count($state_array); $i++){
					if($state != ''){
						$query .= ' OR State = "'.$state_array[$i].'" ';
					}
					else{
						if($i == 0){
							$query .= ' AND (State = "'.$state_array[$i].'" ';
						}else{
							$query .= ' OR State = "'.$state_array[$i].'" ';
						}
					}
					
					
				}
			}
			else{
				if($query3 != ''){
					$query .= ' OR State = "'.$query_multi_state.'" ';
				}
				else{
					$query .= ' AND (State = "'.$query_multi_state.'" ';
				}
				
			}
            $query .= ")";
		}


			$query .= " GROUP BY Nearest_Major_City";


		$query .= " LIMIT 25";
    	// echo strpos($query, ")");
    	$results = DB::table("city")
    				->select("City")
    				->where("City", "like", "%".$search_key."%")
    				->limit(25)
    				->get();
    	$results = DB::select($query);
    	if(count($results) != 0){
	    	foreach($results as $result)
			{
			    array_push($output, $result->Nearest_Major_City);
			}
            echo json_encode($output);
		}else{
			$output = 'City Not Found';
            echo $output;
		}
		
    }

    public function getcitystatecombine(Request $request){
    	$output = Array();
    	$search_key = $request->input("query");
    	$results = DB::table("city_state")
    				->select("City_State_Combined")
    				->where("City_State_Combined", "like", "%".$search_key."%")
    				->limit(25)
    				->get();
    	if(count($results) != 0){
	    	foreach($results as $result)
			{
			    $output .= '<option value="'.$result->City_State_Combined.'"> ';
			    array_push($output, $result->City_State_Combined);
			}
		}else{
			$output .= 'No Matching Results';
		}
		echo json_encode($output);
    }

    public function fetchgraph(Request $request){
    	$data = Array();

		$query = "SELECT * FROM bestplaces WHERE City_State_Combined = '".$request->input("query1")."' or City_State_Combined ='".$request->input("query2")."' or City_State_Combined ='".$request->input("query3")."'" ;
		$results = DB::select($query);

		$data = Array();
		foreach($results as $result)
		{
			array_push($data, $result);
		}
		header('Content-Type: application/json');
		echo json_encode($data);
    }
	
	public function SingleCsvdata(Request $request){
    	$id = $request->input("query");
    	$query = "select * from bestplaces where ID=".$id;
    	$result = DB::select($query);
    	echo json_encode($result);
    }
	
	public function BulkCSVdownload(Request $request){
        $ocl=(explode(";",$request->input('query_ocl')));
		$mfr=(explode(";",$request->input('query_mfr')));
		$mpop=(explode(";",$request->input('query_mpop')));
		$mage=(explode(";",$request->input('query_mage')));
		$mhincome=(explode(";",$request->input('query_mhincome')));
		$strate=(explode(";",$request->input('query_strate')));
		$pt_rate=(explode(";",$request->input('query_pt_rate')));
		$inc_trate=(explode(";",$request->input('query_inc_trate')));
		$mh_cost=(explode(";",$request->input('query_mh_cost')));

		$ump_rate=(explode(";",$request->input('query_ump_rate')));
		$vio_crime=(explode(";",$request->input('query_vio_crime')));
		$prop_crime=(explode(";",$request->input('query_prop_crime')));
		$ann_rain=(explode(";",$request->input('query_ann_rain')));
		$ann_sno=(explode(";",$request->input('query_ann_sno')));

		$ann_prpp=(explode(";",$request->input('query_ann_prpp')));
		$ann_sunn=(explode(";",$request->input('query_ann_sunn')));
		$ahigh_tem=(explode(";",$request->input('query_ahigh_tem')));
		$alow_tem=(explode(";",$request->input('query_alow_tem')));
		$air_qua=(explode(";",$request->input('query_air_qua')));

		$wat_qua=(explode(";",$request->input('query_wat_qua')));
		$com_tm=(explode(";",$request->input('query_com_tm')));
		$dem=(explode(";",$request->input('query_dem')));
		$rep=(explode(";",$request->input('query_rep')));
		$bsc=(explode(";",$request->input('query_bsc')));
		$grado=(explode(";",$request->input('query_grado')));
		$per_rel=(explode(";",$request->input('query_per_rel')));
		$query_center_town = $request->input('search_center_town');
		$query_search_range = $request->input('search_range');
		$query = "SELECT * FROM bestplaces WHERE 1  ";

		if($request->input('query1') != '' )
		{
		 $query .= ' AND City = "'.$request->input('query1').'" ';
		}
		if($request->input('query2') != '' )
		{
		 $query .= ' AND Zip_Code = "'.$request->input('query2').'" ';
		}
		if($request->input('query3') != '' )
		{
		 $query .= ' AND State = "'.$request->input('query3').'" ';
		}


		if($request->input('query_region') != '' )
		{
		 $query .= ' AND Region = "'.$request->input('query_region').'" ';
		}
		if($request->input('query_county') != '' )
		{
		 $query .= ' AND County = "'.$request->input('query_county').'" ';
		}
		if($request->input('query_pop') != '' )
		{
		 $query .= ' AND Population BETWEEN "'.$request->input('query_pop_0').'" AND "'.$request->input('query_pop').'" ';
		}
		if($request->input('query_nmc') != '' )
		{
		 $query .= ' AND Nearest_Major_City = "'.$request->input('query_nmc').'" ';
		}
		if($request->input('query_ocl') != '' )
		{
		  $query .= ' AND Overall_Cost_Of_Living BETWEEN "'.$ocl[0].'" AND "'.$ocl[1].'" ';
		}
		if($request->input('query_mfr') != '' )
		{
		    $query .= ' AND Male_Population BETWEEN "'.$mfr[0].'" AND "'.$mfr[1].'" ';
		}
		if($request->input('query_mpop') != '' )
		{
		 $query .= ' AND Married_Population BETWEEN "'.$mpop[0].'" AND "'.$mpop[1].'" ';
		}
		if($request->input('query_mage') != '' )
		{
		 $query .= ' AND Median_Age BETWEEN "'.$mage[0].'" AND "'.$mage[1].'" ';
		}

		if($request->input('query_mhincome') != '' )
		{
		    $query .= ' AND Household_Income BETWEEN "'.$mhincome[0].'" AND "'.$mhincome[1].'" ';
		}
		if($request->input('query_strate') != '' )
		{
		   $query .= ' AND Sales_Taxes BETWEEN "'.$strate[0].'" AND "'.$strate[1].'" ';
		}
		if($request->input('query_pt_rate') != '' )
		{
		  $query .= ' AND Property_Tax_Rate BETWEEN "'.$pt_rate[0].'" AND "'.$pt_rate[1].'" ';
		}
		if($request->input('query_inc_trate') != '' )
		{
		   $query .= ' AND Income_Taxes BETWEEN "'.$inc_trate[0].'" AND "'.$inc_trate[1].'" ';
		}
		if($request->input('query_mh_cost') != '' )
		{
		   $query .= ' AND Median_Home_Cost BETWEEN "'.$mh_cost[0].'" AND "'.$mh_cost[1].'" ';
		}
		if($request->input('query_ump_rate') != '' )
		{
		    $query .= ' AND Unemployment_Rate BETWEEN "'.$ump_rate[0].'" AND "'.$ump_rate[1].'" ';
		}
		if($request->input('query_vio_crime') != '' )
		{
		    $query .= ' AND Violent_Crime BETWEEN "'.$vio_crime[0].'" AND "'.$vio_crime[1].'" ';
		}
		if($request->input('query_prop_crime') != '' )
		{
		   $query .= ' AND Property_Crime BETWEEN "'.$prop_crime[0].'" AND "'.$prop_crime[1].'" ';
		}
		if($request->input('query_ann_rain') != '' )
		{
		    $query .= ' AND Rainfall_in_ BETWEEN "'.$ann_rain[0].'" AND "'.$ann_rain[1].'" ';
		}
		if($request->input('query_ann_sno') != '' )
		{
		   $query .= ' AND Snowfall_in_ BETWEEN "'.$ann_sno[0].'" AND "'.$ann_sno[1].'" ';
		}
		if($request->input('query_ann_prpp') != '' )
		{
		  $query .= ' AND Precipitation_Days BETWEEN "'.$ann_prpp[0].'" AND "'.$ann_prpp[1].'" ';
		}
		if($request->input('query_ann_sunn') != '' )
		{
		  $query .= ' AND Sunny_Days BETWEEN "'.$ann_sunn[0].'" AND "'.$ann_sunn[1].'" ';
		}
		if($request->input('query_ahigh_tem') != '' )
		{
		   $query .= ' AND Avg__July_High BETWEEN "'.$ahigh_tem[0].'" AND "'.$ahigh_tem[1].'" ';
		}
		if($request->input('query_alow_tem') != '' )
		{
		   $query .= ' AND Avg__Jan__Low BETWEEN "'.$alow_tem[0].'" AND "'.$alow_tem[1].'" ';
		}
		if($request->input('query_air_qua') != '' )
		{
		   $query .= ' AND Air_Quality BETWEEN "'.$air_qua[0].'" AND "'.$air_qua[1].'" ';
		}
		if($request->input('query_wat_qua') != '' )
		{
		   $query .= ' AND Water_Quality_Score BETWEEN "'.$wat_qua[0].'" AND "'.$wat_qua[1].'" ';
		}
		if($request->input('query_com_tm') != '' )
		{
		   $query .= ' AND Commute_Time BETWEEN "'.$com_tm[0].'" AND "'.$com_tm[1].'" ';
		}
		if($request->input('query_dem') != '' )
		{
		  $query .= ' AND Democrat BETWEEN "'.$dem[0].'" AND "'.$dem[1].'" ';
		}
		if($request->input('query_rep') != '' )
		{
		  $query .= ' AND Republican BETWEEN "'.$rep[0].'" AND "'.$rep[1].'" ';
		}
		if($request->input('query_bsc') != '' )
		{
		   $query .= ' AND a4_yr_College_Grad_ BETWEEN "'.$bsc[0].'" AND "'.$bsc[1].'" ';
		}
		if($request->input('query_grado') != '' )
		{
		$query .= ' AND Graduate_Degrees  BETWEEN "'.$grado[0].'" AND "'.$grado[1].'"  ';
		}
		if($request->input('query_per_rel') != '' )
		{
		   $query .= ' AND Percent_Religious BETWEEN "'.$per_rel[0].'" AND "'.$per_rel[1].'" ';
		}
		if(Session::get("search_region_key") != ""){
    		$query .= " AND Region = '".Session::get("search_region_key")."' ";
    	}

    	if(Session::get("search_state_key") != ""){
    		$query .= " AND State = '".Session::get("search_state_key")."' ";
    	}

    	if(Session::get("search_county_key") != ""){
    		$query .= " AND County = '".Session::get("search_county_key")."' ";
    	}
    	if(Session::get("csv_limit") != 0){
    		$query .= " LIMIT ".Session::get("csv_limit")." ";
    	}
		if($query_center_town != '' && $query_search_range != ''){
			$query_search_range = $query_search_range / 54.6;
			$query .= ' AND ABS(Latitude - (SELECT Latitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <= '.$query_search_range.' AND ABS(Longitude - (SELECT Longitude FROM bestplaces WHERE City_State_Combined = "'.$query_center_town.'")) <=  '.$query_search_range.' ';
		}
		//$query .= 'ORDER BY city ASC ';
		// echo $query;
		$query .= " LIMIT 2000 ";
		// echo $query;
		$results = DB::select($query);
		echo json_encode($results);
    }

    public function empty_search(Request $request){
    	$query = "select * from bestplaces order by visits desc limit 50";
    	$results = DB::select($query);
    	if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("empty_search_view")->with("results", $results)->with("favs", $favs);
        }
        else
            return view("empty_search_view")->with("results", $results);
    	
    }

    public function not_found(Request $request){
    	$key1 = $request->input("key1");
    	$results = DB::table("bestplaces")
    				->where("City", "like", $key1."%")
    				->limit(25)
    				->get();
    	if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("empty_search_view")->with("results", $results)->with("favs", $favs);
        }
        else
            return view("empty_search_view")->with("results", $results);
    	
    }

    public function multi_search_result(Request $request){
    	$key = $request->input("key");
    	$results = DB::table("bestplaces")
    				->where("Zip_Code", "like", "%".$key."%")
    				->orWhere("City_State_Combined", "like", "%".$key."%")
    				->limit(50)
    				->get();
    	if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("empty_search_view")->with("results", $results)->with("favs", $favs);
        }
        else
            return view("empty_search_view")->with("results", $results);
    	
    }

    public function new_result(Request $request){
    	Session::forget("search_region_key");
    	Session::forget("search_state_key");
    	Session::forget("search_county_key");
    	$query = "SELECT COUNT(ID) AS Count FROM bestplaces where 1";
    	Session::put("csv_limit", 2000);
    	if($request->input("main_search2_region") != ''){
    		$query .= " AND Region = '".$request->input("main_search2_region")."' ";
    		Session::put("search_region_key", $request->input("main_search2_region"));
    		Session::put("csv_limit", 0);
    	}
    	if($request->input("main_search2_state") != ''){
    		$query .= " AND State = '".$request->input("main_search2_state")."' ";
    		Session::put("search_state_key", $request->input("main_search2_state"));
    		Session::put("csv_limit", 0);
    	}
    	if($request->input("main_search2_county") != ''){
    		$query .= " AND County = '".$request->input("main_search2_county")."' ";
    		Session::put("search_county_key", $request->input("main_search2_county"));
    		Session::put("csv_limit", 0);
    	}
    	// $results = DB::select()
    	$results = DB::select($query);
        $count = $results[0]->Count;
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("new_result")->with("count", $count)->with("favs", $favs);
        }
        else
            return view("new_result")->with("count", $count);
    	
    }

    public function new_bulk_csv(){
    	$query = "SELECT * FROM bestplaces where 1";
    	if(Session::get("search_region_key") != ""){
    		$query .= " AND Region = '".Session::get("search_region_key")."' ";
    	}

    	if(Session::get("search_state_key") != ""){
    		$query .= " AND State = '".Session::get("search_state_key")."' ";
    	}

    	if(Session::get("search_county_key") != ""){
    		$query .= " AND County = '".Session::get("search_county_key")."' ";
    	}
    	if(Session::get("csv_limit") != 0){
    		$query .= " LIMIT ".Session::get("csv_limit")." ";
    	}
    	$results = DB::select($query);
    	echo json_encode($results);
    }

    public function refined_search(){
    	$query = "SELECT COUNT(ID) AS Count FROM bestplaces where 1";
    	if(Session::get("search_region_key") != ""){
    		$query .= " AND Region = '".Session::get("search_region_key")."' ";
    	}

    	if(Session::get("search_state_key") != ""){
    		$query .= " AND State = '".Session::get("search_state_key")."' ";
    	}

    	if(Session::get("search_county_key") != ""){
    		$query .= " AND County = '".Session::get("search_county_key")."' ";
    	}
    	if(Session::get("csv_limit") != 0){
    		$query .= " LIMIT ".Session::get("csv_limit")." ";
    	}
    	$results = DB::select($query);
    	$count = $results[0]->Count;
    	$array = [
    		"search_region"=>Session::get("search_region_key"),
    		"search_state"=>Session::get("search_state_key"),
    		"search_county"=>Session::get("search_county_key")
    	];
    	if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("refined_search_view")->with("count", $count)->with("array", $array)->with("favs", $favs);
        }
        else
            return view("refined_search_view")->with("count", $count)->with("array", $array);
    	
    }

    public function gethomemapdata(Request $request){
    	$location = $request->input("query");
    	$price_range = $request->input("price_filter");
    	$home_type = $request->input("home_type_filter");
    	$location1 = str_replace(" ", "+", $location);
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://zillow.vercel.app/api/search?query='.$location1,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'x-vercel-cache: MISS',
				'x-vercel-id: arn1::iad1::cqdqq-1619482511519-16db4d85f556'
			),
		));

		$response = curl_exec($curl);
		// print($response);
		curl_close($curl);
		$home_data = Array();
		$response = json_decode($response);
		foreach($response->searchResults->listResults as $home){
	        if($price_range != "" && $home_type == ""){
	          if($home->unformattedPrice > $price_range){
	            array_push($home_data, $home);
	          }
	        }

	        if($home_type != "" && $price_range == ""){
	          if($home->hdpData->homeInfo->homeType == $home_type){
	            array_push($home_data, $home);
	          }
	        }

	        if($price_range != "" && $home_type != ""){
	          if($home->unformattedPrice > $price_range && $home->hdpData->homeInfo->homeType == $home_type){
	            array_push($home_data, $home);
	          }
	        }

	        if($price_range == "" && $home_type == ""){
	          array_push($home_data, $home);
	        }

	         
	      }

		echo json_encode($home_data);
    }

    public function getsinglehomemapdata(Request $request){
        $id = $request->input("query");
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://zillow.vercel.app/api/detail?id='.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
            'x-vercel-cache: MISS',
            'x-vercel-id: arn1::iad1::cqdqq-1619482511519-16db4d85f556'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // $response = json_decode($response);

        echo $response;
    }

    public function getschoolmapdata(Request $request){
        if($request->has("query")){
            $location = $request->input("query");
            if(is_numeric($location) != 1)
            {
              if(strpos($location, ", ")){
                $locations = (explode(", ", $location));
              }else if(strpos($location, " ")){
                // $map_search_keys = (explode(" ", $map_search1));
                $space_count = substr_count($location, " ");
                if($space_count == 1){
                  $locations = (explode(" ", $location));
                }
                else if($space_count == 2){
                  $second_pos = strpos($location, ' ', strpos($location, ' ') + 1);
                  $state_abb = substr($location, $second_pos);
                  if(strlen($state_abb) == 3){
                    $locations[0] = substr($location, 0, $second_pos);
                    $locations[1] = substr($location, $second_pos+1);
                  }
                  else{
                    $pos = strpos($location, ' ');
                    $locations[0] = substr($location, 0, $pos);
                    $locations[1] = substr($location, $pos+1);
                  }
                }
                else if($space_count == 3){
                  $pos = strpos($location, ' ', strpos($location, ' ') + 1);
                  $locations[0] = substr($location, 0, $pos);
                  $locations[1] = substr($location, $pos+1);
                }
              }
              else{
                $locations[0] = "";
                $locations[1] = "";
              }
            }
            else{
              $locations[0] = "";
              $locations[1] = "";
            }
            $location_state_temp1 = DB::select("SELECT State_Abbreviated FROM bestplaces WHERE State = '".$locations[1]."' GROUP BY State_Abbreviated");
            if(empty($location_state_temp1[0]))
            {

              if($locations[0] != "" && $locations[1] != ""){
                $pos = strpos($locations[1], ' ');
                $locations[0] = $locations[0] . " " . substr($locations[1], 0, $pos);
                $locations[1] = substr($locations[1], $pos + 1);

                $location_state_temp1 = DB::select("SELECT State_Abbreviated FROM bestplaces WHERE State = '".$locations[1]."' GROUP BY State_Abbreviated");

              }
            }
            foreach($location_state_temp1 as $state){
              $location_state_temp2 = $state;
              $location_state = strtolower($location_state_temp2->State_Abbreviated);
            }
            $location1 = $locations[0]." ".$location_state;
        }else{
            $location = "Abbeville Alabama";
            $location1 = "Abbeville al";
        }
            // echo $location1;
            // echo $location;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://greatschools-org.vercel.app/api/search?query='.$location1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if(!is_object($response)){
            $location = "Abbeville Alabama";
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://greatschools-org.vercel.app/api/search?query=Abbeville+al',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
        }
        $school_data = Array();
        foreach($response->schools as $school){
            array_push($school_data, $school); 
        }

        echo json_encode($school_data);


    }

    public function getsinglerenthomemapdata(Request $request){
        $id = $request->input("query");
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://forrentapi.vercel.app/api/detail?id='.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'x-vercel-cache: MISS',
                'x-vercel-id: arn1::iad1::cqdqq-1619482511519-16db4d85f556'
            ),
        ));

        $response = curl_exec($curl);

        
        echo $response;

    }
}
