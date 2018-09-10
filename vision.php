<?php

$picture = "greenhouse";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyDFlQtTzZtthkF0EA2gNKul38MbkEpmo_s",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{'requests':[{
                            'image':{
                              'source':{
                                'imageUri':'gs://6583929/$picture.jpg'
                                }
                              },
                              'features':[{
                                'type':'LABEL_DETECTION',
                                'maxResults':10
                                }
                              ]
                          }
                          ]
                        }",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: 5f8a9a3f-b175-4a56-aeac-816cee0fa272"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$information = json_decode($response, TRUE);

$length = sizeOf($information['responses'][0]['labelAnnotations']);
#printf($length);


#This will parse the json file we get back and then set the values to the array of item
$items = array();
for ($i = 0; $i <= $length-1; $i++) {
  $item = $information['responses'][0]['labelAnnotations'][$i]['description'];
  $items[$i] = $item;

}
print_r($items);
