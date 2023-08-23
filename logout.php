<!DOCTYPE html>
<html>
<head>
    <title>OTURUM SURESI BITTI</title>
</head>
<body>
    <h1>OTURUM SURENIZ BITTI</h1>

    <p><a href="index.php">Oturum sureniz bitti. Tekrar giris yapmak icin tiklayiniz.</a></p>
</body>
</html>
<?php

exec("sudo iptables -D internet -t mangle -s 192.168.2.3 -j RETURN");



?>
