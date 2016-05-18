<?php
if (isset ( $_POST ['subject'] )) {
    $subject = $_POST ['subject'];
} else {
    echo "No subject set";
    exit ();
}
if (isset ( $_POST ['message'] )) {
    $message = $_POST ['message'];
} else {
    echo "No message set";
    exit ();
}

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = "jackschitt.shit@gmail.com";
$password = "sohappyitstuesday";

require_once "Mail.php";
require_once "Mail/mime.php";
$from = "Jack Schitt <jackschitt.shit@gmail.com>";
$to = "SH*T Mismanagement <mismanagement_sohappy@yahoogroups.com>";
// $to = "SH*T Mismanagement <msaperst@gmail.com>";

$crlf = "\n";

$mime = new Mail_mime ( $crlf );

$mime->setTXTBody ( $message );
$mime->setHTMLBody ( $message );

$body = $mime->get ();

$headers = array (
        'From' => $from,
        'To' => $to,
        'Subject' => $subject 
);
$headers = $mime->headers ( $headers );
$smtp = Mail::factory ( 'smtp', array (
        'host' => $host,
        'port' => $port,
        'auth' => true,
        'username' => $username,
        'password' => $password 
) );

$mail = $smtp->send ( $to, $headers, $body );

if (PEAR::isError ( $mail )) {
    $error = $mail->getMessage ();
} else {
    $error = "none";
}
?>