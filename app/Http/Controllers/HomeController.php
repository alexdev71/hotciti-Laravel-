<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Mail;
class HomeController extends Controller
{

    public function index(Request $request){
        Session::forget("message");
        Session::forget("search_region_key");
        Session::forget("search_state_key");
        Session::forget("search_county_key");
        $weather_slider_imgs = DB::select("select * from bestplaces order by visits desc limit 12");
        if($request->input("custom_state")){
            $custom_slider_imgs = DB::select("SELECT * FROM bestplaces WHERE State='".$request->input("custom_state")."' ORDER BY ".$request->input("custom_select")." DESC LIMIT 12");
        }else{
            $custom_slider_imgs = DB::select("SELECT * FROM bestplaces WHERE Population >= 2000 ORDER BY Violent_Crime ASC LIMIT 12");
        }
        $states = DB::select("SELECT * FROM state");
        $reviews = DB::select("SELECT rev.*, bestplaces.City as City FROM rev LEFT JOIN bestplaces ON rev.IDD = bestplaces.ID WHERE rev.score=5 and rev.comment != '' and rev.IDD != 0 LIMIT 3");
    	if(Session::get("logged_in")){
    		$favs = DB::table("bestplaces")
    					->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
    					->where("fav.user_email", "=", Session::get("email"))
				        ->get();
			$username = DB::table('users')
			            ->select('first_name', 'last_name')
			            ->where('email', Session::get("email"))
			            ->get();
    		return view('home')
    				->with("favs", $favs)
    				->with("session", Session::get("logged_in"))
                    ->with("email", Session::Get("email"))
    				->with("username", $username)
    				->with("weather_slider_imgs", $weather_slider_imgs)
    				->with("custom_slider_imgs", $custom_slider_imgs)
    				->with("reviews", $reviews)
                    ->with("states", $states);
    	}else{
    		return view('home')->with("weather_slider_imgs", $weather_slider_imgs)->with("custom_slider_imgs", $custom_slider_imgs)->with("reviews", $reviews)->with("states", $states);
    	}
    }

  //   public function login(Request $request){
  //   	// echo $request->email;
  //   	if(isset($request->email) && isset($request->password)){
  //   		$email = $request->email;
  //   		$password = $request->password;
  //   		$result = DB::table('users')
  //   					->where("email", "=", $email)
  //   					->get();

  //   		if(count($result) != 0){
  //   			if(password_verify($password, $result[0]->password)){
  //                   $date = date("Y-M-d h:i:s");
  //                   $result1 = DB::select("SELECT is_premium, premium_type, premium_expire_time FROM users WHERE email='".$email."'");
  //                   // echo $result[0]->is_premium;
  //                   if($result1[0]->is_premium == true){
  //                       if($result1[0]->premium_type == "daily"){
  //                           if(strtotime($date) - strtotime($result1[0]->premium_expire_time) >= 86400){
  //                               Session::put("is_premium", false);
  //                               DB::table("users")
  //                                   ->where("email", "=", $email)
  //                                   ->delete();
  //                               return redirect("/");
  //                           }
  //                           else{
  //                               Session::put("is_premium", true);
  //                           }
  //                       }
  //                       else if($result1[0]->premium_type == "monthly"){
  //                           if(strtotime($date) - strtotime($result1[0]->premium_expire_time) >= 2592000){
  //                               Session::put("is_premium", false);
  //                               DB::table("users")
  //                                   ->where("email", "=", $email)
  //                                   ->delete();
  //                               return redirect("/");
  //                           }
  //                           else{
  //                               Session::put("is_premium", true);
  //                           }
  //                       }
  //                       else if($result1[0]->premium_type == "annual"){
  //                           if(strtotime($date) - strtotime($result1[0]->premium_expire_time) >= 31536000){
  //                               Session::put("is_premium", false);
  //                               DB::table("users")
  //                                   ->where("email", "=", $email)
  //                                   ->delete();
  //                               return redirect("/");
  //                           }
  //                           else{
  //                               Session::put("is_premium", true);
  //                           }
  //                       }
  //                   }
  //                   else{
  //                       DB::table("users")
  //                           ->where("email", "=", $email)
  //                           ->delete();
  //                       return redirect("/");
  //                   }
  //   				Session::put("email", $email);
		// 	        Session::put("first_name", $result[0]->first_name);
		// 	        Session::put("last_name", $result[0]->last_name);
		// 	        Session::put("active", $result[0]->active);
			        
