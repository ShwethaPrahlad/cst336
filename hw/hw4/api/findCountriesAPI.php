<?php
//http://countryapi.gear.host/v1/Country/getCountries
$pName = $_GET['pName'];
$pRegion = $_GET['pRegion'];
$pCurrencyName = $_GET['pCurrencyName'];

//print_r($pName);

if(!empty($pName) || !empty($pRegion) || !empty($pCurrencyName) ){
$curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://countryapi.gear.host/v1/Country/getCountries?pName=$pName&pRegion=$pRegion&pCurrencyName=$pCurrencyName",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
      ),
   ));
}

$jsonData = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

echo $jsonData;
?>