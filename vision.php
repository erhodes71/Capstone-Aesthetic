<?php

/*if(isset($_GET["main"])){
  $main = $_GET["main"];
}*/

$main = "greenhouse";

$picture = array("greenhouse", "greenhouse 2", "greenhouse 3", "city1", "city 2", "city 3", "retro 1", "retro 2", "skull", "skull2");
$matching = array();

$curlMain = curl_init();
curl_setopt_array($curlMain, array(
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
                                'imageUri':'gs://6583929/$main.jpg'
                                }
                                },
                                'features':[{
                                  'type':'LABEL_DETECTION',
                                  'maxResults':20
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

  $responseMain = curl_exec($curlMain);
  curl_close($curlMain);

  $informationMain = json_decode($responseMain, TRUE);
  $lengthMain = sizeOf($informationMain['responses'][0]['labelAnnotations']);
  #This will parse the json file we get back and then set the values to the array of item
  $itemsMain = array();
  for ($i = 0; $i <= $lengthMain-1; $i++) {
    $itemMain = $informationMain['responses'][0]['labelAnnotations'][$i]['description'];
    $itemsMain[$i] = $itemMain;
  }
//print_r($itemsMain);

foreach ($picture as $value) {
  if(strcmp($value, $main)) {
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
                                    'imageUri':'gs://6583929/$value.jpg'
                                    }
                                    },
                                    'features':[{
                                      'type':'LABEL_DETECTION',
                                      'maxResults':20
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

    curl_close($curl);

    $information = json_decode($response, TRUE);
    $length = sizeOf($information['responses'][0]['labelAnnotations']);

    #This will parse the json file we get back and then set the values to the array of item
    $items = array();
    for ($i = 0; $i <= $length-1; $i++) {
      $item = $information['responses'][0]['labelAnnotations'][$i]['description'];
      $items[$i] = $item;
    }
    //print_r($items);
    $counter = 0;
    foreach ($items as $attribute) {
      if(in_array($attribute, $itemsMain)) {
        $counter = $counter + 1;
        if($counter > 1) {
          if(!(in_array($value, $matching))) {
            array_push($matching, $value);
          }
        }
      }
    }
  }
}

print_r($matching);