		// 	        Session::put("logged_in", true);
                    
		// 	        Session::save();
		// 	        return redirect("/");
  //   			}
  //   			else{
  //   				return redirect("/");
  //   			}
  //   		}
  //   		else{
		// 		return redirect("/");
		// 	}
  //   	}
  //   	else{
		// 	return redirect("/");
		// }
  //   }

    public function login(Request $request){
        // echo $request->email;
        if(isset($request->email) && isset($request->password)){
            $email = $request->email;
            $password = $request->password;
            $result = DB::select("SELECT * FROM users WHERE email = '".$email."'");
            
            if(!empty($result)){
                if(password_verify($password, $result[0]->password)){
                  if($result[0]->active){
                    Session::put("email", $email);
                    Session::put("first_name", $result[0]->first_name);
                    Session::put("last_name", $result[0]->last_name);
                    Session::put("active", $result[0]->active);
                    
                    Session::put("logged_in", true);
                    Session::save();
                    return redirect("/");
                  }else{
                    return redirect("/");
                  }
                    
                }
                else{
                    return redirect("/");
                }
            }
            else{
                return redirect("/");
            }
        }
        else{
            return redirect("/");
        }
    }

    public function register(Request $request){
    	if(isset($request)){
    		$first_name = $request->firstname;
    		$last_name = $request->lastname;
    		$email = $request->email;
    		$password = password_hash($request->password, PASSWORD_DEFAULT);
    		$hash = md5( rand(0,1000) );
        $user_purpose = $request->input("user_purpose");
    		$check_exist = DB::table("users")
    						->where("email", "=", $email)
    						->get();
    		if(count($check_exist) != 0){
    			return redirect("/");
    		}
    		else{
    			DB::insert('insert into users (first_name, last_name, email, password, hash, active, user_purpose) values (?,?,?,?,?,?, ?)', [$first_name, $last_name, $email, $password, $hash, 1, $user_purpose]);
    			Session::put("email", $email);
		        Session::put("first_name", $first_name);
		        Session::put("last_name", $last_name);
		        Session::put("active", 1);
		        
		        Session::put("logged_in", true);
		        Session::save();
		        return redirect("/");
    		}
    	}
    }

    public function signout(){
    	Session::forget("email");
        Session::forget("first_name");
        Session::forget("last_name");
        Session::forget("active");
        Session::forget("is_premium");
        Session::forget("logged_in");
        return redirect("/");
    }

    public function setfavorite(Request $request){
        $email = $request->input("query1");
        $cityID = $request->input("query2");
        DB::insert("insert into fav (IDD, user_email) values(?, ?)", [$cityID,$email]);
        echo "success";
    }


