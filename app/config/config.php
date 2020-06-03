<?php   
  $sitedoc = $_SERVER['DOCUMENT_ROOT']."/jaiz";
  $site = "http://localhost/jaiz"; 
  $url  = "http://127.0.0.1:8000";
    //live config
  //$sitedoc = $_SERVER['DOCUMENT_ROOT'];
  //$site = "http://rsbopp-pds.rsbopp.rv.gov.ng:85"; 
  if(!isset($_SESSION['user_id'])){ 
      header("location: ../index.php"); 
      }
  
  
  
?>
