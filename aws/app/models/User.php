<?php
class User {
     
    private $url = REQUEST_URL; 

    public function __construct() {

    }
    // Get User Hash Code
    public function GetUserHashCode() {

        $hashcode = array("username" => $_POST['username'], "password" => $_POST['password']);
        $hashcode_string = json_encode($hashcode);
        $ch = curl_init($this->url);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $hashcode_string);
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $userDetail = (json_decode($result, true));
        $_SESSION['userDetail'] = $userDetail;
    }

}