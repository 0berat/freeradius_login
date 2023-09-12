<?php

//Butun URL gormek icin bu komutu kullanabiliriz.
$fullUrl = $_GET['base_grant_url'];
// echo "full_L :" . $fullUrl ;

// ip ve mac adresleri
$node_mac = urldecode($_GET['node_mac']);
$client_mac = urldecode($_GET['client_mac']);
$client_ip = urldecode($_GET['client_ip']);
// echo "<br> node mac:" . $node_mac;
// echo "<br> client ip:" . $client_ip;
// echo "<br> client mac:" . $client_mac;


//base url ve contuine url
$base_grant_url = urldecode($_GET['base_grant_url']);
$user_continue_url = urldecode($_GET['user_continue_url']);
// echo "<br> base grant:" . $base_grant_url;
// echo "<br> user contiune url:" . $user_continue_url;

$redirect_url = $_GET['base_grant_url'] . "?continue_url=" . $_GET['user_continue_url'];  // Normalde bize bu sekilde geri donus yap diyor.
// $redirect_url= urlencode($base_grant_url) . "?continue_url=" . urlencode($user_continue_url); //encode hali 


// echo "<br> redirect url:" . $redirect_url;
// header('Location: ' . $redirect_url);
?>
