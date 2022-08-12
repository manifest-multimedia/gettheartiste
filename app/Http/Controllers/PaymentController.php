<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Jetstream\Jetstream;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $input)
    {

        Validator::make($input->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();



        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            dd($e);
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }



    /* ==================================ajax api =============== */
    public function verify($reference) {

        // $secret_key = env('PAYSTACK_SECRET_KEY');
         $secret_key = "sk_test_5553cccc7c466ac63601b4a857a3111c488912be";
         $curl = curl_init();
         curl_setopt_array($curl, array(
             CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_ENCODING => "",
             CURLOPT_MAXREDIRS => 10,

             //These two lines should be commented out with the system is live
             CURLOPT_SSL_VERIFYHOST => 0,
             CURLOPT_SSL_VERIFYPEER =>0,

             CURLOPT_TIMEOUT => 30,
             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "GET",
             CURLOPT_HTTPHEADER => array(
             "Authorization: Bearer $secret_key",
             "Cache-Control: no-cache",
             ),
         ));

         $response = curl_exec($curl);
         $err = curl_error($curl);
         curl_close($curl);
         $newdata = json_decode($response);
       //  return response()->json(['status'=>true,"redirect_url"=>url('dashboard')]);

       return [$newdata];
    }

    public function saveReceipt($reference, $fname, $lname, $email, $phone, $pass, $apptTime, $apptDate) {
        dd($fname,$lname,$phone, $pass,$apptDate, $apptTime);

        // $secret_key = env('PAYSTACK_SECRET_KEY');
        // $secret_key = "sk_test_5553cccc7c466ac63601b4a857a3111c488912be";
        $secret_key = "sk_test_2b83de80ed4da5b5a9a0ecd1005bdd31a6732099";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,

            //These two lines should be commented out with the system is live
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER =>0,

            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secret_key",
            "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $newdata = json_decode($response);

        $user = User::create([
        'firstname' => $fname,
        'lastname' => $lname,
        'mobile' => $phone,
        'email' => $email,
        'password' => Hash::make($pass),
        'account_status'=> '0',
        'user_role' => 'user',

        ]);

        Payment::create([
            'user_id' => $user->id,
            'reference' => $newdata->data->reference,
            'amount' => $newdata->data->amount,
            'requested_amount' => $newdata->data->requested_amount,
            'gateway_response' => $newdata->data->gateway_response,
            'channel' => $newdata->data->channel,
            'currency' => $newdata->data->currency,
            'ip_address' => $newdata->data->ip_address,
            /*   'customer' => $newdata->data->customer,
            'log' => $newdata->data->log, */

        ]);

        //dd($newdata->data);

        return redirect()->route('booking');


    }
}
