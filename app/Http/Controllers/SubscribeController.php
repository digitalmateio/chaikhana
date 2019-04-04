<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * Class SubscribeController
 * @package App\Http\Controllers
 */
class SubscribeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function request(Request $request)
    {

        $email = $request->input('email');

        if(isset($email)){

            $email = trim($email);
            if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                // MailChimp API credentials
                $apiKey = '746392d2562c68ced7b9447b59fffbfa-us12';
                $listID = 'b2b649928b';

                // MailChimp API URL
                $memberID = md5(strtolower($email));
                $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
                $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;

                // member information
                $json = json_encode([
                    'email_address' => $email,
                    'status'        => 'subscribed',
                ]);

                // send a HTTP POST request with curl
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                $result = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                //echo json_encode($result);

                // store the status message based on response code
                if ($httpCode == 200) {
                    $SbMsg = 'You have successfully subscribed to Chaikhana.';
                    session()->flash('msg', $SbMsg);
                    return redirect()->back();
                } else {
                    switch ($httpCode) {
                        case 214:
                            $msg = 'You are already subscribed.';
                            break;
                        default:
                            $msg = 'Some problem occurred, please try again.';
                            break;
                    }
                    session()->flash('msg', $msg);
                    return redirect()->back();
                }
            }else{
                $SbMsg = 'Please enter valid email address.';
                session()->flash('msg', $SbMsg);
            }
        }



    }
}