<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyDFlQtTzZtthkF0EA2gNKul38MbkEpmo_s",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"requests\":[\n    {\n      \"image\":{\n        \"source\":{\n          \"imageUri\":\n            \"gs://6583929/doggo.jpg\"\n        }\n      },\n      \"features\":[\n        {\n          \"type\":\"LABEL_DETECTION\",\n          \"maxResults\":10\n        }\n      ]\n    }\n  ]\n}\n\n",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: 5f8a9a3f-b175-4a56-aeac-816cee0fa272"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$information = json_decode($response, TRUE);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print_r($information);
}
