<?php
class PolicyScreen {
     
    private $policyScreen = POLICYSCREEN_URL;

    public function __construct() {

    }

    // Get Policy Screen
    public function GetPolicyScreen($data) {
        $getPolicy = array("username" => $data['username'] , "productid" => "ASM", "policytype" => "K");
        $getPolicy_string = json_encode($getPolicy);
        $ch = curl_init($this->policyScreen);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $getPolicy_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode']));
        $result = curl_exec($ch); //execute
        curl_close($ch);
        $policyScreenDetail = (json_decode($result, true));
        $_SESSION['policyScreen'] = $policyScreenDetail;
    }

}