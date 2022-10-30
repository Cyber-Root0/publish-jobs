<?php
      $curl = curl_init();

// Configura
$url = "http://d2wqu59crnljg5.cloudfront.net/api/index.php?empresa=aaaa&cargo=aaaaaa";
$ch = curl_init();  
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$page = curl_exec($ch);
curl_close($ch);
echo $page;

?>