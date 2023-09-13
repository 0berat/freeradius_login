<!DOCTYPE html>
<html>
<head>
    <title>Giriş Sayfası</title>
</head>
<body>
<?php

    // Form gönderildiğinde işlenecek kod
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kullanıcı adı ve parolayı alın
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Giriş başarılı mesajını gösterin
    }
    ?>

    <h2>Giriş Yapın</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Parola:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>



<?php
ini_set('display_errors', 1);

// ip ve mac adresleri
$node_mac = urldecode($_GET['node_mac']);
$client_mac = urldecode($_GET['client_mac']);
$client_ip = urldecode($_GET['client_ip']);
echo "<br> node mac:" . $node_mac;
echo "<br> client ip:" . $client_ip;
echo "<br> client mac:" . $client_mac."<br>";


//base url ve contuine url
$base_grant_url = urldecode($_GET['base_grant_url']);
$user_continue_url = urldecode($_GET['user_continue_url']);
// echo "<br> base grant:" . $base_grant_url;
// echo "<br> user contiune url:" . $user_continue_url;

$redirect_url = $_GET['base_grant_url'] . "?continue_url=" . $_GET['user_continue_url'];  // Normalde bize bu sekilde geri donus yap diyor.
// $redirect_url= urlencode($base_grant_url) . "?continue_url=" . urlencode($user_continue_url); //encode hali 


// echo "<br> redirect url:" . $redirect_url;
// header('Location: ' . $redirect_url);


/**
 * RADIUS client example using PAP password.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/Radius/autoload.php';
echo "redirect url: ". $redirect_url;

//~ $server = (getenv('RADIUS_SERVER_ADDR')) ?: '127.0.0.1';
$server = (getenv('RADIUS_SERVER_ADDR')) ?: '127.0.0.1';
$user   = (getenv('RADIUS_USER'))        ?: $username;
$pass   = (getenv('RADIUS_PASS'))        ?: $password;
$secret = (getenv('RADIUS_SECRET'))      ?: 'deneme';
$debug='';
#$debug  = in_array('-v', $_SERVER['argv']);

$radius = new \Dapphp\Radius\Radius();
$radius->setServer($server)        // IP or hostname of RADIUS server
       ->setSecret($secret)       // RADIUS shared secret
       ->setNasIpAddress('192.168.1.16')  // IP or hostname of NAS (device authenticating user)
       ->setAttribute(32, 'vpn')       // NAS identifier
       ->setDebug((bool)$debug);                  // Enable debug output to screen/console


// Send access request for a user with username = 'username' and password = 'password!'
echo "Sending access request to $server with username $user\n<br>";
$response = $radius->accessRequest($user, $pass);
var_dump($response);
if ($response === false) {
    // false returned on failure
    echo sprintf("Access-Request failed with error %d (%s).\n<br>",
        $radius->getErrorCode(),
        $radius->getErrorMessage()
    );

   echo "yanlis kullanici adi veya parola";
   echo "kullanici isminiz: $user  <br>";
   echo "parolaniz: $pass <br>";

} else {
//Kullanici girisi dogru yapildiginda yapilacak islevler buraya yaziliyor
$ipAdresi = $_SERVER['REMOTE_ADDR'];
//header('Location: http://localhost:5001/splash/grant?continue_url=https://developer.cisco.com/meraki');
header('Location: ' . $redirect_url);
exit;
echo " <br>IP Adresiniz: $ipAdresi <br> " ;
echo "<br>Success!  Received Access-Accept response from RADIUS server.<br> ";
}
#$radius = radius_auth_open();
# phpinfo(); 
?>
