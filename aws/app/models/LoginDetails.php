<?php
class LoginDetails {
     
    private $detailsURL = LOGINDETAILS_URL;

    public function __construct() {

    }

    // Get User Details
    public function GetLoginDetails($data) {
        $userDetails = array("username" => $data['username'], "hashcode" => $_SESSION['userDetail']['hashCode']);
        $userDetails_string = json_encode($userDetails);
        $ch = curl_init($this->detailsURL);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $userDetails_string);
        $resultUserDetails = curl_exec($ch); //execute
        curl_close($ch);
        $details = (json_decode($resultUserDetails, true));
        $_SESSION['logindetails'] = $details;
    }

}