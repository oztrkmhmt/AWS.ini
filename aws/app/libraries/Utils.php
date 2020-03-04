<?php
/*
   * App Utils Class
   * Contains Static Methods can be Reused Across the Site
*/
class Utils {

    //Navbar Show Username and Request Time
    public function LoginDetailonNavbar($data){
        
        $user = $_SESSION['logindetails']['title'];
        $mil = $_SESSION['logindetails']['requestTime'];
        $sec = $mil / 1000;
        echo $user .' - '. date("d/m/Y H:i:s", $sec);
    }

    //Common Curl Set Options
    public function CurlSetOpts($ch){
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    }
}
