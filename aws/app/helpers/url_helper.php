<?php
  // Page redirect
  function redirect($page){
    header('location: ' . URLROOT . $page);
  }

  //cURL Request URL
  define('REQUEST_URL','http://10.1.0.206:8080/AwsLocalService-V1.0/aws/login/hash');

  //cURL Request User Details
  define('LOGINDETAILS_URL','http://10.1.0.206:8080/AwsLocalService-V1.0/aws/login/logindetail');

  //cURL Request Users Policy Screen
  define('POLICYSCREEN_URL','http://10.1.0.206:8080/AwsLocalService-V1.0/aws/service/policyScreenN01');
