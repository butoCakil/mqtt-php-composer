<?php
require "vendor/autoload.php"; // Memuat pustaka phpMQTT yang telah diinstal melalui Composer

$host = "localhost"; // Ganti dengan alamat broker MQTT Anda
$port = 1883; // Port broker MQTT (biasanya 1883)
$username = "ben"; // Ganti dengan username Anda (jika diperlukan)
$password = "1234"; // Ganti dengan password Anda (jika diperlukan)
$topic = "dariMCU"; // Ganti dengan topik yang Anda ingin subscribec

$client_id = "php_subscriber_" . rand(); // ID pelanggan MQTT

$mqtt = new Bluerhinos\phpMQTT($host, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
    echo "Terhubung ke broker MQTT.\n";

    $topics[$topic] = ["qos" => 0, "function" => "procmsg"];
    $mqtt->subscribe($topics, 0); // Subscribe ke topik yang diinginkan

    while ($mqtt->proc()) {
        // Loop ini akan menjalankan proses MQTT secara berkelanjutan
        // Anda dapat menambahkan logika di sini untuk menangani pesan yang diterima
    }

    $mqtt->close();
} else {
    echo "Koneksi ke broker MQTT gagal. Coba lagi nanti.\n";
}

function procmsg($topic, $msg) {
    // Fungsi ini akan dipanggil ketika pesan diterima pada topik yang di-subscribe
    // Anda dapat menambahkan logika di sini untuk menangani pesan yang diterima
    echo "Menerima pesan pada topik: $topic - Pesan: $msg\n";
    echo "Masuk\n";
    
}
