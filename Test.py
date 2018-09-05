import requests

url = "https://vision.googleapis.com/v1/images:annotate"

querystring = {"key":"AIzaSyDFlQtTzZtthkF0EA2gNKul38MbkEpmo_s"}

payload = "{\n  \"requests\":[\n    {\n      \"image\":{\n        \"source\":{\n          \"imageUri\":\n            \"gs://6583929/doggo.jpg\"\n        }\n      },\n      \"features\":[\n        {\n          \"type\":\"LABEL_DETECTION\",\n          \"maxResults\":10\n        }\n      ]\n    }\n  ]\n}\n\n"
headers = {
    'Content-Type': "application/json",
    'Cache-Control': "no-cache",
    'Postman-Token': "fa0b10e3-ef21-4bba-b816-4e1431858e22"
    }

response = requests.request("POST", url, data=payload, headers=headers, params=querystring)

print(response.text)
