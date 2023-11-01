<?php
require("vendor/autoload.php"); // Memuat pustaka phpMQTT

$host = "localhost";
$port = 1883;
$username = "ben";
$password = "1234";
$topic = "dariserver";
$message = "Hello from PHP wekwkwkwkwkwwkwk";

$mqtt = new \Bluerhinos\phpMQTT($host, $port, "PHP Client");

if ($mqtt->connect(true, NULL, $username, $password)) {
    echo "Koneksi berhasil";
    echo "\n";
    $mqtt->publish($topic, $message, 0);
    $mqtt->close();
} else {
    echo "Koneksi gagal.";
}
?>
