<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Session;
use DB;
class PayPalController extends Controller
{
    public function payment(Request $request)
    {
        $payment_amount = $request->input("payment_amount");
        $premium_type = $request->input("premium_type");
        $first_name = $request->firstname;
        $last_name = $request->lastname;
        $email = $request->email;
        $password = password_hash($request->password, PASSWORD_DEFAULT);
        $hash = md5( rand(0,1000) );
        
        $request_data = [];

        array_push($request_data, $first_name, $last_name, $email, $password, $hash, $premium_type);

        Session::put("request_data", $request_data);

        $data = [];
        $data['items'] = [
            [
                'name' => 'hotciti.com',
                'price' => $payment_amount,
                'desc'  => 'Payment for your hotciti.com premium membership',
                'qty' => 1
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $payment_amount;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);

        
        return redirect($response['paypal_link']);
    }
   
    public function cancel()
    {
        dd('Your payment is canceled.');
    }

    public function success(Request $request)
    {
        $provider = New ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($request->token);
        
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $request_data = Session::get("request_data");
            $first_name = $request_data[0];
            $last_name = $request_data[1];
            $email = $request_data[2];
            $password = $request_data[3];
            $hash = $request_data[4];
            $premium_type = $request_data[5];

            if($premium_type == "daily")
                $date = Date('Y-m-d h:i:s', strtotime('+1 days'));
            else if($premium_type == "monthly")
                $date = Date('Y-m-d h:i:s', strtotime('+1 months'));
            else if($premium_type == "annual")
                $date = Date('Y-m-d h:i:s', strtotime('+1 years'));
           
            $check_exist = DB::table("users")
                            ->where("email", "=", $email)
                            ->get();
            if(count($check_exist) != 0){
                return redirect("/");
            }
            else{
                DB::insert('insert into users (first_name, last_name, email, password, hash, active, is_premium, premium_type, premium_expire_time) values (?,?,?,?,?,?,?,?,?)', [$first_name, $last_name, $email, $password, $hash, 1, true, $premium_type, $date]);
                Session::put("email", $email);
                Session::put("first_name", $first_name);
                Session::put("last_name", $last_name);
                Session::put("active", 1);        
                Session::put("is_premium", true);
                Session::put("logged_in", true);
                Session::save();
            }
            return redirect("/");
        }
  
        dd('Something is wrong.');
    }
}
