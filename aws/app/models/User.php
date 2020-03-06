<?php
class User {
     
    private $url = REQUEST_URL; 
    private $detailsURL = LOGINDETAILS_URL;
    private $userProductsURL = USERPRODUCTS_URL;
    private $policyScreen = POLICYSCREEN_URL;

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
    
       // Get User Products
       public function UserProducts($data) {
        $userProducts = array("username" => $data['username']);
        $userProducts_string = json_encode($userProducts);
        $ch = curl_init($this->userProductsURL);
        //Call common set option from util class
        Utils::CurlSetOpts($ch);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $userProducts_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("username:" . $data['username'], "hashcode:" . $_SESSION['userDetail']['hashCode']));
        $resultCustomerDetails = curl_exec($ch); //execute
        curl_close($ch);
        $userProductsResult = (json_decode($resultCustomerDetails, true));
        $_SESSION['userProducts'] = $userProductsResult;
    }
   
    // Get User Hash Code
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
    //Get Service URL
    public function GetFuncURL()
    {
        $env_filename = __DIR__ . '/env.ini';
        $_SESSION['env'] = parse_ini_file($env_filename, true);
    }
}