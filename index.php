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

/**
 * RADIUS client example using PAP password.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/Radius/autoload.php';

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

// Kullanıcının IP adresini almak için $_SERVER['REMOTE_ADDR'] kullanıyoruz
$ipAdresi = $_SERVER['REMOTE_ADDR'];

// IP adresini ekrana yazdırın
echo " <br>IP Adresiniz: $ipAdresi <br> " ;










echo "<br>Success!  Received Access-Accept response from RADIUS server.<br> ";


// Calistirilicak komutlar.Kontrol blogu ile.

$command ="sudo iptables -t mangle -I internet 1 -s $ipAdresi -j RETURN";
exec($command, $outputt, $returnStatus);

if ($returnStatus === 0) {
    echo "Komut başarıyla çalıştırıldı.";
} else {
    echo "Komut çalıştırılırken bir hata oluştu.";
}
echo "\n <br> Giriş başarılı. Hoş geldiniz, " . $username . "!";
}
#$radius = radius_auth_open();
# phpinfo(); 
?>
