<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://app.whatspie.com/api/messages',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'receiver=6283818200383
  &device=082137231931
  &message=Woi aqila
  &type=chat',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Bearer mX2PHRqAJyNqDFao7Wf4WOflsp8BaPzDPsPACWcJs2X3S6GFLb'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
