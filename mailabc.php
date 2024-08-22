$to = "dsrtlounge@gmail.com";
$subject = "Password Recovery Mail from Dessert Lounge";
$txt = "hello";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: dessertlounge.online";
mail($to,$subject,$txt,$headers);
echo "<script>window.location='index.php';</script>";