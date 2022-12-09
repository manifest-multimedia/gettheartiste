<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use App\Models\TempUser;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class MakePaymentController extends Controller
{
    //

    public function make_payment(Request $input)
    {
        Validator::make($input->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required|numeric',
            'password' => ['required',Password::min(8)],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $phone = ($input->phonenumber) ? $input->phonenumber : $input->phone ;

        $formData = [
            'email' => $input->email,
            'amount' => 10 * 100,
            'callback_url' => url('payment/callback')
        ];


        try {

            $pay = json_decode($this->initiate_payment($formData));

            if($pay->status){

                TempUser::create([
                    'firstname' => $input->firstname,
                    'lastname' => $input->lastname,
                    'email' => $input->email,
                    'phone' => $phone,
                    'password' => Hash::make($input['password']),
                    'payment_ref'=>$pay->data->reference
                ]);

                return redirect($pay->data->authorization_url);

            } else{

                return back()->withError($pay->message);

            }

        } catch (\Throwable $th) {
            //throw $th;
            return back()->withError("Something went wrong");
        }

    }

    public function payment_callback(Request $request)
    {


        try {

            $reference=$request->reference;
            // $reference="b5pvz7t1tg";
            $response = json_decode($this->verify_payment($reference));


                if ($response->status) {
                    $paymentDetails = $response->data;

                  $customer_email=$paymentDetails->customer->email;

                  $tempUser = TempUser::where('payment_ref', $reference)->first();

                    $user = User::create([
                        'firstname' => $tempUser->firstname,
                        'lastname' => $tempUser->lastname,
                        'email' => $tempUser->email,
                        'mobile' => $tempUser->phone,
                        'password' => $tempUser->password,
                        'account_status'=> '0',
                        'user_role' => 'user',
                    ]);

                    Payment::create([
                        'user_id' => $user->id,
                        'reference' => $paymentDetails->reference,
                        'amount' => $paymentDetails->amount,
                        'requested_amount' => $paymentDetails->requested_amount,
                        'gateway_response' => $paymentDetails->gateway_response,
                        'channel' => $paymentDetails->channel,
                        'currency' => $paymentDetails->currency,
                        'ip_address' => $paymentDetails->ip_address
                    ]);

                     return redirect('dashboard');

                } else {

                    dd("ERROR");

                    return back()->withError($response->message);
                }

        } catch (\Throwable $th) {
            //throw $th;
            dd("OOps".$th);
            return back()->withError("Something went wrong");

        }


    }

    public function initiate_payment($formData)
    {

        $url = "https://api.paystack.co/transaction/initialize";

        $authorization_token=config("paystack.secretKey");

        $fields_string = http_build_query($formData);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $authorization_token,
            "Cache-Control: no-cache",
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function verify_payment($reference)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . config("paystack.secretKey"),
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return  $response;
    }
}
