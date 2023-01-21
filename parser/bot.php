<?php
$file = fopen('Well', 'w');
$country = readline();
//$date = mb_substr($input, 0, strpos($input, ' '));
//$country = mb_substr($input, 0, strlen($input));
echo $country."!\n";
$beginDate = new DateTime('2022-01-01');
$endDate = new DateTime('2022-12-30');
$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($beginDate, $interval, $endDate);
foreach ($period as $afternoon){
    $query = curl_init("https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$afternoon->format('d/m/Y'));
    curl_setopt($query, CURLOPT_HEADER, false);
    curl_setopt($query, CURLOPT_RETURNTRANSFER, true);
    $xml = new SimpleXMLElement(curl_exec($query));
    $coin = ' ';
    foreach ($xml->Valute as $name) {
        if ($name->Name == $country) {
            echo "good\n";
            $coin = $name->Value;
            break;
        }
    }
    curl_close($query);
    fwrite($file, $coin."\n");
}
$token='5890203668:AAE75kP4EdP3d742ujwV1tb0zG7EVdbNFXo';
$website="https://api.telegram.org/bot".$token;
$chatId=5070920817;
$params=[
    'chat_id'=>$chatId,
    'text'=>'Hello',
];
$ch = curl_init($website . '/sendMessage');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);