    public function dashboard(Request $request){
        $city1 = str_replace(", ", " ", $request->input("col-search1"));
        $city2 = str_replace(", ", " ", $request->input("col-search2"));
        $city3 = str_replace(", ", " ", $request->input("col-search3"));

        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("dashboard")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3)->with("favs", $favs);
        }
        else
            return view("dashboard")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3);
    }

    public function city_compare(Request $request){
        $city1 = str_replace(", ", " ", $request->input("col-search1"));
        $city2 = str_replace(", ", " ", $request->input("col-search2"));
        $city3 = str_replace(", ", " ", $request->input("col-search3"));
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("city_compare")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3)->with("favs", $favs);
        }
        else
            return view("city_compare")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3);
    }

    public function weather_compare(Request $request){
        $city1 = str_replace(", ", " ", $request->input("col-search1"));
        $city2 = str_replace(", ", " ", $request->input("col-search2"));
        $city3 = str_replace(", ", " ", $request->input("col-search3"));
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("weather_compare")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3)->with("favs", $favs);
        }
        else
            return view("weather_compare")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3);
    }

    public function crime_compare(Request $request){
        $city1 = str_replace(", ", " ", $request->input("col-search1"));
        $city2 = str_replace(", ", " ", $request->input("col-search2"));
        $city3 = str_replace(", ", " ", $request->input("col-search3"));
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("crime_compare")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3)->with("favs", $favs);
        }
        else
            return view("crime_compare")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3);
    }

    public function politics_compare(Request $request){
        $city1 = str_replace(", ", " ", $request->input("col-search1"));
        $city2 = str_replace(", ", " ", $request->input("col-search2"));
        $city3 = str_replace(", ", " ", $request->input("col-search3"));
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("politics_compare")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3)->with("favs", $favs);
        }
        else
            return view("politics_compare")->with("city1", $city1)->with("city2", $city2)->with("city3", $city3);
    }

    public function addreview(Request $request){
            $first_name = Session::get("first_name");
            $email = Session::get("email");
            $total = $request->input("rg_total");
            $name = $request->input("name");
            $email_address = $request->input("email");
            $comment = $request->input("comment");
            $id = $request->input("IDD");

            DB::insert("insert into rev (score,name,email,comment,IDD) values (?,?,?,?,?)", [$total, $name, $email_address, $comment, $id]);
            return redirect("/singlelisting?ID=".$id);
    }

    public function forgotpassword(Request $request){
        if($request->has("email")){
            $email = $request->input("email");
            $results = DB::select("select * from users where email = ?",[$email]);
            if($results == ""){
                Session::put("message", "User with that email doesn't exist!");
                return redirect("/forgotpassword");
            }
            $email = $results[0]->email;
            $first_name = $results[0]->first_name;
            $hash = $results[0]->hash;
            Session::put("message", "Please check your email ".$email." for a confirmation link to complete your password reset!");
            $to      = $email;
            $subject = 'Password Reset Link ( town-finder.com )';
            $message_body = '
            Hello '.$first_name.',

            You have requested password reset!

            Please click this link to reset your password:

            http://town-finder.com/web/reset.php?email='.$email.'&hash='.$hash;  

            // Mail::send('forgot', ['user' => $results[0]], function ($m) use ($results) {
            //     $m->from('hello@app.com', 'Your Application');

            //     $m->to($results[0]->email, $results[0]->first_name)->subject('Your Reminder!');
            // });
            return view("forgot");
        }
        else{
            return view("forgot");
        }
    }

    public function top10(Request $request){
        $array = Array();
        $state_value = '';
        $city_value = '';
        $region_value = '';
        $order_value = '';
        $query_state = "SELECT * FROM state";
        $states = DB::select($query_state);
        if($request->has("btn_submit")){
            $state_value = $request->input("custom_state");
            $city_value = $request->input("custom_city");
            $region_value = $request->input("custom_region_list");
            $order_value = $request->input("custom_select");
            $query = "SELECT bestplaces.*, COUNT(email) AS NumberOf, CAST(AVG(score) AS DECIMAL(10, 1)) AS AverageRating FROM bestplaces LEFT JOIN rev on rev.IDD = bestplaces.ID WHERE 1 ";

            if($request->input("custom_state") != ""){
                $query .= " AND State = '".$request->input("custom_state")."' ";
            }

            if($request->input("custom_city") != ""){
                $query .= " AND County = '".$request->input("custom_city")."' ";
            }

            if($request->input("custom_region_list") != ""){
                $query .= " AND Region = '".$request->input("custom_region_list")."' ";
            }

            $query .= " GROUP BY bestplaces.ID ";

            if($request->input("custom_select") != ""){
                if($request->input("custom_select") === 'populationH') {
                    $query .= ' ORDER BY Population DESC ';
                }
                if($request->input("custom_select") === 'populationL') {
                    $query .= ' ORDER BY Population ASC ';
                }
                if($request->input("custom_select") === 'snowH') {
                    $query .= ' ORDER BY Snowfall_in_ DESC ';
                }
                if($request->input("custom_select") === 'snowL') {
                    $query .= ' ORDER BY Snowfall_in_ ASC ';
                }
                if($request->input("custom_select") === 'livingcostH') {
                    $query .= ' ORDER BY Overall_Cost_Of_Living DESC ';
                }
                if($request->input("custom_select") === 'livingcostL') {
                    $query .= ' ORDER BY Overall_Cost_Of_Living ASC ';
                }
                if($request->input("custom_select") === 'violentcrimeH') {
                    $query .= ' ORDER BY Violent_Crime DESC ';
                }
                if($request->input("custom_select") === 'violentcrimeL') {
                    $query .= ' ORDER BY Violent_Crime ASC ';
                }
                if($request->input("custom_select") === 'med_homecostH') {
                    $query .= ' ORDER BY Median_Home_Cost DESC ';
                }
                if($request->input("custom_select") === 'med_homecostL') {
                    $query .= ' ORDER BY Median_Home_Cost ASC ';
                }
                if($request->input("custom_select") === 'registered_democratH') {
                    $query .= ' ORDER BY Democrat DESC ';
                }
                if($request->input("custom_select") === 'registered_democratL') {
                    $query .= ' ORDER BY Democrat ASC ';
                }
                if($request->input("custom_select") === 'registered_republicanH') {
                    $query .= ' ORDER BY Republican DESC ';
                }
                if($request->input("custom_select") === 'registered_republicanL') {
                    $query .= ' ORDER BY Republican ASC ';
                }
                if($request->input("custom_select") === 'sunny_daysH') {
                    $query .= ' ORDER BY Sunny_Days DESC ';
                }
                if($request->input("custom_select") === 'sunny_daysL') {
                    $query .= ' ORDER BY Sunny_Days ASC ';
                }
                if($request->input("custom_select") === 'high_temperatureH') {
                    $query .= ' ORDER BY Avg__July_High DESC ';
                }
                if($request->input("custom_select") === 'high_temperatureL') {
                    $query .= ' ORDER BY Avg__July_High ASC ';
                }
                if($request->input("custom_select") === 'commute_timeH') {
                    $query .= ' ORDER BY Commute_Time DESC ';
                }
                if($request->input("custom_select") === 'commute_timeL') {
                    $query .= ' ORDER BY Commute_Time ASC ';
                }
            }

            $query .= " LIMIT 10";
        }else{
            $query = "SELECT bestplaces.*, COUNT(email) AS NumberOf, CAST(AVG(score) AS DECIMAL(10, 1)) AS AverageRating FROM bestplaces LEFT JOIN rev on rev.IDD = bestplaces.ID GROUP BY bestplaces.ID LIMIT 10";
        }

        array_push($array, $state_value, $city_value, $region_value, $order_value);

        $results = DB::select($query);
        // echo $query;
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("top10")->with("results", $results)->with("states", $states)->with("array", $array)->with("favs", $favs);
        }
        else
            return view("top10")->with("results", $results)->with("states", $states)->with("array", $array);
        
    }

    public function head_to_head_compare(Request $request){
        $array1 = Array();
        $array2 = Array();
        $city1 = str_replace(", ", " ", $request->input("head_compare1"));
        $city2 = str_replace(", ", " ", $request->input("head_compare2"));
        $query1 = "SELECT ID, City_State_Combined, Unemployment_Rate, Property_Crime, Violent_Crime, Sunny_days, Sales_Taxes, Income_Taxes, Property_Tax_Rate, High_School_Grads_, Picture_Links FROM bestplaces WHERE City_State_Combined = '".$city1."' OR Zip_Code = '".$city1."'";
        $query2 = "SELECT ID, City_State_Combined, Unemployment_Rate, Property_Crime, Violent_Crime, Sunny_days, Sales_Taxes, Income_Taxes, Property_Tax_Rate, High_School_Grads_, Picture_Links FROM bestplaces WHERE City_State_Combined = '".$city2."' OR Zip_Code = '".$city2."'";
        $city2 = $request->input("head_compare2");
        $results1 = DB::select($query1);
        $results2 = DB::select($query2);
        if(empty($results1[0]) || empty($results2[0])){
            return redirect("head_to_head");
        }
        foreach($results1 as $result){
            $array1 = [
                "ID"=>$result->ID,
                "City_State_Combined"=>$result->City_State_Combined,
                "Unemployment_Rate"=>$result->Unemployment_Rate,
                "Property_Crime"=>$result->Property_Crime,
                "Violent_Crime"=>$result->Violent_Crime,
                "Sunny_days"=>$result->Sunny_days,
                "Sales_Taxes"=>$result->Sales_Taxes,
                "Income_Taxes"=>$result->Income_Taxes,
                "Property_Tax_Rate"=>$result->Property_Tax_Rate,
                "High_School_Grads_"=>$result->High_School_Grads_,
                "Picture_Links"=>$result->Picture_Links
            ];
        }
        foreach($results2 as $result2){
            $array2 = [
                "ID"=>$result->ID,
                "City_State_Combined"=>$result2->City_State_Combined,
                "Unemployment_Rate"=>$result2->Unemployment_Rate,
                "Property_Crime"=>$result2->Property_Crime,
                "Violent_Crime"=>$result2->Violent_Crime,
                "Sunny_days"=>$result2->Sunny_days,
                "Sales_Taxes"=>$result2->Sales_Taxes,
                "Income_Taxes"=>$result2->Income_Taxes,
                "Property_Tax_Rate"=> $result2->Property_Tax_Rate,
                "High_School_Grads_"=> $result2->High_School_Grads_,
                "Picture_Links"=>$result2->Picture_Links
            ];
        }
        // print_r($array1);
        // print_r($array2);
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("head_to_head_compare")->with("array1", $array1)->with("array2", $array2)->with("favs", $favs);
        }
        else
            return view("head_to_head_compare")->with("array1", $array1)->with("array2", $array2);
        
    }

    public function pdfview(Request $request){
        $ID = $request->input("ID");
        $results = DB::select("SELECT * FROM bestplaces WHERE ID='".$ID."'");


        foreach ($results as $result) {
            $row = $result;
        }
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("pdfview")->with("row", $row)->with("favs", $favs);
        }
        else
            return view("pdfview")->with("row", $row);
        
    }

    public function removefav(Request $request){
      $ID = $request->input("id");
      $query = "DELETE FROM fav WHERE id = ".$ID;
      $result = DB::select($query);
      echo "success";
    }

    public function town_report_form(Request $request){
      $form_location = "";
      $email = "";
      $full_name = "";
      $phone_number = "";
      $content = "";
      if($request->has("form_location")){
        $form_location = $request->input("form_location");
      }
      if($request->has("EMAIL")){
        $email = $request->input("EMAIL");
      }
      if($request->has("FNAME")){
        $full_name = $request->input("FNAME");
      }
      if($request->has("phone")){
        $phone_number = $request->input("phone");
      }
      if($request->has("MMERGE5")){
        $content = $request->input("MMERGE5");
      }
      $query = "INSERT INTO tb_town_report (full_name, phone_number, email, content, location) VALUES ('".$full_name."', '".$phone_number."', '".$email."', '".$content."', '".$form_location."')";
      DB::select($query);
      echo "success";
    }


    public function view_real_estate(Request $request){
      if($request->has("ID")){
        $ID = $request->input("ID");
        $query = "SELECT * FROM bestplaces WHERE ID = $ID";
        $results = DB::select($query);
        foreach($results as $result){
          $row = $result;
        }
        return view("view_real_estate")->with("row", $row);
      }
      else{
        $City_State_Combined = $request->input("city_home_search");
        $query = "SELECT * FROM bestplaces WHERE City_State_Combined = '$City_State_Combined' OR Zip_Code = '$City_State_Combined'";
        $results = DB::select($query);
        foreach($results as $result){
          $row = $result;
        }
        return view("view_real_estate")->with("row", $row);
      }
    }


    public function view_match_table(Request $request){
      if($request->has("county_home_search")){
        $key = $request->input("county_home_search");
        $results = DB::table("bestplaces")
              ->where("County", "like", $key."%")
              ->limit(25)
              ->get();
        if(Session::get("logged_in"))
          {
              $favs = DB::table("bestplaces")
                      ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                      ->where("fav.user_email", "=", Session::get("email"))
                      ->get();
              return view("view_match_table")->with("results", $results)->with("favs", $favs);
          }
          else
              return view("view_match_table")->with("results", $results);
      }
      else if($request->has("state_home_search")){
        $key = $request->input("state_home_search");
        $results = DB::table("bestplaces")
              ->where("State", "like", $key."%")
              ->limit(25)
              ->get();
        if(Session::get("logged_in"))
          {
              $favs = DB::table("bestplaces")
                      ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                      ->where("fav.user_email", "=", Session::get("email"))
                      ->get();
              return view("view_match_table")->with("results", $results)->with("favs", $favs);
          }
          else
              return view("view_match_table")->with("results", $results);
      }
    }

    public function save_questions(Request $request){
      $email = $request->input("question_email");
      $name = $request->input("question_name");
      $phone = $request->input("question_phone");
      $message = $request->input("question_message");
      DB::select("INSERT INTO tbl_messages (full_name, email, phone, message) VALUES ('".$name."', '".$email."', '".$phone."', '".$message."')");
      echo "success";
    }

    public function save_home_info(Request $request){
      $first_name = $request->input("first_name");
      $last_name = $request->input("last_name");
      $location = $request->input("location");
      $email = $request->input("email");
      $phone_number = $request->input("phone_number");
      $bedrooms = $request->input("bedrooms");
      $bathrooms = $request->input("bathrooms");
      $home_type = json_encode($request->input("home_type"));
      $home_purpose = $request->input("home_purpose");
      $min_price = $request->input("min_price");
      $max_price = $request->input("max_price");
      $query = "INSERT INTO tbl_user_home_info (first_name, last_name, email, phone_number, bedrooms, bathrooms, home_types, home_purpose, min_price, max_price, location) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$phone_number."', '".$bedrooms."', '".$bathrooms."', '".$home_type."', '".$home_purpose."', '".$min_price."', '".$max_price."', '".$location."')";
      DB::select($query);
      echo "success";
    }

    public function location_home(Request $request){
      $location = $request->input("location");
      $location1 = str_replace(" ", "+", $location);
      // echo $location;
      $curl = curl_init();
      $home_datas = Array();
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
      // print_r($response);
      foreach($response->searchResults->listResults AS $home_data){
        array_push($home_datas, $home_data);
      }
      return view("location_home")->with("location", $location)->with("home_datas", $home_datas);
    }

    public function home_detail_view(Request $request){
      $id = $request->input("id");
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
      $response = json_decode($response);
      // print_r($response->responsivePhotos);
      return view("home_detail_view")->with("home_detail", $response);
    }

    public function find_homes(Request $request){
      $price_range = "";
      $home_type = "";
      if($request->has("price_filter")){
        $price_range = $request->input("price_filter");
      }

      if($request->has("home_type_filter")){
        $home_type = $request->input("home_type_filter");
      }
      if($request->has("location")){
        $location = $request->input("location");
        if(strpos($location, "_") !== false){
          $location = str_replace("_", " ", $location);
        }
        
      }else{
        $location = "Abbeville Alabama";
      }
      
      $location1 = str_replace(" ", "+", $location);
      // echo $location;
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
      if(!is_object($response)){
        $location = "Abbeville Alabama";
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://zillow.vercel.app/api/search?query=Abbeville Alabama',
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
      }
      $homes_for_list = Array();
      foreach($response->searchResults->listResults as $home){
        if($price_range != "" && $home_type == ""){
          if($home->unformattedPrice > $price_range){
            array_push($homes_for_list, $home);
          }
        }

        if($home_type != "" && $price_range == ""){
          if($home->hdpData->homeInfo->homeType == $home_type){
            array_push($homes_for_list, $home);
          }
        }

        if($price_range != "" && $home_type != ""){
          if($home->unformattedPrice > $price_range && $home->hdpData->homeInfo->homeType == $home_type){
            array_push($homes_for_list, $home);
          }
        }

        if($price_range == "" && $home_type == ""){
          array_push($homes_for_list, $home);
        }

         
      }
      $filter_array = Array();
      array_push($filter_array, $price_range, $home_type);
      if(Session::get("logged_in"))
      {
          $favs = DB::table("bestplaces")
                  ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                  ->where("fav.user_email", "=", Session::get("email"))
                  ->get();
          return view("find_homes")->with("favs", $favs)->with("homes_for_list", $homes_for_list)->with("location", $location)->with("filter_array", $filter_array);
      }
      else
          return view("find_homes")->with("homes_for_list", $homes_for_list)->with("location", $location)->with("filter_array", $filter_array);
    }

    public function find_schools(Request $request){
      
      if($request->has("location")){
        $location = $request->input("location");
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
        }
        else{
          $locations[0] = "";
          $locations[1] = "";
          $location1 = $request->input("location");
        }
        
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
      $schools_for_list = Array();
      foreach($response->schools as $school){
        array_push($schools_for_list, $school); 
      }
      if(Session::get("logged_in"))
      {
          $favs = DB::table("bestplaces")
                  ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                  ->where("fav.user_email", "=", Session::get("email"))
                  ->get();
          return view("find_schools")->with("favs", $favs)->with("schools_for_list", $schools_for_list)->with("location", $location);
      }
      else
          return view("find_schools")->with("schools_for_list", $schools_for_list)->with("location", $location);
    }

    public function school_detail_view(Request $request){
      
      $search_key = $request->input("search_key");

      $elements = explode("-", $search_key);

      $id = $elements[0];
      $city = $elements[1];
      $state = $elements[2];
      $name = $elements[3];
      $name = str_replace(" ", "-", $name);

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://greatschools-org.vercel.app/api/detail?path=/'.$state.'/'.$city.'/'.$id.'-'.$name.'/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      ));
      // echo 'https://greatschools-org.vercel.app/api/detail?path=/'.$state.'/'.$city.'/'.$id.'-'.$name.'/';
      $response = curl_exec($curl);
      $response = json_decode($response);
      // print_r($response);
      curl_close($curl);
      return view("school_detail_view")->with("school_data", $response);

    }

    public function home_appointment(Request $request){
      $name = $request->input("name");
      $email = $request->input("email");
      $phone_number = $request->input("phone_number");
      $appointment_type = $request->input("appointment_type");
      $appointment_date = $request->input("appointment_date");
      $appointment_time = $request->input("appointment_time");

      $appointment_date = date("Y-m-d", strtotime($appointment_date));
      // echo $appointment_date;
      $query = "INSERT INTO tbl_home_appointment (name, email, phone_number,appointment_type, appointment_date, appointment_time) VALUES ('".$name."', '".$email."', '".$phone_number."','".$appointment_type."', '".$appointment_date."', '".$appointment_time."')";
      DB::select($query);
      echo "success";
    }

    public function gun_laws(Request $request){
      $state = "";
      if($request->has("state")){
        $state = $request->input("state");
      }

      if($state == ""){
        $state = "Alabama";
      }

      $query = "SELECT * FROM tbl_gun_laws WHERE state = '".$state."'";
      $results = DB::select($query);
      $states = DB::select("SELECT state FROM tbl_gun_laws GROUP BY state");
      return view("gun_laws")->with("results", $results)->with("gun_states", $states)->with("state", $state);
    }

    public function street_view(Request $request){
      $city = "Abbeville";
      $state = "Alabama";
      if($request->has("city"))
        $city = $request->input("city");
      
      if($request->has("state"))
        $state = $request->input("state");
        
      if($request->has("location")){
        $location_results = DB::select("SELECT City, State FROM bestplaces WHERE City_State_Combined = '".$request->input('location')."'");
        foreach($location_results as $location_result){
          $city = $location_result->City;
          $state = $location_result->State;
        }
      }


      if($city != "" && $state != ""){
        $location = Array();
        array_push($location, $city, $state);
        $query = "SELECT bestplaces.*, COUNT(email) AS NumberOf, CAST(AVG(score) AS DECIMAL(10, 1)) AS AverageRating FROM bestplaces LEFT JOIN rev on rev.IDD = bestplaces.ID WHERE City = '".$city."' AND State = '".$state."'";
        $result = DB::select($query);
        return view("street_view")->with("results", $result)->with("location", $location);
      }
    }

    public function find_homes_for_rent(Request $request){
      $location1 = "Abbeville, LA";
      $location = "Abbeville Louisiana";
      if($request->has("location")){
        $query = "SELECT City, State_Abbreviated FROM bestplaces WHERE City_State_Combined = '".$request->input("location")."'";
        $results = DB::select($query);
        foreach($results as $result){
          $city = $result->City;
          $state = $result->State_Abbreviated;
        }
        $location1 = $city.", ".$state;
        $location = $request->input("location");
      }
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://forrent.vercel.app/api/search?query='.$location1,
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
      $response = json_decode($response);
      // print_r($response);
      curl_close($curl);
      if(is_object($response)){
        
        $homes_data = Array();
        foreach($response->data as $home_data){
          array_push($homes_data, $home_data);
        }
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("find_homes_for_rent")->with("favs", $favs)->with("homes_data", $homes_data)->with("location", $location);
        }
        else
            return view("find_homes_for_rent")->with("homes_data", $homes_data)->with("location", $location);
      }else{
        $homes_data = Array();
        
        if(Session::get("logged_in"))
        {
            $favs = DB::table("bestplaces")
                    ->leftJoin("fav", "bestplaces.ID", "=", "fav.IDD")
                    ->where("fav.user_email", "=", Session::get("email"))
                    ->get();
            return view("find_homes_for_rent")->with("favs", $favs)->with("homes_data", $homes_data)->with("location", $location);
        }
        else
            return view("find_homes_for_rent")->with("homes_data", $homes_data)->with("location", $location);
      }
      

    }

    public function getrenthomemapdata(Request $request){
      $location1 = "Abbeville, LA";
      $location = "Abbeville Louisiana";
      if($request->has("query")){
        $query = "SELECT City, State_Abbreviated FROM bestplaces WHERE City_State_Combined = '".$request->input("query")."'";
        $results = DB::select($query);
        foreach($results as $result){
          $city = $result->City;
          $state = $result->State_Abbreviated;
        }
        $location1 = $city.", ".$state;
        $location = $request->input("query");
      }
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://forrent.vercel.app/api/search?query='.$location1,
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
      $response = json_decode($response);
      curl_close($curl); 
      if(is_object($response)){
        
        $homes_data = Array();
        foreach($response->data as $home_data){
          array_push($homes_data, $home_data);
        }
        echo json_encode($homes_data);
      }else{
        $homes_data = Array();
        echo json_encode($homes_data);
        
      }
    }

    public function rent_home_detail_view(Request $request){
      $id = $request->input("id");
      $curl = curl_init();

      curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://forrent.vercel.app/api/detail?id='.$id,
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
      $response = json_decode($response);
      

      return view("rent_home_detail_view")->with("single_home_data", $response);
    }

    public function find_hotels(Request $request){
      $city = "Abbeville";
      $state = "Alabama";
      if($request->has("location")){
        $query = "SELECT * FROM bestplaces where City_State_Combined = '".$request->input("location")."'";
        $results = DB::select($query);
        foreach ($results as $result) {
          $lat = $result->Latitude;
          $lon = $result->Longitude;
          $city = $result->City;
          $state = $result->State;
        }
      }
      else{
        $query = "SELECT * FROM bestplaces where City_State_Combined = 'Abbeville Alabama'";
        $results = DB::select($query);
        foreach ($results as $result) {
          $lat = $result->Latitude;
          $lon = $result->Longitude;
          $city = $result->City;
          $state = $result->State;
        }
      }
      $location = $city." ".$state;
      $query = "SELECT * FROM tbl_hotels WHERE ABS(latitude - ".$lat.") <= 0.3 AND ABS(Longitude - ".$lon.") <=  0.3 ";
      $results = DB::select($query);
      return view("find_hotels")->with("hotels", $results)->with("location", $location);
    }

    public function gethotelsmapdata(Request $request){
      $location = $request->input("query");
      $query = "SELECT * FROM bestplaces where City_State_Combined = '".$request->input("query")."'";
      $results = DB::select($query);
      foreach ($results as $result) {
        $lat = $result->Latitude;
        $lon = $result->Longitude;
      }
      $query = "SELECT * FROM tbl_hotels WHERE ABS(latitude - ".$lat.") <= 0.3 AND ABS(Longitude - ".$lon.") <=  0.3 ";
      // echo $query;
      $results = DB::select($query);
      echo json_encode($results);
    }

    public function hotel_detail_view(Request $request){
      $id = $request->input("search_key");
      $query = "SELECT * FROM tbl_hotels WHERE id = ".$id."";
      $results = DB::select($query);
      $hotel_details = Array();
      foreach($results as $result){
        array_push($hotel_details, $result);
      }
      return view("hotel_detail_view")->with("hotel_details", $hotel_details);
    }

    public function find_colleges(Request $request){
      $location = "Alabama";
      if($request->has("location")){
        $location = $request->input("location");
      }
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://niche-com-api.vercel.app/api/search?query='.$location,
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
      $response = json_decode($response);
      curl_close($curl);
      $colleges_data = Array();
      foreach($response->entities as $college_data){
        array_push($colleges_data, $college_data);
      }

      return view("find_colleges")->with("colleges_data", $colleges_data)->with("location", $location);

    }

    public function getcollegesmapdata(Request $request){
      $location = $request->input("query");
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://niche-com-api.vercel.app/api/search?query='.$location,
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
      $response = json_decode($response);
      $colleges_data = Array();
      foreach($response->entities as $college_data){
        array_push($colleges_data, $college_data);
      }
      echo json_encode($colleges_data);
    }

    public function college_detail_view(Request $request){
      $name = $request->input("search_key");
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://niche-com-api.vercel.app/api/detail?path='.$name,
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
      $response = json_decode($response);
      curl_close($curl);
      return view("college_detail_view")->with("college_data", $response);

    }
} 
