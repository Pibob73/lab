<?php
$url = 'https://favqs.com/api/qotd/';

$headers = [];

$curl = curl_init(); // создаем экземпляр curl
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_VERBOSE, 0);
curl_setopt($curl, CURLOPT_POST, false);
curl_setopt($curl, CURLOPT_URL, $url);
$result = curl_exec($curl);
echo json_decode($result)->{'quote'}->{'body'};
curl_close($curl);